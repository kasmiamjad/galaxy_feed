<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Forecast;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ForecastImport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Yajra\DataTables\Facades\DataTables;
use App\Services\XmlSenderService;
use Illuminate\Support\Facades\Response;


class ForecastController extends Controller

{
    public function generateXml()
{
    // Fetch only the first 5 rows
    $data = Forecast::select(
        'from_id',
        'to_id',
        'sender_id',
        'buyer_part_id',
        'description',
        'location',
        'period_start_date',
        'period_end_date',
        'uom',
        'order_forecast',
        'forecast_acknowledgement',
        'previous_forecast',
        'forecast_period',
        'compliance_period_months',
        'compliance_qty_on_ground',
        'suppliers_on_hand_stock',
        'suppliers_quality_inspection_stock',
        'suppliers_open_pos',
        'suppliers_rm_on_hand_on_order_eta',
        'suppliers_total_on_hand_stock',
        'quantity_in_transit',
        'suppliers_on_hand_under_manufacturing',
        'rm_country_of_origin',
        'pa_number'
    )->limit(5)->get();

    $xml = new \SimpleXMLElement('<?xml version="1.0"?><cXML version="1.2.033"></cXML>');

    $xml->addAttribute('payloadID', 'AN0141312069420240724T140138@championx.com');
    $xml->addAttribute('timestamp', now()->toIso8601String());
    $xml->addAttribute('xml:lang', 'en-US');

    $header = $xml->addChild('Header');
    $this->addHeaderChildren($header);

    $message = $xml->addChild('Message');
    $message->addAttribute('deploymentMode', 'test');

    $productReplenishmentMessage = $message->addChild('ProductReplenishmentMessage');
    $this->addProductReplenishmentHeader($productReplenishmentMessage);

    $productReplenishmentDetails = $productReplenishmentMessage->addChild('ProductReplenishmentDetails');

    foreach ($data as $item) {
        $this->addProductReplenishmentDetails($productReplenishmentDetails, $item);
    }

    return Response::make($xml->asXML(), 200, ['Content-Type' => 'application/xml']);
}

private function addHeaderChildren($header)
{
    $from = $header->addChild('From');
    $credential = $from->addChild('Credential');
    $credential->addAttribute('domain', 'NetworkID');
    $credential->addChild('Identity', 'AN01059051247-T');

    $to = $header->addChild('To');
    $credential = $to->addChild('Credential');
    $credential->addAttribute('domain', 'NetworkID');
    $credential->addChild('Identity', 'AN01402011954-T');

    $sender = $header->addChild('Sender');
    $credential = $sender->addChild('Credential');
    $credential->addAttribute('domain', 'NetworkID');
    $credential->addChild('Identity', 'AN01059051247-T');
    $sender->addChild('UserAgent', 'SCMSupplier');
}

private function addProductReplenishmentHeader($productReplenishmentMessage)
{
    $productReplenishmentHeader = $productReplenishmentMessage->addChild('ProductReplenishmentHeader');
    $productReplenishmentHeader->addAttribute('messageID', 'MFV-AN01413120694_20240724T140138');
    $productReplenishmentHeader->addAttribute('creationDate', '2024-07-24T14:01:38-5:00');
    $productReplenishmentHeader->addAttribute('processType', 'ManufacturingVisibility');
}

private function addProductReplenishmentDetails($productReplenishmentDetails, $item)
{
    $productDetails = $productReplenishmentDetails->addChild('ProductReplenishmentDetails');
    $itemID = $productDetails->addChild('ItemID');
    $itemID->addChild('SupplierPartID');
    $itemID->addChild('BuyerPartID', $item->buyer_part_id);

    $productDetails->addChild('Description', $item->description)->addAttribute('xml:lang', 'EN');
    $contact = $productDetails->addChild('Contact');
    $contact->addAttribute('role', 'locationTo');
    $contact->addChild('Name')->addAttribute('xml:lang', 'EN');
    //$contact->addChild('IdReference')->addAttribute('identifier', $item->location)->addAttribute('domain', 'buyerLocationID');

    // Add ReplenishmentTimeSeries sections
    $this->addReplenishmentTimeSeries($productDetails, $item);
}

private function addReplenishmentTimeSeries($productDetails, $item)
{
    $types = [
        'order_forecast' => 'Order Forecast',
        'rm_country_of_origin' => 'RMCountryofOrigin',
        'suppliers_quality_inspection_stock' => 'SupplierQualityInspectionstock',
        'suppliers_on_hand_stock' => 'SupplierOnHandStock',
        'suppliers_open_pos' => 'SupplierOpenPOs',
        'suppliers_on_hand_under_manufacturing' => 'SupplierOnHandunderManufacturing',
        'suppliers_total_on_hand_stock' => 'SupplierTotalonHandStock',
        'suppliers_rm_on_hand_on_order_eta' => 'SupplierRMOnHandOnOrderETA'
    ];

    foreach ($types as $type => $description) {
        $replenishmentTimeSeries = $productDetails->addChild('ReplenishmentTimeSeries');
        $replenishmentTimeSeries->addAttribute('type', 'custom');
        $replenishmentTimeSeries->addAttribute('customType', $description);

        $timeSeriesDetails = $replenishmentTimeSeries->addChild('TimeSeriesDetails');
        // $timeSeriesDetails->addChild('Period')
        //     ->addAttribute('startDate', '2024-07-24T14:01:38-5:00')
        //     ->addAttribute('endDate', '2024-07-24T14:01:38-5:00');

        $timeSeriesQuantity = $timeSeriesDetails->addChild('TimeSeriesQuantity');
        $timeSeriesQuantity->addAttribute('quantity', $item->$type ?? 0);
        $timeSeriesQuantity->addChild('UnitOfMeasure', $item->uom);
    }
}

    public function import()
    {
       // $this->sendXml();
        return view('forecasts.import');
    }
    
    public function processImport(Request $request)
{
    if ($request->hasFile('file')) {
        // Validate the file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Store the file temporarily
        $filePath = $request->file('file')->store('temp');

        // Import the data
        $data = Excel::toArray(new ForecastImport, storage_path('app/' . $filePath));

        // Flatten the data and remove the first row (header)
        $flattenedData = collect($data)->flatten(1);
        $flattenedData->shift(); // Remove the header row

        // Create a paginator instance
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentItems = $flattenedData->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginatedData = new LengthAwarePaginator($currentItems, $flattenedData->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(), // Correct path for pagination
            'pageName' => 'page',
        ]);

        // Pass the data and file path to the view
        return view('forecasts.preview', [
            'data' => $paginatedData,
            'filePath' => $filePath,
            'total' => $flattenedData->count()
        ]);
    } else {
        return redirect()->back()->with('error', 'No file selected for import');
    }
}
    
    public function confirmImport(Request $request)
{
    $filePath = $request->input('file_path');

    // Import the data
    $data = Excel::toArray(new ForecastImport, storage_path('app/' . $filePath));

    // Flatten the data
    $flattenedData = collect($data)->flatten(1);

    // Enable query log
    DB::enableQueryLog();
    Forecast::truncate();
    //
    // Save the data to the database
    foreach ($flattenedData as $row) {
        Forecast::create([
            'from_id' => $row[0],
            'to_id' => $row[1],
            'sender_id' => $row[2],
            'buyer_part_id' => $row[3],
            'description' => $row[4] ?? '',
            'location' => $row[5] ?? '',
            'period_start_date' => $row[6],
            'period_end_date' => $row[7],
            'uom' => $row[8] ?? '',
            'order_forecast' => $this->toInt($row[9]),
            'forecast_acknowledgement' => $this->toInt($row[10]),
            'previous_forecast' => $this->toInt($row[11]),
            'forecast_period' => $row[12] ?? '',
            'compliance_period_months' => $this->toInt($row[13]),
            'compliance_qty_on_ground' => $this->toInt($row[14]),
            'suppliers_on_hand_stock' => $this->toInt($row[15]),
            'suppliers_quality_inspection_stock' => $this->toInt($row[16]),
            'suppliers_open_pos' => $this->toInt($row[17]),
            'suppliers_rm_on_hand_on_order_eta' => $this->toInt($row[18]),
            'suppliers_total_on_hand_stock' => $this->toInt($row[19]),
            'quantity_in_transit' => $this->toInt($row[20]),
            'suppliers_on_hand_under_manufacturing' => $this->toInt($row[21]),
            'rm_country_of_origin' => $row[22] ?? '',
            'pa_number' => $row[23] ?? '',
        ]);
    }
    

    // Get the query log
    $queries = DB::getQueryLog();
   // dd($queries);

    // Clean up the file
    Storage::delete($filePath);

    return redirect()->route('forecasts.import')->with('success', 'Data Imported Successfully');
}

public function getData()
    {
        $forecasts = Forecast::select([
            'id',
            'from_id',
            'to_id',
            'sender_id',
            'buyer_part_id',
            'description',
            'location',
            'period_start_date',
            'period_end_date',
            'uom',
            'order_forecast',
            'forecast_acknowledgement',
            'previous_forecast',
            'forecast_period',
            'compliance_period_months',
            'compliance_qty_on_ground',
            'suppliers_on_hand_stock',
            'suppliers_quality_inspection_stock',
            'suppliers_open_pos',
            'suppliers_rm_on_hand_on_order_eta',
            'suppliers_total_on_hand_stock',
            'quantity_in_transit',
            'suppliers_on_hand_under_manufacturing',
            'rm_country_of_origin',
            'pa_number',
        ]);

        return DataTables::of($forecasts)->make(true);
    }

private function toInt($value)
    {
        return is_numeric($value) ? (int)$value : 0;
    }

    private function toFloat($value)
    {
        return is_numeric($value) ? (float)$value : 0.0;
    }

    private function toDate($value)
    {
        return isset($value) ? Date::excelToDateTimeObject($value) : null;
    }

    public function processImportData(Request $request)
    {
        $filePath = $request->input('file_path');
        $data = Excel::toArray(new ForecastImport, storage_path('app/' . $filePath));

        foreach (collect($data)->flatten(1) as $row) {
            Forecast::create([
                'from_id' => $row[0],
                'to_id' => $row[1],
                'sender_id' => $row[2],
                'buyer_part_id' => $row[3],
                'description' => $row[4],
                'location' => $row[5],
                'period_start_date' => \Carbon\Carbon::parse($row[6])->format('Y-m-d'),
                'period_end_date' => \Carbon\Carbon::parse($row[7])->format('Y-m-d'),
                'uom' => $row[8],
                'order_forecast' => $row[9],
                'forecast_acknowledgement' => $row[10],
                'previous_forecast' => $row[11],
                'forecast_period' => $row[12],
                'compliance_period_months' => $row[13],
                'compliance_qty_on_ground' => $row[14],
                'supplier_on_hand_stock' => $row[15],
                'supplier_quality_inspection_stock' => $row[16],
                'supplier_open_pos' => $row[17],
                'supplier_rm_on_hand_on_order_eta' => $row[18],
                'supplier_total_on_hand_stock' => $row[19],
                'quantity_in_transit' => $row[20],
                'supplier_on_hand_under_manufacturing' => $row[21],
                'rm_country_of_origin' => $row[22],
                'pa_number' => $row[23],
            ]);
        }

        // Optionally, delete the temporary file
        Storage::delete($filePath);

        return redirect()->route('forecasts.index')->with('success', 'Data Imported and Saved Successfully');
    }

    public function index()
    {
        // $forecasts = Forecast::all();
         return view('forecasts.index', compact('forecasts'));
        
        
    }

    public function create()
    {
        return view('forecasts.create');
    }

    public function store(Request $request)
    {
        $forecast = Forecast::create($request->all());
        return redirect()->route('forecasts.index')->with('success', 'Forecast created successfully');
    }

    public function edit(Forecast $forecast)
    {
        return view('forecasts.edit', compact('forecast'));
    }

    public function update(Request $request, Forecast $forecast)
    {
        $forecast->update($request->all());
        return redirect()->route('forecasts.index')->with('success', 'Forecast updated successfully');
    }

    public function destroy(Forecast $forecast)
    {
        $forecast->delete();
        return redirect()->route('forecasts.index')->with('success', 'Forecast deleted successfully');
    }
}

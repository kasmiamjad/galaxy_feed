<?php

namespace App\Http\Controllers;

use App\Services\XmlSenderService;
use Illuminate\Http\Request;

class XmlController extends Controller
{
    protected $xmlSender;

    public function __construct(XmlSenderService $xmlSender)
    {
        $this->xmlSender = $xmlSender;
    }

    public function sendXml(Request $request)
    {

        dd('test');
        // Example XML content
        $xmlContent = <<<XML
<?xml version="1.0"?>
<cXML version="1.2.033" payloadID="AN0141312069420240724T140138@championx.com" timestamp="2024-07-24T14:01:38-5:00" xml:lang="en-US">
<Header>
<From>
<Credential domain="NetworkID">
<Identity>AN01413120694-T</Identity>
</Credential>
</From>
<To>
<Credential domain="NetworkID">
<Identity>AN01402011954-T</Identity>
</Credential>
</To>
<Sender>
<Credential domain="NetworkID">
<Identity>AN01413120694-T</Identity>
</Credential>
<UserAgent>SCMSupplier</UserAgent>
</Sender>
</Header>
<Message deploymentMode="test">
<ProductReplenishmentMessage>
<ProductReplenishmentHeader messageID="MFV-AN01413120694_20240724T140138" creationDate="2024-07-24T14:01:38-5:00" processType="ManufacturingVisibility"/>
<ProductReplenishmentDetails>
<ItemID>
<SupplierPartID/>
<BuyerPartID>1001046500</BuyerPartID>
</ItemID>
<Description xml:lang="EN">BACTRON KCB-310</Description>
<Contact role="locationTo">
<Name xml:lang="EN"/>
<IdReference identifier="Dammam" domain="buyerLocationID"/>
</Contact>
<ReplenishmentTimeSeries type="manufacturingOrder">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="4600004241">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="RMCountryofOrigin">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="966">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierQualityInspectionstock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="121.000">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOnHandStock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="131.053">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOpenPOs">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOnHandunderManufacturing">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierTotalonHandStock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="141.053">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierRMOnHandOnOrderETA">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>PL</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
</ProductReplenishmentDetails>
<ProductReplenishmentDetails>
<ItemID>
<SupplierPartID/>
<BuyerPartID>1000022477</BuyerPartID>
</ItemID>
<Description xml:lang="EN">CORTRON RN-477</Description>
<Contact role="locationTo">
<Name xml:lang="EN"/>
<IdReference identifier="Dammam" domain="buyerLocationID"/>
</Contact>
<ReplenishmentTimeSeries type="manufacturingOrder">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="4600004269">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="RMCountryofOrigin">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="966">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierQualityInspectionstock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0.000">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOnHandStock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="322.000">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOpenPOs">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierOnHandunderManufacturing">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierTotalonHandStock">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="322.000">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
<ReplenishmentTimeSeries type="custom" customType="SupplierRMOnHandOnOrderETA">
<TimeSeriesDetails>
<Period startDate="2024-07-24T14:01:00-5:00" endDate="2024-07-24T14:01:00-5:00"/>
<TimeSeriesQuantity quantity="0">
<UnitOfMeasure>DR</UnitOfMeasure>
</TimeSeriesQuantity>
</TimeSeriesDetails>
</ReplenishmentTimeSeries>
</ProductReplenishmentDetails>
</ProductReplenishmentMessage>
</Message>
</cXML>
XML;

        try {
            $response = $this->xmlSender->sendXmlData($xmlContent);

            return response()->json([
                'status' => 'success',
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

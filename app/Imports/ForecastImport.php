<?php

namespace App\Imports;

use App\Forecast;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ForecastImport implements ToModel
{
    public function model(array $row)
    {
        return new Forecast([
            'from_id' => $row[0] ?? 0,
            'to_id' => $row[1] ?? 0,
            'sender_id' => $row[2] ?? 0,
            'buyer_part_id' => $row[3] ?? 0,
            'description' => $row[4] ?? '',
            'location' => $row[5] ?? '',
            'period_start_date' => $row[6],
            'period_end_date' => $row[7],
            'uom' => $row[8] ?? '',
            'order_forecast' => $row[9] ?? 0,
            'forecast_acknowledgement' => $row[10] ?? 0,
            'previous_forecast' => $row[11] ?? 0,
            'forecast_period' => $row[12] ?? '',
            'compliance_period_months' => $row[13] ?? 0,
            'compliance_qty_on_ground' => $row[14] ?? 0,
            'suppliers_on_hand_stock' => $row[15] ?? 0,
            'suppliers_quality_inspection_stock' => $row[16] ?? 0,
            'suppliers_open_pos' => $row[17] ?? 0,
            'suppliers_rm_on_hand_on_order_eta' => $row[18] ?? 0,
            'suppliers_total_on_hand_stock' => $row[19] ?? 0,
            'quantity_in_transit' => $row[20] ?? 0,
            'suppliers_on_hand_under_manufacturing' => $row[21] ?? 0,
            'rm_country_of_origin' => $row[22] ?? '',
            'pa_number' => $row[23] ?? '',
        ]);
    }
}


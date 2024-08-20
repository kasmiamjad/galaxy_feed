<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Forecast extends Model
{
    protected $fillable = [
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
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $sql = $model->toSql();
            Log::info('SQL Query: ' . $sql);
        });
    }
    
}

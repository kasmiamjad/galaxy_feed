<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->string('from_id');
            $table->string('to_id');
            $table->string('sender_id');
            $table->string('buyer_part_id');
            $table->text('description');
            $table->string('location');
            $table->date('period_start_date');
            $table->date('period_end_date');
            $table->string('uom');
            $table->integer('order_forecast');
            $table->integer('forecast_acknowledgement');
            $table->integer('previous_forecast');
            $table->string('forecast_period');
            $table->integer('compliance_period_months');
            $table->integer('compliance_qty_on_ground');
            $table->integer('suppliers_on_hand_stock');
            $table->integer('suppliers_quality_inspection_stock');
            $table->integer('suppliers_open_pos');
            $table->integer('suppliers_rm_on_hand_on_order_eta');
            $table->integer('suppliers_total_on_hand_stock');
            $table->integer('quantity_in_transit');
            $table->integer('suppliers_on_hand_under_manufacturing');
            $table->string('rm_country_of_origin');
            $table->string('pa_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
}

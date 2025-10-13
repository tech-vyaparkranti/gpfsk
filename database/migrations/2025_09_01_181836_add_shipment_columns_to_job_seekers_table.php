<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShipmentColumnsToJobSeekersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_seekers', function (Blueprint $table) {
             $table->boolean('customs_documentation_knowledge')->nullable();
            $table->boolean('iata_dg_certification')->nullable();
            $table->boolean('airline_negotiation')->nullable();
            $table->boolean('air_waybill_execution')->nullable();
            $table->boolean('regulations_compliance')->nullable();
            $table->boolean('shipping_bill_knowledge')->nullable();
            $table->boolean('pharma_shipment_handling')->nullable();
            $table->boolean('live_animal_handling')->nullable();
            $table->boolean('perishable_shipment_handling')->nullable();
            $table->boolean('incoterms_knowledge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_seekers', function (Blueprint $table) {
            Schema::dropIfExists('job_seekers');
        });
    }
}

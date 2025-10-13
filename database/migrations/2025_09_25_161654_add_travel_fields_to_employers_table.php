<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTravelFieldsToEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->boolean('no_prior_experience')->default(false)->after('job_areas');
            $table->boolean('completed_travel_course')->default(false)->after('no_prior_experience');
            $table->string('institution_name', 150)->nullable()->after('completed_travel_course');
            $table->string('institution_city', 100)->nullable()->after('institution_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn(['no_prior_experience', 'completed_travel_course', 'institution_name', 'institution_city']);
        });
    }
}
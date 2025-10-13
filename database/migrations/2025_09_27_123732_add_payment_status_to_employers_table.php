<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentStatusToEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('employers', function (Blueprint $table) {
        $table->string('payment_status')->default('pending')->after('institution_city');
    });
}

public function down()
{
    Schema::table('employers', function (Blueprint $table) {
        $table->dropColumn('payment_status');
    });
}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recruitment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment', function (Blueprint $table) {
            $table->id();
            $table->string('application_no')->unique();
            $table->string('first_name', 100);
            $table->string('fathers_name', 150)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('mother_name', 100);
            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('nationality', 50);
            $table->enum('category', ['general', 'obc', 'sc', 'st']);
            $table->string('aadhaar', 12);
            $table->string('pan', 10)->nullable();
            $table->string('address', 500)->nullable();
            $table->string('city', 120)->nullable();
            $table->string('state', 120);
            $table->string('district', 120);
            $table->string('block', 120);
            $table->string('panchayat', 120);
            $table->string('pin_code', 10);
            $table->string('email')->nullable();
            $table->string('mobile', 15);
            $table->string('whatsapp', 15)->nullable();
            $table->string('qualification', 50)->nullable();
            $table->string('board', 100);
            $table->string('year', 4);
            $table->string('percentage', 10);
            $table->string('photo_path');
            $table->string('signature_path');
            $table->string('rzp_order_id')->nullable();
            $table->string('rzp_payment_id')->nullable();
            $table->string('rzp_signature')->nullable();
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
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
        Schema::dropIfExists('recruitment');
    }
}

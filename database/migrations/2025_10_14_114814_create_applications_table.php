<?php

// database/migrations/2025_10_13_000000_create_applications_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('applications', function (Blueprint $t) {
            $t->id();
            $t->string('application_no')->unique();         // e.g. DSS-2025-0001
            $t->string('first_name');
            $t->string('fathers_name')->nullable();
            $t->string('last_name')->nullable();
            $t->text('address')->nullable();
            $t->string('city')->nullable();
            $t->string('state')->nullable();
            $t->string('pin_code')->nullable();
            $t->string('email')->nullable();
            $t->string('mobile')->nullable();
            $t->string('whatsapp')->nullable();
            $t->string('qualification')->nullable();        // 12th/Graduate/PG/Other
            $t->boolean('consent')->default(false);

            $t->string('photo_path')->nullable();           // storage path
            $t->string('signature_path')->nullable();

            // Payment
            $t->string('rzp_order_id')->nullable();
            $t->string('rzp_payment_id')->nullable();
            $t->string('rzp_signature')->nullable();
            $t->enum('payment_status',['pending','paid','failed'])->default('pending');

            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('applications'); }
};

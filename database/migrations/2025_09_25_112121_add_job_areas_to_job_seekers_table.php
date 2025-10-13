<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('job_seekers', function (Blueprint $table) {
            $table->json('job_areas')->nullable()->after('not_want_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_seekers', function (Blueprint $table) {
            $table->dropColumn('job_areas');
        });
    }
};
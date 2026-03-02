<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->timestamps();
        });

        // Set existing rows to current timestamp
        DB::table('latest_news')->whereNull('created_at')->update([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};

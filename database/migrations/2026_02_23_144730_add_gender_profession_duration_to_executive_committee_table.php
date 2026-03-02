<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('designation');
            $table->string('profession')->nullable()->after('gender');
            $table->string('duration_of_involvement')->nullable()->after('profession');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->dropColumn(['gender', 'profession', 'duration_of_involvement']);
        });
    }
};

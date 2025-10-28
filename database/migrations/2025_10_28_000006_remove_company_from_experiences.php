<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Only attempt to drop if the table and column exist. Some DB platforms
        // or setups may not support dropping columns without doctrine/dbal.
        if (Schema::hasTable('experiences') && Schema::hasColumn('experiences', 'company')) {
            try {
                Schema::table('experiences', function (Blueprint $table) {
                    $table->dropColumn('company');
                });
            } catch (\Throwable $e) {
                // Ignore failures to drop column (e.g., SQLite without DBAL).
                // Leaving the column in place is safe; developer can run
                // composer require doctrine/dbal and retry migrations if desired.
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('experiences') && !Schema::hasColumn('experiences', 'company')) {
            Schema::table('experiences', function (Blueprint $table) {
                $table->string('company')->nullable();
            });
        }
    }
};

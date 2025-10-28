<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        try {
            Schema::table('skills', function (Blueprint $table) {
                if (Schema::hasColumn('skills', 'level')) {
                    $table->dropColumn('level');
                }
                if (Schema::hasColumn('skills', 'category')) {
                    $table->dropColumn('category');
                }
                if (Schema::hasColumn('skills', 'description')) {
                    $table->dropColumn('description');
                }
            });
        } catch (\Throwable $e) {
            // some platforms require doctrine/dbal to drop columns; ignore here
        }
    }

    public function down(): void
    {
        Schema::table('skills', function (Blueprint $table) {
            if (!Schema::hasColumn('skills', 'level')) {
                $table->string('level')->nullable()->after('name');
            }
            if (!Schema::hasColumn('skills', 'category')) {
                $table->string('category')->nullable()->after('level');
            }
            if (!Schema::hasColumn('skills', 'description')) {
                $table->text('description')->nullable()->after('category');
            }
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blogs') && Schema::hasColumn('blogs', 'author')) {
            try {
                Schema::table('blogs', function (Blueprint $table) {
                    $table->dropColumn('author');
                });
            } catch (\Throwable $e) {
                // Some platforms (SQLite without DBAL) can't drop columns; ignore.
            }
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('blogs') && !Schema::hasColumn('blogs', 'author')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->string('author')->nullable()->after('body');
            });
        }
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('job')->nullable()->after('id');
        });

        // copy existing title -> job
        DB::statement('UPDATE experiences SET job = title');

        // attempt to drop the old title column; this may require doctrine/dbal on some platforms
        try {
            Schema::table('experiences', function (Blueprint $table) {
                if (Schema::hasColumn('experiences', 'title')) {
                    $table->dropColumn('title');
                }
            });
        } catch (\Throwable $e) {
            // ignore if platform does not support dropColumn without doctrine/dbal
        }
    }

    public function down(): void
    {
        // recreate title and copy back from job if necessary
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id');
        });
        DB::statement('UPDATE experiences SET title = job');

        try {
            Schema::table('experiences', function (Blueprint $table) {
                if (Schema::hasColumn('experiences', 'job')) {
                    $table->dropColumn('job');
                }
            });
        } catch (\Throwable $e) {
            // ignore
        }
    }
};

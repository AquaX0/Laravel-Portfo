<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            // store raw bytes of the uploaded image (nullable)
            $table->binary('image')->nullable()->after('body');
            // store the MIME type so we can render a correct data-uri
            $table->string('image_mime')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn(['image', 'image_mime']);
        });
    }
};

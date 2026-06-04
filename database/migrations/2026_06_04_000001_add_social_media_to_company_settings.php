<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            // Tambah kolom social media yang belum ada
            // instagram_url sudah ada dari migration sebelumnya
            $table->string('facebook_url')->nullable()->after('instagram_url');
            $table->string('linkedin_url')->nullable()->after('facebook_url');
            $table->string('tiktok_url')->nullable()->after('linkedin_url');
            $table->string('youtube_url')->nullable()->after('tiktok_url');
            $table->string('twitter_url')->nullable()->after('youtube_url');
        });
    }

    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn([
                'facebook_url',
                'linkedin_url',
                'tiktok_url',
                'youtube_url',
                'twitter_url',
            ]);
        });
    }
};

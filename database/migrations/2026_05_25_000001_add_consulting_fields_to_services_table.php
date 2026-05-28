<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('category')->nullable()->after('slug');
            $table->string('thumbnail_image')->nullable()->after('icon_image');
            $table->string('banner_image')->nullable()->after('thumbnail_image');
            $table->longText('benefits')->nullable()->after('full_description');
            $table->longText('steps')->nullable()->after('benefits');
            $table->longText('requirements')->nullable()->after('steps');
            $table->longText('faq_items')->nullable()->after('requirements');
            $table->string('meta_title')->nullable()->after('faq_items');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->text('meta_keywords')->nullable()->after('meta_description');
            $table->unsignedInteger('sort_order')->default(0)->after('meta_keywords');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'thumbnail_image',
                'banner_image',
                'benefits',
                'steps',
                'requirements',
                'faq_items',
                'meta_title',
                'meta_description',
                'meta_keywords',
                'sort_order',
            ]);
        });
    }
};
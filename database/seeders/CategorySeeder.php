<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name_id' => 'Hukum Korporasi', 'name_en' => 'Corporate Law', 'slug' => 'hukum-korporasi'],
            ['name_id' => 'Perizinan Bisnis', 'name_en' => 'Business Licensing', 'slug' => 'perizinan-bisnis'],
            ['name_id' => 'Kepatuhan Regulasi', 'name_en' => 'Regulatory Compliance', 'slug' => 'kepatuhan-regulasi'],
            ['name_id' => 'Kekayaan Intelektual', 'name_en' => 'Intellectual Property', 'slug' => 'kekayaan-intelektual'],
            ['name_id' => 'Strategi Bisnis', 'name_en' => 'Business Strategy', 'slug' => 'strategi-bisnis'],
        ];

        foreach ($categories as $category) {
            $existing = Category::withTrashed()->where('slug', $category['slug'])->first();
            $payload = [
                'name' => json_encode([
                    'id' => $category['name_id'],
                    'en' => $category['name_en']
                ], JSON_UNESCAPED_UNICODE)
            ];

            if ($existing) {
                $payload['deleted_at'] = null; // Restore if it was soft-deleted
                $existing->update($payload);
            } else {
                $payload['slug'] = $category['slug'];
                Category::create($payload);
            }
        }
    }
}

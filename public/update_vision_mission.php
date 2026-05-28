<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\CompanySetting;

$setting = CompanySetting::first();
if ($setting) {
    $setting->vision = json_encode([
        'id' => 'Menjadi firma konsultan terdepan yang terpercaya dalam memberikan solusi hukum, perizinan, dan kepatuhan untuk mendukung pertumbuhan bisnis klien.',
        'en' => "To be the leading and trusted consulting firm in providing legal, licensing, and compliance solutions to support the growth of our clients' businesses."
    ]);
    
    $setting->mission = json_encode([
        'id' => "1. Menyediakan pendampingan perizinan dan kepatuhan regulasi yang efisien.\n2. Memberikan solusi strategis untuk meminimalisasi risiko legalitas operasional.\n3. Menjalin kemitraan jangka panjang berbasis integritas dan profesionalisme.",
        'en' => "1. Provide efficient assistance with licensing and regulatory compliance.\n2. Deliver strategic solutions to minimize operational legality risks.\n3. Build long-term partnerships based on integrity and professionalism."
    ]);
    $setting->save();
    echo "SUCCESS_UPDATE_DB";
} else {
    echo "NO_SETTINGS_FOUND";
}

<?php
$file = __DIR__.'/../database/seeders/ServiceSeeder.php';
$lines = file($file);

$newLines = [];
foreach ($lines as $i => $line) {
    if ($i <= 425) {
        $newLines[] = $line;
    }
}

// Ensure the last valid line we keep is the `            ],`
// Actually line 426 is `            ],`
// Let's add the closing array and loop

$append = <<<'PHP'
        ];

        foreach ($services as $service) {
            $service['faq_items'] = $service['faq'] ?? [];
            unset($service['faq']);

            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
PHP;

$newLines[] = $append;

file_put_contents($file, implode("", $newLines));
echo "Fixed ServiceSeeder.php";

<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

echo "Running migrate:\n";
$kernel->call('migrate', ['--force' => true]);
echo $kernel->output();

echo "\nRunning db:seed --class=ServiceSeeder:\n";
$kernel->call('db:seed', ['--class' => 'ServiceSeeder', '--force' => true]);
echo $kernel->output();

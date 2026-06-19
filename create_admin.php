<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Admin;

// Create admin if not exists
$admin = Admin::firstOrCreate(
    ['username' => 'test'],
    ['password' => 'test', 'nama_lengkap' => 'Test Admin']
);

echo "Admin created/exists: " . $admin->username . " (ID: " . $admin->id_admin . ")\n";

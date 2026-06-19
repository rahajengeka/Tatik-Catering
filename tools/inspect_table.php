<?php
// tiny script to inspect DB columns for tables
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

$tables = ['review', 'menus', 'admin'];
$res = [];
foreach ($tables as $t) {
    try {
        $res[$t] = Schema::getColumnListing($t);
        // also try to get first row to show sample keys
        $row = DB::table($t)->limit(1)->first();
        $res[$t . '_sample'] = $row ? (array)$row : null;
    } catch (\Throwable $e) {
        $res[$t] = 'ERROR: ' . $e->getMessage();
    }
}

echo json_encode($res, JSON_PRETTY_PRINT);

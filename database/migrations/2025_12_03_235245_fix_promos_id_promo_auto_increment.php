<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // id_promo sudah dibuat auto-increment primary key pada create_promos_table
    }

    public function down()
    {
    }
};
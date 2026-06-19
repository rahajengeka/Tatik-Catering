<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('promos', function (Blueprint $table) {
            // Hapus primary key lama dulu
            $table->dropPrimary('id_promo');
            
            // Bikin ulang jadi auto increment + primary key
            $table->bigIncrements('id_promo')->first();
        });
    }

    public function down()
    {
        Schema::table('promos', function (Blueprint $table) {
            $table->dropColumn('id_promo');
        });
    }
};
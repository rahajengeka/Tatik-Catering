<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('promos', function (Blueprint $table) {
        $table->id('id_promo');
        $table->string('judul_promo');
        $table->text('deskripsi');
        $table->string('gambar');
        $table->unsignedInteger('diskon_persen');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};

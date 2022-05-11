<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_pesanan');
            $table->integer('total_harga');
            $table->boolean('nameset')->default(false);
            $table->string('nama')->nullable();
            $table->string('nomor')->nullable();
            $table->integer('product_id');
            $table->integer('pesanan_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_pesanans');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga')->default(125000);
            $table->integer('harga_nameset')->default(50000);
            $table->boolean('is_ready')->default(true);
            $table->string('jenis')->default('Replica top Quality');
            $table->float('berat')->default(0.25);
            $table->string('gambar');
            $table->integer('liga_id');
            $table->boolean('is_favorite')->default(false);
            $table->integer('user_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('wishlists');
    }
}

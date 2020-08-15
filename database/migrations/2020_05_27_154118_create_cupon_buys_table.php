<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuponBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_buys', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('regularClienteId')->unsigned();
          $table->foreign('regularClienteId')->references('id')->on('client_cards')->onDelete('cascade');

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
        Schema::dropIfExists('cupon_buys');
    }
}

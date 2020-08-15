<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientCardsTable extends Migration
{
  public function up()
  {
    Schema::create('client_cards', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('codReference')->nullable();
      $table->integer('state')->nullable();
      $table->bigInteger('userId')->unsigned();
      $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('client_cards');
  }
}

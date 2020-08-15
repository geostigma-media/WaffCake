<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponseSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response_surveys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('response');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('surveysId')->unsigned();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('surveysId')->references('id')->on('surveys')->onDelete('cascade');
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
        Schema::dropIfExists('response_surveys');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyPublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_publics', function (Blueprint $table) {
          $table->bigIncrements('id');

          $table->string('question1')->nullable();
          $table->string('question2')->nullable();
          $table->string('question3')->nullable();
          $table->string('question4')->nullable();
          $table->string('additions')->nullable();
          $table->string('email')->nullable();
          $table->string('verificate')->nullable();

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
        Schema::dropIfExists('survey_publics');
    }
}

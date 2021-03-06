<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer');
            $table->boolean('delete')->default(0);
            $table->integer('votes')->default(0);
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('type');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions_generals')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers_generals');
    }
}

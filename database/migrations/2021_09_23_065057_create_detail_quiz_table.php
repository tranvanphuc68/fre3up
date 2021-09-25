<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_quiz', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_quiz')->unsigned();
            $table->string('question');
            $table->string('ans_1');
            $table->string('ans_2');
            $table->string('ans_3');
            $table->string('ans_4');
            $table->string('true_ans');
            $table->timestamps();

            $table->foreign('id_quiz')->references('id')->on('quiz')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_quiz');
    }
}

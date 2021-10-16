<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_process', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_process')->unsigned()->nullable();
            $table->string('content');
            $table->date('date');
            $table->integer('status')->default('0');
            $table->integer('show')->default('0');
            $table->timestamps();

            $table->foreign('id_process')->references('id')->on('process')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_process');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("genres", function (Blueprint $table) {
            $table->increments("genres_id");
            $table->integer("shops_id")->unsigned();
            $table->string("genre");
            $table->timestamps();

            $table->foreign('shops_id')->references('shops_id')->on('shops')->onDelete('cascade')->onUpdate('cascade');

           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}

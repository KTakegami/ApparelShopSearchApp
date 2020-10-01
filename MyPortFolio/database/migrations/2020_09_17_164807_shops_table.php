<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shop_name')->unique()->comment('ショップ名');
            $table->text('shop_description')->nullable()->comment('ショップ説明');
            $table->string('shop_image')->nullable()->comment('ショップ画像');
            $table->string('shop_address')->unique()->comment('ショップ住所');

            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('shops');
    }
}

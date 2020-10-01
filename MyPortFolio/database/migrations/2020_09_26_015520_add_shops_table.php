<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->foreignId('genre_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //ジャンルテーブルと結合

            $table->foreignId('prefecture_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //都道府県テーブルと結合

            $table->foreignId('product_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            //取扱商品テーブルと結合
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('shops', function(Blueprint $table){
            $table->dropForeign('shops_genre_id_foreign');
            $table->dropForeign('shops_prefecture_id_foreign');
            $table->dropForeign('shops_product_id_foreign');
        });
    }
}

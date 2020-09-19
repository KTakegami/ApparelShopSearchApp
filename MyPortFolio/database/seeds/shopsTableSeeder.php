<?php

use Illuminate\Database\Seeder;

class shopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->truncate(); //全データをクリアしてからシーダーを実行
    }
}

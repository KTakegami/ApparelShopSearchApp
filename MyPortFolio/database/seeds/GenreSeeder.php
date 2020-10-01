<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['id' => 1, 'genre' => 'ストリート'],
            ['id' => 2, 'genre' => 'モード'],
            ['id' => 3, 'genre' => 'ミリタリー'],
            ['id' => 4, 'genre' => 'カジュアル'],
            ['id' => 5, 'genre' => 'きれいめ'],
            ['id' => 6, 'genre' => 'ビジネス'],
            ['id' => 7, 'genre' => 'その他'],
        ]);

    }

}
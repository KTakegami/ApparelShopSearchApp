<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['id' => 1, 'product' => 'メンズ'],
            ['id' => 2, 'product' => 'レディース'],
            ['id' => 3, 'product' => '子供服'],
            ['id' => 4, 'product' => '靴'],
            ['id' => 5, 'product' => 'アクセサリー'],
            ['id' => 6, 'product' => 'その他'],
        ]);
    }
}

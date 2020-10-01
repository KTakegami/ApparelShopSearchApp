<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prefectures')->insert([
            ['id' => 1, 'prefectures' => '北海道'],
            ['id' => 2, 'prefectures' => '青森県'],
            ['id' => 3, 'prefectures' => '岩手県'],
            ['id' => 4, 'prefectures' => '宮城県'],
            ['id' => 5, 'prefectures' => '秋田県'],
            ['id' => 6, 'prefectures' => '山形県'],
            ['id' => 7, 'prefectures' => '福島県'],
            ['id' => 8, 'prefectures' => '茨城県'],
            ['id' => 9, 'prefectures' => '栃木県'],
            ['id' => 10, 'prefectures' => '群馬県'],
            ['id' => 11, 'prefectures' => '埼玉県'],
            ['id' => 12, 'prefectures' => '千葉県'],
            ['id' => 13, 'prefectures' => '東京都'],
            ['id' => 14, 'prefectures' => '神奈川県'],
            ['id' => 15, 'prefectures' => '新潟県'],
            ['id' => 16, 'prefectures' => '富山県'],
            ['id' => 17, 'prefectures' => '石川県'],
            ['id' => 18, 'prefectures' => '福井県'],
            ['id' => 19, 'prefectures' => '山梨県'],
            ['id' => 20, 'prefectures' => '長野県'],
            ['id' => 21, 'prefectures' => '岐阜県'],
            ['id' => 22, 'prefectures' => '静岡県'],
            ['id' => 23, 'prefectures' => '愛知県'],
            ['id' => 24, 'prefectures' => '三重県'],
            ['id' => 25, 'prefectures' => '滋賀県'],
            ['id' => 26, 'prefectures' => '京都府'],
            ['id' => 27, 'prefectures' => '大阪府'],
            ['id' => 28, 'prefectures' => '兵庫県'],
            ['id' => 29, 'prefectures' => '奈良県'],
            ['id' => 30, 'prefectures' => '和歌山県'],
            ['id' => 31, 'prefectures' => '鳥取県'],
            ['id' => 32, 'prefectures' => '島根県'],
            ['id' => 33, 'prefectures' => '岡山県'],
            ['id' => 34, 'prefectures' => '広島県'],
            ['id' => 35, 'prefectures' => '山口県'],
            ['id' => 36, 'prefectures' => '徳島県'],
            ['id' => 37, 'prefectures' => '香川県'],
            ['id' => 38, 'prefectures' => '愛媛県'],
            ['id' => 39, 'prefectures' => '高知県'],
            ['id' => 40, 'prefectures' => '福岡県'],
            ['id' => 41, 'prefectures' => '佐賀県'],
            ['id' => 42, 'prefectures' => '長崎県'],
            ['id' => 43, 'prefectures' => '熊本県'],
            ['id' => 44, 'prefectures' => '大分県'],
            ['id' => 45, 'prefectures' => '宮崎県'],
            ['id' => 46, 'prefectures' => '鹿児島県'],
            ['id' => 47, 'prefectures' => '沖縄県'],
        ]);
    }
}

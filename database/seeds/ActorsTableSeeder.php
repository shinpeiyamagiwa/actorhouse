<?php

use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('actors')->insert([
            [
            'name' => 'エマ・ストーン',
            'image_path' => 'emmastone.jpg',
            'video_link' => 'N8HqyuLBqnU',
            'twitter_link' => 'https://twitter.com/dailyemmastone?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1988.11.6',
            ],
            [
            'name' => 'ガル・ガドット',
            'image_path' => 'Gal_Gadot.jpg',
            'video_link' => 'GTbPlfRS_c4',
            'twitter_link' => 'https://twitter.com/GalGadot?lang=ja',
            'place' => 'イスラエル',
            'birthday' => '1985.4.30',   
            ],
            [
            'name' => 'ヘイリー・スタインフェルド',
            'image_path' => 'Hailee Steinfeld.png',
            'video_link' => 'Xjz7fSvus78',
            'twitter_link' => 'https://twitter.com/HaileeSteinfeld?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1996.12.11',   
            ],
            [
            'name' => 'トム・クルーズ',
            'image_path' => 'Tom Cruise.jpg',
            'video_link' => 'CW1_dUBzJV8',
            'twitter_link' => 'https://twitter.com/TomCruise?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1962.7.3',   
            ],
            [
            'name' => 'ロバート・ダウニー・ジュニア',
            'image_path' => 'Tony_Stark.jpg',
            'video_link' => '5WI6MHH7Y7I',
            'twitter_link' => 'https://twitter.com/RobertDowneyJr?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1965.4.4',
            ],
            [
            'name' => 'マーク・アラン・ラファロ',
            'image_path' => 'Mark_Ruffalo.jpg',
            'video_link' => '94PjbMWtLuc',
            'twitter_link' => 'https://twitter.com/MarkRuffalo?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1967.11.22',
            ],
            [
            'name' => 'クリス・エヴァンス',
            'image_path' => 'Captain_american.jpg',
            'video_link' => '7cvWsNEyBm8',
            'twitter_link' => 'https://twitter.com/ChrisEvans?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1981.6.13',
            ],
            [
            'name' => 'ブリー・ラーソン',
            'image_path' => 'Bire_Larson.jpg',
            'video_link' => 'c8Mljz89-v4',
            'twitter_link' => 'https://twitter.com/brielarson?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1989.10.1',
            ],
            [
            'name' => 'クリストファー・ヘムズワース',
            'image_path' => 'Chris_Hemsworth.jpg',
            'video_link' => 'M-8LsYzTDl0',
            'twitter_link' => 'https://twitter.com/chrishemsworth?lang=ja',
            'place' => 'オーストラリア',
            'birthday' => '1983.8.11',
            ],
            [
            'name' => 'アナ・ケンドリック',
            'image_path' => 'AnnaKendrick.jpg',
            'video_link' => 'cmSbXsFE3l8',
            'twitter_link' => 'https://twitter.com/AnnaKendrick47?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1985.8.9',
            ],
            [
            'name' => 'ライアン・ゴズリング',
            'image_path' => 'Ryan_Gosling.jpg',
            'video_link' => 'Fyb6zxYKbec',
            'twitter_link' => 'https://twitter.com/RyanGosling?lang=ja',
            'place' => 'カナダ',
            'birthday' => '1980.11.12',
            ],
            [
            'name' => 'ブラッド・ピット',
            'image_path' => 'Brad_Pitt.jpg',
            'video_link' => 'uXp4e4DWq2c',
            'twitter_link' => 'https://twitter.com/bradpittfans?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1963.12.18',
            ],
            [
            'name' => 'ジョージ・クルーニー',
            'image_path' => 'George Clooney.jpg',
            'video_link' => 'TGXRySqKva4',
            'twitter_link' => 'https://twitter.com/SoGeorgeClooney?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1961.5.6',
            ],
            [
            'name' => 'クリス・パイン',
            'image_path' => 'Cris Pine.jpg',
            'video_link' => 'yC5G9Urh92k',
            'twitter_link' => 'https://twitter.com/ChrisPine_1?lang=ja',
            'place' => 'アメリカ合衆国',
            'birthday' => '1980.8.26',
            ],
        ]);
    }
}

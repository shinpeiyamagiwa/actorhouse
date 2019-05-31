<?php

use Illuminate\Database\Seeder;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('movies')->insert([
            [
            'title' => 'ラ・ラ・ランド',
            'image_path' => 'emma_LALALAND.jpg',
            'video_link' => 'tlyqz57sHgM',
            'screen_time' => '128',
            'released_at' => '2017.2.24'
            ],
            [
            'title' => 'アメイジング・スパイダーマン',
            'image_path' => 'amazing_spider-man.jpg',
            'video_link' => '6FfqHfrBAHM',
            'screen_time' => '136',
            'released_at' => '2012.6.30'
            ],
            [
            'title' => 'アメイジング・スパイダーマン2',
            'image_path' => 'アメイジング・スパイダーマン2.jpg',
            'video_link' => '7qgpLEi63iU',
            'screen_time' => '143',
            'released_at' => '2014.4.25'
            ],
            [
            'title' => 'ラブ・アゲイン',
            'image_path' => 'ラブ・アゲイン.jpg',
            'video_link' => 'NEFbk7lKs3I',
            'screen_time' => '118',
            'released_at' => '2011.11.19'
            ],
            [
            'title' => 'ヘルプ　心がつなぐストーリー',
            'image_path' => 'ヘルプ　心がつなぐストーリー.jpg',
            'video_link' => 'J7Dz85e8vu8',
            'screen_time' => '146',
            'released_at' => '2012.3.31'
            ],
            [
            'title' => '小悪魔はなぜモテる?!',
            'image_path' => '小悪魔はなぜモテる.jpg',
            'video_link' => 'KmAajhuvI_Y',
            'screen_time' => '92',
            'released_at' => '2010.9.11'
            ],
            [
            'title' => 'L.A. ギャング ストーリー',
            'image_path' => 'L.A. ギャング ストーリー.jpg',
            'video_link' => 'iJLYLOTriYI',
            'screen_time' => '113',
            'released_at' => '2013.5.3'
            ],
            [
            'title' => 'ゾンビランド',
            'image_path' => 'ゾンビランド.jpg',
            'video_link' => 'HSmZ9kh7yNs',
            'screen_time' => '88',
            'released_at' => '2010.7.24'
            ],
            [
            'title' => 'ワンダーウーマン',
            'image_path' => 'ワンダーウーマン.jpg',
            'video_link' => 'M3Lv0OeNars',
            'screen_time' => '141',
            'released_at' => '2017.8.25'
            ],
            [
            'title' => 'ジャスティス・リーグ',
            'image_path' => 'ジャスティス・リーグ.jpg',
            'video_link' => 'CIBxcIS9uvE',
            'screen_time' => '120',
            'released_at' => '2017.11.23'
            ],
            [
            'title' => 'ワイルド・スピード SKY MISSION',
            'image_path' => 'ワイルド・スピード SKY MISSION.jpg',
            'video_link' => 'Q9lB2bdtlBQ',
            'screen_time' => '138',
            'released_at' => '2015.4.17'
            ],
            [
            'title' => 'ピッチ・パーフェクト　ラストステージ',
            'image_path' => 'ピッチ・パーフェクト　ラストステージ.jpg',
            'video_link' => 'OFuFAgOrzFY',
            'screen_time' => '93',
            'released_at' => '2018.10.19'
            ],
            [
            'title' => 'ピッチ・パーフェクト2',
            'image_path' => 'ピッチ・パーフェクト2.jpg',
            'video_link' => '3v8Hl4flMuo',
            'screen_time' => '115',
            'released_at' => '2015.10.9'
            ],
            [
            'title' => 'マイレージ、マイライフ',
            'image_path' => 'マイレージ、マイライフ.jpg',
            'video_link' => 'AYKD6eiqOkw',
            'screen_time' => '109',
            'released_at' => '2010.3.20'
            ],
            [
            'title' => 'オーシャンズ13',
            'image_path' => 'オーシャンズ13.jpg',
            'video_link' => 'qcHJIKOH5cE',
            'screen_time' => '122',
            'released_at' => '2007.8.10'
            ],
            [
            'title' => 'オーシャンズ11',
            'image_path' => 'オーシャンズ11.jpg',
            'video_link' => '1lCJTAtxFyo',
            'screen_time' => '117',
            'released_at' => '2002.2.2'
            ],
            [
            'title' => 'ミッション：インポッシブル　フォールアウト',
            'image_path' => 'ミッション：インポッシブル　フォールアウト.jpg',
            'video_link' => 'iFnKf-zh7ZM',
            'screen_time' => '147',
            'released_at' => '2018.8.30'
            ],
            [
            'title' => 'ミッション：インポッシブル　ローグ・ネイション',
            'image_path' => 'ミッション：インポッシブル　ローグ・ネイション.jpg',
            'video_link' => 'R5L-oqSPza8',
            'screen_time' => '132',
            'released_at' => '2015.8.7'
            ],
            [
            'title' => 'アベンジャーズ　エンドゲーム',
            'image_path' => 'アベンジャーズ　エンドゲーム.jpg',
            'video_link' => 'DFt8qGCQ',
            'screen_time' => '182',
            'released_at' => '2019.4.26'
            ],
            [
            'title' => 'アベンジャーズ　インフィニティ・ウォー',
            'image_path' => 'アベンジャーズ　インフィニティ・ウォー.jpg',
            'video_link' => '7rmUFAgsI4M',
            'screen_time' => '150',
            'released_at' => '2018.4.27'
            ],
        ]);
    }
}

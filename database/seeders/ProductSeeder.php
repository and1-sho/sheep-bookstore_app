<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            [
                'category_id'=> '1',
                'product_name'=> 'だるまさんが',
                'author'=> 'かがくいひろし',
                'description'=> 'だ・る・ま・さ・ん・が・・・・ページをめくって、あらら！びっくり！大わらい！声にだして読んでたのしい、見てたのしい、とってもキュートなファーストブックです。',
                'price'=> '935',
                'stock'=> 3,
                'images'=> json_encode(['images/darumasanga.jpg','images/darumasanga2.jpg']),
            ],
            [
                'category_id'=> '2',
                'product_name'=> 'laravel入門',
                'author'=> '掌田 津耶乃',
                'description'=> 'PHPでWebアプリケーションを開発するフレームワークには種々ありますが、圧倒的人気ナンバーワンはLaravel(ララベル)! 本書は、2017年9月の刊行以来大好評を博している『PHPフレームワークLaravel入門』を、2019年9月リリースのバージョン6に対応して全面的に見直した改訂版です!',
                'price'=> '3300',
                'stock'=> 1,
                'images'=> json_encode(['images/laravel.jpeg','images/laravel2.jpg','images/laravel3.jpg']),
            ],
            [
                'category_id'=> '3',
                'product_name'=> '週刊ゴルフダイジェスト 2019年 05/21号',
                'author'=> 'ゴルフダイジェスト社',
                'description'=> '「令和」最初の週刊GDは、新時代到来記念の企画を揃えています。巻頭カラーでは、この夏に着たいポロシャツ「018(れいわ)」着を紹介＆プレゼント。巻末プレー情報で「『裏技くん』復活 あの名コースへ計392名無料招待!」、そしてシリーズでお届けしている特集「平成ゴルフ列伝」は第4回、宮里藍を特集します。レッスンでは、「ロブ、曲げ球、スティンガー…プロみたいな『カッコイイ球』が打ちたい!」を筆頭に「歩き方ひとつでスコアは変わる」「バンカー考…これがあるからゴルフは面白い」「入るパットの握り方がわかった！」がラインナップ。「ゴルファーのための糖質制限ダイエット」にもご期待ください。',
                'price'=> '360',
                'stock'=> 1,
                'images'=> json_encode(['images/golf.jpg']),
            ],
            [
                'category_id'=> '4',
                'product_name'=> 'あんさんぶるスターズ！(1)',
                'author'=> '大川ぶくぶ',
                'description'=> '男性アイドル育成に特化した私立夢ノ咲学院。明星スバル・氷鷹北斗・遊木真・衣更真緒の4人は『Trickstar』というユニットを組み、トップアイドルを目指して日々切磋琢磨している。ドリフェス『S1』で勝利した『Trickstar』だったが、生徒会長・天祥院英智から下されたのは、まさかの解散命令!バラバラになってしまった４人は、再び集結し、学院に革命を起こせるのか!?アイドルを目指す高校生たちのきらめく青春ストーリー第３巻！',
                'price'=> '748',
                'stock'=> 1,
                'images'=> json_encode(['images/ensemble1.jpg']),
            ],
            [
                'category_id'=> '4',
                'product_name'=> 'あんさんぶるスターズ！(2)',
                'author'=> '大川ぶくぶ',
                'description'=> '男性アイドル育成に特化した私立夢ノ咲学院。明星スバル・氷鷹北斗・遊木真・衣更真緒の4人は『Trickstar』というユニットを組み、トップアイドルを目指して日々切磋琢磨している。ドリフェス『S1』で勝利した『Trickstar』だったが、生徒会長・天祥院英智から下されたのは、まさかの解散命令!バラバラになってしまった４人は、再び集結し、学院に革命を起こせるのか!?アイドルを目指す高校生たちのきらめく青春ストーリー第３巻！',
                'price'=> '748',
                'stock'=> 3,
                'images'=> json_encode(['images/ensemble2.jpg']),
            ],
            [
                'category_id'=> '4',
                'product_name'=> 'あんさんぶるスターズ！(3)',
                'author'=> '大川ぶくぶ',
                'description'=> '男性アイドル育成に特化した私立夢ノ咲学院。明星スバル・氷鷹北斗・遊木真・衣更真緒の4人は『Trickstar』というユニットを組み、トップアイドルを目指して日々切磋琢磨している。ドリフェス『S1』で勝利した『Trickstar』だったが、生徒会長・天祥院英智から下されたのは、まさかの解散命令!バラバラになってしまった４人は、再び集結し、学院に革命を起こせるのか!?アイドルを目指す高校生たちのきらめく青春ストーリー第３巻！',
                'price'=> '748',
                'stock'=> 6,
                'images'=> json_encode(['images/ensemble3.jpg']),
            ],
            [
                'category_id'=> '4',
                'product_name'=> 'あんさんぶるスターズ！(4)',
                'author'=> '大川ぶくぶ',
                'description'=> '男性アイドル育成に特化した私立夢ノ咲学院。明星スバル・氷鷹北斗・遊木真・衣更真緒の4人は『Trickstar』というユニットを組み、トップアイドルを目指して日々切磋琢磨している。ドリフェス『S1』で勝利した『Trickstar』だったが、生徒会長・天祥院英智から下されたのは、まさかの解散命令!バラバラになってしまった４人は、再び集結し、学院に革命を起こせるのか!?アイドルを目指す高校生たちのきらめく青春ストーリー第３巻！',
                'price'=> '748',
                'stock'=> 5,
                'images'=> json_encode(['images/ensemble4.jpg']),
            ],
            [
                'category_id'=> '4',
                'product_name'=> '-忍空- 1巻',
                'author'=> '桐山光侍',
                'description'=> 'EDO暦3年。天下分け目の一戦の後、世の中は平和を取り戻した。が、忍空組の残党が各地で悪事を働いていた。元忍空1番隊隊長風助は旅の途中、出会ったマザーが残党達に苦しめられている事を知り!?',
                'price'=> '715',
                'stock'=> 1,
                'images'=> json_encode([]),
            ],

        ]);
    }
}

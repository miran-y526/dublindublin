<?php
/*
   * Template Name: トップページ
   * トップページ
   */
get_header();
?>

<article id="page-top">
    <!-- トップ タイトル部分 -->
    <section class="top-main-area">
        <div class="top-title-bg pc-tb-visibility">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-main.png" alt="dublin-dublin タイトル 背景">
        </div>
        <div class="top-title-bg sp-visibility">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-main-sp.png" alt="dublin-dublin タイトル 背景">
        </div>
        <div class="dublin-main-title">
            <h1 class="site-main-title"><span class="main-title-fs">アイルランド留学に詳しすぎる</span><br>dublin-dublin</h1>
        </div>
    </section>

    <!-- ダブリンダブリンのこだわり -->
    <section class="about-main-area">
        <div class="about-detail-area">
            <div class="about-flag-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/flag01.png" alt="ダブリンダブリンのこだわり 旗 画像">
            </div>
            <div class="section-detail-area">
                <h2 class="section-main-title">
                    ダブリンダブリンのこだわり
                </h2>
                <div class="section-en-title">
                    ABOUT
                </div>
                <p class="section-detail">
                    一人一人にあったアレンジされたアイルランド留学を提案<br>
                    留学への疑問や不安を解消する細かいカウンセリングにあります。<br>
                    22年間のマルタとの繋がりで他とはひと味違った<br>
                    アイルランド留学体験をお約束します。
                </p>
                <a class="btn-area" href="<?php echo get_home_url('/'); ?>">こだわりをもっと見る</a>
            </div>
        </div>
        <div class="about-img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about-building-img.png" alt="ダブリンダブリンのこだわり アイルランド建物 画像">
        </div>
    </section>

    <!-- 留学までの流れ -->
    <section class="flow-main-area">
        <div class="flow-detail-area">
            <div class="section-detail-area flow">
                <h2 class="section-main-title">
                    留学までの流れ
                </h2>
                <div class="section-en-title">
                    FLOW
                </div>
                <a class="btn-area flow tb-sp-visibility" href="<?php echo get_home_url('/'); ?>">詳細ページへ</a>
            </div>
        </div>
        <div class="flow-list-box">
            <ul class="flow-list-area">
                <li class="flow-list">
                    <h3 class="pc-visibility">
                        ① 情報収集、新規問合せ
                    </h3>
                    <div class="flow-list-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about-main01.png" alt="アイルランド留学の流れ① 情報収集、新規問合せ">
                    </div>
                    <div class="flow-list-text">
                        <h3 class="tb-sp-visibility">
                            ① 情報収集、新規問合せ
                        </h3>
                        <p class="flow-detail">
                            フォームからお問い合わせ頂くと、<br>
                            「時期」「期間」「リクエスト」にあわせた<br class="pc-tb-visibility">
                            4件のお見積もりをお届けします。
                        </p>
                    </div>
                </li>
                <li class="flow-list">
                    <h3 class="pc-visibility">
                        ② 語学学校を決定<br>
                        お申込み書類の確認
                    </h3>
                    <div class="flow-list-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about-main02.png" alt="アイルランド留学の流れ② 語学学校を決定 お申込み書類の確認">
                    </div>
                    <div class="flow-list-text">
                        <h3 class="tb-sp-visibility">
                            ② 語学学校を決定<br>
                            お申込み書類の確認
                        </h3>
                        <p class="flow-detail">
                            学校の予約後に学校が発行した<br>
                            予約確認書をお送り致します。
                        </p>
                    </div>
                </li>
                <li class="flow-list">
                    <h3 class="pc-visibility">
                        ③ 確認書類を受け取り<br>
                        アイルランドへ出発
                    </h3>
                    <div class="flow-list-img">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/about-main03.png" alt="アイルランド留学の流れ③ 確認書類を受け取り アイルランドへ出発">
                    </div>
                    <div class="flow-list-text">
                        <h3 class="tb-sp-visibility">
                            ③ 確認書類を受け取り<br>
                            アイルランドへ出発
                        </h3>
                        <p class="flow-detail">
                            お振り込みを確認後、マルタマルタより<br>
                            ウェブ書類をお送りします。
                        </p>
                    </div>
                </li>
            </ul>
            <a class="btn-area flow pc-visibility" href="<?php echo get_home_url('/'); ?>">詳細ページへ</a>
        </div>
    </section>

    <!-- 学校紹介 -->
    <section class="school-main-area">
        <ul class="school-detail-area">
            <li class="section-detail-area school sp-layout">
                <h2 class="section-main-title">
                    学校紹介
                </h2>
                <div class="section-en-title">
                    SCHOOLS
                </div>
                <p class="section-detail">
                    アイルランドには世界60カ国から英語留学生が集まり<br class="pc-tb-visibility">
                    国際色が大変豊かです。<br>
                    それぞれの学校紹介ページには学校の特色と<br class="pc-tb-visibility">
                    その場で価格がわかる留学費用計算機があります。<br>
                    まずは、自分に合った学校を何校か探してみましょう！
                </p>
                <a class="btn-area school" href="<?php echo get_home_url('/'); ?>">アイルランドの学校を見てみる</a>
            </li>
            <li class="section-detail-area school school-img">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school02.png" alt="アイルランド留学 ECダブリン校">
                </a>
            </li>
            <li class="section-detail-area school tb-sp-visibility">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school07.png" alt="アイルランド留学 学校紹介 学生イラスト スマホ背景">
                </a>
            </li>
            <li class="section-detail-area school tb-sp-visibility">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school08.png" alt="アイルランド留学 学校紹介 学生帽イラスト スマホ背景">
                </a>
            </li>
            <li class="section-detail-area school">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school03.png" alt="アイルランド留学 ATLAS LANGUAGE SCHOOL">
                </a>
            </li>
            <li class="section-detail-area school student-img pc-visibility">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school04.png" alt="アイルランド留学 学校紹介 学生イラスト PC背景">
            </li>
            <li class="section-detail-area school pc-visibility">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school05.png" alt="アイルランド留学 学校紹介 学校イラスト PC背景">
            </li>
            <li class="section-detail-area school">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school06.png" alt="アイルランド留学 ATC Ireland">
                </a>
            </li>
            <li class="section-detail-area school tb-sp-visibility">
                <a href="<?php echo get_home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/top-school09.png" alt="アイルランド留学 学校紹介 教科書イラスト スマホ背景">
                </a>
            </li>
        </ul>
        <div class="other-school-select-area">
            <h3>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/other-school-title.png" alt="ダブリンダブリン その他の学校紹介 タイトル">
            </h3>
            <ul class="other-school-box">
                <?php for ($i = 0; $i < 13; $i++) : ?>
                    <li class="other-school-list">
                        <a href="<?php echo get_home_url('/'); ?>">
                            学校名を入れる
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </section>

    <!-- ブログ・質問エリア -->
    <section class="content-main-area">
        <div class="certificate-img">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/certificate.png" alt="ダブリンダブリン コンテンツ紹介 背景">
        </div>
        <ul class="content-box">
            <li class="content-list">
                <div class="content-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/contents-img.png" alt="ダブリンダブリン アイルランド留学情報">
                </div>
                <div class="guiness-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/guiness.png" alt="ダブリンダブリン アイルランド留学情報 ギネスビールイラスト">
                </div>
                <div class="section-content-area">
                    <h2 class="section-main-title">
                        アイルランド留学情報
                    </h2>
                    <div class="section-en-title">
                        CONTENTS
                    </div>
                    <p class="section-detail">
                        アイルランドに行きたくなる情報を発信中！<br>
                        滞在を思いっきり楽しめる情報が満載です。
                    </p>
                    <a class="btn-area content" href="<?php echo get_home_url('/'); ?>">VIEW MORE+</a>
                </div>
                <div class="flag-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/flag02.png" alt="ダブリンダブリン アイルランド留学情報 背景 旗">
                </div>
            </li>
            <li class="content-list">
                <div class="content-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/faq-img.png" alt="ダブリンダブリン よくある質問">
                </div>
                <div class="section-content-area">
                    <h2 class="section-main-title">
                        よくある質問
                    </h2>
                    <div class="section-en-title">
                        Q&A
                    </div>
                    <p class="section-detail">
                        アイルランド留学に関するよくある質問をまとめました。<br>
                        役に立つ内容がたっぷりなので、ぜひ参考に！
                    </p>
                    <a class="btn-area content" href="<?php echo get_home_url('/'); ?>">VIEW MORE+</a>
                </div>
                <div class="clover-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/top/clover.png" alt="ダブリンダブリン よくある質問 背景 クローバー">
                </div>
            </li>
        </ul>
    </section>
</article>

<?php get_footer(); ?>
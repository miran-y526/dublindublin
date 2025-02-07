<?php
$title = "アイルランドに詳しすぎるDublinDublin";
$home_url = ((empty($_SERVER["HTTPS"])) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
// シングルページの処理
if (is_single()) {
	$id = get_the_ID();
	$title = get_the_title() . " | " . $title;
	$acf_keyword = get_field('meta_keyword', $id);
	if ($acf_keyword != "") $keyword = $acf_keyword;
	$acf_description = get_field('meta_description', $id);
	if ($acf_description != "") $description = $acf_description;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<title><?php echo $title; ?></title>

	<meta charset="utf-8">
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta property="fb:app_id" content="">
	<meta property="og:site_name" content="dublin-dublin">
	<meta property="og:title" content="dublin-dublin">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:description" content="">
	<meta property="og:image" content="">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/common/">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/common/">
	<link rel="canonical" href="<?php echo get_home_url('/'); ?>" />

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
	<link href="https://use.typekit.net/rvk4qcc.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/scss/style.scss" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/assets/slick/slick-theme.css" rel="stylesheet">
	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.4.1.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/slick/slick.min.js"></script>

</head>

<body>
	<header id="header">
		<div class="header-bg-img">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/header-bg.png" alt="dublin-dublin ヘッダー 背景">
		</div>
		<div class="header-detail-box">
			<div class="header-logo">
				<a href="<?php echo get_home_url('/'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/dublindublin-logo.png" alt="dublin-dublin ロゴ">
				</a>
			</div>
			<ul class="header-detail-area">
				<li class="select-area large">
					<a href="<?php echo get_home_url('/'); ?>">
						アイルランド留学情報
					</a>
				</li>
				<li class="select-area">
					<a href="<?php echo get_home_url('/'); ?>">
						学校紹介
					</a>
				</li>
				<li class="select-area large">
					<a href="<?php echo get_home_url('/'); ?>/about">
						ダブリンダブリンについて
					</a>
				</li>
				<li class="select-area">
					<a href="<?php echo get_home_url('/'); ?>/inquiry">
						お問い合わせ
					</a>
				</li>
				<li class="select-area">
					<a href="<?php echo get_home_url('/'); ?>/company">
						会社概要
					</a>
				</li>
				<li class="sns-icon">
					<a target="_blank" href="https://www.instagram.com/maltamaltacom/">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/instagram-icon.png" alt="Instagram アイコン">
					</a>
				</li>
			</ul>
		</div>
	</header>
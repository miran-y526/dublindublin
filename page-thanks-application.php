<?php
/*
   * Template Name: 申し込み完了
   */
session_start();
$params = $_POST["apply_params"];
if (isset($_POST['w_complete']) && isset($_POST["unique_key"]) && ($_SESSION['session_unique_key'] == $_POST["unique_key"])) {

	$headers = 'From: ' . $params["name"] . ' <' . $params["email"] . '>' . "\r\n";
	$to = 'info@maltamalta.com';

	$title = $params["name"] . " からのお申し込み";
	$school_name = get_the_title($params["school_name"]);

	$body = "☆お名前☆: " . $params["name"] . "\n";
	$body .= "☆ローマ字名☆: " . $params["roman"] . "\n";
	$body .= "☆性別☆: " . $params["gender"] . "\n";
	$birthday_array = explode("-", $params["birthday"]);
	$body .= "☆生年月日☆: " . $birthday_array[0] . "年" . $birthday_array[1] . "月" . $birthday_array[2] . "日" . "\n";
	$body .= "☆電話番号☆: " . $params["tel"] . "\n";
	$body .= "☆メールアドレス☆: " . $params["email"] . "\n";
	$body .= "☆緊急連絡先☆: " . $params["emergency_call"] . "\n";
	$body .= "☆郵便番号☆: " . $params["postal_code"] . "\n";
	$body .= "☆住所☆: " . $params["address"] . "\n";
	$term_begin_array = explode("-", $params["term_begin"]);
	$body .= "☆開始日☆: " . $term_begin_array[0] . "年" . $term_begin_array[1] . "月" . $term_begin_array[2] . "日" . "\n";
	$body .= "☆留学期間☆: " . $params["study_weeks"] . " 週間\n";
	$term_end_array = explode("-", $params["term_end"]);
	$body .= "☆終了日☆: " . $term_end_array[0] . "年" . $term_end_array[1] . "月" . $term_end_array[2] . "日" . "\n";
	$body .= "☆学校名☆: " . $school_name . "\n";
	$body .= "☆レッスン内容☆: " . $params["lesson"] . "\n";
	$body .= "☆宿泊タイプ☆: " . $params["accommodation"] . "\n";
	$body .= "☆ご希望・ご相談等☆: " . $params["other"];

	wp_mail($to, $title, $body, $headers);
	session_destroy();
} else {
	wp_redirect(get_home_url("/") . "/contact/application/");
	exit;
}
get_header();
?>

<article id="contact">
	<section class="thanks-content">
		<div class="content">
			<p class="msg-thanks">お申し込みありがとうございました。<br>
				無料お見積もりに関しては、平日（月~金）の13時~22時にご返送させていただきます。<br>
				2営業日以内に届かない場合や、お急ぎの場合はお手数ですが<br class="sp-visibility">下記までご連絡ください。</p>
			<div class="msg-box">
				maltamalta.com　[マルタマルタドットコム]<br>
				株式会社マルタマルタ<br>
				<a href="mailto:info@maltamalta.com">info@maltamalta.com</a><br>
				MOBILE: 090-5576-7927<br>
				TEL: 050-3704-3355<br>
				13:00-22:00
			</div>
			<p class="list-title">お申し込み内容</p>
			<ul class="info-list">
				<li><span>お名前</span>: <?php echo $params['name']; ?></li>
				<li><span>ローマ字名</span>: <?php echo $params['roman']; ?></li>
				<li><span>性別</span>: <?php echo $params['gender']; ?></li>
				<li><span>生年月日</span>: <?php echo ($birthday_array[0] . "年" . $birthday_array[1] . "月" . $birthday_array[2] . "日"); ?></li>
				<li><span>電話番号</span>: <?php echo $params['tel']; ?></li>
				<li><span>メールアドレス</span>: <?php echo $params['email']; ?></li>
				<li><span>緊急連絡先(ご家族 or 実家など)</span>: <?php echo $params['emergency_call']; ?></li>
				<li><span>郵便番号</span>: <?php echo $params['postal_code']; ?></li>
				<li><span>住所</span>: <?php echo $params['address']; ?></li>
				<li><span>開始日</span>: <?php echo ($term_begin_array[0] . "年" . $term_begin_array[1] . "月" . $term_begin_array[2] . "日"); ?></li>
				<li><span>留学期間</span>: <?php echo $params['study_weeks']; ?> 週間</li>
				<li><span>終了日</span>: <?php echo ($term_end_array[0] . "年" . $term_end_array[1] . "月" . $term_end_array[2] . "日"); ?></li>
				<li><span>学校名</span>: <?php echo $school_name; ?></li>
				<li><span>レッスン内容</span>: <?php echo $params['lesson']; ?></li>
				<li><span>宿泊タイプ</span>: <?php echo $params['accommodation']; ?></li>
				<li><span>その他ご要望等</span>: <?php echo $params['other']; ?></li>
			</ul>
		</div>
	</section>

</article>
<?php get_footer(); ?>
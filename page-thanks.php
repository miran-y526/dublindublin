<?php
/*
   * Template Name: 問い合わせ完了
   */
session_start();
$params = $_POST["apply_params"];
if (isset($_POST['w_complete']) && isset($_POST["unique_key"]) && ($_SESSION['session_unique_key'] == $_POST["unique_key"])) {

	// $headers = 'From: <田中> ' . $params["email"]; // wordpress@maltamalta.com
	$headers = 'From: ' . $params["name"] . ' <' . $params["email"] . '>' . "\r\n";
	$to = 'info@maltamalta.com';
	// $to = 'miran@tamagoes.com';


	$title = $params["name"] . " からのお問合せ";

	$body = "♪お名前♪: " . $params["name"] . "\n";
	$body .= "♪メールアドレス♪: " . $params["email"] . "\n";
	$body .= "♪お問い合わせ内容♪: " . $params["content"] . "\n";
	$body .= "♪電話番号♪: " . $params["tel"] . "\n";
	$body .= "♪生年月日♪: " . $params["birth"] . "\n";
	$body .= "♪宿泊タイプ♪: " . implode(", ", $params["accommodation_type"]) . "\n";
	$body .= "♪部屋タイプ♪: " . implode(", ", $params["room_type"]) . "\n";
	$body .= "♪ご希望の出発日時♪: " . $params["departure"] . "\n";
	$body .= "♪ご希望の滞在期間♪: " . $params["terms"] . "\n";
	$body .= "♪ご希望の学校♪: " . implode(",", $params["school"]) . "\n";
	$body .= "♪その他ご要望等♪: " . $params["other"];

	wp_mail($to, $title, $body, $headers);
	session_destroy();
} else {
	wp_redirect(get_home_url("/") . "/contact/inquiry/");
	exit;
}
get_header();
?>

<article id="contact">
	<section class="thanks-content">
		<div class="content">
			<p class="msg-thanks">お問い合わせありがとうございました。<br>
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
			<p class="list-title">お問い合わせ内容</p>
			<ul class="info-list">
				<li><span>お名前（ニックネームでも可）</span>: <?php echo $params['name']; ?></li>
				<li><span>メールアドレス</span>: <?php echo $params['email']; ?></li>
				<li><span>お問い合わせ内容</span>: <?php echo $params['content']; ?></li>
				<li><span>電話番号</span>: <?php echo $params['tel']; ?></li>
				<li><span>生年月日</span>: <?php echo $params['birth']; ?></li>
				<li><span>宿泊タイプ</span>: <?php foreach ($params['accommodation_type'] as $value) {
											echo $value . " ";
										}; ?></li>
				<li><span>部屋タイプ</span>: <?php foreach ($params['room_type'] as $value) {
											echo $value . " ";
										}; ?></li>
				<li><span>ご希望の出発日時</span>: <?php echo $params['departure']; ?></li>
				<li><span>ご希望の滞在期間</span>: <?php echo $params['terms']; ?></li>
				<li><span>ご希望の学校</span>: <?php foreach ($params['school'] as $value) {
												echo $value . " ";
											}; ?></li>
				<li><span>その他ご要望等</span>: <?php echo $params['other']; ?></li>
			</ul>
		</div>
	</section>

</article>
<?php get_footer(); ?>
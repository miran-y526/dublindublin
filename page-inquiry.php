<?php
/*
   * Template Name: 問い合わせフォーム
   */
session_start();
$session_unique_key = md5(sha1(uniqid(mt_rand(), true)));
$_SESSION['session_unique_key'] = $session_unique_key;

$params_weeks = isset($wp_query->query["weeks"]) ? $wp_query->query["weeks"] : "";
$params_lesson = isset($wp_query->query["lesson"]) ? $wp_query->query["lesson"] : "";
$params_accommodation = isset($wp_query->query["accommodation"]) ? $wp_query->query["accommodation"] : "";
$params_schools = isset($wp_query->query["schools"]) ? $wp_query->query["schools"] : "";
$params_amount_yen = isset($wp_query->query["amount_yen"]) ? $wp_query->query["amount_yen"] : "";

if ($params_schools) {

	$price_simulation = get_field("price_simulation", (int) $params_schools);

	// レッスン代金
	$lesson_label_array = [];
	$lesson_rows = array_filter(
		$price_simulation,
		function ($row) {
			return ($row["row_category"] == "lesson");
		}
	);
	foreach ($lesson_rows as $key => $value) {
		$lesson_label_array[] = $value['label_and_description'][0]['label'];
	};

	// 宿泊先
	$accommodation_label_array = [];
	$accommodation_rows = array_filter(
		$price_simulation,
		function ($row) {
			return ($row["row_category"] == "accommodation");
		}
	);
	foreach ($accommodation_rows as $key => $value) {
		$accommodation_label_array[] = $value['label_and_description'][0]['label'];
	}

	$estimate_content = "ご希望の学校 : " . get_the_title($wp_query->query["schools"]) . "\n";
	$estimate_content .= "ご希望の週数 : " . ($wp_query->query["weeks"] + 1) . "週間\n";
	$estimate_content .= "ご希望のレッスン : " . $lesson_label_array[$wp_query->query["lesson"]] . "\n";
	$estimate_content .= "ご希望の滞在方法 : " . $accommodation_label_array[$wp_query->query["accommodation"]] . "\n";
	$estimate_content .= "概算費用 : " . number_format($params_amount_yen) . "円";
}

get_header();
?>

<article id="contact">
	<div class="breadcrumbs-area">
		<ul class="breadcrumbs">
			<li><a href="/">Top</a></li>
			<li><span>お問い合わせフォーム</span></li>
		</ul>
	</div>
	<section class="form-section">
		<h1 class="section-title">お問い合わせフォーム</h1>
		<p class="intro">資料と見積もりをお送りいたします</p>
		<p class="guide">マルタマルタでは、お客さまの出発時期、期間にあわせて、個別見積もりをお送りしております。<br>どんなことでもお気軽にお問い合わせ下さい。</p>
		<form action="<?php echo get_home_url('/'); ?>/thanks/" class="form-inquiry" method="post">
			<ul class="form-list">
				<li>
					<div class="head-area">
						<label for="">お名前（ニックネームでも可）</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[name]" placeholder="お名前" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">メールアドレス</label>
					</div>
					<div class="input-area">
						<input type="email" name="apply_params[email]" placeholder="mail@maltamalta.com" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">お問い合わせ内容</label>
					</div>
					<div class="input-area">
						<ul class="radio-list horizon">
							<li>
								<input type="radio" id="estimate" name="apply_params[content]" value="お見積">
								<label for="estimate">お見積</label>
							</li>
							<li>
								<input type="radio" id="counseling" name="apply_params[content]" value="お見積+無料カウンセリング">
								<label for="counseling">お見積+無料カウンセリング</label>
							</li>
							<li>
								<input type="radio" id="other" name="apply_params[content]" value="その他">
								<label for="other">その他</label>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">電話番号</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[tel]" placeholder="08012345678">
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">生年月日</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[birth]" placeholder="17歳以下の方は必須でお願いします。">
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">宿泊タイプ</label>
					</div>
					<div class="input-area">
						<ul class="check-list horizon">
							<li>
								<input type="checkbox" id="dormitory" name="apply_params[accommodation_type][]" value="寮">
								<label for="dormitory">寮</label>
							</li>
							<li>
								<input type="checkbox" id="home_stay" name="apply_params[accommodation_type][]" value="ホームステイ">
								<label for="home_stay">ホームステイ</label>
							</li>
							<li>
								<input type="checkbox" id="under_review" name="apply_params[accommodation_type][]" value="検討中">
								<label for="under_review">検討中</label>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">部屋タイプ</label>
					</div>
					<div class="input-area">
						<ul class="radio-list vertical">
							<li>
								<input type="checkbox" id="three" name="apply_params[room_type][]" value="3、4人部屋で費用を抑えたい">
								<label for="three">3、4人部屋で費用を抑えたい</label>
							</li>
							<li>
								<input type="checkbox" id="two" name="apply_params[room_type][]" value="2人部屋でお得に環境も重視して過ごしたい">
								<label for="two">2人部屋でお得に環境も重視して過ごしたい</label>
							</li>
							<li>
								<input type="checkbox" id="one" name="apply_params[room_type][]" value="1人部屋で環境重視。ゆったりと過ごしたい">
								<label for="one">1人部屋で環境重視。ゆったりと過ごしたい</label>
							</li>
							<li>
								<input type="checkbox" id="under_review_room" name="apply_params[room_type][]" value="検討中">
								<label for="under_review_room">検討中</label>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">ご希望の出発日時</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[departure]" placeholder="例：9月25日から 10月後半 など">
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">ご希望の滞在期間</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[terms]" placeholder="例：4週間、6ヶ月くらい">
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">ご希望の学校</label>
					</div>
					<div class="input-area">
						<ul class="check-list horizon">
							<?php
							$args = array(
								'post_type' => 'school',
								'post_status' => 'publish',
								'order'   => 'DESC',
								'orderby' => 'meta_value_num',
								'meta_key' => 'order_index',
								'posts_per_page' => -1
							);
							$the_query = new WP_Query($args);
							if ($the_query->have_posts()) :
								while ($the_query->have_posts()) :
									$the_query->the_post();
									$post_id = get_the_ID();
									$school_name = get_field('school_name', $post_id);
							?>
									<li>
										<input type="checkbox" id="school-<?php echo $post_id; ?>" name="apply_params[school][]" value="<?php echo $school_name; ?>">
										<label for="school-<?php echo $post_id; ?>"><a href="<?php echo get_the_permalink(); ?>" target="_blank"><?php echo $school_name; ?></a></label>
									</li>
							<?php endwhile;
							endif;
							wp_reset_postdata(); ?>
						</ul>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">その他ご要望等</label>
					</div>
					<div class="input-area">
						<textarea name="apply_params[other]" id="" cols="30" rows="10" placeholder="例：ECとESE検討中 / 予算50万円程度で長く行きたい。
大人向けの学校が知りたい。プライベートアパートで滞在したい。
４週間でゆっくり過ごしたいなどマルタに関することならどんな事でもお問い合わせ下さい。"></textarea>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">プライバシーポリシーの同意</label>
					</div>
					<div class="input-area">
						<input type="checkbox" name="apply_params[agree]" id="agree">
						<label for="agree"><a href="<?php echo get_home_url('/') . '/privacy/' ?>" target="_blank">プライバシーポリシー</a>を読み、これに同意いたします</label>
					</div>
				</li>
			</ul>
			<div class="submit-area">
				<div class="protect-wrap"></div>
				<button type="submit" class="btn-submit" name="w_complete">上記内容で送信する</button>
			</div>
			<input type="hidden" name="unique_key" value="<?php echo $session_unique_key; ?>">
		</form>
	</section>

</article>


<?php get_footer(); ?>
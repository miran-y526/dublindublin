<?php
/*
   * Template Name: 申し込みフォーム
   */
session_start();
$session_unique_key = md5(sha1(uniqid(mt_rand(), true)));
$_SESSION['session_unique_key'] = $session_unique_key;

get_header();
?>

<article id="contact">
	<div class="breadcrumbs-area">
		<ul class="breadcrumbs">
			<li><a href="/">Top</a></li>
			<li><span>申し込みフォーム</span></li>
		</ul>
	</div>
	<section class="form-section">
		<h1 class="section-title">申し込みフォーム</h1>
		<p class="intro">ご記入後マルタマルタより詳細見積りが届きます。</p>
		<form action="<?php echo get_home_url('/'); ?>/thanks-application/" class="form-inquiry" method="post">
			<ul class="form-list">
				<li>
					<div class="head-area">
						<label for="">お名前</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[name]" placeholder="お名前" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">ローマ字名</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[roman]" placeholder="" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">性別</label>
					</div>
					<div class="input-area">
						<ul class="radio-list horizon">
							<li>
								<input type="radio" id="female" name="apply_params[gender]" value="女性" checked>
								<label for="female">女性</label>
							</li>
							<li>
								<input type="radio" id="male" name="apply_params[gender]" value="男性">
								<label for="male">男性</label>
							</li>
						</ul>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">生年月日</label>
					</div>
					<div class="input-area">
						<input type="date" name="apply_params[birthday]" placeholder="" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">電話番号</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[tel]" placeholder="08012345678" required>
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
						<label for="">緊急連絡先(ご家族or実家など)</label>
					</div>
					<div class="input-area">
						<input type="text" name="apply_params[emergency_call]" placeholder="0312345678" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">郵便番号</label>
					</div>
					<div class="input-area">
						<input type="text" id="input-postal-code" name="apply_params[postal_code]" placeholder="2400001" maxlength="7" required>
						<span class="advise">※ 入力すると住所が自動でセットされます</span>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">住所</label>
					</div>
					<div class="input-area">
						<input type="text" id="input-address" class="width-wide" name="apply_params[address]" placeholder="" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">開始日</label>
					</div>
					<div class="input-area">
						<input type="date" id="input-term-begin" name="apply_params[term_begin]" placeholder="" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">留学期間</label>
					</div>
					<div class="input-area">
						<div class="select-wrap">
							<select name="apply_params[study_weeks]" id="select-study-weeks">
								<?php for ($i = 1; $i < 53; $i++) : ?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?> 週間</option>
								<?php endfor; ?>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">終了日</label>
					</div>
					<div class="input-area">
						<input type="date" id="input-term-end" name="apply_params[term_end]" placeholder="" required>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">学校名</label>
					</div>
					<div class="input-area">
						<div class="select-wrap">
							<select name="apply_params[school_name]" id="select-school-name">
								<option value="0">- 未選択 -</option>
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
								?>
										<option value="<?php echo $post_id; ?>"><?php echo get_field('school_name'); ?> </option>
								<?php endwhile;
								endif;
								wp_reset_postdata(); ?>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">レッスン内容</label>
					</div>
					<div class="input-area">
						<div class="select-wrap">
							<select name="apply_params[lesson]" id="select-lesson">
								<option value="">- ご希望の学校名を選択して下さい -</option>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">宿泊タイプ</label>
					</div>
					<div class="input-area">
						<div class="select-wrap">
							<select name="apply_params[accommodation]" id="select-accommodation">
								<option value="">- ご希望の学校名を選択して下さい -</option>
							</select>
						</div>
					</div>
				</li>
				<li>
					<div class="head-area">
						<label for="">ご希望・ご相談等</label>
					</div>
					<div class="input-area">
						<textarea name="apply_params[other]" cols="30" rows="10" placeholder="例：ECとESE検討中 / 予算50万円程度で長く行きたい。
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
						<label for="agree"><a href="/termsofservice" target="_blank">利用規約</a>を読み、これに同意いたします</label>
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
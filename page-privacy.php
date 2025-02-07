<?php
/*
   * Template Name: プライバシーポリシー
   */
get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();

?>

		<article id="privacy">
			<div class="breadcrumbs-area">
				<ul class="breadcrumbs">
					<li><a href="/">Top</a></li>
					<li><span>プライバシーポリシー</span></li>
				</ul>
			</div>
			<section class="privacy_main">
				<div class="main-txt-area">
					<div class="main-article">
						<h1 class="section-main-title">Privacy Policy</h1>
						<div class="section-sub-title">プライバシーポリシー</div>
					</div>

					<?php the_content(); ?>

				</div>
			</section>
		</article>


<?php
	endwhile;
endif;
get_footer();
?>
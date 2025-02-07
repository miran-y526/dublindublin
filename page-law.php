<?php
/*
   * Template Name: 特定商取引法に基づく表記
   */
get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();

?>

		<article id="law">
			<div class="breadcrumbs-area">
				<ul class="breadcrumbs">
					<li><a href="/">Top</a></li>
					<li><span>特定商取引法に基づく表記</span></li>
				</ul>
			</div>
			<section class="law_main">
				<div class="main-txt-area">
					<div class="main-article">
						<h1 class="section-main-title">特定商取引法に基づく表記</h1>
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
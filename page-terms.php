<?php
/*
   * Template Name: 利用規約
   */
get_header();

if (have_posts()) :
	while (have_posts()) :
		the_post();

?>

		<article id="term">
			<div class="breadcrumbs-area">
				<ul class="breadcrumbs">
					<li><a href="/">Top</a></li>
					<li><span>利用規約</span></li>
				</ul>
			</div>
			<section class="term_main">
				<div class="main-txt-area">
					<div class="main-article">
						<h1 class="section-main-title">利用規約</h1>
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
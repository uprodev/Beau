<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="banner banner-simple<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="banner-text">
			<div class="container-fluid">

				<?php if ($title): ?>
					<h1><?= $title ?></h1>
				<?php endif ?>

				<?= $text ?>

			</div>
		</div>
	</section>

	<?php 
	$post_type = 'wat-we-doen';
	$args = array(
		'post_type' => $post_type, 
		'posts_per_page' => -1, 
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()): 
		?>

		<section class="section s-services-slider">
			<div class="services-slider swiper">
				<div class="swiper-wrapper">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
						<div class="swiper-slide">
							<?php get_template_part('parts/content', $post_type) ?>
						</div>
					<?php endwhile; ?>

				</div>

				<?php if ($black_circle_text): ?>
					<div class="slider-overlay"><?= $black_circle_text ?></div>
				<?php endif ?>
				
			</div>
			<div class="swiper-pagination"></div>
		</section>

		<?php 
	endif;
	wp_reset_query(); 
	?>

	<?php endif; ?>
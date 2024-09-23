<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $default_custom == 'Default';
	$is_custom = $default_custom == 'Custom' && $services;
	$post_type = 'wat-we-doen';
	?>

	<?php if ($is_default || $is_custom): ?>

		<?php 
		$args = array(
			'post_type' => $post_type, 
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'paged' => get_query_var('paged')
		);
		if($is_custom) {
			$args['post__in'] = wp_list_pluck($services, 'ID');
			$args['orderby'] = 'post__in';
		}
		$wp_query = new WP_Query($args); 
		?>

		<section class="section s-services-slider<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="row justify-content-between align-items-end">

					<?php if ($title): ?>
						<div class="col-md-6">
							<h2><?= $title ?></h2>
						</div>
					<?php endif ?>
					
					<?php if ($text): ?>
						<div class="col-md-6 col-xl-5 ps-xl-0"><?= $text ?></div>
					<?php endif ?>
					
				</div>
			</div>
			<div class="services-slider swiper">
				<div class="swiper-wrapper">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

						<div class="swiper-slide">
							<?php get_template_part('parts/content', $post_type) ?>
						</div>

						<?php 
					endwhile;
					wp_reset_postdata(); 
					?>

				</div>

				<?php if ($black_circle_text): ?>
					<div class="slider-overlay"><?= $black_circle_text ?></div>
				<?php endif ?>
				
			</div>
			<div class="swiper-pagination"></div>
		</section>

	<?php endif ?>

	<?php endif; ?>
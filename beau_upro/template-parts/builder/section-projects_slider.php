<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$is_default = $default_custom == 'Default';
	$is_custom = $default_custom == 'Custom' && $projects;
	$post_type = 'projecten';
	?>

	<?php if ($is_default || $is_custom): ?>

		<?php 
		$args = array(
			'post_type' => $post_type, 
			'posts_per_page' => $is_default ? 6 : -1,
			'post_status' => 'publish',
			'paged' => get_query_var('paged')
		);
		if($is_custom) {
			$args['post__in'] = wp_list_pluck($projects, 'ID');
			$args['orderby'] = 'post__in';
		}
		$wp_query = new WP_Query($args); 
		?>

		<section class="section s-projects-slider<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="row justify-content-between align-items-end">
					<div class="col-md-6">

						<?php if ($title): ?>
							<h2><?= $title ?></h2>
						<?php endif ?>

						<?= $text ?>

					</div>

					<?php if ($button): ?>
						<div class="col-md-6 text-md-end">
							<a href="<?= $button['url'] ?>" class="btn btn-black"<?php if($button['target']) echo ' target="_blank"' ?>>
								<?= $button['title'] ?>
								<span class="btn-icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
										<g transform="translate(-6.427 23.252) rotate(-90)">
											<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
											<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
										</g>
									</svg>
								</span>
							</a>
						</div>
					<?php endif ?>

				</div>
			</div>
			<div class="projects-slider swiper">
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
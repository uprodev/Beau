<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$args = array(
		'post_type' => 'vacature', 
		'posts_per_page' => -1, 
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args);
	if($wp_query->have_posts()): 
		?>

		<section class="section s-vacancies<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="row">

					<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
						<div class="col-md-6">
							<div class="vacancy-item bg-light">
								<div class="subtitle"><?php _e('Vacature', 'Beau') ?></div>
								<h4><?= get_field('title') ?: get_the_title() ?></h4>

								<?php if ($field = get_field('short_summary')): ?>
									<div class="vacancy-description"><?= $field ?></div>
								<?php endif ?>
								
								<?php if ($field = get_field('description')): ?>
									<div class="text-hidden-wrapper">
										<button type="button" class="text-toggler"><span><?php _e('Meer over deze vacature', 'Beau') ?></span><i class="fa-light fa-chevron-down"></i></button>
										<div class="text-hidden"><?= $field ?></div>
									</div>
								<?php endif ?>
								
								<?php if ($field = get_field('button')): ?>
									<a href="<?= $field['url'] ?>" class="btn btn-black"<?php if($field['target']) echo ' target="_blank"' ?>>
										<?= $field['title'] ?>
										<span class="btn-icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
												<g transform="translate(-6.427 23.252) rotate(-90)">
													<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
													<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
												</g>
											</svg>
										</span>
									</a>
								<?php endif ?>

							</div>
						</div>
					<?php endwhile; ?>

				</div>
			</div>
		</section>

		<?php 
	endif;
	wp_reset_query(); 
	?>

	<?php endif; ?>
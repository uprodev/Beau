<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$terms = get_terms( [
		'taxonomy' => 'projecten_cat',
	] ); 
	$post_type = 'projecten';
	?>

	<?php if (is_array($terms) && !empty($terms)): ?>
	<section class="banner banner-simple<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="banner-text">
			<div class="container-fluid">

				<?php if ($title): ?>
					<h1><?= $title ?></h1>
				<?php endif ?>

				<?= $text ?>

				<form action="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>" class="category-filter" method="GET" id="filter_projects">
					<ul>
						<li class="active">
							<button type="button" class="btn"><?php _e('Alles', 'Beau') ?></button>
						</li>

						<?php foreach ($terms as $term): ?>
							<li>
								<button type="button" class="btn" data-value="<?= $term->term_id ?>"><?= $term->name ?></button>
							</li>
						<?php endforeach ?>
						
					</ul>
					<input type="hidden" name="current_term">
					<input type="hidden" name="action" value="filter_projects">
				</form>
			</div>
		</div>
	</section>

	<?php 
	$args = array(
		'post_type' => $post_type, 
		'posts_per_page' => 8,
		'post_status' => 'publish',
		'paged' => get_query_var('paged')
	);
	$wp_query = new WP_Query($args); 
	if($wp_query->have_posts()): 
		?>

		<section class="section s-cards-list">
			<div class="container-fluid" id="ajax_projects">
				<div class="gallery-grid gallery-four-items-grid">
					<div class="row d-block clearfix" id="response_projects">

						<?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

							<div class="col-md-6">
								<?php get_template_part('parts/content', $post_type) ?>
							</div>

							<?php 
						endwhile;
						wp_reset_postdata(); 
						?>

					</div>
				</div>

				<?php if ($wp_query->max_num_pages > 1): ?>
					<script> var this_page = 1; </script>

					<div class="btn-wrapper text-center">
						<a href="#" class="btn btn-black btn-load-more load_projects" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'>
							<?php _e('Laad meer', 'Beau') ?>
							<span class="btn-icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="21.003" height="21.003" viewBox="0 0 21.003 21.003">
									<g transform="translate(0 21.003) rotate(-90)">
										<path d="M.439.439a1.5,1.5,0,0,1,2.122,0l17,17a1.5,1.5,0,0,1-2.122,2.122l-17-17a1.5,1.5,0,0,1,0-2.122Z" transform="translate(1 1)" />
										<path d="M19.5,0A1.5,1.5,0,0,1,21,1.5v18A1.5,1.5,0,0,1,19.5,21H1.5a1.5,1.5,0,1,1,0-3H18V1.5A1.5,1.5,0,0,1,19.5,0Z" transform="translate(0 0)" />
									</g>
								</svg>
							</span>
						</a>
					</div>
				<?php endif ?>

			</div>
		</section>

	<?php endif ?>

<?php endif ?>

<?php endif; ?>
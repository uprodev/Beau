<?php

$actions = [
	'load_projects',
	'filter_projects',

];
foreach ($actions as $action) {
	add_action("wp_ajax_{$action}", $action);
	add_action("wp_ajax_nopriv_{$action}", $action);
}


function load_projects () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$post_type = 'projecten';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) { 
			$query->the_post(); ?>

			<div class="col-md-6">
				<?php get_template_part('parts/content', $post_type) ?>
			</div>

		<?php }
	}
	wp_reset_query(); 
	die();
}


function filter_projects(){

	$post_type = 'projecten';
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => 8,
		'post_status' => 'publish',
	);

	if($_GET['current_term'])
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'projecten_cat',
				'field'    => 'id',
				'terms'    => $_GET['current_term']
			)
		);

		$wp_query = new WP_Query($args);

		if( $wp_query->have_posts() ) : ?>

			<div class="gallery-grid gallery-four-items-grid">
				<div class="row d-block clearfix" id="response_projects">

					<?php while($wp_query->have_posts() ): $wp_query->the_post() ?>

						<div class="col-md-6">
							<?php get_template_part('parts/content', $post_type) ?>
						</div>

					<?php endwhile; ?>

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

			<?php wp_reset_postdata();
		endif;

		die();
	}
<a href="<?php the_permalink() ?>" class="card card-service">
	<div class="card-image">
		<?php the_post_thumbnail('full') ?>
	</div>
	<div class="card-body">
		<h5><?php the_title() ?></h5>
		<?php the_excerpt() ?>
	</div>
</a>
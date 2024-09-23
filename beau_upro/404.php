<?php get_header('empty'); ?>

<section class="s-404">

	<?php if ($field = get_field('image_404', 'option')): ?>
		<div class="image">
			<?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
				<img src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
			<?php else: ?>
				<?= wp_get_attachment_image($field['ID'], 'full') ?>
			<?php endif ?>
		</div>
	<?php endif ?>
	
	<div class="container-fluid">
		<div class="text text-center">

			<?php if ($field = get_field('title_404', 'option')): ?>
				<h1 class="h3"><?= $field ?></h1>
			<?php endif ?>

			<?php the_field('text_404', 'option') ?>

			<?php if ($field = get_field('button_404', 'option')): ?>
				<a href="<?= $field['url'] ?>" class="btn btn-black btn-back"<?php if($field['target']) echo ' target="_blank"' ?>>
					<span class="btn-icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
							<g transform="translate(-6.427 23.252) rotate(-90)">
								<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
								<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
							</g>
						</svg>
					</span>
					<?= $field['title'] ?>
				</a>
			<?php endif ?>

		</div>
	</div>
</section>

<?php get_footer('empty'); ?>
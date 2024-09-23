<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="banner banner-text-image">

		<?php if ($background_image): ?>
			<div class="banner-image">
				<picture>
					<source srcset="<?= $background_image['url'] ?>" media="(min-width:768px)" />
						<?= wp_get_attachment_image($background_image_mobile ? $background_image_mobile['ID'] : $background_image['ID'], 'full') ?>
					</picture>
				</div>
			<?php endif ?>

			<div class="banner-text">
				<div class="container-fluid">

					<?php if ($title): ?>
						<h1><?= $title ?></h1>
					<?php endif ?>
					
					<?= $text ?>

				</div>
			</div>
		</section>

		<?php endif; ?>
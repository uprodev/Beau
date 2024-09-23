<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if($images): ?>

		<section class="section s-images-slider<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
			<div class="container-fluid">
				<div class="section-header text-center">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>

					<?= $text ?>

				</div>
			</div>
			<div class="images-slider swiper">
				<div class="swiper-wrapper">

					<?php foreach($images as $image): ?>

						<div class="swiper-slide">
							<figure>
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							</figure>
						</div>

					<?php endforeach; ?>

				</div>

				<?php if ($black_circle_text): ?>
					<div class="slider-overlay"><?= $black_circle_text ?></div>
				<?php endif ?>

			</div>
			<div class="swiper-pagination"></div>
		</section>

	<?php endif; ?>

	<?php endif; ?>
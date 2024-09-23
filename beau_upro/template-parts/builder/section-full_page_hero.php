<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="banner banner-home<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="banner-text">
			<div class="container-fluid">

				<?php if ($title): ?>
					<div class="h1"><?= $title ?></div>
				<?php endif ?>

				<?= $text ?>

				<?php if ($link): ?>
					<a href="<?= $link['url'] ?>" class="link-content"<?php if($link['target']) echo ' target="_blank"' ?>>
						<?= $link['title'] ?>
						<span class="link-icon">
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

		<?php if (is_array($images) && checkArrayForValues($images)): ?>
		<div class="swiper">
			<div class="swiper-wrapper">

				<?php foreach ($images as $item): ?>
					<?php if ($item['image_desktop']): ?>
						<div class="swiper-slide">
							<div class="banner-image">
								<picture>
									<source srcset="<?= $item['image_desktop']['url'] ?>" media="(min-width:768px)" />
										<?= wp_get_attachment_image($item['image_mobile'] ? $item['image_mobile']['ID'] : $item['image_desktop']['ID'], 'full') ?>
									</picture>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>

				</div>
			</div>

			<?php if (count($images) > 1): ?>
				<div class="swiper-pagination"></div>
			<?php endif ?>

		<?php endif ?>

	</section>

	<?php endif; ?>
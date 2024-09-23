<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="section s-text-images-grid s-text-images-grid--type1<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row gx-4">
				<div class="col-md-7">

					<?php if ($title): ?>
						<h2><?= $title ?></h2>
					<?php endif ?>

					<div class="image d-none d-md-block">
						<?= wp_get_attachment_image($image_left['ID'], 'full') ?>

						<?php if (is_array($link_block) && checkArrayForValues($link_block)): ?>

						<?php if ($link_block['link']): ?>
							<a href="<?= $link_block['link']['url'] ?>" class="cp-img-link"<?php if($link_block['link']['target']) echo ' target="_blank"' ?>>
							<?php else: ?>
								<div class="cp-img-link">
								<?php endif ?>

								<?php if ($link_block['title']): ?>
									<h5><?= $link_block['title'] ?></h5>
								<?php endif ?>

								<?php if ($link_block['text']): ?>
									<p><?= $link_block['text'] ?></p>
								<?php endif ?>

								<?php if ($link_block['link']): ?>
									<span class="btn-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
											<g transform="translate(-6.427 23.252) rotate(-90)">
												<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
												<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
											</g>
										</svg>
									</span>
								<?php endif ?>

								<?php if ($link_block['link']): ?>
								</a>
							<?php else: ?>
							</div>
						<?php endif ?>

					<?php endif ?>

				</div>
			</div>
			<div class="col-md-5">

				<?php if ($image_right): ?>
					<div class="d-none d-md-block">
						<div class="row">
							<div class="col">
								<div class="image">
									<?= wp_get_attachment_image($image_right['ID'], 'full') ?>
								</div>
							</div>
						</div>
					</div>
				<?php endif ?>

				<?php if ($text): ?>
					<div class="text">
						<?= $text ?>
					</div>
				<?php endif ?>

			</div>
		</div>
		<div class="d-md-none">
			<div class="image-slider swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="image">
							<?= wp_get_attachment_image($image_left['ID'], 'full') ?>
							
							<?php if (is_array($link_block) && checkArrayForValues($link_block)): ?>

							<?php if ($link_block['link']): ?>
								<a href="<?= $link_block['link']['url'] ?>" class="cp-img-link"<?php if($link_block['link']['target']) echo ' target="_blank"' ?>>
								<?php else: ?>
									<div class="cp-img-link">
									<?php endif ?>

									<?php if ($link_block['title']): ?>
										<h5><?= $link_block['title'] ?></h5>
									<?php endif ?>

									<?php if ($link_block['text']): ?>
										<p><?= $link_block['text'] ?></p>
									<?php endif ?>

									<?php if ($link_block['link']): ?>
										<span class="btn-icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
												<g transform="translate(-6.427 23.252) rotate(-90)">
													<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
													<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
												</g>
											</svg>
										</span>
									<?php endif ?>

									<?php if ($link_block['link']): ?>
									</a>
								<?php else: ?>
								</div>
							<?php endif ?>

						<?php endif ?>

					</div>
				</div>

				<?php if ($image_right): ?>
					<div class="swiper-slide">
						<div class="image">
							<?= wp_get_attachment_image($image_right['ID'], 'full') ?>
						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</div>
</section>

<?php endif; ?>
<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="section s-text-images-grid<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row gx-4">
				<div class="col-md-5 d-none d-md-block">
					<div class="image">

						<?php if ($image_left): ?>
							<?= wp_get_attachment_image($image_left['ID'], 'full') ?>
						<?php endif ?>

						<?php if (is_array($quote) && checkArrayForValues($quote)): ?>
						<div class="cp-img-quote">
							<div class="quote-header">

								<?php if ($quote['image']): ?>
									<span class="quote-img">
										<?= wp_get_attachment_image($quote['image']['ID'], 'full') ?>
									</span>
								<?php endif ?>

								<?php if ($quote['name_function']): ?>
									<p><?= $quote['name_function'] ?></p>
								<?php endif ?>

							</div>

							<?php if ($quote['quote']): ?>
								<div class="quote-body"><?= $quote['quote'] ?></div>
							<?php endif ?>

						</div>
					<?php endif ?>

				</div>
			</div>
			<div class="col-md-7">
				<div class="text">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>
					
					<?= $text ?>

					<?php if ($button): ?>
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
					<?php endif ?>
					
				</div>

				<?php if ($image_right_1 || $image_right_2): ?>
					<div class="d-none d-md-block">
						<div class="row">

							<?php if ($image_right_1): ?>
								<div class="col">
									<div class="image">
										<?= wp_get_attachment_image($image_right_1['ID'], 'full') ?>
									</div>
								</div>
							<?php endif ?>

							<?php if ($image_right_2): ?>
								<div class="col">
									<div class="image">
										<?= wp_get_attachment_image($image_right_2['ID'], 'full') ?>
									</div>
								</div>
							<?php endif ?>

						</div>
					</div>
				<?php endif ?>

			</div>
		</div>
		<div class="d-md-none">
			<div class="image-slider swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="image">
							
							<?php if ($image_left): ?>
								<?= wp_get_attachment_image($image_left['ID'], 'full') ?>
							<?php endif ?>

							<?php if (is_array($quote) && checkArrayForValues($quote)): ?>
							<div class="cp-img-quote">
								<div class="quote-header">

									<?php if ($quote['image']): ?>
										<span class="quote-img">
											<?= wp_get_attachment_image($quote['image']['ID'], 'full') ?>
										</span>
									<?php endif ?>

									<?php if ($quote['name_function']): ?>
										<p><?= $quote['name_function'] ?></p>
									<?php endif ?>

								</div>

								<?php if ($quote['quote']): ?>
									<div class="quote-body"><?= $quote['quote'] ?></div>
								<?php endif ?>

							</div>
						<?php endif ?>

					</div>
				</div>

				<?php if ($image_right_1): ?>
					<div class="swiper-slide">
						<div class="image">
							<?= wp_get_attachment_image($image_right_1['ID'], 'full') ?>
						</div>
					</div>
				<?php endif ?>
				
				<?php if ($image_right_2): ?>
					<div class="swiper-slide">
						<div class="image">
							<?= wp_get_attachment_image($image_right_2['ID'], 'full') ?>
						</div>
					</div>
				<?php endif ?>
				
			</div>
		</div>
	</div>
</div>
</section>

<?php endif; ?>
<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="banner banner-project<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="banner-project-main">

			<?php if ($background_image): ?>
				<div class="banner-image">
					<picture>
						<source srcset="<?= $background_image['url'] ?>" media="(min-width:768px)" />
							<?= wp_get_attachment_image($background_image_mobile ? $background_image_mobile['ID'] : $background_image['ID'], 'full') ?>
						</picture>
					</div>
				<?php endif ?>

				<?php if ($title): ?>
					<div class="banner-text">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-7">
									<h1><?= $title ?></h1>
								</div>
							</div>
						</div>
					</div>
				<?php endif ?>

			</div>
			<div class="banner-project-bottom">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 col-xl-7">

							<?php if (is_array($details) && checkArrayForValues($details)): ?>
							<ul>

								<?php foreach ($details as $item): ?>
									<?php if ($item['title'] ||$item['text']): ?>
										<li>

											<?php if ($item['title']): ?>
												<strong><?= $item['title'] ?></strong>
											<?php endif ?>

											<?= $item['text'] ?>

										</li>
									<?php endif ?>
								<?php endforeach ?>

							</ul>
						<?php endif ?>

						<?= $text ?>

					</div>

					<?php if ($image_right): ?>
						<div class="col-md-4 col-xl-5">
							<div class="image">
								<?= wp_get_attachment_image($image_right['ID'], 'full') ?>
							</div>
						</div>
					<?php endif ?>
					
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>
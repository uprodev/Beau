<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$fields = ['image', 'image_mobile', 'title', 'contact_form'];
	foreach ($fields as $field) {
		$$field = $default_custom == 'Custom' ? $$field : get_field($field . '_cf', 'option');
	}
	?>

	<section class="section s-contact-form<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="section-wrapper bg-dark text-white">
				<div class="row g-0">

					<?php if ($image): ?>
						<div class="col-lg-5 d-none d-lg-block">
							<div class="image">
								<picture>
									<source srcset="<?= $image['url'] ?>" media="(min-width:768px)" />
										<?= wp_get_attachment_image($image_mobile ? $image_mobile['ID'] : $image['ID'], 'full') ?>
									</picture>
								</div>
							</div>
						<?php endif ?>

						<div class="col-lg-7">
							<div class="form">

								<?php if ($title): ?>
									<h3><?= $title ?></h3>
								<?php endif ?>

								<?php if ($contact_form): ?>
									<?= do_shortcode('[contact-form-7 id="' . $contact_form . '"]') ?>
								<?php endif ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php endif; ?>
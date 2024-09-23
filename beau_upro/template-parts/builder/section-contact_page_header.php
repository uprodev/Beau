<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="section s-contact-form banner bg-dark text-white<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>

		<?php if ($background_image): ?>
			<div class="image">
				<picture>
					<source srcset="<?= $background_image['url'] ?>" media="(min-width:768px)" />
						<?= wp_get_attachment_image($background_image_mobile ? $background_image_mobile['ID'] : $background_image['ID'], 'full') ?>
					</picture>
				</div>
			<?php endif ?>

			<div class="container-fluid">
				<div class="row g-0">
					<div class="col-md-6">
						<div class="text">

							<?php if ($title): ?>
								<h1><?= $title ?></h1>
							<?php endif ?>

							<?= $text ?>

						</div>
					</div>
					<div class="col-md-6">
						<div class="form">

							<?php if ($form_title): ?>
								<h3><?= $form_title ?></h3>
							<?php endif ?>

							<div class="contacts">

								<?php if ($field = get_field('phone_c', 'option')): ?>
									<a href="tel:+<?= preg_replace('/[^0-9]/', '', $field) ?>"><?= $field ?></a>
									<span><?php _e('of', 'Beau') ?></span>
								<?php endif ?>
								
								<?php if ($field = get_field('email_c', 'option')): ?>
									<a href="mailto:<?= $field ?>"><?= $field ?></a>
								<?php endif ?>
								
							</div>

							<?php if ($contact_form): ?>
								<?= do_shortcode('[contact-form-7 id="' . $contact_form . '"]') ?>
							<?php endif ?>
							
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php endif; ?>
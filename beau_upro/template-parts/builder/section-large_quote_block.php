<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="section s-quote<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="section-wrapper bg-light">
			<div class="container-fluid">

				<?php if ($quote): ?>
					<div class="text text-center">
						<blockquote><?= $quote ?></blockquote>
					</div>
				<?php endif ?>

				<div class="quote-author">

					<?php if ($image): ?>
						<span class="quote-author-img">
							<?php if (pathinfo($image['url'])['extension'] == 'svg'): ?>
								<img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
							<?php else: ?>
								<?= wp_get_attachment_image($image['ID'], 'full') ?>
							<?php endif ?>
						</span>
					<?php endif ?>

					<p>

					<?php if ($name): ?>
						<strong><?= $name ?></strong>
					<?php endif ?>
					
					<?= $funciton ?>
					
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>
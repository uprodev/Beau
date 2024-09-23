<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php 
	$fields = ['title', 'text', 'button', 'usps'];
	foreach ($fields as $field) {
		$$field = $default_custom == 'Custom' ? $$field : get_field($field . '_u', 'option');
	}
	?>

	<section class="section s-usp<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="section-wrapper bg-dark text-white">
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-5">
						<div class="text">

							<?php if ($title): ?>
								<h3><?= $title ?></h3>
							<?php endif ?>
							
							<?= $text ?>

							<?php if ($button): ?>
								<a href="<?= $button['url'] ?>" class="btn btn-white"<?php if($button['target']) echo ' target="_blank"' ?>>
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
					</div>

					<?php if (is_array($usps) && checkArrayForValues($usps)): ?>
					<div class="col-md-6 col-lg-7">
						<ul>

							<?php foreach ($usps as $item): ?>
								<?php if ($item['usp']): ?>
									<li>
										<i class="<?= $item['icon'] ?>"></i>
										<?= $item['usp'] ?>
									</li>
								<?php endif ?>
							<?php endforeach ?>
							
						</ul>
					</div>
				<?php endif ?>

			</div>
		</div>
	</div>
</section>

<?php endif; ?>
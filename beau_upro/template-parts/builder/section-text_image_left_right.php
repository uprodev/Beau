<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<section class="section s-text-image<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">
			<div class="row<?php if($is_text == 'Right') echo ' flex-md-row-reverse' ?>">
				<div class="col-md-6 align-self-center">
					<div class="text">

						<?php if ($title): ?>
							<h3><?= $title ?></h3>
						<?php endif ?>

						<?= $text ?>

						<div class="links d-flex align-items-center justify-content-between justify-content-lg-start">

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

							<?php if ($link): ?>
								<a href="<?= $link['url'] ?>" class="link-simple"<?php if($link['target']) echo ' target="_blank"' ?>><?= $link['title'] ?></a>
							<?php endif ?>

						</div>
					</div>
				</div>

				<?php if ($image): ?>
					<div class="col-md-6">
						<div class="image">
							<?= wp_get_attachment_image($image['ID'], 'full') ?>
							
							<?php if ($is_quote_link_block && is_array($quote_link_block) && checkArrayForValues($quote_link_block)): ?>

							<?php if ($quote_link_block['type'] == 'Link'): ?>

								<?php if ($quote_link_block['link']): ?>
									<a href="<?= $quote_link_block['link']['url'] ?>" class="cp-img-link"<?php if($quote_link_block['link']['target']) echo ' target="_blank"' ?>>
									<?php else: ?>
										<div class="cp-img-link">
										<?php endif ?>

										<?php if ($quote_link_block['title']): ?>
											<h5><?= $quote_link_block['title'] ?></h5>
										<?php endif ?>

										<?= $quote_link_block['text'] ?>

										<?php if ($quote_link_block['link']): ?>
											<span class="btn-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
													<g transform="translate(-6.427 23.252) rotate(-90)">
														<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
														<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
													</g>
												</svg>
											</span>
										<?php endif ?>

										<?php if ($quote_link_block['link']): ?>
										</a>
									<?php else: ?>
									</div>
								<?php endif ?>

							<?php else: ?>
								<div class="cp-img-quote">
									<div class="quote-header">

										<?php if ($quote_link_block['image']): ?>
											<span class="quote-img">
												<?php if (pathinfo($quote_link_block['url'])['extension'] == 'svg'): ?>
													<img src="<?= $item['image']['url'] ?>" alt="<?= $quote_link_block['image']['alt'] ?>">
												<?php else: ?>
													<?= wp_get_attachment_image($quote_link_block['image']['ID'], 'full') ?>
												<?php endif ?>
											</span>
										<?php endif ?>

										<?php if ($quote_link_block['author_description']): ?>
											<p><?= $quote_link_block['author_description'] ?></p>
										<?php endif ?>

									</div>

									<?php if ($quote_link_block['text']): ?>
										<div class="quote-body">
											<?= $quote_link_block['text'] ?>
										</div>
									<?php endif ?>

								</div>
							<?php endif ?>

						<?php endif ?>

					</div>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>

<?php endif; ?>
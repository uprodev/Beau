<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

	<?php if (is_array($rows) && checkArrayForValues($rows)): ?>
	<section class="section s-cards-list<?php if($background_color) echo ' has-bg' ?>"<?php if($background_color) echo ' style="background-color: ' . $background_color . '"' ?><?php if($id) echo ' id="' . $id . '"' ?>>
		<div class="container-fluid">

			<?php if ($title || $text): ?>
				<div class="section-header text-center">

					<?php if ($title): ?>
						<h3><?= $title ?></h3>
					<?php endif ?>

					<?= $text ?>

				</div>
			<?php endif ?>

			<?php foreach ($rows as $row): ?>

				<?php 
				if($row['columns'] == 1) $class = 'gallery-one-item';
				if($row['columns'] == 2 && $row['type'] == 'Row') $class = 'gallery-two-items-row';
				if($row['columns'] == 2 && $row['type'] == 'Grid') $class = 'gallery-four-items-grid';
				if($row['columns'] == 3) $class = 'gallery-three-items-' . strtolower($row['type']);
				?>

				<?php if (is_array($row['gallery']) && checkArrayForValues($row['gallery'])): ?>
				<div class="gallery-grid <?= $class ?>">

					<?php if ($row['columns'] != 1): ?>
						<div class="row<?php if($row['columns'] == 2 && $row['columns'] == 'Grid') echo ' d-block clearfix' ?>">
						<?php endif ?>

						<?php foreach ($row['gallery'] as $index => $item): ?>
							<?php if ($item['image']): ?>

								<?php if ($row['columns'] == 2): ?>
									<div class="col-md-6">
									<?php endif ?>

									<?php if ($row['columns'] == 3 && $row['type'] == 'Grid' && $index == 0): ?>
										<div class="col-md-6">
										<?php endif ?>

										<?php if ($row['columns'] == 3 && $row['type'] == 'Grid' && $index == 1): ?>
											<div class="col-md-6">
												<div class="d-md-flex flex-column justify-content-between h-100">
												<?php endif ?>

												<?php if ($row['columns'] == 3 && $row['type'] == 'Row'): ?>
													<div class="col-md-4">
													<?php endif ?>

													<div class="card">
														<div class="card-image">
															<?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
														</div>

														<?php if ($item['is_quote_link_block'] && is_array($item['quote_link_block']) && checkArrayForValues($item['quote_link_block'])): ?>

														<?php if ($item['quote_link_block']['type'] == 'Link'): ?>

															<?php if ($item['quote_link_block']['link']): ?>
																<a href="<?= $item['quote_link_block']['link']['url'] ?>" class="cp-img-link"<?php if($item['quote_link_block']['link']['target']) echo ' target="_blank"' ?>>
																<?php else: ?>
																	<div class="cp-img-link">
																	<?php endif ?>

																	<?php if ($item['quote_link_block']['title']): ?>
																		<h5><?= $item['quote_link_block']['title'] ?></h5>
																	<?php endif ?>

																	<?= $item['quote_link_block']['text'] ?>

																	<?php if ($item['quote_link_block']['link']): ?>
																		<span class="btn-icon">
																			<svg xmlns="http://www.w3.org/2000/svg" width="16.825" height="16.825" viewBox="0 0 16.825 16.825">
																				<g transform="translate(-6.427 23.252) rotate(-90)">
																					<path d="M7.279,7.279a1.2,1.2,0,0,1,1.7,0L22.6,20.9a1.2,1.2,0,1,1-1.7,1.7L7.279,8.978a1.2,1.2,0,0,1,0-1.7Z" transform="translate(0.301 0.301)" />
																					<path d="M22.05,6.427a1.2,1.2,0,0,1,1.2,1.2V22.05a1.2,1.2,0,0,1-1.2,1.2H7.629a1.2,1.2,0,0,1,0-2.4h13.22V7.629A1.2,1.2,0,0,1,22.05,6.427Z" transform="translate(0 0)" />
																				</g>
																			</svg>
																		</span>
																	<?php endif ?>

																	<?php if ($item['quote_link_block']['link']): ?>
																	</a>
																<?php else: ?>
																</div>
															<?php endif ?>

														<?php else: ?>
															<div class="cp-img-quote">

																<?php if ($item['quote_link_block']['image']): ?>
																	<span class="quote-img">
																		<?php if (pathinfo($item['quote_link_block']['image']['url'])['extension'] == 'svg'): ?>
																			<img src="<?= $item['quote_link_block']['image']['url'] ?>" alt="<?= $item['quote_link_block']['image']['alt'] ?>">
																		<?php else: ?>
																			<?= wp_get_attachment_image($item['quote_link_block']['image']['ID'], 'full') ?>
																		<?php endif ?>
																	</span>
																<?php endif ?>

																<div class="quote-body">

																	<?= $item['quote_link_block']['text'] ?>

																	<?php if ($item['quote_link_block']['subtext']): ?>
																		<p><strong><?= $item['quote_link_block']['subtext'] ?></strong></p>
																	<?php endif ?>

																</div>
															</div>
														<?php endif ?>

													<?php endif ?>

													<?php if ($row['columns'] == 2): ?>
													</div>
												<?php endif ?>

												<?php if ($row['columns'] == 3 && $row['type'] == 'Grid' && $index == 0): ?>
												</div>
											<?php endif ?>

											<?php if ($row['columns'] == 3 && $row['type'] == 'Grid' && $index == 2): ?>
											</div>
										</div>
									<?php endif ?>

									<?php if ($row['columns'] == 3 && $row['type'] == 'Row'): ?>
									</div>
								<?php endif ?>

							</div>
						<?php endif ?>
					<?php endforeach ?>

					<?php if ($row['columns'] != 1): ?>
					</div>
				<?php endif ?>

			</div>
		<?php endif ?>

	<?php endforeach ?>

</div>
</section>
<?php endif ?>

<?php endif; ?>
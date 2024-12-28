<?php
$options = get_fields( 'option');
?>

<div class="w-[265px] min-w-[265px] hidden lg:block mb-[64px]">
	<div class="bg-white text-[14px] px-4 py-6 rounded-lg mb-4">
		<?php $categories = get_nested_categories_by_parent(0,'excursion_category'); ?>
		<?php if (!empty($categories)) : ?>
			<ul class="flex flex-col gap-5">
				<?php foreach ($categories as $category) : ?>
					<li class="flex flex-col gap-3">
						<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold hover:text-[#927CF5]">
							<?php $fields = get_fields('excursion_category_' . $category['id']); ?>
							<?php echo esc_html($fields['title_double'])?>
						</a>
						<ul class="flex flex-col gap-1.5">
							<?php foreach ($category["children"] as $child) : ?>
								<li class="group<?php echo is_current_category($child["id"]) ? ' active' : ''; ?>">
									<?php /* $link = $child["single_post_slug"] ?? $child['link']; */ ?>
									<?php $link = $child['link']; ?>

									<?php if (isset($child["children"]) && is_array($child["children"]) && count($child["children"]) > 0) : ?>
										<details class="sidebar_link">
											<summary class="flex items-center justify-between cursor-pointer group-[open]:text-[#927CF5] groups pe-1">
												<a href="<?php echo $link; ?>" class="inline-block group-[.active]:text-[#927CF5] hover:text-[#927CF5]">
													<?php echo esc_html($child['name']); ?>
												</a>
												<span class="ml-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="arrow">
														<path d="M1.5 3.75L6 8.25L10.5 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</span>
											</summary>
											<ul class="flex flex-col gap-1.5 pl-4 mt-1.5">
												<?php foreach ($child["children"] as $subchild) : ?>
													<li class="group<?php echo is_current_category($subchild["id"]) ? ' active' : ''; ?>">
														<?php $sublink =  $subchild['link']; ?>
														<?php /* $sublink = $subchild["single_post_slug"] ?? $subchild['link']; */ ?>
														<a href="<?php echo $sublink; ?>" class="group-[.active]:text-[#927CF5] hover:text-[#927CF5]">
															<?php $catFields = get_fields(get_term_by('id', $subchild["id"],'excursion_category')); ?>
															<?php echo (isset($catFields['title_double']) && !empty($catFields['title_double']) ) ? $catFields['title_double'] : esc_html($subchild['name']); ?>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										</details>
									<?php else : ?>
										<a href="<?php echo $link; ?>" class="group-[.active]:text-[#927CF5] hover:text-[#927CF5]">
											<?php echo esc_html($child['name']); ?>
										</a>

									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="p-4 flex flex-col gap-4">
		<div class="text-sm font-bold">Работаем официально по лицензии №</div>
		<div class="image_block relative">
			<?php if(!empty($options['sert'])): ?>
				<?php foreach($options['sert'] as $key => $item): ?>
					<?php if($key === 0) :?>
						<img src="<?php echo $item['sizes']['medium']?>" alt="<?php echo $item['name']?>" class="h-[158px] w-[105px] object-contain">
					<?php else: ?>
						<img src="<?php echo $item['sizes']['medium']?>" alt="<?php echo $item['name']?>" class="h-[158px] w-[105px] absolute left-[80px] top-4  object-contain">
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="tracking-tight flex flex-col gap-2 mt-3">
			<div class="ext-sm font-bold">Страхование пассажиров</div>
			<?php if(!empty($options['logo_sigur'])): ?>
				<div class="flex h-8">
					<img src="<?php echo $options['logo_sigur']?>" alt="logo" class="object-contain">
				</div>
			<?php endif; ?>
			<?php if(!empty($options['about_sig'])): ?>
				<div class="text-[#878787]"><?php echo $options['about_sig']?></div>
			<?php endif; ?>
			<?php if(!empty($options['strahovki'])): ?>
				<div class="text-[#878787]">№ страховки <span class="text-[#000]"><?php echo $options['strahovki']?></span> </div>
			<?php endif; ?>

		</div>
	</div>
</div>

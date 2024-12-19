<?php
$options = get_fields( 'option');
?>

<div class="w-[265px] min-w-[265px] hidden lg:block mb-[64px]">
	<div class="bg-white text-[14px] px-4 py-6 rounded-lg mb-4">
		<?php $categories = get_nested_categories_by_parent(0,'excursion_category'); ?>
		<?php if (!empty($categories)) : ?>
			<ul class="flex flex-col gap-4">
				<?php foreach ($categories as $category) : ?>
					<li class="flex flex-col gap-2">
						<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold hover:text-[#927CF5]">
							<?php $fieldsCat = get_fields('excursion_category_' . $category['id']); ?>
							<?php echo esc_html($fieldsCat['title_double'])?>
						</a>
						<ul class="flex flex-col gap-1">
							<?php foreach ($category["children"] as $child) : ?>
								<li class="group<?php echo is_current_category($child["id"]) ? ' active' : ''; ?>">
									<?php $link = $child["single_post_slug"] ?? $child['link']; ?>
									<a href="<?php echo $link; ?>" class="group-[.active]:text-[#927CF5] group-[:hover]:text-[#927CF5]">
										<?php echo esc_html($child['name'])?>
									</a>
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

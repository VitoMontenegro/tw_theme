<?php



	// Настройка WP_Query
	$query = new WP_Query([
		'post_type' => 'cars', // Замените на ваш тип записей, если это не стандартный
		'posts_per_page' => -1, // Показывать все посты (или укажите ограничение)
	]);

	// Проверяем, есть ли посты
	if ($query->have_posts()) {
		$count = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-6 md:col-span-4 bg-white rounded-2xl"  data-cost="<?php echo $fields['cost']; ?>"  data-popular="<?php echo $fields['duration']; ?>">
				<div class="relative mb-2 lg:mb-3">
					<img class="rounded-2xl w-full h-[250px] xs:h-[163px] lg:h-[193px] object-cover" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>" loading="lazy">
				</div>
				<div class="px-4">
					<span class="text-[18px] lg:text-[21px] font-bold"><?php echo get_the_title(); ?></span>
					<div class="text-[#999999] text-base font-bold font-['Mulish'] leading-[21px] tracking-tight mb-3 lg:mb-5"><?php echo $fields['duration']; ?> мест</div>
					<div class="flex flex-wrap items-center gap-2 mb-5">
						<?php if(isset($fields['cost'])): ?>

							<div class="text-lg font-bold leading-[21px] tracking-tight">
								от <?php echo $fields['cost'];?> ₽/час
							</div>
						<?php endif ?>
					</div>
					<div class="relative mb-4">
						<button data-open="popup-bus" class="inline-block font-bold text-[#FF7A45] py-1.5 lg:py-2 py-2 px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Забронировать</button>
					</div>
				</div>
			</div>
			<?php
		}
	} else {
		echo '<p class="absolute bold text-lg">Нет записей для выбранных фильтров.</p>';
	}

	// Сбрасываем глобальный объект WP_Query
	wp_reset_postdata();

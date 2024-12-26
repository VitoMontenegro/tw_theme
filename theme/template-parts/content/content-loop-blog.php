<?php



	// Настройка WP_Query
	$query = new WP_Query([
		'post_type' => 'post', // Замените на ваш тип записей, если это не стандартный
		'posts_per_page' => -1, // Показывать все посты (или укажите ограничение)
	]);

	// Проверяем, есть ли посты
	if ($query->have_posts()) {
		$count = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-6 md:col-span-4 bg-white rounded-2xl">
				<a  href="<?php echo get_permalink(); ?>" class="relative p-4">
					<img class="rounded-2xl w-full h-[250px] xs:h-[163px] lg:h-[193px] object-cover" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo get_the_title(); ?>" loading="lazy">
				</a>
				<div class="px-4">
					<div class="text-[18px] font-bold min-h-[65px]"><?php echo get_the_title(); ?></div>
					<div class="relative mb-4">
						<a href="<?php echo get_permalink(); ?>" data-open="popup-bus" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45] mt-[18px] px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
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

<?php
$category_id = get_query_var('custom_id', false);

if (isset($category_id)) {


	// Получаем все дочерние категории для таксономии excursion
	$child_categories = get_terms([
		'taxonomy' => 'excursion_category',
		'child_of' => $category_id, // ID родительской категории
		'fields' => 'ids', // Получаем только ID категорий
		'hide_empty' => true, // Показывать только категории с постами
	]);

	// Добавляем родительскую категорию к списку
	$categories = array_merge([$category_id], $child_categories);

	// Настройка WP_Query
	$query = new WP_Query([
		'post_type' => 'excursion', // Замените на ваш тип записей, если это не стандартный
		'posts_per_page' => 9, // Показывать все посты (или укажите ограничение)
		'tax_query' => [
			[
				'taxonomy' => 'excursion_category',
				'field' => 'term_id',
				'terms' => $categories,
				'include_children' => false, // Дочерние категории уже включены вручную
			],
		],
	]);

	// Проверяем, есть ли посты
	if ($query->have_posts()) {
		$count = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-12 xs:col-span-6 md:col-span-4 bg-white rounded-2xl"  data-cost="<?php echo get_cost($fields)['cost_sale'] ?? get_cost($fields)['cost']; ?>"  data-popular="<?php echo ++$count;?>">
				<div class="relative mb-2 lg:mb-3">
					<a href="<?php echo get_permalink() ?>">
						<img class="rounded-2xl w-full h-[250px] xs:h-[163px] lg:h-[193px] object-cover" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>" loading="lazy">
						<?php if (isset($fields['video_after_gates']) && !empty($fields['video_after_gates'])): ?>
							<span class="has_video absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" data-ll-status="observed">
								<svg xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none">
									<g filter="url(#filter0_d_135_6229)">
										<path d="M59 36.268C60.3333 37.0378 60.3333 38.9622 59 39.7321L21.5 61.3827C20.1667 62.1525 18.5 61.1902 18.5 59.6506L18.5 16.3494C18.5 14.8098 20.1667 13.8475 21.5 14.6173L59 36.268Z" fill="white" fill-opacity="0.75" shape-rendering="crispEdges"/>
									</g>
									<defs>
										<filter id="filter0_d_135_6229" x="0.5" y="0.346191" width="77.5" height="83.3076" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
										<feFlood flood-opacity="0" result="BackgroundImageFix"/>
										<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
										<feOffset dy="4"/>
										<feGaussianBlur stdDeviation="9"/>
										<feComposite in2="hardAlpha" operator="out"/>
										<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
										<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_135_6229"/>
										<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_135_6229" result="shape"/>
										</filter>
									</defs>
								</svg>
							</span>
						<?php endif ?>
					</a>
					<?php if(isset($fields['duration_main']) && !empty($fields['duration_main'])): ?>
						<div class="absolute left-[17px] bottom-[13px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]"><?php echo $fields['duration_main'];?></div>
						</div>
					<?php endif ?>
					<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
						<div class="absolute left-3 top-4 flex gap-1 items-center bg-[#FF7A45] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]">скидка %</div>
						</div>
					<?php endif ?>
					<button class="absolute right-0 top-1 wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
						<svg class="block group-[:hover]:hidden group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" rx="12" fill="white"/>
							<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#373F41"/>
						</svg>
						<svg class="hidden group-[:hover]:block group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" rx="12" fill="white"/>
							<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#FF7A45"/>
						</svg>
						<svg class="hidden group-[.active]:block"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect width="24" height="24" rx="12" fill="#FF7A45"/>
							<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="white"/>
						</svg>
					</button>
				</div>
				<div class="px-4">
					<a href="<?php echo get_permalink() ?>" class="card-title text-[16px] xs:text-[14px] lg:text-[16px] font-bold mb-2 lg:mb-4 leading-[1.2] leading-[1.2]"><?php echo get_the_title(); ?></a>
					<div class="card-description leading-[1.3] xs:leading-[1] lg:leading-[17px] mb-3 lg:mb-5 text-[14px] xs:text-sm"><?php echo custom_excerpt_without_title(); ?></div>
					<div class="flex flex-wrap items-center gap-2 mb-5">
						<div class="text-[16px] bg-[#ffe7db] text-[#FF7A45] rounded-lg px-2.5 py-1">
							от <?php echo $fields['price'];?> ₽
						</div>
						<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
							<div class="text-center text-[#999999] text-[16px] font-medium leading-tight line-through">
								от <?php echo $fields['discount_price'];?> ₽
							</div>
						<?php endif ?>
					</div>
					<div class="relative mb-4">
						<a href="<?php echo get_permalink() ?>" class="inline-block font-bold text-[#FF7A45] py-1.5 lg:py-2 py-2 px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
					</div>
				</div>
			</div>
			<?php
		}
		if ($query->found_posts > $query->current_post + 1) {
			echo '<button class="col-span-12 pt-1 load-more" data-page="2"><span class="inline-block font-bold text-[#FF7A45] py-2  px-4 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45]">Загрузить ещё</span></button>';
		}
	} else {
		echo '<p class="absolute bold text-lg">Нет записей для выбранных фильтров.</p>';
	}

	// Сбрасываем глобальный объект WP_Query
	wp_reset_postdata();

}

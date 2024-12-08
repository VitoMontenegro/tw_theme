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
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-6 md:col-span-4 bg-white rounded-2xl">
				<div  class="relative mb-3">
					<a href="<?php echo get_permalink() ?>">
						<img class="rounded-2xl w-full h-[160px] sm:h-[193px] object-cover" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>" loading="lazy">
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
					<div class="absolute left-3 bottom-4 flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
						<div class="text-white text-[11px] px-3 pt-1 pb-[5px] leading-none"><?php echo $fields['duration']['label'];?></div>
					</div>
					<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
						<div class="absolute left-3 top-4 flex gap-1 items-center bg-[#FF7643] rounded-3xl">
							<div class="text-white text-[11px] px-3 pt-1 pb-[5px] leading-none">скидка %</div>
						</div>
					<?php endif ?>
					<button class="absolute right-1 top-1 wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
					<span class="icon h-6 w-6 flex items-center justify-center bg-white rounded-full">
						 <svg class="w-4 h-4 fill-transparent stroke-current text-[#000] group-[.active]:text-red-600 group-[.active]:fill-red-600 stroke-1" viewBox="0 0 24 24">
							  <path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
						 </svg>
					</span>
					</button>
				</div>
				<div class="px-3">
					<a href="<?php echo get_permalink() ?>" class="card-title text-sm sm:text-[21px] font-bold mb-4"><?php echo get_the_title(); ?></a>
					<div class="card-description leading-[17px] mb-4"><?php echo get_the_excerpt(); ?></div>
					<div class="flex flex-wrap items-center gap-2 mb-4">
						<div class="bg-[#ffe7db] text-[#ff7642] rounded-lg px-2">
							от <?php echo $fields['price'];?> ₽
						</div>
						<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
							<div class="text-center text-[#999999] text-sm font-medium leading-tight line-through">
								от <?php echo $fields['discount_price'];?> ₽
							</div>
						<?php endif ?>
					</div>
					<div class="relative mb-4">
						<a href="<?php echo get_permalink() ?>" class="inline-block font-bold text-[#ff7642] py-2 sm:py-2.5 px-4 sm:px-8 border-2 border-[#ff7642] rounded-3xl">Подробнее</a>
					</div>
				</div>
			</div>
			<?php
		}
		if ($query->found_posts > $query->current_post + 1) {
			echo '<button class="col-span-12 pt-3 load-more" data-page="2"><span class="inline-block font-bold text-[#ff7642] py-2 sm:py-2.5 px-4 sm:px-8 border-2 border-[#ff7642] rounded-3xl">Загрузить ещё</span></button>';
		}
	} else {
		echo '<p>Нет записей для выбранной категории.</p>';
	}

	// Сбрасываем глобальный объект WP_Query
	wp_reset_postdata();

}

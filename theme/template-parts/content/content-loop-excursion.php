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
		'posts_per_page' => -1, // Показывать все посты (или укажите ограничение)
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
			<div class="flex flex-col gap-4">
				<a href="<?php echo get_permalink() ?>" class="relative">
					<img class="rounded-xl w-full" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>" loading="lazy">
					<div class="absolute left-3 bottom-4 flex gap-1 items-center">
						<span class="text-white font-600 leading-100"><?php echo $fields['duration'];?></span>
					</div>
				</a>
				<div class="flex flex-wrap text-xl text-global-luckypush font-400">
					<span class="mr-1"><?php echo $fields['price'];?> / <?php echo $fields['discount_price'];?></span>
				</div>
				<button class="wish-btn content__tour__wish-btn group" data-wp-id="<?php echo $post->ID; ?>" aria-label="Добавить в избранное">
					<span class="icon">
						<svg class="w-6 h-6 fill-current text-[#A5A5A5] group-[.active]:text-red-600">
							<path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
						</svg>
					</span>
				</button>
				<?php if (isset($fields['video_after_gates']) && !empty($fields['video_after_gates'])): ?>
					<span class="has_video" data-ll-status="observed">
						<svg height="100%" version="1.1" viewBox="0 0 68 48" width="35" ><path class="" d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z" fill="#f00"></path><path d="M 45,24 27,14 27,34" fill="#fff"></path>
						</svg>
					</span>
				<?php endif ?>
				<a href="<?php echo get_permalink() ?>" class="text-3xl font-700 leading-100"><?php echo get_the_title(); ?></a>
			</div>
			<?php
		}
	} else {
		echo '<p>Нет записей для выбранной категории.</p>';
	}

	// Сбрасываем глобальный объект WP_Query
	wp_reset_postdata();

}

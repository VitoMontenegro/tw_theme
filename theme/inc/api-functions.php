<?php
function custom_rest_filter_posts() {
	register_rest_route('my_namespace/v1', '/filter-posts/', [
		'methods' => 'GET',
		'callback' => 'handle_filter_posts_request',
		'permission_callback' => '__return_true',
	]);
}

add_action('rest_api_init', 'custom_rest_filter_posts');

function handle_filter_posts_request(WP_REST_Request $request) {
	$duration = $request->get_param('duration');
	$price_range = $request->get_param('price');
	$posts_per_page = $request->get_param('posts_per_page') ?: 5;
	$page = $request->get_param('page') ?: 1;
	$category_id = $request->get_param('category_id');

	// Разделяем цену на минимальное и максимальное значение
	$min_price = $max_price = null;
	if ($price_range) {
		list($min_price, $max_price) = explode('-', $price_range);
		$min_price = floatval($min_price);
		$max_price = floatval($max_price);
	}

	// Получаем дочерние категории
	$child_categories = get_terms([
		'taxonomy' => 'excursion_category',
		'child_of' => $category_id,
		'fields' => 'ids',
		'hide_empty' => true,
	]);
	$categories = array_merge([$category_id], $child_categories);

	// Настройка WP_Query
	$args = [
		'post_type' => 'excursion',
		'posts_per_page' => $posts_per_page,
		'paged' => $page,
		'tax_query' => [
			[
				'taxonomy' => 'excursion_category',
				'field' => 'term_id',
				'terms' => $categories,
				'include_children' => false,
			],
		],
		'meta_query' => ['relation' => 'AND'], // Инициализация meta_query
	];

	// Обрабатываем фильтр по duration
	if ($duration) {
		if ($duration === 'lt3') { // До 3 часов
			$args['meta_query'][] = [
				'key' => 'duration',
				'value' => 3,
				'compare' => '<',
				'type' => 'NUMERIC',
			];
		} elseif ($duration === '3-5') { // 3-5 часов
			$args['meta_query'][] = [
				'key' => 'duration',
				'value' => [3, 5],
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC',
			];
		} elseif ($duration === 'gt5') { // Более 5 часов
			$args['meta_query'][] = [
				'key' => 'duration',
				'value' => 5,
				'compare' => '>',
				'type' => 'NUMERIC',
			];
		}
	}

	// Фильтрация по discount_price или price
	if ($min_price !== null && $max_price !== null) {
		$args['meta_query'][] = [
			'key' => 'discount_price',
			'value' => [$min_price, $max_price],
			'compare' => 'BETWEEN',
			'type' => 'NUMERIC',
		];
	}

	// Выполнение запроса
	$query = new WP_Query($args);

	// Формируем ответ
	$posts = [];
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			$posts[] = [
				'title' => get_the_title(),
				'url' => get_permalink(),
				'price' => $fields['price'] ?? '',
				'discount_price' => $fields['discount_price'] ?? '',
				'duration' => $fields['duration'] ?? '',
				'image' => $fields['gallery'][0]['sizes']['medium_large'] ?? '',
			];
		}
	}

	// Формируем пагинацию
	$total_pages = $query->max_num_pages;
	$pagination = [];
	if ($total_pages > 1) {
		for ($i = 1; $i <= $total_pages; $i++) {
			$pagination[] = [
				'page' => $i,
			];
		}
	}

	// Возвращаем ответ
	return rest_ensure_response([
		'posts' => $posts,
		'pagination' => $pagination,
	]);
}

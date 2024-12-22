<?php


add_filter('term_description', 'do_shortcode');

add_shortcode( 'min_price', 'min_price' );
function min_price($atts) {
	ob_start();

	$atts = shortcode_atts(array(
		'min' => '',
	), $atts);

	$items = get_posts( array(
		'numberposts' => -1,
		'post_type' => 'excursion'
	) );

	wp_reset_postdata(); // сброс


	$items_prices = [];
	foreach ($items as $item) {
		$fields = get_fields($item->ID);

		if (isset($fields['price']) && $fields['price']) {
			$cost = $fields['price'];
		}

		if (isset($fields['discount_price']) && $fields['discount_price']) {
			$m=(int)$fields['discount_price'];
		} else {
			$m=(int)$fields['price'];
		}

		if ($m<1) continue;
		$items_prices[] = $m;
	}

	if (count($items_prices)>1)
		$min_price = min($items_prices);
	else
		$min_price = 850;

	$min_price = $atts['min'] ? $atts['min'] : $min_price;

	echo $min_price;
	$result = ob_get_clean();
	return $result;
}


//Шорткод %%prices%% - вывода минимальной цены категории в метатегах
function get_prices() {

	if (is_front_page()) {
		$t = 'ekskursii-peterburg';
	} else {
		$t = get_queried_object()->slug;
	}

	$items = get_posts(
		array(
			'posts_per_page' => -1,
			'post_type' => 'excursion',
			'tax_query' => array(
				array(
					'taxonomy' => 'excursion_category',
					'field' => 'slug',
					'terms' => $t
				)
			)
		)
	);

	$items_prices = [];

	foreach ($items as $item) {
		$fields = get_fields($item->ID);

		if (isset($fields['price']) && $fields['price']) {
			$cost = $fields['price'];
		}

		if (isset($fields['discount_price']) && $fields['discount_price']) {
			$m=(int)$fields['discount_price'];
		} else if(isset($fields['price']) && $fields['price']) {
			$m=(int)$fields['price'];
		}

		if ($m<1) continue;
		$items_prices[] = $m;
	}

	$min_price = !empty($items_prices) ? min($items_prices) : 0;
	wp_reset_postdata();
	return $min_price . ' руб.';
}

//Шорткод %%price%% - вывода минимальной цены категории в метатегах
function get_excursion_price() {
		$fields = get_fields();
		if (isset($fields['discount_price']) && $fields['discount_price']) {
			return (int)$fields['discount_price'] . ' руб.';
		} else if(isset($fields['price']) && $fields['price']) {
			return (int)$fields['price'] . ' руб.';
		}
		return 'по запросу';
}

//Шорткод %%duration%% - вывода минимальной цены категории в метатегах
function get_excursion_duration() {
		$fields = get_fields();
		if (isset($fields['duration_main']) && !empty($fields['duration_main'])) {
			return $fields['duration_main'];
		} else if(isset($fields['duration']) && $fields['duration']) {
			return $fields['duration'];
		}
		return 'уточняйте';
}

// define the action for register yoast_variable replacments
function register_custom_yoast_variables() {
	wpseo_register_var_replacement( '%%prices%%', 'get_prices', 'advanced', ' ' );
	wpseo_register_var_replacement( '%%price%%', 'get_excursion_price', 'advanced', ' ' );
	wpseo_register_var_replacement( '%%duration%%', 'get_excursion_duration', 'advanced', ' ' );
}
// Add action
add_action('wpseo_register_extra_replacements', 'register_custom_yoast_variables');

<?php
require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');

define('TELEGRAM_BOT_TOKEN', '7674258017:AAH1wb9S4ARTuNc3w9TqpOzHfXFoyXmaUBc'); // Замените на свой токен
define('TELEGRAM_CHAT_ID', '300193513'); // Замените на свой chat_id

function custom_rest_filter_posts() {
	register_rest_route('my_namespace/v1', '/filter-posts/', [
		'methods' => 'GET',
		'callback' => 'handle_filter_posts_request',
		'permission_callback' => '__return_true',
	]);
	register_rest_route('custom/v1', '/reviews-form', [
			'methods' => 'POST',
			'callback' => 'handle_reviews_form',
			'permission_callback' => '__return_true',
	]);
	register_rest_route('custom/v1', '/send-form', [
			'methods' => 'POST',
			'callback' => 'handle_send_form',
			'permission_callback' => '__return_true',
	]);
	register_rest_route('my-api/v1', '/load-more/', [
			'methods' => 'POST',
			'callback' => 'load_more_excursions',
			'permission_callback' => '__return_true', // Открытый доступ для всех
	]);
	register_rest_route('my-api/v1', '/load-more-reviews/', [
			'methods' => 'POST',
			'callback' => 'load_more_reviews',
			'permission_callback' => '__return_true', // Открытый доступ для всех
	]);
}
add_action('rest_api_init', 'custom_rest_filter_posts');


function handle_filter_posts_request(WP_REST_Request $request) {

	$duration = $request->get_param('duration');
	$price_ranges = $request->get_param('price');
	$grade = $request->get_param('grade');
	$posts_per_page = (int) $request->get_param('posts_per_page') ?: 5;
	$page = (int) $request->get_param('page') ?: 1;
	$category_id = $request->get_param('category_id');

	// Получаем дочерние категории
	$child_categories = get_terms([
		'taxonomy'    => 'excursion_category',
		'child_of'    => $category_id,
		'fields'      => 'ids',
		'hide_empty'  => true,
	]);
	$categories = array_merge([$category_id], $child_categories);

	// Инициализация основного массива для WP_Query
	$query_args = [
		'post_type'      => 'excursion',
		'posts_per_page' => $posts_per_page,
		'paged'          => $page,
		'tax_query'      => [
			[
				'taxonomy'         => 'excursion_category',
				'field'            => 'term_id',
				'terms'            => $categories,
				'include_children' => false,
			],
		],
		'meta_query' => ['relation' => 'AND'], // Гарантируем, что все условия применяются к одной записи
	];

	// Обработка фильтра по grade
	if (!empty($grade)) {
		$grade_values = json_decode($grade);
		if (!empty($grade_values)) {
			$grade_query = ['relation' => 'OR'];
			foreach ($grade_values as $value) {
				$grade_query[] = [
					'key'     => 'grade',
					'value'   => ':"' . $value . '"',
					'compare' => 'LIKE',
				];
			}
			$grade_query[] = ['key' => 'grade', 'compare' => 'NOT EXISTS'];
			$grade_query[] = ['key' => 'grade', 'value' => '', 'compare' => 'IS NULL'];
			$query_args['meta_query'][] = $grade_query;
		}
	}

	// Обработка фильтра по duration
	if (!empty($duration)) {
		$duration_values = json_decode($duration);
		if (!empty($duration_values)) {
			$duration_query = ['relation' => 'OR'];
			foreach ($duration_values as $value) {
				$duration_query[] = [
					'key'     => 'duration',
					'value'   => $value,
					'compare' => '=',
				];
			}
			$duration_query[] = ['key' => 'duration', 'compare' => 'NOT EXISTS'];
			$duration_query[] = ['key' => 'duration', 'value' => '', 'compare' => 'IS NULL'];
			$query_args['meta_query'][] = $duration_query;
		}
	}

	// Обработка фильтра по price_range
	if (!empty($price_ranges)) {
		$price_values = json_decode($price_ranges);

		if (!empty($price_values)) {
			$price_queries = ['relation' => 'OR']; // Логическое объединение условий
			foreach ($price_values as $price_range) {
				$min_price = $max_price = null;
				if ($price_range) {
					list($min_price, $max_price) = explode('-', $price_range);
					$min_price = floatval($min_price);
					$max_price = floatval($max_price);
				}

				if ($min_price !== null && $max_price !== null) {
					$price_queries[] = [
						'key'     => 'discount_price',
						'value'   => [$min_price, $max_price],
						'compare' => 'BETWEEN',
						'type'    => 'NUMERIC',
					];
				}
			}

			// Добавляем условие на отсутствие значения
			$price_queries[] = [
				'key'     => 'discount_price',
				'compare' => 'NOT EXISTS',
			];

			// Добавляем условие на пустое значение
			$price_queries[] = [
				'key'     => 'discount_price',
				'value'   => '',
				'compare' => 'IS NULL',
			];

			// Добавляем условия в основной meta_query
			$query_args['meta_query'][] = $price_queries;
		}
	}

	//запрос
	$query = new WP_Query($query_args);
	ob_start();
	// Формируем ответ
	if ($query->have_posts()) {
		$count = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-12 xs:col-span-6 md:col-span-4 bg-white rounded-2xl"  data-cost="<?php echo get_cost($fields)['cost_sale'] ?? get_cost($fields)['cost']; ?>"  data-popular="<?php echo ++$count;?>">
				<div class="relative mb-2 lg:mb-3 p-4">
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
						<div class="absolute left-[22px] bottom-[24px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]"><?php echo $fields['duration_main'];?></div>
						</div>
					<?php endif ?>

					<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
						<div class="absolute left-[22px] top-[24px] flex gap-1 items-center bg-[#FF7A45] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]">скидка %</div>
						</div>
					<?php endif ?>
					<button class="absolute right-[10px] top-[10px] wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
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
						<a href="<?php echo get_permalink() ?>" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
					</div>
				</div>
			</div>
			<?php
		}
	} else {
		echo '<p class="absolute bold text-lg">Нет записей для выбранных фильтров.</p>';
	}
	echo ob_get_clean();

}


function handle_reviews_form(WP_REST_Request $request) {
	$params = $request->get_params();
	$files = $_FILES['file'] ?? null;

	$recepient = 'testdev@kometatek.ru';
	$sitename = "Flagman";
	$name = sanitize_text_field($params["name"]);
	$text = sanitize_textarea_field($params["message"]);
	$excurs = isset($params["excurs"]) ? wp_strip_all_tags($params["excurs"]) : '';


	// Создание сообщения
	$message = "<b>Новый отзыв на сайте</b>". "\r\n";
	$message .= "<b>Дата:</b> " . esc_html(date('d/m/Y')) . "\r\n";
	$message .= "<b>Имя:</b> " . esc_html($name) . "\r\n";
	$message .= "<b>Экскурсия:</b> " . esc_html($excurs) . "\r\n";
	$message .= "<b>Сообщение:</b> " . esc_html($text) . "\r\n";

	$pagetitle = "Новый отзыв с сайта \"$sitename\"";

	// Создание записи "Отзыв"
	$post_data = [
			'post_title'   => esc_html($name),
			'post_content' =>  esc_html($text),
			'post_status'  => 'pending',
			'post_author'  => 1,
			'post_type'    => 'reviews',
	];
	$post_id = wp_insert_post($post_data);

	if (is_wp_error($post_id)) {
		return rest_ensure_response([
				'success' => false,
				'message' => 'Ошибка при создании отзыва',
		]);
	}

	// Обработка файлов
	if ($files) {
		$uploaded_files = array_map('RemapFilesArray',
				$files['name'],
				$files['type'],
				$files['tmp_name'],
				$files['error'],
				$files['size']
		);

		$gallery = [];
		$allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];

		foreach ($uploaded_files as $file) {
			if (!in_array($file['type'], $allowed_mime_types)) {
				continue;
			}
			$attachment = my_update_attachment($file, $post_id);
			if (isset($attachment['attach_id'])) {
				$gallery[] = $attachment['attach_id'];
			}
		}

		// Сохранение дополнительных полей
		update_field('field_5fad894783054', $gallery, $post_id);
		update_field('field_5ea7e567e12c6', date('d/m/Y'), $post_id);
	}

	update_field('field_5fad895583055', $excurs, $post_id);

	$message .= "Ссылка на отзыв: ".site_url()."/wp-admin/post.php?post=$post_id&action=edit". "\r\n";
	wp_telegram($message);
	wp_mail( 'vitaliy060282@gmail.com', $pagetitle, $message );

	return rest_ensure_response([
			'success' => true,
			'message' => 'Отзыв успешно отправлен!',
			'post_id' => $post_id,
	]);
}

function wp_telegram($text) {
	$url = "https://api.telegram.org/bot" . TELEGRAM_BOT_TOKEN . "/sendMessage";
	$telegram_data = [
			'chat_id' => TELEGRAM_CHAT_ID,
			'text' => $text,
			'parse_mode' => 'HTML',
	];
	$options = [
			'http' => [
					'method'  => 'POST',
					'header'  => 'Content-type: application/x-www-form-urlencoded',
					'content' => http_build_query($telegram_data), // Передаем корректный массив
			],
	];
	$context = stream_context_create($options);
	return file_get_contents($url, false, $context);
}

function handle_send_form(WP_REST_Request $request) {
	$params = $request->get_params();

	$form = $params['form'] ? "<b>Тип:</b> ".trim($params['form']) ."\n": '';
	$name = $params['name'] ? "<b>Имя:</b> ".trim($params['name']) ."\n": '';
	$phone = $params['tel'] ? "<b>Телефон:</b> ".trim($params['tel']) ."\n": '';

	$text = "С сайта flagman.ru поступил запрос: \n\n". $form . $name. $phone;


    $result = wp_telegram($text);


	// Проверяем результат запроса
	if ($result === false) {
		return rest_ensure_response([
				'success' => false,
				'message' => 'Не удалось отправить сообщение в Telegram.',
		]);
	}

	$response = json_decode($result, true);
	if ($response['ok'] === true) {
		return rest_ensure_response([
				'success' => true,
				'message' => 'Запрос успешно отправлен!',
		]);
	} else {
		return rest_ensure_response([
				'success' => false,
				'message' => 'Ошибка Telegram API: ' . $response['description'],
		]);
	}
}

// Вспомогательная функция для обработки массива файлов
function RemapFilesArray($name, $type, $tmp_name, $error, $size) {
    return array(
        'name' => $name,
        'type' => $type,
        'tmp_name' => $tmp_name,
        'error' => $error,
        'size' => $size,
    );
}

// Вспомогательная функция для загрузки вложений

function my_update_attachment($f,$pid,$t='',$c='') {
  wp_update_attachment_metadata( $pid, $f );
  if( !empty( $f['name'] )) { //New upload
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );

    $override['test_form'] = false;
    $file = wp_handle_upload( $f, $override );

    if ( isset( $file['error'] )) {
      return new WP_Error( 'upload_error', $file['error'] );
    }

    $file_type = wp_check_filetype($f['name'], array(
      'jpg|jpeg' => 'image/jpeg',
      'gif' => 'image/gif',
      'png' => 'image/png',
    ));
    if ($file_type['type']) {
      $name_parts = pathinfo( $file['file'] );
      $name = $f['name'];
      $type = $file['type'];
      $title = $t ? $t : $name;
      $content = $c;

      $attachment = array(
        'post_title' => $title,
        'post_type' => 'attachment',
        'post_content' => $content,
        'post_parent' => $pid,
        'post_mime_type' => $type,
        'guid' => $file['url'],
      );


      foreach( get_intermediate_image_sizes() as $s ) {
        $sizes[$s] = array( 'width' => '', 'height' => '', 'crop' => true );
        $sizes[$s]['width'] = get_option( "{$s}_size_w" ); // For default sizes set in options
        $sizes[$s]['height'] = get_option( "{$s}_size_h" ); // For default sizes set in options
        $sizes[$s]['crop'] = get_option( "{$s}_crop" ); // For default sizes set in options
      }

      $sizes = apply_filters( 'intermediate_image_sizes_advanced', $sizes );

      foreach( $sizes as $size => $size_data ) {
        $resized = image_make_intermediate_size( $file['file'], $size_data['width'], $size_data['height'], $size_data['crop'] );
        if ( $resized )
          $metadata['sizes'][$size] = $resized;
      }

      $attach_id = wp_insert_attachment( $attachment, $file['file'] /*, $pid - for post_thumbnails*/);

      if ( !is_wp_error( $attach_id )) {
        $attach_meta = wp_generate_attachment_metadata( $attach_id, $file['file'] );
        wp_update_attachment_metadata( $attach_id, $attach_meta );
      }

   return array(
  'pid' =>$pid,
  'url' =>$file['url'],
  'file'=>$file,
  'attach_id'=>$attach_id
   );
    }
  }
}


function load_more_excursions(WP_REST_Request $request) {
	$category_id = sanitize_text_field($request->get_param('category_id'));
	$page = intval($request->get_param('page'));

	// Получаем все дочерние категории для таксономии excursion
	$child_categories = get_terms([
			'taxonomy' => 'excursion_category',
			'child_of' => $category_id, // ID родительской категории
			'fields' => 'ids', // Получаем только ID категорий
			'hide_empty' => true, // Показывать только категории с постами
	]);
	$categories = array_merge([$category_id], $child_categories);

	// Настройка WP_Query для подгрузки постов
	$query = new WP_Query([
			'post_type' => 'excursion',
			'posts_per_page' => 9, // Показывать 9 постов на странице
			'paged' => $page,
			'tax_query' => [
					[
							'taxonomy' => 'excursion_category',
							'field' => 'term_id',
							'terms' => $categories,
							'include_children' => false,
					],
			],
	]);

	ob_start();
	// Формируем ответ
	if ($query->have_posts()) {
		$count = 0;
		while ($query->have_posts()) {
			$query->the_post();
			$fields = get_fields();
			?>
			<div class="card flex flex-col col-span-12 xs:col-span-6 md:col-span-4 bg-white rounded-2xl"  data-cost="<?php echo get_cost($fields)['cost_sale'] ?? get_cost($fields)['cost']; ?>"  data-popular="<?php echo ++$count;?>">
				<div class="relative mb-2 lg:mb-3 p-4">
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
						<div class="absolute left-[22px] bottom-[24px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]"><?php echo $fields['duration_main'];?></div>
						</div>
					<?php endif ?>
					<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
						<div class="absolute left-[22px] top-[24px] flex gap-1 items-center bg-[#FF7A45] rounded-3xl">
							<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]">скидка %</div>
						</div>
					<?php endif ?>
					<button class="absolute right-[10px] top-[10px] wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
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
						<a href="<?php echo get_permalink() ?>" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
					</div>
				</div>
			</div>
			<?php
		}
		if ($query->found_posts > ($page*9)) : ?>
			<button class="col-span-12 pt-1 load-more" data-page="<?php echo $page+1; ?>">
				<span class="inline-block font-bold text-[#FF7A45] py-2  px-4 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45]">Загрузить ещё</span>
			</button>
		<?php endif;
	} else {
		echo '<p class="absolute bold text-lg">Нет записей для выбранных фильтров.</p>';
	}
	echo ob_get_clean();

}




function load_more_reviews(WP_REST_Request $request) {
	$page = intval($request->get_param('page'));

	// Получаем все дочерние категории для таксономии excursion

	// Настройка WP_Query для подгрузки постов
	$query = new WP_Query([
		'post_type' => 'reviews',
		'posts_per_page' => 10, // Показывать 9 постов на странице
		'paged' => $page
	]);

	ob_start();
	// Формируем ответ
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/content/content', 'reviews');
		}
		if ($query->found_posts > ($page*10)) : ?>
			<button class="col-span-2 pt-1 load-more-excursion" data-page="<?php echo $page+1; ?>">
				<span class="inline-block font-bold text-[#FF7A45] py-2  px-4 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45]">Загрузить ещё</span>
			</button>
		<?php endif;
	} else {
		echo '<p class="absolute bold text-lg">Нет отзывов для показа</p>';
	}
	echo ob_get_clean();

}



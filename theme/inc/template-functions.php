<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _tw
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function tw_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'tw_pingback_header' );

/**
 * Changes comment form default fields.
 *
 * @param array $defaults The default comment form arguments.
 *
 * @return array Returns the modified fields.
 */
function tw_comment_form_defaults( $defaults ) {
	$comment_field = $defaults['comment_field'];

	// Adjust height of comment form.
	$defaults['comment_field'] = preg_replace( '/rows="\d+"/', 'rows="5"', $comment_field );

	return $defaults;
}
add_filter( 'comment_form_defaults', 'tw_comment_form_defaults' );

/**
 * Filters the default archive titles.
 */
function tw_get_the_archive_title() {
	if ( is_category() ) {
		$title = __( 'Category Archives: ', 'tw' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = __( 'Tag Archives: ', 'tw' ) . '<span>' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = __( 'Author Archives: ', 'tw' ) . '<span>' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = __( 'Yearly Archives: ', 'tw' ) . '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'tw' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = __( 'Monthly Archives: ', 'tw' ) . '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'tw' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = __( 'Daily Archives: ', 'tw' ) . '<span>' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$cpt   = get_post_type_object( get_queried_object()->name );
		$title = sprintf(
			/* translators: %s: Post type singular name */
			esc_html__( '%s Archives', 'tw' ),
			$cpt->labels->singular_name
		);
	} elseif ( is_tax() ) {
		$tax   = get_taxonomy( get_queried_object()->taxonomy );
		$title = sprintf(
			/* translators: %s: Taxonomy singular name */
			esc_html__( '%s Archives', 'tw' ),
			$tax->labels->singular_name
		);
	} else {
		$title = __( 'Archives:', 'tw' );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'tw_get_the_archive_title' );

/**
 * Determines whether the post thumbnail can be displayed.
 */
function tw_can_show_post_thumbnail() {
	return apply_filters( 'tw_can_show_post_thumbnail', ! post_password_required() && ! is_attachment() && has_post_thumbnail() );
}

/**
 * Returns the size for avatars used in the theme.
 */
function tw_get_avatar_size() {
	return 60;
}

/**
 * Create the continue reading link
 *
 * @param string $more_string The string shown within the more link.
 */
function tw_continue_reading_link( $more_string ) {

	if ( ! is_admin() ) {
		$continue_reading = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s', 'tw' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="sr-only">"', '"</span>', false )
		);

		$more_string = '<a href="' . esc_url( get_permalink() ) . '">' . $continue_reading . '</a>';
	}

	return $more_string;
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'tw_continue_reading_link' );

// Filter the content more link.
add_filter( 'the_content_more_link', 'tw_continue_reading_link' );

/**
 * Outputs a comment in the HTML5 format.
 *
 * This function overrides the default WordPress comment output in HTML5
 * format, adding the required class for Tailwind Typography. Based on the
 * `html5_comment()` function from WordPress core.
 *
 * @param WP_Comment $comment Comment to display.
 * @param array      $args    An array of arguments.
 * @param int        $depth   Depth of the current comment.
 */

function tw_html5_comment( $comment, $args, $depth ) {
	$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

	$commenter          = wp_get_current_commenter();
	$show_pending_links = ! empty( $commenter['comment_author'] );

	if ( $commenter['comment_author_email'] ) {
		$moderation_note = __( 'Your comment is awaiting moderation.', 'tw' );
	} else {
		$moderation_note = __( 'Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'tw' );
	}
	?>
	<<?php echo esc_attr( $tag ); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '', $comment ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					if ( 0 !== $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
					?>
					<?php
					$comment_author = get_comment_author_link( $comment );

					if ( '0' === $comment->comment_approved && ! $show_pending_links ) {
						$comment_author = get_comment_author( $comment );
					}

					printf(
						/* translators: %s: Comment author link. */
						wp_kses_post( __( '%s <span class="says">says:</span>', 'tw' ) ),
						sprintf( '<b class="fn">%s</b>', wp_kses_post( $comment_author ) )
					);
					?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<?php
					printf(
						'<a href="%s"><time datetime="%s">%s</time></a>',
						esc_url( get_comment_link( $comment, $args ) ),
						esc_attr( get_comment_time( 'c' ) ),
						esc_html(
							sprintf(
							/* translators: 1: Comment date, 2: Comment time. */
								__( '%1$s at %2$s', 'tw' ),
								get_comment_date( '', $comment ),
								get_comment_time()
							)
						)
					);

					edit_comment_link( __( 'Edit', 'tw' ), ' <span class="edit-link">', '</span>' );
					?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' === $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo esc_html( $moderation_note ); ?></em>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div <?php tw_content_class( 'comment-content' ); ?>>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
			if ( '1' === $comment->comment_approved || $show_pending_links ) {
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
			}
			?>
		</article><!-- .comment-body -->
	<?php
}

function register_custom_post_type() {

	/**
	 * Post Type: Акции.
	 */

	$labels = [
			"name" =>"Акции",
			"singular_name" =>"Акция",
			"menu_name" =>"Акции",
			"all_items" =>"Все акции",
			"add_new" =>"Добавить акцию",
			"add_new_item" =>"Добавить новую акцию",
			"edit_item" =>"Редактировать акцию",
			"new_item" =>"Новая акция",
			"view_item" =>"Смотреть акцию",
			"view_items" =>"Смотреть акции",
			"search_items" =>"Найти акцию",
			"not_found" =>"Акции не найдены",
			"not_found_in_trash" =>"Акции не найдены в корзине",
			"parent" =>"Родительская акция",
			"featured_image" =>"Картинка к этой акции",
			"set_featured_image" =>"Установить картинку к этой акции",
			"remove_featured_image" =>"Удалить картинку акции",
			"use_featured_image" =>"Использовать как изображение к акции",
			"archives" =>"Архивы акций",
			"insert_into_item" =>"Вставить в акцию",
			"uploaded_to_this_item" =>"Загружено к этой акции",
			"filter_items_list" =>"Фильтровать список акций",
			"items_list_navigation" =>"Навигация по списку акций",
			"items_list" =>"Список акций",
			"attributes" =>"Атрибуты акции",
			"name_admin_bar" =>"Акция",
			"parent_item_colon" =>"Родительская акция",
	];



	register_post_type( "promos",  [
			'labels' => [

					"name" => "Акции",
					"singular_name" =>"Акция",
					"menu_name" =>"Акции",
					"all_items" =>"Все акции",
					"add_new" =>"Добавить акцию",
					"add_new_item" =>"Добавить новую акцию",
					"edit_item" =>"Редактировать акцию",
					"new_item" =>"Новая акция",
					"view_item" =>"Смотреть акцию",
					"view_items" =>"Смотреть акции",
					"search_items" =>"Найти акцию",
					"not_found" =>"Акции не найдены",
					"not_found_in_trash" =>"Акции не найдены в корзине",
					"parent" =>"Родительская акция",
					"featured_image" =>"Картинка к этой акции",
					"set_featured_image" =>"Установить картинку к этой акции",
					"remove_featured_image" =>"Удалить картинку акции",
					"use_featured_image" =>"Использовать как изображение к акции",
					"archives" =>"Архивы акций",
					"insert_into_item" =>"Вставить в акцию",
					"uploaded_to_this_item" =>"Загружено к этой акции",
					"filter_items_list" =>"Фильтровать список акций",
					"items_list_navigation" =>"Навигация по списку акций",
					"items_list" =>"Список акций",
					"attributes" =>"Атрибуты акции",
					"name_admin_bar" =>"Акция",
					"parent_item_colon" =>"Родительская акция",
			],
			"description" => "",
			"public" => true,
			"publicly_queryable" => true,
			"show_ui" => true,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"rest_namespace" => "wp/v2",
			"has_archive" => true,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"delete_with_user" => false,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"can_export" => true,
			"rewrite" => [ "slug" => "promos", "with_front" => true ],
			"query_var" => true,
			"supports" => [ "title", "editor", "thumbnail" ],
			"show_in_graphql" => false,
	] );

	/**
	 * Post Type: Экскурсии.
	 */
	register_post_type('excursion', [
			'labels' => [
					'name' => 'Экскурсии',
					'singular_name' => 'Экскурсия',
					"all_items" => "Все экскурсии",
					"add_new" => "Добавить экскурсию",
					"add_new_item" => "Добавить новую экскурсию",
					"edit_item" => "Редактировать экскурсию",
					"new_item" => "Новая экскурсия",
			],
			'public' => true,
			'hierarchical' => false, // Для поддержки иерархии
			'rewrite' => ['slug' => 'excursion', 'with_front' => false], // Пустой slug
			'supports' => ['title', "editor", 'excerpt'],
			'menu_icon' => 'dashicons-admin-site-alt',
			'taxonomies' => ['excursion_category'], // Подключаем таксономию
	]);

	/**
	 * Post Type: Отзывы.
	 */
	register_post_type('reviews', [
			'labels' => [
					'name' => 'Отзывы',
					'singular_name' => 'Отзыв',
					"all_items" => "Все отзывы",
					"add_new" => "Добавить отзыв",
					"add_new_item" => "Добавить новый отзыв",
					"edit_item" => "Редактировать отзыв",
					"new_item" => "Новый отзыв",
			],
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"delete_with_user" => false,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'menu_icon' => 'dashicons-format-chat',
			"rewrite" => array( "slug" => "reviews", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor"),
	]);

	/**
	 * Post Type: Автобусы.
	 */
	register_post_type('cars', [
			'labels' => [
					'name' => 'Автобусы',
					'menu_name' => 'Автобусы',
					"all_items" => "Все автобусы",
					"add_new" => "Добавить автобус",
					"add_new_item" => "Добавить новый автобус",
					"edit_item" => "Редактировать автобус",
					"new_item" => "Новый автобус",
					"view_item" => "Смотреть автобус",
					"view_items" => "Смотреть автобусы",
			],
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"delete_with_user" => false,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgd2lkdGg9IjI0IiBoZWlnaHQ9IjI0IiBmaWxsPSJub25lIj4KICA8ZyBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj4KICAgIDxyZWN0IHg9IjIiIHk9IjUiIHdpZHRoPSIyMCIgaGVpZ2h0PSIxNCIgcng9IjIiIHJ5PSIyIiBmaWxsPSIjRkZENzAwIiAvPgogICAgPHJlY3QgeD0iNCIgeT0iNyIgd2lkdGg9IjMiIGhlaWdodD0iNiIgcng9IjEiIGZpbGw9IiNGRkZGRkYiIC8+CiAgICA8cmVjdCB4PSI4IiB5PSI3IiB3aWR0aD0iMyIgaGVpZ2h0PSI2IiByeD0iMSIgZmlsbD0iI0ZGRkZGRiIgLz4KICAgIDxyZWN0IHg9IjEyIiB5PSI3IiB3aWR0aD0iMyIgaGVpZ2h0PSI2IiByeD0iMSIgZmlsbD0iI0ZGRkZGRiIgLz4KICAgIDxyZWN0IHg9IjE2IiB5PSI3IiB3aWR0aD0iMyIgaGVpZ2h0PSI2IiByeD0iMSIgZmlsbD0iI0ZGRkZGRiIgLz4KICAgIDxjaXJjbGUgY3g9IjYiIGN5PSIxOSIgcj0iMiIgZmlsbD0iIzMzMyIgLz4KICAgIDxjaXJjbGUgY3g9IjE4IiBjeT0iMTkiIHI9IjIiIGZpbGw9IiMzMzMiIC8+CiAgICA8Y2lyY2xlIGN4PSI1IiBjeT0iNSIgcj0iMC41IiBmaWxsPSIjRkZENzAwIiAvPgogICAgPGNpcmNsZSBjeD0iMTkiIGN5PSI1IiByPSIwLjUiIGZpbGw9IiNGRkQ3MDAiIC8+CiAgPC9nPgo8L3N2Zz4K',
			"rewrite" => array( "slug" => "reviews", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor"),
	]);

	/**
	 * Post Type: Популярные вопросы.
	 */
	register_post_type('faqs', [
			'labels' => [
					'name' => 'Популярные вопросы',
					'singular_name' => 'Популярные вопросы',
					"all_items" => "Все вопросы",
					"add_new" => "Добавить вопрос",
					"add_new_item" => "Добавить новый вопрос",
					"edit_item" => "Редактировать вопросы",
					"new_item" => "Новый вопрос",
			],
			"description" => "",
			"public" => true,
			"publicly_queryable" => false,
			"show_ui" => true,
			"delete_with_user" => false,
			"show_in_rest" => true,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			'menu_icon' => 'dashicons-money',
			"rewrite" => array( "slug" => "faqs", "with_front" => true ),
			"query_var" => true,
			"supports" => array( "title", "editor"),
			'taxonomies' => ['faqs_category'], // Подключаем таксономию
	]);
}
add_action('init', 'register_custom_post_type');

function register_custom_taxonomy() {
	/**
	 * Таксономия: Категория экскурсий.
	 */
	register_taxonomy('excursion_category', 'excursion', [
			'hierarchical' => true, // Позволяет создавать подкатегории
			'labels' => [
					'name' => 'Категории',
					'singular_name' => 'Категория',
					"add_new_item" => "Добавить новую категорию",
					'search_items'      => 'Найти категорию',
					'all_items'         => 'Все категории',
					'view_item '        => 'Смотреть категорию',
					'parent_item'       => 'Родительская категория',
					'parent_item_colon' => 'Родительская категория:',
					'edit_item'         => 'Редактировать категорию',
					'update_item'       => 'Обновить',
					'menu_name'         => 'Категории',
					'back_to_items'     => '← Назад к категории',
			],
			'rewrite' => [
					'slug' => 'excursion_category',
					'hierarchical' => false,
					'with_front' => false,
			],
	]);
	/**
	 * Таксономия: Категория экскурсий.
	 */
	register_taxonomy('faqs_category', 'faqs', [
			'hierarchical' => true, // Позволяет создавать подкатегории
			'labels' => [
					'name' => 'Категории опросов',
					'singular_name' => 'Категория вопросов',
					"add_new_item" => "Добавить новую категорию",
					'search_items'      => 'Найти категорию',
					'all_items'         => 'Все категории',
					'view_item '        => 'Смотреть категорию',
					'parent_item'       => 'Родительская категория',
					'parent_item_colon' => 'Родительская категория:',
					'edit_item'         => 'Редактировать категорию',
					'update_item'       => 'Обновить',
					'menu_name'         => 'Категории опросов',
					'back_to_items'     => '← Назад к категории',
			],
			'rewrite' => [
					'slug' => 'faqs_category',
					'hierarchical' => false,
					'with_front' => false,
			],
			'public' => false, // Категория не доступна на фронтенде
			'show_ui' => true, // Доступна в админ-панели
			'show_in_rest' => true, // Можно редактировать через REST API
	]);
}
add_action('init', 'register_custom_taxonomy');

// Добавляем новый столбец для категории
add_filter('manage_faqs_posts_columns', function ($columns) {
	$columns['faqs_category'] = 'Категории';
	return $columns;
});
// Заполняем столбец данными
add_action('manage_faqs_posts_custom_column', function ($column, $post_id) {
	if ($column === 'faqs_category') {
		$terms = get_the_terms($post_id, 'faqs_category');
		if (!empty($terms) && !is_wp_error($terms)) {
			$term_links = array_map(function ($term) {
				return sprintf('<a href="%s">%s</a>', esc_url(admin_url('edit.php?faqs_category=' . $term->slug)), esc_html($term->name));
			}, $terms);
			echo implode(', ', $term_links); // Выводим ссылки на категории
		} else {
			echo 'Нет категории'; // Если категорий нет
		}
	}
}, 10, 2);

add_action('pre_get_posts', 'set_home_to_category');
function set_home_to_category($query) {
	if ($query->is_main_query() && $query->is_home() && !is_admin()) {
		$query->set('taxonomy', 'excursion');
		$query->set('term', 'ekskursii-peterburg');
	}
}

// add optionpage
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
			'page_title'    => 'Основные настройки сайта',
			'menu_title'    => 'Настройки сайта',
			'menu_slug'     => 'theme-general-settings',
	));
}

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function set_default_discount_price($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

	$price = get_field('price', $post_id);
	$discount_price = get_field('discount_price', $post_id);

	if (empty($discount_price) && !empty($price)) {
		update_field('discount_price', $price, $post_id);
	}
}
add_action('acf/save_post', 'set_default_discount_price', 10, 1);

function get_nested_categories($taxonomy = 'category') {
	// Получаем все категории таксономии
	$terms = get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false, // Показывать пустые категории
			'parent' => 0, // Только родительские категории
	]);

	if (empty($terms) || is_wp_error($terms)) {
		//return [];
	}

	$categories = [];

	foreach ($terms as $term) {
		$all_category_ids = get_all_descendant_categories($term->term_id, $taxonomy);

		$posts_in_categories = get_posts([
				'post_type' => 'excursion',
				'post_status' => 'publish',
				'tax_query' => [
						[
								'taxonomy' => $taxonomy,
								'field' => 'term_id',
								'terms' => $all_category_ids,
								'include_children' => false,
						],
				],
				'fields' => 'ids',
		]);

		$unique_post_ids = array_unique($posts_in_categories);
		$post_count = count($unique_post_ids);


		if($post_count) {
			$categories[] = [
					'id' => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
					'link' => get_term_link($term),
					'children' => get_child_categories($term->term_id, $taxonomy),
			];
		}
	}

	return $categories;
}

function get_child_categories($parent_id, $taxonomy) {
	$child_terms = get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
			'parent' => $parent_id,
	]);

	if (empty($child_terms) || is_wp_error($child_terms)) {
		return [];
	}

	$children = [];
	foreach ($child_terms as $child_term) {

		$all_category_ids = get_all_descendant_categories($child_term->term_id, $taxonomy);

		$posts_in_categories = get_posts([
				'post_type' => 'excursion',
				'post_status' => 'publish',
				'tax_query' => [
						[
								'taxonomy' => $taxonomy,
								'field' => 'term_id',
								'terms' => $all_category_ids,
								'include_children' => false,
						],
				],
				'fields' => 'ids',
		]);

		$unique_post_ids = array_unique($posts_in_categories);
		$post_count = count($unique_post_ids);

		if($post_count) {
			$children[] = [
					'id' => $child_term->term_id,
					'name' => $child_term->name,
					'slug' => $child_term->slug,
					'link' => get_term_link($child_term),
					'children' => get_child_categories($child_term->term_id, $taxonomy), // Рекурсивный вызов
			];
		}
	}

	return $children;
}

function get_top_parent_category($term_id, $taxonomy = 'category') {
	$term = get_term($term_id, $taxonomy);
	if (!$term || is_wp_error($term)) {
		return null;
	}

	while ($term->parent != 0) {
		$term = get_term($term->parent, $taxonomy);
	}

	return $term;
}

function get_top_categorios($taxonomy = 'excursion_category') {
	$top_level_categories = get_terms( array(
			'taxonomy' => 'excursion_category', // Замените на нужную таксономию
			'parent'   => 0,                   // Получаем только категории верхнего уровня
			'hide_empty' => false               // Не скрывать пустые категории (по желанию)
	) );

	if ( ! empty( $top_level_categories ) && ! is_wp_error( $top_level_categories ) ) {
		return $top_level_categories;
	}
	return [];
}

function get_nested_categories_by_parent($parent_id, $taxonomy = 'excursion_category') {
	$terms = get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
			'parent' => $parent_id,
	]);

	if (empty($terms) || is_wp_error($terms)) {
		return [];
	}

	$categories = [];
	foreach ($terms as $term) {
		$all_category_ids = get_all_descendant_categories($term->term_id, $taxonomy);

		$posts_in_categories = get_posts([
				'post_type' => 'excursion',
				'post_status' => 'publish',
				'tax_query' => [
					[
							'taxonomy' => $taxonomy,
							'field' => 'term_id',
							'terms' => $all_category_ids,
							'include_children' => false,
					],
				],
				'fields' => 'ids',
		]);

		$unique_post_ids = array_unique($posts_in_categories);
		$post_count = count($unique_post_ids);

		/*$single_post_slug = null;
		if ($post_count === 1) {
			$single_post = get_post(reset($unique_post_ids));
			if ($single_post) {
				$single_post_slug = $single_post->post_name;
			}
		}*/

		if($post_count) {
			$categories[] = [
					'id' => $term->term_id,
					'name' => $term->name,
					'slug' => $term->slug,
					'link' => get_term_link($term),
					'post_count' => $post_count,
				//'single_post_slug' => $single_post_slug,
					'children' => get_nested_categories_by_parent($term->term_id, $taxonomy)
			];
		}
	}

	return $categories;
}

function get_all_descendant_categories($parent_id, $taxonomy) {
	$categories = [$parent_id];
	$terms = get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
			'parent' => $parent_id,
	]);

	foreach ($terms as $term) {
		$categories = array_merge($categories, get_all_descendant_categories($term->term_id, $taxonomy));
	}

	return $categories;
}

function is_current_category($term_id) {
	if (is_tax() || is_category()) {
		$current_term = get_queried_object();
		if ($current_term && $current_term->term_id == $term_id) {
			return true;
		}
	}
	return false;
}

function is_active_category($category) {
	// Если это главная страница и категория с ID 16
	if (is_home() || is_front_page()) {
		if ($category['id'] == 16) {
			return true;
		}
	}

	// Проверка, если это страница записи
	if (is_singular() && has_term($category['slug'], 'excursion_category')) {
		return true;
	}

	// Проверка, если это страница категории или подкатегории
	if (is_tax('excursion_category')) {
		$term = get_queried_object();

		// Если находимся на странице самой категории (родительская категория для текущего термина)
		if ($term->term_id == $category['id']) {
			return true;
		}

		// Если это подкатегория, проверяем родительскую категорию
		if ($term->parent == $category['id']) {
			return true;
		}
	}

	return false;
}

function my_custom_template($id, $part) {
	set_query_var('custom_id', $id);
	get_template_part($part);
}

function getYoutubeEmbedUrl($url) {
	$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
	preg_match($pattern, $url, $matches);
	return (isset($matches[1])) ? $matches[1] : false;
}

function getDzenEmbedUrl($url) {
	if(!$url) return false;

	$pattern = '/(https.*)(")/U';
	preg_match($pattern, $url, $matches);

	return (isset($matches[1])) ? $matches[1] : false;
}

function getRuTubeEmbedUrl($url) {
	// Регулярное выражение для извлечения идентификатора видео
	if (preg_match('/\/video\/([a-f0-9]{32})/', $url, $matches)) {
		return $matches[1]; // Возвращаем найденный идентификатор
	}
	return null; // Если идентификатор не найден, возвращаем null
}

function get_cost($fields) {

	$cost = null;
	$cost_sale = null;

	if (isset($fields['price']) && $fields['price']) {
		$cost = $fields['price'];
	}

	if (isset($fields['discount_price']) && $fields['discount_price']) {
		$cost_sale = $fields['discount_price'];
	}

	return ['cost' =>$cost, 'cost_sale'=>$cost_sale];
}

function custom_excerpt_without_title() {
	// Получаем контент поста
	$content = get_the_content();

	// Удаляем все теги <h2> и их содержимое
	$content_without_h2 = preg_replace('/<h2.*?>.*?<\/h2>/is', '', $content);

	// Выводим результат (контент без заголовков <h2>)
	echo $content_without_h2;
}

function darken_color($hex, $percent) {
	// Удаляем символ "#" если он есть
	$hex = str_replace('#', '', $hex);

	// Разбиваем цвет на компоненты RGB
	$r = hexdec(substr($hex, 0, 2));
	$g = hexdec(substr($hex, 2, 2));
	$b = hexdec(substr($hex, 4, 2));

	// Затемняем каждую компоненту на указанный процент
	$r = max(0, min(255, $r - ($r * $percent / 100)));
	$g = max(0, min(255, $g - ($g * $percent / 100)));
	$b = max(0, min(255, $b - ($b * $percent / 100)));

	// Составляем новый цвет и возвращаем его
	return sprintf("#%02x%02x%02x", $r, $g, $b);
}
add_action('template_redirect', function() {
	if (is_category()) {
		wp_redirect(home_url('/')); // Перенаправление на главную
		exit;
	}
});

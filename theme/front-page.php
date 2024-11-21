<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _tw
 */
$current_term = get_term_by('slug', 'ekskursii-peterburg','excursion_category');
set_query_var('sidebar_term', $current_term);
$sidebar_term = get_query_var('sidebar_term');

get_header();
?>


	<section id="primary">
		<main id="main">

			<div class="container mx-auto mt-4">
				<div class="grid grid-cols-12 gap-4">
					<div class="col-span-4 border-2 p-4">
						<?php get_sidebar(); ?>
					</div>
					<div class="col-span-8">
						<div class="flex flex-col">
							<div class="main_nav">

								<?php $categories = get_nested_categories('excursion_category'); ?>
								<?php if (!empty($categories)) : ?>
									<div class="flex justify-between">
										<?php foreach ($categories as $category) : ?>
											<div>
												<a href="<?php echo esc_url($category['link']) ?>">
													<?php echo esc_html($category['name'])?>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="grid grid-cols-4 gap-6 w-full mt-5"  id="posts-container">

								<?php
								if ($current_term && isset($current_term->term_id)) {

									$category_id = $current_term->term_id;

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
													<img class="rounded-xl w-full" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>">
													<div class="absolute left-3 bottom-4 flex gap-1 items-center">
														<span class="text-white font-600 leading-100"><?php echo $fields['duration'];?></span>
													</div>
												</a>
												<div class="flex flex-wrap text-xl text-global-luckypush font-400">
													<span class="mr-1"><?php echo $fields['price'];?> / <?php echo $fields['discount_price'];?></span>
												</div>
												<button class="wish-btn content__tour__wish-btn group" data-wp-id="<?php echo $post->ID; ?>">
													<div class="icon">
														<svg class="w-6 h-6 fill-current text-[#A5A5A5] group-[.active]:text-red-600">
															<path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
														</svg>
													</div>
												</button>
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
								?>

							</div>
							<div id="pagination">
								<!-- Пагинация будет обновляться AJAX-ом -->
							</div>
						</div>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

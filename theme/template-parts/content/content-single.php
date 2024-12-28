<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" class="mb-8">

	<div class="container"><article id="post-<?php the_ID(); ?>" class="mb-8">

			<div class="flex gap-6">
				<?php get_sidebar('simple'); ?>
				<div class="overflow-x-hidden w-full">
					<div class="entry-content big-title">
						<h1 class="mt-0 text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<div class="p-5 sm:p-8 bg-white rounded-xl mb-6">
							<img class="w-full max-h-[320px] w-full rounded-xl overflow-hidden object-cover mb-6" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">

							<div class="content big-title">
								<?php the_content(); ?>
							</div>
						</div>
						<h2>Другие интересные статьи</h2>
						<div class="grid grid-col-12 xs:grid-cols-12 gap-3 sm:gap-6 w-full mt-1 content__tours"  id="posts-container">

						<?php



							// Настройка WP_Query
						$current_post_id = get_the_ID(); // Получаем ID текущего поста

						$query = new WP_Query([
								'post_type' => 'post', // Замените на ваш тип записей, если это не стандартный
								'posts_per_page' => 3, // Показывать все посты (или укажите ограничение)
								'post__not_in' => [$current_post_id], // Исключаем текущий пост

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
						?>
						</div>
					</div>
				</div>

			</div>
	</div>



</article><!-- #post-${ID} -->

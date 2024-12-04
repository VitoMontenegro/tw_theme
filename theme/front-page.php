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

	<?php get_template_part( 'template-parts/layout/submenu', 'content' ); ?>
	<!-- Блок Hero -->
	<section class="hero container mx-auto mt-4 px-4">
		<div class="flex gap-3">
			<div class="flex flex-col sm:flex-row px-4 bg-[#A392EE] rounded-xl py-8 ps-6 pe-6 md:ps-[55px] md:pe-3 md:py-[65px]">
				<div class="title_block w-1/2">
					<h1 class="text-white text-[20px] sm:text-[28px] font-normal font-['Kaph'] mb-8 leading-loose sm:leading-[38px]">
						Экскурсии <br>
						для школьников<br>
						в Санкт-петербурге
					</h1>
					<a href="#" class="px-8 py-3 bg-[#ff7642] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex">
						<div class="text-center text-white text-sm font-bold  leading-tight">Оставить заявку</div>
					</a>
				</div>
				<div class="image_block w-1/2">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero.webp" alt="hero">
				</div>
			</div>
			<div class="w-[248px] min-w-[248px] h-[323px] bg-[#ff7642] rounded-xl py-6 px-4" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/clouds.webp'); background-position: center; background-size: contain; background-repeat: no-repeat">
				<div class="text-white text-lg font-bold leading-tight text-center">Честный абонемент экскурсий для класса</div>
			</div>
		</div>

	</section>


	<section id="primary">

		<main id="main">
			<div class="container mx-auto mt-4 px-4">
				<div class="grid grid-cols-12 gap-4">
					<div class="col-span-3 border-2 p-4">
						<?php get_sidebar(); ?>
					</div>
					<div class="col-span-9">
						<div class="flex flex-col">

							<div class="grid grid-cols-4 gap-6 w-full mt-5"  id="posts-container">
								<?php
									if ($current_term && isset($current_term->term_id)) {
										$category_id = $current_term->term_id;
										my_custom_template($category_id, 'template-parts/content/content-loop-excursion');
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

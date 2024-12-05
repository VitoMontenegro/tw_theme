<?php
/**
 * Страница таксономии туров
 * @package WordPress
 * @subpackage your-clean-template-3
 */


$current_term = get_queried_object();
if ($current_term && isset($current_term->slug) && $current_term->slug === 'ekskursii-peterburg') {
	wp_redirect('/' , 301);
	exit();
}

get_header();
?>
<?php get_template_part( 'template-parts/layout/submenu', 'content' ); ?>

	<section id="primary">
		<main id="main">
			<?php get_template_part( 'template-parts/layout/breadcrumbs', 'content' ); ?>

			<div class="container mx-auto mt-14 px-4">
				<div class="flex gap-6">
					<aside class="hidden lg:block filter w-full lg:w-[256px] min-w-[256px]">
						<?php get_sidebar(); ?>
					</aside>

					<section class="product-cards">
						<div class="flex w-full justify-between items-end mb-6">
							<div class="flex flex-col gap-2">
								<h2 class="font-bold text-3xl">Выберите экскурсию</h2>
								<div class="flex items-center gap-1.5 lg:hidden">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5995 4.55965H8.87945V3.35965C8.87945 2.962 8.5571 2.63965 8.15945 2.63965C7.76181 2.63965 7.43945 2.962 7.43945 3.35965V7.19965C7.43945 7.59729 7.76181 7.91965 8.15945 7.91965C8.5571 7.91965 8.87945 7.59729 8.87945 7.19965V5.99965H21.5995C21.9971 5.99965 22.3195 5.67729 22.3195 5.27965C22.3195 4.882 21.9971 4.55965 21.5995 4.55965ZM21.6002 17.9996H13.6802V16.7996C13.6802 16.4019 13.3579 16.0796 12.9602 16.0796C12.5626 16.0796 12.2402 16.4019 12.2402 16.7996V20.6396C12.2402 21.0372 12.5626 21.3596 12.9602 21.3596C13.3579 21.3596 13.6802 21.0372 13.6802 20.6396V19.4396H21.6002C21.9979 19.4396 22.3202 19.1172 22.3202 18.7196C22.3202 18.3219 21.9979 17.9996 21.6002 17.9996ZM2.39969 5.99965C2.00204 5.99965 1.67969 5.6773 1.67969 5.27965C1.67969 4.88201 2.00204 4.55965 2.39969 4.55965H5.20621C5.60386 4.55965 5.92621 4.88201 5.92621 5.27965C5.92621 5.6773 5.60386 5.99965 5.20621 5.99965H2.39969ZM1.67969 18.7197C1.67969 19.1173 2.00204 19.4397 2.39969 19.4397H10.042C10.4397 19.4397 10.762 19.1173 10.762 18.7197C10.762 18.322 10.4397 17.9997 10.042 17.9997H2.39969C2.00204 17.9997 1.67969 18.322 1.67969 18.7197Z" fill="#2E2E2E"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5991 11.2804H18.4791V10.0804C18.4791 9.68271 18.1567 9.36035 17.7591 9.36035C17.3614 9.36035 17.0391 9.68271 17.0391 10.0804V13.9204C17.0391 14.318 17.3614 14.6404 17.7591 14.6404C18.1567 14.6404 18.4791 14.318 18.4791 13.9204V12.7204H21.5991C21.9967 12.7204 22.3191 12.398 22.3191 12.0004C22.3191 11.6027 21.9967 11.2804 21.5991 11.2804ZM1.67969 12.0004C1.67969 12.398 2.00204 12.7204 2.39969 12.7204H14.7502C15.1478 12.7204 15.4702 12.398 15.4702 12.0004C15.4702 11.6027 15.1478 11.2804 14.7502 11.2804H2.39969C2.00204 11.2804 1.67969 11.6027 1.67969 12.0004Z" fill="#2E2E2E"/>
									</svg>
									<span>Фильтр</span>
								</div>
							</div>
							<div class="flex items-center gap-3">
								<div class="hidden lg:block">Сортировать по:</div>
								<div class="hidden items-center gap-1 lg:flex">
									<span>Цене</span>
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<rect x="2" y="7.6001" width="3" height="1.4" fill="#999999"/>
										<rect x="2" y="4.7998" width="6" height="1.4" fill="#999999"/>
										<rect x="2" y="2" width="8" height="1.4" fill="#999999"/>
									</svg>
								</div>
								<div class="flex items-center gap-2">
									<span class="text-[#FF7643]">По популярности</span>
									<svg class="lg:hidden" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<g clip-path="url(#clip0_189_22709)">
											<path d="M1.5 3.75L6 8.25L10.5 3.75" stroke="#373F41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_189_22709">
												<rect width="12" height="12" fill="white" transform="translate(12) rotate(90)"/>
											</clipPath>
										</defs>
									</svg>
								</div>
							</div>
						</div>
						<div class="flex flex-col">

							<div class="grid grid-cols-12 gap-3 sm:gap-6 w-full mt-5"  id="posts-container">
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
					</section>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();



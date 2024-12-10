<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */
$options = get_fields( 'option');

?>

<footer id="colophon" class="bg-[#393488] text-white pt-[58px] pb-[35px]">
	<div class="container mx-auto">

		<div class="gap-6 grid grid-cols-12 w-full">
			<div class="col-span-12 lg:col-span-3"></div>
			<div class="col-span-12 lg:col-span-9">
				<div class="grid grid-cols-12 gap-2 sm:gap-10 sm-gap-[63px]">
					<div class="col-span-5 lg:col-span-3 order-1">
						<div class="font-bold text-lg mb-4">О нас</div>
						<?php if ( has_nav_menu( 'menu-2' ) ) : ?>
							<nav aria-label="<?php esc_attr_e( 'Footer Menu', 'tw' ); ?>">
								<?php
								wp_nav_menu(
									array(
											'theme_location' => 'menu-2',
											'menu_class'     => 'footer-menu',
											'depth'          => 1,
									)
								);
								?>
							</nav>
						<?php endif; ?>
					</div>
					<div class="col-span-8 lg:col-span-5 order-3 sm:order-2 mt-10 sm:mt-0">
						<div class="font-bold text-lg mb-4">Экскурсии и туры</div>
						<nav>

							<?php $categories = get_nested_categories('excursion_category'); ?>
							<?php if (!empty($categories)) : ?>
								<ul class="">
									<?php foreach ($categories as $category) : ?>
										<li class="menu-item">
											<a href="<?php echo esc_url($category['link']) ?>">
												<?php echo esc_html($category['name'])?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</nav>
					</div>
					<div class="col-span-7 lg:col-span-4 order-2 sm:order-3">
						<div class="font-bold text-lg mb-4">Как с нами связаться</div>
						<ul class="">
							<li class="menu-item flex gap-1 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M10.9285 10.0711C10.4377 10.5619 9.40476 11.5948 8.70636 12.2932C8.31584 12.6837 7.683 12.6834 7.29248 12.2929C6.60619 11.6066 5.59383 10.5943 5.07063 10.0711C3.45302 8.45346 3.45302 5.83081 5.07063 4.2132C6.68823 2.5956 9.31089 2.5956 10.9285 4.2132C12.5461 5.83081 12.5461 8.45346 10.9285 10.0711Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
									<path d="M9.55286 7.14214C9.55286 8 8.85742 8.69544 7.99956 8.69544C7.14169 8.69544 6.44626 8 6.44626 7.14214C6.44626 6.28427 7.14169 5.58884 7.99956 5.58884C8.85742 5.58884 9.55286 6.28427 9.55286 7.14214Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span>Адрес офиса</span>
							</li>
							<li class="menu-item flex gap-1 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 4.11111C3 3.49746 3.49746 3 4.11111 3H5.93291C6.17204 3 6.38434 3.15302 6.45996 3.37987L7.29208 5.87623C7.3795 6.13851 7.26077 6.42517 7.01348 6.54881L5.75945 7.17583C6.37181 8.53401 7.46599 9.6282 8.82417 10.2406L9.45119 8.98652C9.57483 8.73923 9.86149 8.6205 10.1238 8.70792L12.6201 9.54004C12.847 9.61566 13 9.82796 13 10.0671V11.8889C13 12.5025 12.5025 13 11.8889 13H11.3333C6.73096 13 3 9.26904 3 4.66667V4.11111Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a class="font-semibold" href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['phone'];?></a>
							</li>
							<li class="menu-item flex gap-1 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M8 5.77778V8L9.66667 9.66667M13 8C13 10.7614 10.7614 13 8 13C5.23858 13 3 10.7614 3 8C3 5.23858 5.23858 3 8 3C10.7614 3 13 5.23858 13 8Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span>График работы</span>
							</li>
							<li class="menu-item flex gap-1 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 5.77775L7.38367 8.70019C7.75689 8.94901 8.24311 8.94901 8.61633 8.70019L13 5.77775M4.11111 11.8889H11.8889C12.5025 11.8889 13 11.3914 13 10.7778V5.2222C13 4.60855 12.5025 4.11108 11.8889 4.11108H4.11111C3.49746 4.11108 3 4.60855 3 5.22219V10.7778C3 11.3914 3.49746 11.8889 4.11111 11.8889Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="mt-12 sm:mt-[67px] flex justify-center gap-1">
					<span><?php echo date('Y') ?> г.  © </span>
					<?php
					$tw_blog_info = get_bloginfo( 'name' );
					if ( ! empty( $tw_blog_info ) ) :
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <?php bloginfo( 'name' ); ?>, Все права защищены</a>
					<?php
					endif;
					?>
				</div>
			</div>
		</div>





	</div>

</footer>

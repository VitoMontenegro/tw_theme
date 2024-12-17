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

<footer id="colophon" class="bg-[#393488] text-white pt-11 lg:pt-[52px] pb-[35px]">
	<div class="container">

		<div class="gap-1 grid grid-cols-12 lg:grid-cols-15 w-full text-[12px] sm:text-sm">
			<div class="col-span-12 lg:col-span-4"></div>
			<div class="col-span-12 lg:col-span-11">
				<div class="grid grid-cols-12 gap-2 sm:gap-2 sm-gap-[63px]">
					<div class="col-span-5 md:col-span-3 lg:col-span-3 order-1">
						<div class="font-bold mb-4 text-sm sm:text-lg">О нас</div>
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
					<div class="col-span-8 md:col-span-5 lg:col-span-5 order-3 sm:order-2 mt-10 sm:mt-0">
						<div class="font-bold mb-4 text-sm sm:text-lg ">Экскурсии и туры</div>
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
					<div class="col-span-7 md:col-span-4 lg:col-span-4 order-2 sm:order-3">
						<div class="font-bold mb-5 text-sm sm:text-lg">Как с нами связаться</div>
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
							<li class="menu-item flex gap-1 items-start">
								<svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M8 5.77778V8L9.66667 9.66667M13 8C13 10.7614 10.7614 13 8 13C5.23858 13 3 10.7614 3 8C3 5.23858 5.23858 3 8 3C10.7614 3 13 5.23858 13 8Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<span><?php echo $options['work_time'] ?></span>
							</li>
							<li class="menu-item flex gap-1 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 5.77775L7.38367 8.70019C7.75689 8.94901 8.24311 8.94901 8.61633 8.70019L13 5.77775M4.11111 11.8889H11.8889C12.5025 11.8889 13 11.3914 13 10.7778V5.2222C13 4.60855 12.5025 4.11108 11.8889 4.11108H4.11111C3.49746 4.11108 3 4.60855 3 5.22219V10.7778C3 11.3914 3.49746 11.8889 4.11111 11.8889Z" stroke="white" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
							</li>
						</ul>
						<div class="flex mt-4 gap-2 items-center">
							<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="WhatsApp" clip-path="url(#clip0_135_7009)">
										<g id="WhatsApp_2">
											<path d="M12 0C5.376 0 0 5.376 0 12C0 18.624 5.376 24 12 24C18.624 24 24 18.624 24 12C24 5.376 18.624 0 12 0Z" fill="#0DC143"></path>
											<path id="Vector" d="M17.3752 6.60574C16.0887 5.28142 14.3104 4.5625 12.4941 4.5625C8.63468 4.5625 5.53198 7.70304 5.56982 11.5247C5.56982 12.7355 5.91036 13.9084 6.47792 14.9679L5.49414 18.5625L9.16441 17.6166C10.186 18.1841 11.3212 18.449 12.4563 18.449C16.2779 18.449 19.3806 15.3084 19.3806 11.4868C19.3806 9.63277 18.6617 7.89223 17.3752 6.60574ZM12.4941 17.276C11.4725 17.276 10.4509 17.0111 9.58063 16.4814L9.3536 16.3679L7.15901 16.9355L7.72657 14.7787L7.57522 14.5517C5.91036 11.8652 6.70495 8.30845 9.42928 6.64358C12.1536 4.97872 15.6725 5.77331 17.3374 8.49764C19.0022 11.222 18.2077 14.7409 15.4833 16.4057C14.6131 16.9733 13.5536 17.276 12.4941 17.276ZM15.8239 13.076L15.4077 12.8868C15.4077 12.8868 14.8022 12.622 14.4239 12.4328C14.386 12.4328 14.3482 12.3949 14.3104 12.3949C14.1968 12.3949 14.1212 12.4328 14.0455 12.4706C14.0455 12.4706 14.0077 12.5084 13.4779 13.1139C13.4401 13.1895 13.3644 13.2274 13.2887 13.2274H13.2509C13.2131 13.2274 13.1374 13.1895 13.0995 13.1517L12.9104 13.076C12.4941 12.8868 12.1158 12.6598 11.8131 12.3571C11.7374 12.2814 11.6239 12.2057 11.5482 12.1301C11.2833 11.8652 11.0185 11.5625 10.8293 11.222L10.7914 11.1463C10.7536 11.1084 10.7536 11.0706 10.7158 10.9949C10.7158 10.9193 10.7158 10.8436 10.7536 10.8057C10.7536 10.8057 10.905 10.6166 11.0185 10.503C11.0941 10.4274 11.132 10.3139 11.2077 10.2382C11.2833 10.1247 11.3212 9.97331 11.2833 9.8598C11.2455 9.67061 10.7914 8.64899 10.6779 8.42196C10.6022 8.30845 10.5266 8.27061 10.4131 8.23277H10.2995C10.2239 8.23277 10.1104 8.23277 9.99684 8.23277C9.92117 8.23277 9.84549 8.27061 9.76982 8.27061L9.73198 8.30845C9.6563 8.34628 9.58063 8.42196 9.50495 8.4598C9.42928 8.53547 9.39144 8.61115 9.31576 8.68682C9.0509 9.02736 8.89955 9.44358 8.89955 9.8598C8.89955 10.1625 8.97522 10.4652 9.08874 10.7301L9.12657 10.8436C9.46711 11.5625 9.92117 12.2057 10.5266 12.7733L10.6779 12.9247C10.7914 13.0382 10.905 13.1139 10.9806 13.2274C11.7752 13.9084 12.6833 14.4003 13.705 14.6652C13.8185 14.703 13.9698 14.703 14.0833 14.7409C14.1968 14.7409 14.3482 14.7409 14.4617 14.7409C14.6509 14.7409 14.8779 14.6652 15.0293 14.5895C15.1428 14.5139 15.2185 14.5139 15.2941 14.4382L15.3698 14.3625C15.4455 14.2868 15.5212 14.249 15.5968 14.1733C15.6725 14.0976 15.7482 14.022 15.786 13.9463C15.8617 13.7949 15.8995 13.6057 15.9374 13.4166C15.9374 13.3409 15.9374 13.2274 15.9374 13.1517C15.9374 13.1517 15.8995 13.1139 15.8239 13.076Z" fill="white"></path>
										</g>
									</g>
									<defs>
										<clipPath id="clip0_135_7009">
											<rect width="24" height="24" fill="white"></rect>
										</clipPath>
									</defs>
								</svg>
							</a>
							<a target="_blank" href="https://t.me/<?php echo $options['telegram'];  ?>" class="me-[26px]">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<g id="Telegram" clip-path="url(#clip0_135_7003)">
										<g id="Telegram_2">
											<path d="M12 0C5.38125 0 0 5.38125 0 12C0 18.6187 5.38125 24 12 24C18.6187 24 24 18.6187 24 12C24 5.38125 18.6187 0 12 0Z" fill="#419FD9"></path>
											<path id="Exclude" fill-rule="evenodd" clip-rule="evenodd" d="M14.6685 17.942C15.5073 18.309 15.8218 17.5401 15.8218 17.5401L18.041 6.39168C18.0235 5.64029 17.01 6.09462 17.01 6.09462L4.58599 10.9699C4.58599 10.9699 3.99187 11.1796 4.04429 11.5465C4.09671 11.9135 4.56851 12.0882 4.56851 12.0882L7.69637 13.1367C7.69637 13.1367 8.63997 16.2296 8.83218 16.8237C9.00693 17.4003 9.16419 17.4178 9.16419 17.4178C9.33893 17.4877 9.4962 17.3654 9.4962 17.3654L11.5232 15.5306L14.6685 17.942ZM15.2099 8.36601C15.2099 8.36601 15.6467 8.10389 15.6292 8.36601C15.6292 8.36601 15.6991 8.40095 15.472 8.64559C15.2623 8.85528 10.3171 13.2937 9.65311 13.8878C9.60069 13.9228 9.56574 13.9752 9.56574 14.0451L9.37353 15.6876C9.33858 15.8624 9.11142 15.8799 9.059 15.7226L8.23771 13.0316C8.20277 12.9267 8.23771 12.8044 8.34256 12.7345L15.2099 8.36601Z" fill="white"></path>
										</g>
									</g>
									<defs>
										<clipPath id="clip0_135_7003">
											<rect width="24" height="24" fill="white"></rect>
										</clipPath>
									</defs>
								</svg>

							</a>
						</div>
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

<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

$options = get_fields( 'option');
?>

<header id="masthead" class="bg-white text-[14px] sticky sm:relative top-0 z-10">
	<div class="container">
		<div class="flex justify-between py-[17px] sm:py-[12px] lg:py-4 items-center">
			<div class="flex gap-[12px] items-center">
				<button id="menu-toggle" aria-controls="primary-menu" aria-expanded="false" class="me-2 group is-active block md:hidden" aria-label="открыть меню">
					<span class="hidden group-[.is-active]:block">
						<svg width="24" height="18" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect width="24" height="2" fill="#393488"/>
							<rect y="8" width="24" height="2" fill="#393488"/>
							<rect y="16" width="24" height="2" fill="#393488"/>
						</svg>
					</span>
					<span class="block group-[.is-active]:hidden">
						<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect x="0.414185" y="17" width="24" height="2" transform="rotate(-45 0.414185 17)" fill="#393488"/>
							<rect x="1.41418" width="24" height="2" transform="rotate(45 1.41418 0)" fill="#393488"/>
						</svg>
					</span>
				</button>
				<?php if ( is_front_page() ) : ?>
					<span class="block w-[103px] sm:w-[165px]">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="flagman" class="w-full object-cover">
					</span>
				<?php else : ?>
					<a class="block w-[103px] sm:w-[165px]" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" alt="flagman" class="w-full object-cover">
					</a>
				<?php endif; ?>
				<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'tw' ); ?>" class="hidden md:block">
					<?php wp_nav_menu([ 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'items_wrap' => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>']); ?>
				</nav>
			</div>
			<div class="flex items-center">
				<a href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>" class="flex gap-1 items-center min-h-7 me-2 lg:me-[38px]" >
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<g clip-path="url(#clip0_135_7015)">
							<circle cx="12" cy="12" r="12" fill="#3A21AA"/>
							<path d="M17.6576 14.48L15.0326 13.355C14.9204 13.3072 14.7958 13.2971 14.6775 13.3263C14.5591 13.3554 14.4534 13.4223 14.3763 13.5167L13.2138 14.937C11.3894 14.0768 9.92114 12.6085 9.06094 10.7841L10.4812 9.6216C10.5759 9.54465 10.6428 9.43897 10.672 9.32056C10.7012 9.20215 10.691 9.07745 10.643 8.96535L9.51797 6.34035C9.46526 6.21951 9.37204 6.12085 9.25438 6.06138C9.13672 6.00191 9.00199 5.98535 8.87344 6.01457L6.43594 6.57707C6.31199 6.60569 6.20141 6.67548 6.12223 6.77505C6.04306 6.87461 5.99997 6.99807 6 7.12528C6 13.137 10.8727 18.0003 16.875 18.0003C17.0022 18.0004 17.1258 17.9573 17.2254 17.8781C17.325 17.7989 17.3948 17.6883 17.4234 17.5643L17.9859 15.1268C18.015 14.9977 17.9981 14.8624 17.9381 14.7443C17.8782 14.6263 17.779 14.5328 17.6576 14.48Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_7015">
								<rect width="24" height="24" fill="white"/>
							</clipPath>
						</defs>
					</svg>
					<span class="text-sm font-bold hidden lg:block">
						<?php echo $options['phone'];?>
					</span>
				</a>
				<div class="flex gap-1 md:gap-2 items-center">
					<span class="tracking-tight leading-[18px] font-bold hidden lg:block">Написать:</span>
					<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="WhatsApp" clip-path="url(#clip0_135_7009)">
								<g id="WhatsApp_2">
									<path d="M12 0C5.376 0 0 5.376 0 12C0 18.624 5.376 24 12 24C18.624 24 24 18.624 24 12C24 5.376 18.624 0 12 0Z" fill="#0DC143"/>
									<path id="Vector" d="M17.3752 6.60574C16.0887 5.28142 14.3104 4.5625 12.4941 4.5625C8.63468 4.5625 5.53198 7.70304 5.56982 11.5247C5.56982 12.7355 5.91036 13.9084 6.47792 14.9679L5.49414 18.5625L9.16441 17.6166C10.186 18.1841 11.3212 18.449 12.4563 18.449C16.2779 18.449 19.3806 15.3084 19.3806 11.4868C19.3806 9.63277 18.6617 7.89223 17.3752 6.60574ZM12.4941 17.276C11.4725 17.276 10.4509 17.0111 9.58063 16.4814L9.3536 16.3679L7.15901 16.9355L7.72657 14.7787L7.57522 14.5517C5.91036 11.8652 6.70495 8.30845 9.42928 6.64358C12.1536 4.97872 15.6725 5.77331 17.3374 8.49764C19.0022 11.222 18.2077 14.7409 15.4833 16.4057C14.6131 16.9733 13.5536 17.276 12.4941 17.276ZM15.8239 13.076L15.4077 12.8868C15.4077 12.8868 14.8022 12.622 14.4239 12.4328C14.386 12.4328 14.3482 12.3949 14.3104 12.3949C14.1968 12.3949 14.1212 12.4328 14.0455 12.4706C14.0455 12.4706 14.0077 12.5084 13.4779 13.1139C13.4401 13.1895 13.3644 13.2274 13.2887 13.2274H13.2509C13.2131 13.2274 13.1374 13.1895 13.0995 13.1517L12.9104 13.076C12.4941 12.8868 12.1158 12.6598 11.8131 12.3571C11.7374 12.2814 11.6239 12.2057 11.5482 12.1301C11.2833 11.8652 11.0185 11.5625 10.8293 11.222L10.7914 11.1463C10.7536 11.1084 10.7536 11.0706 10.7158 10.9949C10.7158 10.9193 10.7158 10.8436 10.7536 10.8057C10.7536 10.8057 10.905 10.6166 11.0185 10.503C11.0941 10.4274 11.132 10.3139 11.2077 10.2382C11.2833 10.1247 11.3212 9.97331 11.2833 9.8598C11.2455 9.67061 10.7914 8.64899 10.6779 8.42196C10.6022 8.30845 10.5266 8.27061 10.4131 8.23277H10.2995C10.2239 8.23277 10.1104 8.23277 9.99684 8.23277C9.92117 8.23277 9.84549 8.27061 9.76982 8.27061L9.73198 8.30845C9.6563 8.34628 9.58063 8.42196 9.50495 8.4598C9.42928 8.53547 9.39144 8.61115 9.31576 8.68682C9.0509 9.02736 8.89955 9.44358 8.89955 9.8598C8.89955 10.1625 8.97522 10.4652 9.08874 10.7301L9.12657 10.8436C9.46711 11.5625 9.92117 12.2057 10.5266 12.7733L10.6779 12.9247C10.7914 13.0382 10.905 13.1139 10.9806 13.2274C11.7752 13.9084 12.6833 14.4003 13.705 14.6652C13.8185 14.703 13.9698 14.703 14.0833 14.7409C14.1968 14.7409 14.3482 14.7409 14.4617 14.7409C14.6509 14.7409 14.8779 14.6652 15.0293 14.5895C15.1428 14.5139 15.2185 14.5139 15.2941 14.4382L15.3698 14.3625C15.4455 14.2868 15.5212 14.249 15.5968 14.1733C15.6725 14.0976 15.7482 14.022 15.786 13.9463C15.8617 13.7949 15.8995 13.6057 15.9374 13.4166C15.9374 13.3409 15.9374 13.2274 15.9374 13.1517C15.9374 13.1517 15.8995 13.1139 15.8239 13.076Z" fill="white"/>
								</g>
							</g>
							<defs>
								<clipPath id="clip0_135_7009">
									<rect width="24" height="24" fill="white"/>
								</clipPath>
							</defs>
						</svg>
					</a>
					<!--<a target="_blank" href="tg://resolve?domain=<?php /*echo $options['telegram'];  */?>" class="me-[26px]">-->
					<a target="_blank" href="https://t.me/<?php echo $options['telegram'];  ?>" class="lg:me-[26px]">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<g id="Telegram" clip-path="url(#clip0_135_7003)">
								<g id="Telegram_2">
									<path  d="M12 0C5.38125 0 0 5.38125 0 12C0 18.6187 5.38125 24 12 24C18.6187 24 24 18.6187 24 12C24 5.38125 18.6187 0 12 0Z" fill="#419FD9"/>
									<path id="Exclude" fill-rule="evenodd" clip-rule="evenodd" d="M14.6685 17.942C15.5073 18.309 15.8218 17.5401 15.8218 17.5401L18.041 6.39168C18.0235 5.64029 17.01 6.09462 17.01 6.09462L4.58599 10.9699C4.58599 10.9699 3.99187 11.1796 4.04429 11.5465C4.09671 11.9135 4.56851 12.0882 4.56851 12.0882L7.69637 13.1367C7.69637 13.1367 8.63997 16.2296 8.83218 16.8237C9.00693 17.4003 9.16419 17.4178 9.16419 17.4178C9.33893 17.4877 9.4962 17.3654 9.4962 17.3654L11.5232 15.5306L14.6685 17.942ZM15.2099 8.36601C15.2099 8.36601 15.6467 8.10389 15.6292 8.36601C15.6292 8.36601 15.6991 8.40095 15.472 8.64559C15.2623 8.85528 10.3171 13.2937 9.65311 13.8878C9.60069 13.9228 9.56574 13.9752 9.56574 14.0451L9.37353 15.6876C9.33858 15.8624 9.11142 15.8799 9.059 15.7226L8.23771 13.0316C8.20277 12.9267 8.23771 12.8044 8.34256 12.7345L15.2099 8.36601Z" fill="white"/>
								</g>
							</g>
							<defs>
								<clipPath id="clip0_135_7003">
									<rect width="24" height="24" fill="white"/>
								</clipPath>
							</defs>
						</svg>

					</a>
					<a href="<?php echo esc_url(get_permalink(48)); ?>" class="ms-2 sm:ms-0  relative flex items-center w-6 h-6 lg:me-0.5 group" id="product-count">
						<svg class="block group-[:hover]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M15.449 4C13.9552 4 12.5214 4.69543 11.5856 5.79438C10.6497 4.69543 9.21594 4 7.72205 4C5.0777 4 3 6.0777 3 8.72205C3 11.9674 5.91909 14.6117 10.3406 18.6298L11.5856 19.7545L12.8305 18.6212C17.252 14.6117 20.1711 11.9674 20.1711 8.72205C20.1711 6.0777 18.0934 4 15.449 4ZM11.6714 17.3505L11.5856 17.4364L11.4997 17.3505C7.41297 13.6502 4.71711 11.2033 4.71711 8.72205C4.71711 7.00494 6.00494 5.71711 7.72205 5.71711C9.04423 5.71711 10.3321 6.56708 10.7871 7.7433H12.3926C12.839 6.56708 14.1269 5.71711 15.449 5.71711C17.1662 5.71711 18.454 7.00494 18.454 8.72205C18.454 11.2033 15.7581 13.6502 11.6714 17.3505Z" fill="#373F41"/>
						</svg>
						<svg class="hidden group-[:hover]:block" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M15.449 4C13.9552 4 12.5214 4.69543 11.5856 5.79438C10.6497 4.69543 9.21594 4 7.72205 4C5.0777 4 3 6.0777 3 8.72205C3 11.9674 5.91909 14.6117 10.3406 18.6298L11.5856 19.7545L12.8305 18.6212C17.252 14.6117 20.1711 11.9674 20.1711 8.72205C20.1711 6.0777 18.0934 4 15.449 4ZM11.6714 17.3505L11.5856 17.4364L11.4997 17.3505C7.41297 13.6502 4.71711 11.2033 4.71711 8.72205C4.71711 7.00494 6.00494 5.71711 7.72205 5.71711C9.04423 5.71711 10.3321 6.56708 10.7871 7.7433H12.3926C12.839 6.56708 14.1269 5.71711 15.449 5.71711C17.1662 5.71711 18.454 7.00494 18.454 8.72205C18.454 11.2033 15.7581 13.6502 11.6714 17.3505Z" fill="#FF7A45"/>
						</svg>
						<div class="left-[13px] top-[5px] absolute flex text-center justify-center text-white font-bold bg-[#FF7A45] rounded-full w-[12px] h-[12px] border-2 border-white">
							<span class="text-[6px] w-full flex items-center justify-center bold tracking-[-0.2px]">0</span>
						</div>
					</a>
				</div>
			</div>
		</div>


	</div>

</header><!-- #masthead -->

<!-- Меню для мобильной версии -->
<?php get_template_part( 'template-parts/layout/m_menu', 'content' ); ?>


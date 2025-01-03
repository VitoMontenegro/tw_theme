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


<div id="mobile-menu" class="px-4 z-10 fixed top:105px sm:top-[125px] left-0 w-full max-w-[455px]  bg-white transform -translate-x-full transition-transform duration-300 ease-in-out font-bold h-screen overflow-auto">
	<?php $categories = get_nested_categories('excursion_category'); ?>
	<?php if (!empty($categories)) : ?>
		<ul class="flex flex-col gap-6 mt-6">
			<?php foreach ($categories as $category) : ?>
				<li class="group relative">
					<div class="flex items-start">
						<a href="<?php echo esc_url($category['link']) ?>" class="text-[18px] font-bold me-8 max-w-[200px]">
							<?php echo esc_html($category['name'])?>
						</a>
						<svg class="mt-1.5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
							<path d="M2.5 6.25L10 13.75L17.5 6.25" stroke="#373F41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<ul class="submenu mt-3 w-full px-4 z-10  flex-col gap-2  hidden group-hover:flex rounded-md">
						<?php foreach ($category["children"] as $child) : ?>
							<li class="my-2">
								<a href="<?php echo esc_url($child['link']) ?>" class="text-[16px] px-1 font-semibold py-2">
									<?php echo esc_html($child['name'])?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>
	<?php wp_nav_menu([ 'theme_location' => 'menu-1', 'items_wrap' => '<ul class="flex flex-col mt-6 gap-6" aria-label="submenu">%3$s</ul>']); ?>
	<div class="block mt-6 mb-6">
		<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="inline-flex text-white px-8 py-2.5 bg-[#30d26e] rounded-full justify-center items-center gap-2 mb-3">
			<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
			</svg>
			<span>Написать в WhatsApp</span>
		</a>
		<button class="flex text-white px-8 py-2.5 bg-[#FF7A45] rounded-full justify-center items-center gap-2 mb-3">
			<span class="text-center text-white text-sm font-bold  leading-tight">Оставить заявку</span>
		</button>
	</div>
	<span class="relative left-[-16px]">
		<svg xmlns="http://www.w3.org/2000/svg" width="219" height="103" viewBox="0 0 219 103" fill="none">
            <path d="M144 42.3742C124.016 49.6204 101.693 50.6358 81.0987 45.2337C72.2965 42.9266 63.4692 39.2386 57.6401 32.4229C51.8109 25.6073 49.8568 15.0549 55.118 7.81681C61.2311 -0.59915 75.1442 -1.04594 83.3201 5.50161C91.4959 12.0492 94.1683 23.5521 92.0889 33.6496C90.001 43.7471 83.8713 52.6261 76.9314 60.4084C57.2058 82.5206 29.4965 97.3542 0 103" stroke="#393488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 6"/>
            <path d="M217.997 10.9977L158.417 26.1597L156.824 26.5568L156.681 26.3322L150.07 34.9215L151.78 17.0009L144.16 6.21191L217.997 10.9977Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M217.996 10.9976L170.613 49.0855L159.929 31.6351L156.823 26.5567L158.416 26.1596L217.996 10.9976Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M217.995 10.9976L158.415 26.1596L156.678 26.332L217.995 10.9976Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M151.782 17.0007L218 10.9976L156.689 26.332L150.073 34.9214L151.782 17.0007Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M150.073 34.9212L160.48 32.5283" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
	</span>
</div>

<?php
/**
 * Template part for displaying the submenu content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>


<!-- Подменю -->
<section class="bg-[#DED7FC] p-4">
	<div class="container mx-auto px-4">
		<div class="flex justify-between items-center">
			<?php $categories = get_nested_categories('excursion_category'); ?>
			<?php if (!empty($categories)) : ?>
				<ul class="flex items-center gap-8 hidden sm:flex">
					<?php foreach ($categories as $category) : ?>
						<li class="group relative">
							<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-semibold  flex items-center gap-2">
								<?php echo esc_html($category['name'])?>
								<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
									<g clip-path="url(#clip0_135_6833)">
										<path d="M1.5 3.75L6 8.25L10.5 3.75" stroke="#373F41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
									<defs>
										<clipPath id="clip0_135_6833">
											<rect width="12" height="12" fill="white" transform="translate(12) rotate(90)"/>
										</clipPath>
									</defs>
								</svg>
							</a>
							<ul class="submenu absolute bg-white w-full px-4 py-4 z-10  flex-col gap-2 border hidden group-hover:flex rounded-md">
								<?php foreach ($category["children"] as $child) : ?>
									<li>
										<a href="<?php echo esc_url($child['link']) ?>" class="text-sm px-1">
											<?php echo esc_html($child['name'])?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<form class="search-form flex px-4 py-2 bg-white items-center rounded-md border border-[#B8B9B9] w-full md:w-[240px]">
				<button type="submit" class="me-3">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
						<path d="M18.0126 16.9873L17.9419 17.058L18.0126 16.9873L14.165 13.1405C15.2765 11.77 15.8287 10.0285 15.7084 8.26582C15.586 6.47275 14.777 4.79591 13.4497 3.58412C12.1225 2.37233 10.3791 1.71888 8.58234 1.75971C6.78557 1.80055 5.07371 2.53252 3.80287 3.80336C2.53203 5.0742 1.80006 6.78606 1.75923 8.58283C1.71839 10.3796 2.37184 12.123 3.58363 13.4502C4.79542 14.7775 6.47226 15.5865 8.26533 15.7089C10.028 15.8292 11.7695 15.277 13.14 14.1655L16.9868 18.0131L17.0575 17.9424L16.9868 18.0131C17.0541 18.0804 17.1341 18.1339 17.2221 18.1703C17.3101 18.2068 17.4044 18.2255 17.4997 18.2255C17.5949 18.2255 17.6893 18.2068 17.7773 18.1703C17.8653 18.1339 17.9452 18.0804 18.0126 18.0131C18.0799 17.9457 18.1334 17.8658 18.1698 17.7778C18.2063 17.6898 18.225 17.5954 18.225 17.5002C18.225 17.4049 18.2063 17.3106 18.1698 17.2226C18.1334 17.1346 18.0799 17.0546 18.0126 16.9873ZM3.22469 8.75018C3.22469 7.65744 3.54873 6.58923 4.15582 5.68065C4.76292 4.77207 5.6258 4.06392 6.63536 3.64574C7.64493 3.22757 8.75582 3.11816 9.82756 3.33134C10.8993 3.54452 11.8838 4.07073 12.6565 4.84341C13.4291 5.6161 13.9553 6.60056 14.1685 7.6723C14.3817 8.74405 14.2723 9.85494 13.8541 10.8645C13.436 11.8741 12.7278 12.737 11.8192 13.344C10.9107 13.9511 9.8425 14.2752 8.7498 14.2752C7.28495 14.2736 5.88056 13.6909 4.84475 12.6551C3.80897 11.6193 3.22634 10.215 3.22469 8.75018Z" fill="#373F41" stroke="#373F41" stroke-width="0.2"/>
					</svg>
				</button>
				<input type="text" placeholder="Что вы ищете?" class="sm:max-w-[178px]">
			</form>
		</div>
	</div>

</section>

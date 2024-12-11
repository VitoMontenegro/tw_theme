<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

$options = get_fields( 'option');
$fields = get_fields();

$video_after_gates = $fields['video_after_gates'] ?? '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div id="posts-container" class="container mx-auto">
		<div class="grid grid-cols-12 gap-5 sm:gap-6 p-5 sm:p-6 rounded-2xl bg-white">
			<div class="lg:col-span-7 col-span-12">

				<div class="swiper_tour flex flex-col sm:flex-row gap-2">
					<div class="swiper mySwiper2 w-full h-[200px] sm:h-[448px] mx-auto">
						<div class="swiper-wrapper">
							<?php if ($video_after_gates && !empty($video_after_gates)): ?>
								<div class="cursor-pointer swiper-slide text-center flex justify-center items-center bg-cover rounded-md overflow-hidden relative">
									<!-- Превью изображения для видео -->
									<img src="https://img.youtube.com/vi/<?php echo getYoutubeEmbedUrl($video_after_gates) ?>/0.jpg"
										 class="block w-full h-full object-cover image-slide video-preview"
										 data-video-id="<?php echo getYoutubeEmbedUrl($video_after_gates) ?>"
										 alt="Video Preview" />

									<!-- Значок play, который будет по центру -->
									<svg xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none" class="pointer-events-none absolute inset-0 m-auto">
										<g filter="url(#filter0_d_135_6229)">
											<path d="M59 36.268C60.3333 37.0378 60.3333 38.9622 59 39.7321L21.5 61.3827C20.1667 62.1525 18.5 61.1902 18.5 59.6506L18.5 16.3494C18.5 14.8098 20.1667 13.8475 21.5 14.6173L59 36.268Z" fill="white" fill-opacity="0.75" shape-rendering="crispEdges"></path>
										</g>
										<defs>
											<filter id="filter0_d_135_6229" x="0.5" y="0.346191" width="77.5" height="83.3076" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
												<feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
												<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
												<feOffset dy="4"></feOffset>
												<feGaussianBlur stdDeviation="9"></feGaussianBlur>
												<feComposite in2="hardAlpha" operator="out"></feComposite>
												<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"></feColorMatrix>
												<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_135_6229"></feBlend>
												<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_135_6229" result="shape"></feBlend>
											</filter>
										</defs>
									</svg>
								</div>
							<?php endif; ?>
							<?php foreach ($fields["gallery"] as $image) : ?>
								<div class="swiper-slide text-center flex justify-center items-center bg-cover rounded-md overflow-hidden">
									<img src="<?php echo $image["sizes"]["medium_large"] ?>" class="block w-full h-full object-cover" alt="<?php echo $image["title"] ?>" />
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
					<div class="swiper mySwiper w-full sm:w-[136px] h-[67px] sm:h-[448px] mx-auto">
						<div class="swiper-wrapper w-full">
							<?php if ($video_after_gates && !empty($video_after_gates)): ?>
								<div class="swiper-slide text-center flex justify-center items-center bg-cover rounded-md overflow-hidden">
									<!-- Превью изображения для видео -->
									<img src="https://img.youtube.com/vi/<?php echo getYoutubeEmbedUrl($video_after_gates) ?>/0.jpg"
										 class="block w-full h-full object-cover image-slide video-preview"
										 data-video-id="<?php echo getYoutubeEmbedUrl($video_after_gates) ?>"
										 alt="Video Preview" />
								</div>
							<?php endif; ?>
							<?php foreach ($fields["gallery"] as $image) : ?>
								<div class="swiper-slide text-center flex justify-center items-center bg-cover cursor-pointer rounded-md overflow-hidden">
									<img src="<?php echo $image["sizes"]["medium_large"] ?>" class="block min-w-[106px] h-full w-full object-cover" alt="<?php echo $image["title"] ?>" />
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>

				<div id="popup" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-70 z-50 flex items-center justify-center">
					<div id="popup-media-container" class="relative max-w-full max-h-full p-4 bg-white">
						<!-- Здесь будет отображаться контент (изображение или видео) -->
					</div>
					<button id="popup-close" class="absolute top-4 right-4 text-white text-2xl">X</button>
				</div>

			</div>
			<div class="lg:col-span-5 col-span-12">
				<div class="flex items-center justify-between w-full">
					<div class="flex items-center gap-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M12 3C7.02823 3 3 7.02823 3 12C3 16.9718 7.02823 21 12 21C16.9718 21 21 16.9718 21 12C21 7.02823 16.9718 3 12 3ZM12 19.2581C7.98992 19.2581 4.74194 16.0101 4.74194 12C4.74194 7.98992 7.98992 4.74194 12 4.74194C16.0101 4.74194 19.2581 7.98992 19.2581 12C19.2581 16.0101 16.0101 19.2581 12 19.2581ZM14.2427 15.4694L11.1617 13.2302C11.0492 13.1468 10.9839 13.0161 10.9839 12.8782V6.91935C10.9839 6.67984 11.1798 6.48387 11.4194 6.48387H12.5806C12.8202 6.48387 13.0161 6.67984 13.0161 6.91935V12.0617L15.4403 13.8254C15.6363 13.9669 15.6762 14.2391 15.5347 14.4351L14.8524 15.375C14.7109 15.5673 14.4387 15.6109 14.2427 15.4694Z" fill="#373F41"/>
						</svg>
						<div class="font-bold">Продолжительность: <?php echo $fields['duration']['label']; ?></div>
					</div>
						<button class="wish-btn flex items-center gap-1 group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
							<span class="icon">
								<span class="icon h-6 w-6 flex items-center justify-center bg-white rounded-full">
									 <svg class="w-4 h-4 fill-transparent stroke-current text-[#000] group-[.active]:text-red-600 group-[.active]:fill-red-600 stroke-1" viewBox="0 0 24 24">
										  <path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
									 </svg>
								</span>
							</span>
							<span class="bold">Добавить в избранное</span>
						</button>
				</div>
				<header class="entry-header mb-2 sm:mb-6">
					<?php the_title( '<h1 class="mt-4 mb-2 sm:mt-6 sm:mb-6 text-[15px] sm:text-[30px] font-bold sm:leading-9">', '</h1>' ); ?>
				</header>
				<div class="mb-2">Стоимость за человека:</div>
				<div class="flex flex-wrap items-center gap-4 mb-4">
					<div class="bg-[#ffe7db] text-[#ff7642] text-[22px] rounded-lg px-2 pt-0.5 pb-1 font-bold">
						от <?php echo $fields['discount_price'];?> ₽
					</div>
					<div class="text-center text-[#999999] text-[18px] font-medium leading-tight line-through font-medium ">
						от <?php echo $fields['price'];?> ₽
					</div>
				</div>
				<div class=" mb-5 sm:mb-10">
					<a href="#prices" class="text-[#999999] underline decoration-dotted">Подробные цены</a>
				</div>
				<div class="block sm:flex gap-3">
					<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="inline-flex text-white px-8 py-2.5 bg-[#30d26e] rounded-full justify-center items-center gap-2 mb-3 hover:bg-[#1ABF59]">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
						</svg>
						<span>Спросить в WhatsApp</span>
					</a>
					<button class="flex text-white px-8 py-2.5 bg-[#ff7642] rounded-full justify-center items-center gap-2 mb-3 hover:bg-[#ff6931]">
						<span class="text-center text-white text-sm font-bold  leading-tight">Записаться</span>
					</button>
				</div>
			</div>
		</div>

		<div class="bg-[#DED7FC] px-5 py-5 sm:py-[18px] sm:px-8 flex flex-col gap-3 sm:flex-row sm:gap-8 mt-5 sm:mt-3 mb-5 sm:mb-[18px] rounded-xl">
			<a href="#" class="font-bold hover:text-[#3A21AA]">Описание</a>
			<a href="#" class="font-bold hover:text-[#3A21AA]">Программа</a>
			<a href="#" class="font-bold hover:text-[#3A21AA]">Стоимость</a>
			<a href="#" class="font-bold hover:text-[#3A21AA]">Что понадобится для оформления поездки?</a>
			<a href="#" class="font-bold hover:text-[#3A21AA]">Автобусы</a>
			<a href="#" class="font-bold hover:text-[#3A21AA]">Отзывы</a>
		</div>

		<div class="flex gap-6">
			<div class="max-w-[455px] h-full lg:w-[256px] min-w-[256px]">
				<div class="bg-white p-4 rounded-lg">
					<?php $categories = get_nested_categories_by_parent(0,'excursion_category'); ?>
					<?php if (!empty($categories)) : ?>
						<ul class="flex flex-col gap-5">
							<?php foreach ($categories as $category) : ?>
								<li class="flex flex-col gap-3">
									<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold">
										<?php $fields = get_fields('excursion_category_' . $category['id']); ?>
										<?php echo esc_html($fields['title_double'])?>
									</a>
									<ul class="flex flex-col gap-1.5">
										<?php foreach ($category["children"] as $child) : ?>
											<li class="group<?php echo is_current_category($child["id"]) ? ' active' : ''; ?>">
												<?php $link = $child["single_post_slug"] ?? $child['link']; ?>
												<a href="<?php echo $link; ?>" class="group-[.active]:text-[#927CF5]">
													<?php echo esc_html($child['name'])?>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
					<div class="p-4 flex flex-col gap-4">
						<div class="text-sm font-bold">Работаем официально по лицензии №</div>
						<div class="image_block">
							<img src="" alt="">
							<img src="" alt="">
						</div>
						<div class="text-[#878787] tracking-tight">
							Страхование пассажиров
							Лого страховой компании, краткий текст про обязательное страхование и № страховки
						</div>
					</div>
			</div>
			<div class="entry-content">

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
			</div>

			<footer class="entry-footer">
				<?php tw_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</div>

</article><!-- #post-${ID} -->

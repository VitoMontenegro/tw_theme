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
$video_rutube = $fields['video_rutube'] ?? '';
$video_dzen = $fields['video_dzen'] ?? '';

$sub = array(".01." => " января ", ".02." => " февраля ",
		".03." => " марта ", ".04." => " апреля ", ".05." => " мая ", ".06." => " июня ",
		".07." => " июля ", ".08." => " августа ", ".09." => " сентября ",
		".10." => " октября ", ".11." => " ноября ", ".12." => " декабря ", "2022" => '', '2023' => '', '2024'=>'', '2025'=>'','2026'=>'','00:00'=>'');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div id="posts-container" class="container">
		<div class="grid grid-cols-12 lg:grid-cols-15 p-4 sm:p-8 rounded-2xl bg-white">
			<div class="col-span-12 lg:col-span-8 ">
				<div class="swiper_tour flex flex-col sm:flex-row gap-2">
					<div class="swiper mySwiper2 w-full sm:h-[448px] lg:max-w-[460px] h-[200px] mx-auto">
						<div class="swiper-wrapper">
							<?php if($video_dzen || $video_rutube || $video_after_gates): ?>
								<div class="cursor-pointer swiper-slide text-center flex justify-center items-center bg-cover rounded-md overflow-hidden relative">
								<?php if ($video_dzen && !empty($video_dzen) && !empty($fields["izobrazhenie_dlya_prevyu_video"])): ?>
									<?php $imagePrev = $fields["izobrazhenie_dlya_prevyu_video"];?>
									<img src="<?php echo $imagePrev; ?>"
										 class="block w-full h-full object-cover image-slide video-preview"
										 data-video-id="<?php echo getDzenEmbedUrl($video_dzen) ?>"
										 data-video-type="dzen"
										 data-fancybox="gallery"
										 alt="Video Preview"
									/>
								<?php elseif ($video_rutube && !empty($video_rutube) && !empty($fields["izobrazhenie_dlya_prevyu_video"])): ?>
									<?php $imagePrev = $fields["izobrazhenie_dlya_prevyu_video"];?>
									<img src="<?php echo $imagePrev; ?>"
										 class="block w-full h-full object-cover image-slide video-preview"
										 data-video-id="<?php echo getRuTubeEmbedUrl($video_rutube) ?>"
										 data-video-type="rutube"
										 data-fancybox="gallery"
										 alt="Video Preview"
									/>

								<?php elseif ($video_after_gates && !empty($video_after_gates)): ?>
									<?php $imagePrev = !empty($fields["izobrazhenie_dlya_prevyu_video"]) ? $fields["izobrazhenie_dlya_prevyu_video"] : "https://img.youtube.com/vi/" .getYoutubeEmbedUrl($video_after_gates). "/0.jpg" ;?>
									<img src="<?php echo $imagePrev; ?>"
										 class="block w-full h-full object-cover image-slide video-preview"
										 data-video-id="<?php echo getYoutubeEmbedUrl($video_after_gates) ?>"
										 data-video-type="youtube"
										 data-fancybox="gallery"
										 alt="Video Preview"
									/>
								<?php endif; ?>

								<svg xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none"  class="pointer-events-none absolute inset-0 m-auto">
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
									<img data-fancybox="gallery" src="<?php echo $image["url"] ?>" class="block w-full h-full object-cover" alt="<?php echo $image["title"] ?>" />
								</div>
							<?php endforeach; ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
					<div class="swiper mySwiper w-full h-[54px] sm:h-[448px] sm:w-[104px] sm:min-w-[104px] mx-auto">
						<div class="swiper-wrapper w-full">
							<?php if($video_dzen || $video_rutube || $video_after_gates): ?>
								<div class="swiper-slide text-center flex justify-center items-center cursor-pointer bg-cover rounded-md overflow-hidden">
									<?php if ($video_dzen && !empty($video_dzen) && !empty($fields["izobrazhenie_dlya_prevyu_video"])): ?>
										<?php $imagePrev = $fields["izobrazhenie_dlya_prevyu_video"];?>
										<img src="<?php echo $imagePrev; ?>"
											 class="block w-full h-full object-cover image-slide video-preview"
											 data-video-id="<?php echo getDzenEmbedUrl($video_dzen) ?>"
											 data-video-type="dzen"
											 alt="Video Preview"
										/>
									<?php elseif ($video_rutube && !empty($video_rutube) && !empty($fields["izobrazhenie_dlya_prevyu_video"])): ?>
										<?php $imagePrev = $fields["izobrazhenie_dlya_prevyu_video"];?>
										<img src="<?php echo $imagePrev; ?>"
											 class="block w-full h-full object-cover image-slide video-preview"
											 data-video-id="<?php echo getRuTubeEmbedUrl($video_rutube) ?>"
											 data-video-type="rutube"
											 alt="Video Preview"
										/>

									<?php elseif ($video_after_gates && !empty($video_after_gates)): ?>
										<?php $imagePrev = !empty($fields["izobrazhenie_dlya_prevyu_video"]) ? $fields["izobrazhenie_dlya_prevyu_video"] : "https://img.youtube.com/vi/" .getYoutubeEmbedUrl($video_after_gates). "/0.jpg" ;?>
										<img src="<?php echo $imagePrev; ?>"
											 class="block w-full h-full object-cover image-slide video-preview"
											 data-video-id="<?php echo getYoutubeEmbedUrl($video_after_gates) ?>"
											 data-video-type="youtube"
											 alt="Video Preview"
										/>
									<?php endif; ?>
									<svg style="width: 40%; max-width: 40px" xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none" class="pointer-events-none absolute inset-0 m-auto">
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
								<div class="swiper-slide text-center flex justify-center items-center bg-cover cursor-pointer rounded-md overflow-hidden">
									<img src="<?php echo $image["sizes"]["medium_large"] ?>" class="block min-w-[106px] h-full w-full object-cover" alt="<?php echo $image["title"] ?>" />
								</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>

			</div>
			<div class="lg:col-span-7 col-span-12 lg:ps-10 mt-1 sm:mt-4 lg:mt-0">
				<div class="justify-end hidden md:flex">
					<button class="wish-btn flex items-center gap-1 group" data-wp-id="<?php echo get_the_ID(); ?>" aria-label="Добавить в избранное">
						<svg class="block group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M15.449 4C13.9552 4 12.5214 4.69543 11.5856 5.79438C10.6497 4.69543 9.21594 4 7.72205 4C5.0777 4 3 6.0777 3 8.72205C3 11.9674 5.91909 14.6117 10.3406 18.6298L11.5856 19.7545L12.8305 18.6212C17.252 14.6117 20.1711 11.9674 20.1711 8.72205C20.1711 6.0777 18.0934 4 15.449 4ZM11.6714 17.3505L11.5856 17.4364L11.4997 17.3505C7.41297 13.6502 4.71711 11.2033 4.71711 8.72205C4.71711 7.00494 6.00494 5.71711 7.72205 5.71711C9.04423 5.71711 10.3321 6.56708 10.7871 7.7433H12.3926C12.839 6.56708 14.1269 5.71711 15.449 5.71711C17.1662 5.71711 18.454 7.00494 18.454 8.72205C18.454 11.2033 15.7581 13.6502 11.6714 17.3505Z" fill="#373F41"/>
						</svg>
						<svg class="hidden group-[.active]:block " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M15.449 4C13.9552 4 12.5214 4.69543 11.5856 5.79438C10.6497 4.69543 9.21594 4 7.72205 4C5.0777 4 3 6.0777 3 8.72205C3 11.9674 5.91909 14.6117 10.3406 18.6298L11.5856 19.7545L12.8305 18.6212C17.252 14.6117 20.1711 11.9674 20.1711 8.72205C20.1711 6.0777 18.0934 4 15.449 4ZM11.6714 17.3505L11.5856 17.4364L11.4997 17.3505C7.41297 13.6502 4.71711 11.2033 4.71711 8.72205C4.71711 7.00494 6.00494 5.71711 7.72205 5.71711C9.04423 5.71711 10.3321 6.56708 10.7871 7.7433H12.3926C12.839 6.56708 14.1269 5.71711 15.449 5.71711C17.1662 5.71711 18.454 7.00494 18.454 8.72205C18.454 11.2033 15.7581 13.6502 11.6714 17.3505Z" fill="#FF7A45"/>
						</svg>
						<span class="bold block group-[.active]:hidden">Добавить в избранное</span>
						<span class="bold hidden group-[.active]:block text-[#FF7A45]">Удалить из избранного</span>
						</button>
				</div>
				<header class="entry-header">
					<h1 class="mt-2 mb-2 sm:mb-3 text-[16px] sm:text-[30px] font-bold sm:leading-9 tracking-[0.1px]"><?php the_title(); ?></h1>
				</header>

				<div class="flex flex-col sm:flex-row md:items-center mb-2 sm:mb-2 md:mb-3 lg:mb-[18px] gap-1 sm:gap-4 lg:gap-3">
					<?php if($fields['duration_main']):?>
						<div class="flex items-center gap-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M12 3C7.02823 3 3 7.02823 3 12C3 16.9718 7.02823 21 12 21C16.9718 21 21 16.9718 21 12C21 7.02823 16.9718 3 12 3ZM12 19.2581C7.98992 19.2581 4.74194 16.0101 4.74194 12C4.74194 7.98992 7.98992 4.74194 12 4.74194C16.0101 4.74194 19.2581 7.98992 19.2581 12C19.2581 16.0101 16.0101 19.2581 12 19.2581ZM14.2427 15.4694L11.1617 13.2302C11.0492 13.1468 10.9839 13.0161 10.9839 12.8782V6.91935C10.9839 6.67984 11.1798 6.48387 11.4194 6.48387H12.5806C12.8202 6.48387 13.0161 6.67984 13.0161 6.91935V12.0617L15.4403 13.8254C15.6363 13.9669 15.6762 14.2391 15.5347 14.4351L14.8524 15.375C14.7109 15.5673 14.4387 15.6109 14.2427 15.4694Z" fill="#373F41"/>
							</svg>
							<div class="font-bold">Длительность: <?php echo $fields['duration_main']; ?></div>
						</div>
					<?php else: ?>
						<div class="flex items-center gap-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M12 3C7.02823 3 3 7.02823 3 12C3 16.9718 7.02823 21 12 21C16.9718 21 21 16.9718 21 12C21 7.02823 16.9718 3 12 3ZM12 19.2581C7.98992 19.2581 4.74194 16.0101 4.74194 12C4.74194 7.98992 7.98992 4.74194 12 4.74194C16.0101 4.74194 19.2581 7.98992 19.2581 12C19.2581 16.0101 16.0101 19.2581 12 19.2581ZM14.2427 15.4694L11.1617 13.2302C11.0492 13.1468 10.9839 13.0161 10.9839 12.8782V6.91935C10.9839 6.67984 11.1798 6.48387 11.4194 6.48387H12.5806C12.8202 6.48387 13.0161 6.67984 13.0161 6.91935V12.0617L15.4403 13.8254C15.6363 13.9669 15.6762 14.2391 15.5347 14.4351L14.8524 15.375C14.7109 15.5673 14.4387 15.6109 14.2427 15.4694Z" fill="#373F41"/>
							</svg>
							<div class="font-bold">Длительность: <?php echo $fields['duration']['label']; ?></div>
						</div>
					<?php endif; ?>
					<?php if($fields['duration_second']):?>
						<div class="flex items-center gap-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M12 3C7.02823 3 3 7.02823 3 12C3 16.9718 7.02823 21 12 21C16.9718 21 21 16.9718 21 12C21 7.02823 16.9718 3 12 3ZM12 19.2581C7.98992 19.2581 4.74194 16.0101 4.74194 12C4.74194 7.98992 7.98992 4.74194 12 4.74194C16.0101 4.74194 19.2581 7.98992 19.2581 12C19.2581 16.0101 16.0101 19.2581 12 19.2581ZM14.2427 15.4694L11.1617 13.2302C11.0492 13.1468 10.9839 13.0161 10.9839 12.8782V6.91935C10.9839 6.67984 11.1798 6.48387 11.4194 6.48387H12.5806C12.8202 6.48387 13.0161 6.67984 13.0161 6.91935V12.0617L15.4403 13.8254C15.6363 13.9669 15.6762 14.2391 15.5347 14.4351L14.8524 15.375C14.7109 15.5673 14.4387 15.6109 14.2427 15.4694Z" fill="#373F41"/>
							</svg>
							<div class="font-bold"><?php echo $fields['duration_second']; ?></div>
						</div>
					<?php endif; ?>
				</div>

				<div class="mb-2">Стоимость за человека:</div>
				<div class="flex flex-wrap items-center gap-6 mb-3">
					<div class="bg-[#ffe7db] text-[#FF7A45] text-[22px] rounded-lg px-2 py-2 font-bold">
						от <?php echo $fields['discount_price'];?> ₽
					</div>
					<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
						<div class="text-center text-[#999999] text-[18px] font-medium leading-tight line-through font-medium ">
							от <?php echo $fields['price'];?> ₽
						</div>
					<?php endif ?>

				</div>
				<div class=" mb-5 lg:mb-8">
					<a href="#sectionCost" class="text-[#999999] custom-underline">Подробные цены</a>
				</div>
				<div class="block sm:flex gap-3">
					<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="flex text-white px-8 h-10 sm:py-2 lg:py-2.5] rounded-full justify-center items-center gap-2 mb-3  bg-[#30d26e] hover:bg-[#1ABF59]">
						<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
						</svg>
						<span class="text-sm sm:text-[14px] lg:text-sm">Спросить в WhatsApp</span>
					</a>
					<a href="#sendMe" class="flex text-white px-8 lg:px-9 h-10 rounded-full justify-center items-center gap-2 mb-3 bg-[#FF7A45] hover:bg-[#ff6931]">
						<span class="text-sm sm:text-[14px] lg:text-sm">Записаться</span>
					</a>
				</div>
			</div>
		</div>

		<div class="bg-[#DED7FC] px-5 py-5 sm:py-[18px] sm:px-8 flex flex-col gap-2 sm:gap-3 sm:flex-row lg:gap-8 mt-5 sm:mt-3 mb-5 sm:mb-[18px] rounded-xl text-sm sm:text-[12px] lg:text-sm">
			<a href="#sectionDesc" class="font-bold hover:text-[#3A21AA]">Описание</a>
			<a href="#sectionProgram" class="font-bold hover:text-[#3A21AA]">Программа</a>
			<a href="#sectionCost" class="font-bold hover:text-[#3A21AA]">Стоимость</a>
			<a href="#sectionNeed" class="font-bold hover:text-[#3A21AA]">Что понадобится для оформления поездки</a>
			<a href="#sectionBuses" class="font-bold hover:text-[#3A21AA]">Автобусы</a>
			<a href="#sectionRev" class="font-bold hover:text-[#3A21AA]">Отзывы</a>
		</div>

		<div class="flex gap-6">
			<?php get_sidebar('simple'); ?>

			<div class="overflow-x-hidden">

				<div class="entry-content">
					<div class="bg-white pt-6 sm:pt-4 lg:pt-7 px-5 sm:px-8 md:pb-5 pb-2 sm:pb-8 rounded-3xl big-title" id="sectionDesc">
						<?php if(isset($fields['h2']) && !empty($fields['h2'])): ?>
							<h2><?php echo $fields['h2']; ?></h2>
						<?php else: ?>
							<h2>Краткий обзор путешествия</h2>
						<?php endif; ?>
						<?php the_content(); ?>

					</div>

					<div id="sectionProgram">
						<?php if(!empty($fields['programm'])): ?>

							<?php foreach($fields['programm'] as $key => $program) :?>
								<details class="program bg-white pt-4 pb-4 lg:pt-8 pb-8 px-5 sm:px-8 relative rounded-3xl mt-5 sm:mt-6 text-[14px]" <?php if($key === 0) echo 'open' ?> >
									<summary class="details__title text-[#393488] font-bold cursor-pointer list-none">
										<?php if(!empty($program["name"])): ?>
											<h2 class="big-title"><?php echo $program['name'];?></h2>
										<?php endif; ?>
										<?php if(count($fields['programm']) > 1): ?>
										<!-- Стрелка для закрытого состояния (по умолчанию) -->
										<svg class="arrow-icon closed-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M3 7.5L12 16.5L21 7.5" stroke="#CFC5FF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>

										<!-- Стрелка для открытого состояния -->
										<svg class="arrow-icon open-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 16.5L12 7.5L3 16.5" stroke="#3A21AA" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
										<?php endif; ?>
									</summary>
									<div class="details__content pt-2 lg:pt-0 pb-4">
										<?php if(!empty($program["items"])): ?>
											<ul class="ps-0 lg:ps-5 vertical-dash">
												<?php foreach($program["items"] as $item) : ?>
													<li class="pb-2 lg:pb-6">
														<div class="flex flex-col lg:flex-row gap-1 lg:gap-3 lg:items-start">
															<div class="time text-[#FF7A45] font-bold leading-[18px]"><?php echo $item['time'];?></div>
															<div class="item_title mt-[1px]"><?php echo $item['title'];?></div>
														</div>
														<?php if(!empty($item["content"])): ?>
															<div class="content"><?php echo $item['content'];?></div>
														<?php endif; ?>
													</li>
												<?php endforeach;  ?>
											</ul>
										<?php endif; ?>

										<?php if(!empty($program["note"])): ?>
											<div class="font-bold mt-2 ps-5"><?php echo $program['note'];?></div>
										<?php endif; ?>
									</div>
								</details>
							<?php endforeach; ?>

						<?php endif; ?>
					</div>


					<?php if(!empty($fields['not_includes']) ||!empty($fields['table_price']) || !empty($fields['includes']) ): ?>
					<div class="bg-white pt-6 sm:pt-4 lg:pt-7 sm:pb-5 sm:pb-8 px-5 sm:px-8 pb-5 rounded-3xl mt-5 sm:mt-6l bg-end bg-no-repeat" id="sectionCost">
						<?php if(!empty($fields['table_price'])): ?>
							<h2 class="big-title">Стоимость экскурсии</h2>
							<table class="table-auto hidden sm:inline-table	 min-w-full border-collapse md:text-[13px] lg:text-[14px] mb-4">
								<thead>
								<tr class="bg-[#CFC5FF]">
									<?php foreach($fields['table_price']['header'] as $item) : ?>
										<th><?php echo $item['c'];?></th>
									<?php endforeach; ?>
								</tr>
								</thead>
								<tbody>

								<?php foreach($fields['table_price']['body']  as $key =>  $items) : ?>
									<?php if($key%2 ===0) : ?>
										<tr  class="bg-[#E3DFFF]">
									<?php else : ?>
										<tr class="bg-[#CFC5FF]">
									<?php endif ?>
									<?php foreach($items as $key =>  $item) : ?>
										<td><?php echo $item['c'];?></td>
									<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>

								</tbody>
							</table>
							<table class="inline-table	 sm:hidden min-w-full border-collapse text-[12px] mb-4 w-full">
								<?php if (!empty($fields['table_price'])): ?>
									<thead>
									<tr class="bg-[#CFC5FF]">
										<?php foreach (array_chunk($fields['table_price']['header'], 2) as $headerRow): ?>
											<th>
												<div class="flex flex-col items-start">
													<div class="item"><?php echo $headerRow[0]['c'] ?>,</div>
													<div class="item"><?php echo $headerRow[1]['c'] ?></div>
												</div>
											</th>
										<?php endforeach; ?>
									</tr>
									</thead>
								<?php endif; ?>

								<tbody>
								<?php foreach ($fields['table_price']['body'] as $key => $row): ?>
									<?php if($key%2 ===0) : ?>
										<tr  class="bg-[#E3DFFF]">
									<?php else : ?>
										<tr class="bg-[#CFC5FF]">
									<?php endif ?>
										<td>
											<!-- Для "Группа детей" и "Сопровождающих" -->
											<div class="flex gap-2">
												<div class="item"><?= $row[0]['c'] ?></div>+
												<div class="item"><?= $row[1]['c'] ?></div>
											</div>
										</td>
										<td>
											<!-- Для "Стоимость с обедом" и "Стоимость без обеда" -->
											<div class="flex flex-col items-start">
												<div class="item"><?= $row[2]['c'] ?></div>
												<div class="item"><?= $row[3]['c'] ?></div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						<?php endif; ?>

						<?php if(!empty($fields['includes'])): ?>
							<h3 class="font-bold text-lg">В стоимость включено</h3>
							<ul class="grid grid-cols-1 sm:grid-cols-2 mt-3 gap-y-[16px] gap-x-12">
								<?php foreach($fields['includes'] as $item) : ?>
									<li class="flex gap-4 items-center">
										<span class="rounded-full flex items-center justify-center bg-[#FF7A45]">
											<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
												<g clip-path="url(#clip0_135_6057)">
													<path d="M7.11719 13.8406L10.479 17.2024L18.8835 8.79785" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
												</g>
											</svg>
										</span>
										<span><?php echo $item['item'];?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<?php if(!empty($fields['not_includes'])): ?>
							<h3 class="font-bold text-lg mt-5">Оплачивается дополнительно</h3>
							<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
								<ul class="flex flex-col mt-4 gap-4">
									<?php foreach($fields['not_includes'] as $item) : ?>
										<li class="flex gap-4 items-center">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<g clip-path="url(#clip0_225_5651)">
													<path d="M12 24C18.6276 24 24 18.6276 24 12C24 5.3724 18.6276 0 12 0C5.3724 0 0 5.3724 0 12C0 18.6276 5.3724 24 12 24Z" fill="#3A21AA"/>
													<rect x="6.59668" y="16.7695" width="15.2046" height="1.73986" rx="0.869928" transform="rotate(-45 6.59668 16.7695)" fill="white"/>
													<rect x="7.23047" y="6" width="15.2046" height="1.73986" rx="0.869928" transform="rotate(45 7.23047 6)" fill="white"/>
												</g>
												<defs>
													<clipPath id="clip0_225_5651">
														<rect width="24" height="24" fill="white"/>
													</clipPath>
												</defs>
											</svg>
											<span><?php echo $item['item'];?></span>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<div class="bg-white pt-6 sm:pt-4 lg:pt-7 px-5 sm:px-8 pb-5 sm:pb-5 rounded-3xl mt-5 sm:mt-6l" id="sectionNeed">
						<h2 class="big-title">Что понадобится для оформления поездки?</h2>
						<div class="mt-6 sm:mt-0">Оставить заявку на сайте или связаться с нами по телефону.</div>
						<div class="grid grid-cols-1 sm:grid-cols-15 mt-3 sm:mt-4 text-[14px]" id="need_bg">
							<div class="col-span-8 flex flex-col gap-4 lg:min-w-[420px]">
								<div class="bg-[#CFC5FF] px-6 py-5 rounded-2xl min-h-[106px] lg:min-h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-2">01</div>
									<div class="text_link_underline">Сообщить нам количество школьников и взрослых</div>
								</div>
								<div class="bg-[#CFC5FF] px-6 py-5 rounded-2xl min-h-[106px] lg:min-h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-2">02</div>
									<div class="text_link_underline">Заполнить план рассадки <a href="<?php echo (isset($fields['file']) && !empty($fields['file']) ) ? $fields['file'] : '/wp-content/uploads/2024/12/plan-rassadki-dlya-ekskursii.docx'; ?>" download>скачать файл</a></div>
								</div>
								<div class="bg-[#CFC5FF] px-6 py-5 rounded-2xl min-h-[106px] lg:min-h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-2">03</div>
									<div class="text_link_underline">Ознакомиться с договором и внести предоплату 30%.</div>
								</div>
							</div>
						</div>
						<div class="mt-5">После чего мы в течение 24 часов отправим на ваш номер телефона и почту детальные сведения об экскурсии, транспорте и экскурсоводе. </div>
					</div>


					<div class="rounded-3xl mt-5 sm:mt-6l flex flex-col gap-4 sm:flex-row" id="sendMe">
						<div class="bg-white px-6 lg:px-8 py-5 lg:py-7 w-full md:w-[270px] min-w-[270px] lg:w-[325px] lg:min-w-[325px] bg-white rounded-2xl">
							<div class="title text-lg font-bold mb-4 sm:mb-6">Оставьте заявку</div>
							<input class="bg-[#F2F1FA] rounded-3xl w-full h-10 px-4 focus:outline-none mb-3 text-[14px]" type="text" placeholder="Имя">
							<input class="bg-[#F2F1FA] rounded-3xl w-full h-10 px-4 focus:outline-none mb-5 text-[14px]" type="tel" placeholder="Номер телефона">
							<button class="px-7 lg:px-10 h-10 lg:py-3 bg-[#FF7A45] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex mb-[18px] lg:mb-3">
								<span class="text-center text-white text-[14px] lg:text-sm font-bold leading-tight">Оставить заявку</span>
							</button>
							<label class="cursor-pointer block">
								<span class="flex gap-2 items-center">
								<input type="checkbox" class="checkbox-input hidden" checked />
								<span class="checkbox-box w-[16px] h-[16px]  border border-[#373F41] rounded-sm flex items-center justify-center bg-transparent"">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
										<path d="M4.37891 9.31366L6.44772 11.3825L11.6197 6.21045" stroke="#FF7643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
								<span class="text-[9px] leading-[12px]">Соглашаюсь на обработку персональных данных</span>
							</label>
						</div>

						<div class="w-full bg-white rounded-2xl px-6 lg:px-8 py-5 lg:py-7 bg-phone">
							<div class="title text-lg font-bold mb-4 lg:mb-8">Вы можете связаться с нами прямо сейчас:</div>
							<div class="flex gap-1 mb-2 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 4.11111C3 3.49746 3.49746 3 4.11111 3H5.93291C6.17204 3 6.38434 3.15302 6.45996 3.37987L7.29208 5.87623C7.3795 6.13851 7.26077 6.42517 7.01348 6.54881L5.75945 7.17583C6.37181 8.53401 7.46599 9.6282 8.82417 10.2406L9.45119 8.98652C9.57483 8.73923 9.86149 8.6205 10.1238 8.70792L12.6201 9.54004C12.847 9.61566 13 9.82796 13 10.0671V11.8889C13 12.5025 12.5025 13 11.8889 13H11.3333C6.73096 13 3 9.26904 3 4.66667V4.11111Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a class="font-semibold" href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['phone'];?></a>
							</div>
							<div class="flex gap-1 mb-8 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 5.77778L7.38367 8.70023C7.75689 8.94904 8.24311 8.94904 8.61633 8.70023L13 5.77778M4.11111 11.8889H11.8889C12.5025 11.8889 13 11.3914 13 10.7778V5.22223C13 4.60858 12.5025 4.11111 11.8889 4.11111H4.11111C3.49746 4.11111 3 4.60858 3 5.22223V10.7778C3 11.3914 3.49746 11.8889 4.11111 11.8889Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a class="font-semibold" href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
							</div>
							<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="w-[90%] sm:w-[54%]  bg-[#30D26E] hover:bg-[#1ABF59] rounded-full justify-center items-center h-10 inline-flex mb-[18px] sm:mb-6 gap-1">
							<span class="flex gap-2 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
								</svg>
								<span class="text-white text-[14px] lg:text-sm font-semibold leading-tight">Написать в WhatsApp</span>
							</span>
							</a>
							<a target="_blank" href="tg://resolve?domain=<?php echo $options['telegram'];  ?>" class="w-[90%] sm:w-[54%] h-10  bg-[#69C5FD] hover:bg-[#4ea8de] rounded-full justify-center items-center inline-flex mb-6 gap-1">
								<span class="flex gap-2 items-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_189_21039)">
										<path d="M10 0C4.48438 0 0 4.48438 0 10C0 15.5156 4.48438 20 10 20C15.5156 20 20 15.5156 20 10C20 4.48438 15.5156 0 10 0Z" fill="#419FD9"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2244 14.9521C12.9234 15.2579 13.1855 14.6172 13.1855 14.6172L15.0348 5.3268C15.0203 4.70065 14.1757 5.07925 14.1757 5.07925L3.82231 9.14197C3.82231 9.14197 3.32721 9.31672 3.37089 9.62251C3.41458 9.92831 3.80775 10.0739 3.80775 10.0739L6.41429 10.9476C6.41429 10.9476 7.20063 13.5251 7.3608 14.0202C7.50642 14.5007 7.63748 14.5152 7.63748 14.5152C7.78309 14.5735 7.91415 14.4716 7.91415 14.4716L9.60331 12.9426L12.2244 14.9521ZM12.6755 6.97208C12.6755 6.97208 13.0396 6.75365 13.025 6.97208C13.025 6.97208 13.0833 7.0012 12.894 7.20507C12.7192 7.37981 8.59826 11.0785 8.04491 11.5736C8.00123 11.6027 7.9721 11.6464 7.9721 11.7046L7.81193 13.0734C7.7828 13.2191 7.5935 13.2336 7.54981 13.1026L6.86541 10.8601C6.83629 10.7727 6.86541 10.6708 6.95278 10.6125L12.6755 6.97208Z" fill="white"/>
										</g>
										<defs>
										<clipPath id="clip0_189_21039">
										<rect width="20" height="20" fill="white"/>
										</clipPath>
										</defs>
									</svg>
									<span class="text-white text-[14px] lg:text-sm font-semibold leading-tight">Написать в Телеграм</span>
								</span>
							</a>
						</div>
					</div>

					<div class="rounded-3xl flex-col sm:flex-row mt-5" id="sectionBuses" >
						<h2 class="big-title">Автобусы для вашей экскурсионной поездки</h2>

						<div class="sub_slide mt-4 relative">
							<div class="flex gap-4 overflow-x-auto overflow-y-hidden sm:overflow-hidden">
								<div class="min-w-[266px] md:min-w-0  sm:w-1/3 rounded-2xl h-[200px]">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4366.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
								</div>
								<div class="min-w-[266px] md:min-w-0   sm:w-1/3 rounded-2xl h-[200px]">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4372.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
								</div>
								<div class="min-w-[266px] md:min-w-0 hidden sm:w-1/3 sm:flex bg-[#3A21AA] rounded-2xl h-[200px]  justify-center items-center px-6">
									<div class="text-white">Все автобусы из нашего собственного автопарка, проходят регулярное техническое обслуживание и чистку салона, оснащены системами отслеживания движения и скорости</div>
								</div>
							</div>
							<div class="mt-4 flex py-6 sm:hidden bg-[#3A21AA] rounded-2xl flex justify-center items-center px-6">
								<div class="text-white">Все автобусы из нашего собственного автопарка, проходят регулярное техническое обслуживание и чистку салона, оснащены системами отслеживания движения и скорости</div>
							</div>
						</div>
						<div class="flex mt-6 items-center justify-center">
							<a href="<?php echo esc_url(get_permalink(83)); ?>" class="flex items-center justify-center font-bold text-[#FF7A45] h-10 px-7 sm:px-10 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[14px]">Все автобусы</a>
						</div>
					</div>

					<?php
					$args = array(
							'post_type'      => 'reviews',      // Тип записи 'faqs'
							'posts_per_page' => 7,          // Выводим все записи
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) : ?>

						<div class="swiper_reviews mt-5" id="sectionRev">
							<div class="gap-6 grid grid-cols-12 w-full">
								<div class="entry-content col-span-12">
									<h2 class="big-title">Отзывы</h2>
									<div class="swiper mySwiper3">
										<div class="swiper-wrapper text-[14px]">
											<?php while ( $query->have_posts() ) : $query->the_post(); $fieldsRev = get_fields();?>
												<div class="swiper-slide h-[240px] bg-white flex flex-col gap-2 pt-7 pb-8 px-4 rounded-xl">
													<div class="text-[#393488] lines min-h-[18px]">
														<div class="lines one-lines font-semibold"><?php the_title() ?></div>
													</div>
													<div class="h-[106px]">
														<div class="lines six-lines"><?php the_content(); ?></div>
													</div>
													<div class="text-[14px] text-[#abb7b9] font-semibold lines two-lines">
														<?php
														$text = '';
														if (isset($fieldsRev['date'])) {
															$text .= trim(strtr($fieldsRev['date'], $sub));
														}
														if(isset($fieldsRev['date']) && ( (isset($fieldsRev['excursion']) && $fieldsRev['excursion']) || (isset($fieldsRev['excursion_obj']) && $fieldsRev['excursion_obj']))) {
															$text .= ', ';
														}
														if(isset($fieldsRev['excursion']) && $fieldsRev['excursion']) {
															$text .= $fieldsRev['excursion'];
														} elseif(isset($fieldsRev['excursion_obj']) && $fieldsRev['excursion_obj']) {
															$text .= get_the_title($fieldsRev['excursion_obj']);
														}
														echo $text;
														?>
													</div>
												</div>
											<?php endwhile; ?>
										</div>

										<div class="swiper-pagination block sm:hidden relative mt-6"></div>
									</div>

									<div class="flex mt-6 mb-8 lg:mb-[64px] items-center justify-center">
										<a href="<?php echo esc_url(get_permalink(73)); ?>" class="flex items-center justify-center font-bold text-[#FF7A45] h-10 px-7 sm:px-10 text-[14px] border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45]">Все отзывы</a>
									</div>
								</div>
							</div>
						</div>
					<?php else :
						echo 'Нет отзывов для отображения.';
					endif;
					wp_reset_postdata();
					?>


					<div class="mt-5 rounded-3xl mb-12 pb-6 flex-col sm:flex-row">
						<h2 class="big-title">Экскурсии, которые вам могут понравиться</h2>
						<?php if($fields['recommended']): $count=0; ?>
							<div class="swiper mySwiper4">
								<div class="swiper-wrapper h-auto content__tours" id="posts-container">
									<?php foreach($fields['recommended'] as $item) : ?>
										<?php $fielsdEx = get_fields($item->ID); ?>
										<div class="swiper-slide card flex flex-col col-span-6 md:col-span-4 bg-white rounded-2xl">
											<div class="relative mb-2 lg:mb-3 p-4">
												<a href="<?php echo get_permalink($item->ID) ?>">
													<img class="rounded-2xl w-full h-[163px] lg:h-[193px] object-cover" src="<?php echo $fielsdEx['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fielsdEx['gallery'][0]['name']; ?>" loading="lazy">
													<?php if (isset($fielsdEx['video_after_gates']) && !empty($fielsdEx['video_after_gates'])): ?>
														<span class="has_video absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" data-ll-status="observed">
															<svg xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none">
																<g filter="url(#filter0_d_135_6229)">
																	<path d="M59 36.268C60.3333 37.0378 60.3333 38.9622 59 39.7321L21.5 61.3827C20.1667 62.1525 18.5 61.1902 18.5 59.6506L18.5 16.3494C18.5 14.8098 20.1667 13.8475 21.5 14.6173L59 36.268Z" fill="white" fill-opacity="0.75" shape-rendering="crispEdges"/>
																</g>
																<defs>
																	<filter id="filter0_d_135_6229" x="0.5" y="0.346191" width="77.5" height="83.3076" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
																	<feFlood flood-opacity="0" result="BackgroundImageFix"/>
																	<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
																	<feOffset dy="4"/>
																	<feGaussianBlur stdDeviation="9"/>
																	<feComposite in2="hardAlpha" operator="out"/>
																	<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
																	<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_135_6229"/>
																	<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_135_6229" result="shape"/>
																	</filter>
																</defs>
															</svg>
														</span>
													<?php endif ?>
												</a>
												<?php if(isset($fields['duration_main'])): ?>
												<div class="absolute left-[22px] bottom-[24px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
													<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]"><?php echo $fielsdEx['duration_main'];?></div>
												</div>
												<?php endif ?>
												<?php if(isset($fielsdEx['discount_price']) && $fielsdEx['price'] > $fielsdEx['discount_price']): ?>
													<div class="absolute left-[22px] top-[24px] flex gap-1 items-center bg-[#FF7A45] rounded-3xl">
														<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]">скидка %</div>
													</div>
												<?php endif ?>
												<button class="absolute right-[10px] top-[10px] wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo $item->ID; ?>" aria-label="Добавить в избранное">
													<svg class="block group-[:hover]:hidden group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect width="24" height="24" rx="12" fill="white"/>
														<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#373F41"/>
													</svg>
													<svg class="hidden group-[:hover]:block group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect width="24" height="24" rx="12" fill="white"/>
														<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#FF7A45"/>
													</svg>
													<svg class="hidden group-[.active]:block"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect width="24" height="24" rx="12" fill="#FF7A45"/>
														<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="white"/>
													</svg>
												</button>
											</div>
											<div class="px-4">
												<a href="<?php echo get_permalink($item->ID) ?>" class="card-title text-[18px] lg:text-[21px] font-bold mb-2 lg:mb-4"><?php echo get_the_title($item->ID); ?></a>
												<div class="card-description leading-[1.3] xs:leading-[1] lg:leading-[17px] mb-3 lg:mb-5 text-[14px] xs:text-sm"><?php echo get_the_excerpt($item->ID); ?></div>
												<div class="flex flex-wrap items-center gap-2 mb-5">
													<div class="bg-[#ffe7db] text-[#FF7A45] rounded-lg px-2">
														от <?php echo $fields['price'];?> ₽
													</div>
													<?php if(isset($fields['discount_price']) && $fielsdEx['price'] > $fielsdEx['discount_price']): ?>
														<div class="text-center text-[#999999] text-sm font-medium leading-tight line-through">
															от <?php echo $fielsdEx['discount_price'];?> ₽
														</div>
													<?php endif ?>
												</div>
												<div class="relative mb-4">
													<a href="<?php echo get_permalink($item->ID) ?>" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						<?php else: ?>
							<?php
							$post_id = get_the_ID();
							$terms = get_the_terms( $post_id, 'excursion_category' );
							if ( $terms && !is_wp_error( $terms ) ) {
								$first_term_id = $terms[0]->term_id;
								$args = array(
										'post_type'      => 'excursion',
										'posts_per_page' => 5,
										'tax_query'      => array(
												array(
														'taxonomy' => 'excursion_category',
														'field'    => 'id',
														'terms'    => $first_term_id,
														'operator' => 'IN',
												),
										),
								);

								$query = new WP_Query( $args );
								$posts = $query->posts;

								if ( ! empty( $posts ) ) :$count=0; ?>
									<div class="swiper mySwiper4">
										<div class="swiper-wrapper h-auto content__tours" id="posts-container">
											<?php foreach($posts as $item) : ?>
												<?php $fielsdEx = get_fields($item->ID); ?>
												<div class="swiper-slide card flex flex-col col-span-12 xs:col-span-6 md:col-span-4 bg-white rounded-2xl">
													<div class="relative mb-2 lg:mb-3 p-4">
														<a href="<?php echo get_permalink($item->ID) ?>">
															<img class="rounded-2xl w-full h-[250px] xs:h-[163px] lg:h-[193px] object-cover" src="<?php echo $fielsdEx['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fielsdEx['gallery'][0]['name']; ?>" loading="lazy">
															<?php if (isset($fielsdEx['video_after_gates']) && !empty($fielsdEx['video_after_gates'])): ?>
																<span class="has_video absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" data-ll-status="observed">
																<svg xmlns="http://www.w3.org/2000/svg" width="78" height="84" viewBox="0 0 78 84" fill="none">
																	<g filter="url(#filter0_d_135_6229)">
																		<path d="M59 36.268C60.3333 37.0378 60.3333 38.9622 59 39.7321L21.5 61.3827C20.1667 62.1525 18.5 61.1902 18.5 59.6506L18.5 16.3494C18.5 14.8098 20.1667 13.8475 21.5 14.6173L59 36.268Z" fill="white" fill-opacity="0.75" shape-rendering="crispEdges"/>
																	</g>
																	<defs>
																		<filter id="filter0_d_135_6229" x="0.5" y="0.346191" width="77.5" height="83.3076" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
																		<feFlood flood-opacity="0" result="BackgroundImageFix"/>
																		<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
																		<feOffset dy="4"/>
																		<feGaussianBlur stdDeviation="9"/>
																		<feComposite in2="hardAlpha" operator="out"/>
																		<feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0"/>
																		<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_135_6229"/>
																		<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_135_6229" result="shape"/>
																		</filter>
																	</defs>
																</svg>
															</span>
															<?php endif ?>
														</a>
														<?php if(isset($fields['duration_main']) && !empty($fields['duration_main'])): ?>
															<div class="absolute left-[22px] bottom-[24px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
																<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]"><?php echo $fields['duration_main'];?></div>
															</div>
														<?php endif ?>
														<?php if(isset($fields['discount_price']) && $fields['price'] > $fields['discount_price']): ?>
															<div class="absolute left-[22px] top-[24px] flex gap-1 items-center bg-[#FF7A45] rounded-3xl">
																<div class="text-white px-3 pt-[5px] pb-[6px] leading-none text-[14px]">скидка %</div>
															</div>
														<?php endif ?>
														<button class="absolute right-[10px] top-[10px] wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo $item->ID; ?>" aria-label="Добавить в избранное">
															<svg class="block group-[:hover]:hidden group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect width="24" height="24" rx="12" fill="white"/>
																<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#373F41"/>
															</svg>
															<svg class="hidden group-[:hover]:block group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect width="24" height="24" rx="12" fill="white"/>
																<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#FF7A45"/>
															</svg>
															<svg class="hidden group-[.active]:block"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect width="24" height="24" rx="12" fill="#FF7A45"/>
																<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="white"/>
															</svg>
														</button>
													</div>
													<div class="px-4">
														<a href="<?php echo get_permalink($item->ID) ?>" class="card-title text-[16px] xs:text-[14px] lg:text-[16px] font-bold mb-2 lg:mb-4 leading-[1.2] leading-[1.2]"><?php echo get_the_title($item->ID); ?></a>
														<div class="card-description leading-[1.3] xs:leading-[1] lg:leading-[17px] mb-3 lg:mb-5 text-[14px] xs:text-sm">
															<?php
															$content = get_the_content($item->ID);
															$content_without_h2 = preg_replace('/<h2.*?>.*?<\/h2>/is', '', $content);
															echo $content_without_h2;
															?>
														</div>
														<div class="flex flex-wrap items-center gap-2 mb-5">
															<div class="text-[16px] bg-[#ffe7db] text-[#FF7A45] rounded-lg px-2.5 py-1">
																от <?php echo $fielsdEx['price'];?> ₽
															</div>
															<?php if(isset($fielsdEx['discount_price']) && $fielsdEx['price'] > $fielsdEx['discount_price']): ?>
																<div class="text-center text-[#999999] text-[16px] font-medium leading-tight line-through">
																	от <?php echo $fielsdEx['discount_price'];?> ₽
																</div>
															<?php endif ?>
														</div>
														<div class="relative mb-4">
															<a href="<?php echo get_permalink($item->ID) ?>" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Подробнее</a>
														</div>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									</div>
								<?php  else :
									echo 'Нет записей.';
								endif;
									wp_reset_postdata();  // Сбрасываем глобальные данные о постах
							}
							?>

						<?php endif; ?>
					</div>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>

</article><!-- #post-${ID} -->



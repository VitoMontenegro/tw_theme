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

$sub = array(".01." => " января ", ".02." => " февраля ",
		".03." => " марта ", ".04." => " апреля ", ".05." => " мая ", ".06." => " июня ",
		".07." => " июля ", ".08." => " августа ", ".09." => " сентября ",
		".10." => " октября ", ".11." => " ноября ", ".12." => " декабря ", "2022" => '', '2023' => '', '2024'=>'', '2025'=>'','2026'=>'','00:00'=>'');
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
									<?php $imagePrev = !empty($fields["izobrazhenie_dlya_prevyu_video"]) ? $fields["izobrazhenie_dlya_prevyu_video"] : getYoutubeEmbedUrl($video_after_gates);?>
									<img src="<?php echo $imagePrev; ?>"
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
								<div class="swiper-slide text-center flex justify-center items-center cursor-pointer bg-cover rounded-md overflow-hidden">
									<!-- Превью изображения для видео -->
									<?php $imagePrev = !empty($fields["izobrazhenie_dlya_prevyu_video"]) ? $fields["izobrazhenie_dlya_prevyu_video"] : getYoutubeEmbedUrl($video_after_gates);?>
									<img src="<?php echo $imagePrev ?>"
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
			<a href="#sectionDesc" class="font-bold hover:text-[#3A21AA]">Описание</a>
			<a href="#sectionProgram" class="font-bold hover:text-[#3A21AA]">Программа</a>
			<a href="#sectionCost" class="font-bold hover:text-[#3A21AA]">Стоимость</a>
			<a href="#sectionNeed" class="font-bold hover:text-[#3A21AA]">Что понадобится для оформления поездки?</a>
			<a href="#sectionBuses" class="font-bold hover:text-[#3A21AA]">Автобусы</a>
			<a href="#sectionRev" class="font-bold hover:text-[#3A21AA]">Отзывы</a>
		</div>

		<div class="flex gap-6">
			<div class="max-w-[455px] w-[256px] min-w-[256px] hidden lg:block">
				<div class="bg-white p-4 rounded-lg">
					<?php $categories = get_nested_categories_by_parent(0,'excursion_category'); ?>
					<?php if (!empty($categories)) : ?>
						<ul class="flex flex-col gap-5">
							<?php foreach ($categories as $category) : ?>
								<li class="flex flex-col gap-3">
									<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold">
										<?php $fieldsCat = get_fields('excursion_category_' . $category['id']); ?>
										<?php echo esc_html($fieldsCat['title_double'])?>
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

			<div class="entry-content overflow-x-hidden">

				<div class="entry-content">
					<div class="bg-white pt-1 px-8 pb-5 sm:pb-8 rounded-3xl" id="sectionDesc">
						<?php the_content(); ?>
					</div>

					<div id="sectionProgram">
						<?php if(!empty($fields['programm'])): ?>

							<?php foreach($fields['programm'] as $program) : ?>
								<details class="program bg-white pt-1 px-8 py-5 sm:py-8 rounded-3xl mt-5 sm:mt-6" name="excursion" open>
									<summary class="details__title py-6 ps-6 pe-10 text-[#393488] font-bold cursor-pointer list-none">
										<?php if(!empty($program["name"])): ?>
											<h2 class="mt-0"><?php echo $program['name'];?></h2>
										<?php endif; ?>
									</summary>
									<div class="details__content px-4 pb-4 text-[#393488]">
										<?php if(!empty($program["items"])): ?>
											<ul>
												<?php foreach($program["items"] as $item) : ?>
													<li>
														<div class="flex gap-3 items-center">
															<div class="time text-[#ff7642] font-bold leading-[18px]"><?php echo $item['time'];?></div>
															<div class="item_title"><?php echo $item['title'];?></div>
														</div>
														<?php if(!empty($item["content"])): ?>
															<div class="content"><?php echo $item['content'];?></div>
														<?php endif; ?>
													</li>
												<?php endforeach;  ?>
											</ul>
										<?php endif; ?>

										<?php if(!empty($program["note"])): ?>
											<div class="font-bold"><?php echo $program['note'];?></div>
										<?php endif; ?>
									</div>
								</details>
							<?php endforeach; ?>

						<?php endif; ?>
					</div>

					<div class="bg-white pt-1 px-8 pb-5 sm:pb-8 rounded-3xl mt-5 sm:mt-6l" id="sectionCost">
						<?php if(!empty($fields['table_price'])): ?>
							<h2>Стоимость экскурсии</h2>
							<table class="table-auto hidden sm:block">
								<thead>
								<tr>
									<?php foreach($fields['table_price']['header'] as $item) : ?>
										<th><?php echo $item['c'];?></th>
									<?php endforeach; ?>
								</tr>
								</thead>
								<tbody>

								<?php foreach($fields['table_price']['body'] as $items) : ?>
									<tr>
										<?php foreach($items as $item) : ?>
											<td><?php echo $item['c'];?></td>
										<?php endforeach; ?>
									</tr>
								<?php endforeach; ?>

								</tbody>
							</table>
							<table class="table-auto block sm:hidden">
								<?php if (!empty($fields['table_price'])): ?>
									<thead>
									<tr>
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
								<?php foreach ($fields['table_price']['body'] as $row): ?>
									<tr>
										<td>
											<!-- Для "Группа детей" и "Сопровождающих" -->
											<div class="flex gap-2">
												<div class="item"><?= $row[0]['c'] ?></div>
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
							<h3 class="font-bold text-lg mb-[18px]">В стоимость включено</h3>
							<ul class="grid grid-cols-1 sm:grid-cols-2 mt-4 gap-4">
								<?php foreach($fields['includes'] as $item) : ?>
									<li class="flex gap-4 items-center">
										<span class="rounded-full flex items-center justify-center bg-[#ff7642]">
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
							<h3 class="font-bold text-lg mb-[18px]">Оплачивается дополнительно</h3>
							<div class="grid grid-cols-1 sm:grid-cols-2 mt-4 gap-4">
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

					<div class="bg-white pt-1 px-8 pb-5 sm:pb-8 rounded-3xl mt-5 sm:mt-6l" id="sectionNeed">
						<h2>Что понадобится для оформления поездки?</h2>
						<div class="">Оставить заявку на сайте или связаться с нами по телефону.</div>
						<div class="grid grid-cols-1 sm:grid-cols-2 mt-4 gap-4">
							<div class="flex flex-col gap-3">
								<div class="bg-[#CFC5FF] px-6 py-4 rounded-2xl h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-1.5">01</div>
									<div class="text_link_underline">Сообщить нам количество школьников и взрослых</div>
								</div>
								<div class="bg-[#CFC5FF] px-6 py-4 rounded-2xl h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-1.5">02</div>
									<div class="text_link_underline">Заполнить план рассадки <a href="<?php echo $fields['file']; ?>" download="filename.webp">скачать файл</a></div>
								</div>
								<div class="bg-[#CFC5FF] px-6 py-4 rounded-2xl h-[82px] col-span-6 md:col-span-4">
									<div class="text-[22px] font-bold mb-1.5">03</div>
									<div class="text_link_underline">Ознакомиться с договором и внести предоплату 30%.</div>
								</div>
							</div>
						</div>
						<div class="">После чего мы в течение 24 часов отправим на ваш номер телефона и почту детальные сведения об экскурсии, транспорте и экскурсоводе. </div>
					</div>


					<div class="bg-white pt-1 px-8 pb-5 sm:pb-8 rounded-3xl mt-5 sm:mt-6l flex-col sm:flex-row">
						<div class="w-wull sm:w-5/12 bg-white rounded-2xl py-6 sm:py-8 px-6">
							<div class="title text-lg font-bold mb-5 sm:mb-6">Оставьте заявку</div>
							<input class="bg-[#F2F1FA] rounded-3xl w-full h-10 px-4 focus:outline-none mb-3" type="text" placeholder="Имя">
							<input class="bg-[#F2F1FA] rounded-3xl w-full h-10 px-4 focus:outline-none mb-4" type="tel" placeholder="Номер телефона">
							<button class="px-8 py-3 bg-[#ff7642] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex mb-6">
								<span class="text-center text-white text-sm font-bold  leading-tight">Оставить заявку</span>
							</button>
							<label for="agree" class="flex gap-2 items-center">
								<input type="checkbox" name="agree" id="agree" class="w-[14px] h-[14px] accent-[#f56630]">
								<span class="text-[9px]">Соглашаюсь на обработку персональных данных</span>
							</label>
						</div>
						<div class="w-wull sm:w-7/12 bg-white rounded-2xl p-8">
							<div class="title text-lg font-bold mb-5">Вы можете связаться с нами прямо сейчас:</div>
							<div class="flex gap-1 mb-2 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 4.11111C3 3.49746 3.49746 3 4.11111 3H5.93291C6.17204 3 6.38434 3.15302 6.45996 3.37987L7.29208 5.87623C7.3795 6.13851 7.26077 6.42517 7.01348 6.54881L5.75945 7.17583C6.37181 8.53401 7.46599 9.6282 8.82417 10.2406L9.45119 8.98652C9.57483 8.73923 9.86149 8.6205 10.1238 8.70792L12.6201 9.54004C12.847 9.61566 13 9.82796 13 10.0671V11.8889C13 12.5025 12.5025 13 11.8889 13H11.3333C6.73096 13 3 9.26904 3 4.66667V4.11111Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a class="font-semibold" href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['phone'];?></a>
							</div>
							<div class="flex gap-1 mb-6 sm:mb-[57px] items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M3 5.77778L7.38367 8.70023C7.75689 8.94904 8.24311 8.94904 8.61633 8.70023L13 5.77778M4.11111 11.8889H11.8889C12.5025 11.8889 13 11.3914 13 10.7778V5.22223C13 4.60858 12.5025 4.11111 11.8889 4.11111H4.11111C3.49746 4.11111 3 4.60858 3 5.22223V10.7778C3 11.3914 3.49746 11.8889 4.11111 11.8889Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
								<a class="font-semibold" href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
							</div>
							<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="px-8 py-3 bg-[#30D26E] hover:bg-[#1ABF59] rounded-full justify-center items-center inline-flex mb-6">
								<span class="flex gap-2 items-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
									</svg>
									<span class="text-white font-semibold">Написать</span>
								</span>
							</a>
							<a target="_blank" href="tg://resolve?domain=<?php echo $options['telegram'];  ?>" class="px-8 py-3 bg-[#69C5FD] hover:bg-[#4ea8de] rounded-full justify-center items-center inline-flex mb-6">
								<span class="flex gap-2 items-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<g clip-path="url(#clip0_135_7087)">
										<path d="M8 0C3.5875 0 0 3.5875 0 8C0 12.4125 3.5875 16 8 16C12.4125 16 16 12.4125 16 8C16 3.5875 12.4125 0 8 0Z" fill="#419FD9"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M9.77836 11.9617C10.3375 12.2063 10.5472 11.6937 10.5472 11.6937L12.0267 4.26144C12.015 3.76052 11.3394 4.0634 11.3394 4.0634L3.05667 7.31358C3.05667 7.31358 2.6606 7.45337 2.69554 7.69801C2.73049 7.94265 3.04502 8.05914 3.04502 8.05914L5.13026 8.7581C5.13026 8.7581 5.75933 10.82 5.88747 11.2161C6.00397 11.6006 6.10881 11.6122 6.10881 11.6122C6.2253 11.6588 6.33015 11.5773 6.33015 11.5773L7.68148 10.3541L9.77836 11.9617ZM10.1393 5.57766C10.1393 5.57766 10.4305 5.40292 10.4188 5.57766C10.4188 5.57766 10.4654 5.60096 10.314 5.76405C10.1742 5.90384 6.87743 8.86279 6.43476 9.25886C6.39981 9.28216 6.37651 9.31711 6.37651 9.36371L6.24837 10.4588C6.22507 10.5752 6.07363 10.5869 6.03868 10.482L5.49116 8.68805C5.46786 8.61815 5.49116 8.5366 5.56106 8.49001L10.1393 5.57766Z" fill="white"/>
										</g>
									  <defs>
										<clipPath id="clip0_135_7087">
										  <rect width="16" height="16" fill="white"/>
										</clipPath>
									  </defs>
									</svg>
									<span class="text-white font-semibold">Написать</span>
								</span>
							</a>
						</div>
					</div>

					<div class="pt-1 rounded-3xl mt-5 sm:mt-6l flex-col sm:flex-row" id="sectionBuses" >
						<h2>Автобусы для вашей экскурсионной поездки</h2>

						<div class="sub_slide mt-6 relative">
							<div class="flex gap-3 overflow-x-auto overflow-y-hidden">
								<div class="min-w-[266px] sm:w-1/3 rounded-2xl h-[200px]">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4366.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
								</div>
								<div class="min-w-[266px]  sm:w-1/3 rounded-2xl h-[200px]">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4372.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
								</div>
								<div class="min-w-[266px]  sm:w-1/3 bg-[#3A21AA] rounded-2xl h-[200px] flex justify-center items-center px-4">
									<div class="p-6">
										<div class="text-white">Все автобусы из нашего собственного автопарка, проходят регулярное техническое обслуживание и чистку салона, оснащены системами отслеживания движения и скорости</div>
									</div>
								</div>

							</div>
						</div>
						<div class="flex mt-6 items-center justify-center">
							<a href="<?php echo esc_url(get_permalink(73)); ?>" class="inline-block font-bold text-[#ff7642] py-2 sm:py-2.5 px-4 sm:px-8 border-2 border-[#ff7642] rounded-3xl hover:text-white hover:bg-[#FF7643]">Все автобусы</a>
						</div>
					</div>

					<?php
					$args = array(
							'post_type'      => 'reviews',      // Тип записи 'faqs'
							'posts_per_page' => 7,          // Выводим все записи
					);

					$query = new WP_Query( $args );

					// Если записи найдены
					if ( $query->have_posts() ) : ?>
						<div class="swiper_reviews" id="sectionRev">
							<div class="gap-6 grid grid-cols-12 w-full">
								<div class="entry-content col-span-12">
									<h2>Отзывы</h2>
									<div class="swiper mySwiper3">
										<div class="swiper-wrapper">
											<?php while ( $query->have_posts() ) : $query->the_post(); $fieldsRev = get_fields();?>
												<div class="swiper-slide h-[268px] bg-white flex flex-col gap-2 py-8 px-4">
													<div class="text-[#393488] lines min-h-[18px]">
														<div class="one-lines"><?php the_title() ?></div>
													</div>
													<div class="lines h-[118px]">
														<div class="six-lines"><?php the_content(); ?></div>
													</div>
													<div class="text-[12px] text-[#abb7b9] font-semibold">
														<?php if(isset($fieldsRev['date'])) :?>
															<?php echo strtr($fieldsRev['date'], $sub);?>
														<?php endif;?>

														<?php if(isset($fieldsRev['date']) && isset($fieldsRev['excursion'])) :?>
															,
														<?php endif; ?>

														<?php if( isset($fieldsRev['excursion'])) :?>
															<?php echo $fieldsRev['excursion'];?>
														<?php endif; ?>
													</div>
												</div>
											<?php endwhile; ?>
										</div>

										<div class="swiper-pagination"></div>
									</div>

									<div class="flex mt-6 items-center justify-center">
										<a href="<?php echo esc_url(get_permalink(73)); ?>" class="inline-block font-bold text-[#ff7642] py-2 sm:py-2.5 px-4 sm:px-8 border-2 border-[#ff7642] rounded-3xl hover:text-white hover:bg-[#FF7643]">Все отзывы</a>
									</div>
								</div>
							</div>
						</div>
					<?php else :
						echo 'Нет вопросов для отображения.';
					endif;

					// Восстановление оригинального поста
					wp_reset_postdata();
					?>


					<div class="pt-1 pb-5 sm:pb-8 rounded-3xl flex-col sm:flex-row">
						<h2>Экскурсии, которые вам могут понравиться</h2>
						<?php if($fields['recommended']): $count=0; ?>
						<div class="flex flex-col" >
						<div class="grid grid-cols-12 gap-3 sm:gap-6 w-full mt-1 content__tours"  id="posts-container">
							<?php foreach($fields['recommended'] as $item) : ?>
							<?php $fielsdEx = get_fields($item->ID); ?>
							<div class="card flex flex-col col-span-6 md:col-span-4 bg-white rounded-2xl"  data-cost="<?php echo get_cost($fielsdEx)['cost_sale'] ?? get_cost($fielsdEx)['cost']; ?>"  data-popular="<?php echo ++$count;?>">
								<div  class="relative mb-3">
									<a href="<?php echo get_permalink($item->ID) ?>">
										<img class="rounded-2xl w-full h-[160px] sm:h-[193px] object-cover" src="<?php echo $fielsdEx['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fielsdEx['gallery'][0]['name']; ?>" loading="lazy">
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
									<div class="absolute left-[17px] bottom-[13px] flex gap-1 items-center bg-[#3a21aa] rounded-3xl">
										<div class="text-white px-3 pt-[5px] pb-[6px] leading-none"><?php echo $fields['duration']['label'];?></div>
									</div>
									<?php if(isset($fielsdEx['discount_price']) && $fielsdEx['price'] > $fielsdEx['discount_price']): ?>
										<div class="absolute left-3 top-4 flex gap-1 items-center bg-[#FF7643] rounded-3xl">
											<div class="text-white px-3 pt-[5px] pb-[6px] leading-none">скидка %</div>
										</div>
									<?php endif ?>
									<button class="absolute right-0 top-1 wish-btn w-12 h-12 flex items-center justify-center group" data-wp-id="<?php echo $item->ID; ?>" aria-label="Добавить в избранное">
										<svg class="block group-[:hover]:hidden group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect width="24" height="24" rx="12" fill="white"/>
											<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#373F41"/>
										</svg>
										<svg class="hidden group-[:hover]:block group-[.active]:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect width="24" height="24" rx="12" fill="white"/>
											<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="#FF7643"/>
										</svg>
										<svg class="hidden group-[.active]:block"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect width="24" height="24" rx="12" fill="#FF7643"/>
											<path d="M15.0785 6C13.8691 6 12.7083 6.563 11.9507 7.45269C11.193 6.563 10.0323 6 8.82287 6C6.68206 6 5 7.68206 5 9.82287C5 12.4502 7.36323 14.591 10.9428 17.8439L11.9507 18.7545L12.9585 17.837C16.5381 14.591 18.9013 12.4502 18.9013 9.82287C18.9013 7.68206 17.2193 6 15.0785 6ZM12.0202 16.8083L11.9507 16.8778L11.8812 16.8083C8.57265 13.8126 6.39013 11.8316 6.39013 9.82287C6.39013 8.43274 7.43274 7.39013 8.82287 7.39013C9.89327 7.39013 10.9359 8.07825 11.3043 9.03049H12.604C12.9655 8.07825 14.0081 7.39013 15.0785 7.39013C16.4686 7.39013 17.5112 8.43274 17.5112 9.82287C17.5112 11.8316 15.3287 13.8126 12.0202 16.8083Z" fill="white"/>
										</svg>
									</button>
								</div>
								<div class="px-4">
									<a href="<?php echo get_permalink($item->ID) ?>" class="card-title text-sm sm:text-[21px] font-bold mb-4"><?php echo get_the_title($item->ID); ?></a>
									<div class="card-description leading-[17px] mb-5"><?php echo get_the_excerpt($item->ID); ?></div>
									<div class="flex flex-wrap items-center gap-2 mb-5">
										<div class="bg-[#ffe7db] text-[#ff7642] rounded-lg px-2">
											от <?php echo $fielsdEx['price'];?> ₽
										</div>
										<?php if(isset($fielsdEx['discount_price']) && $fielsdEx['price'] > $fielsdEx['discount_price']): ?>
											<div class="text-center text-[#999999] text-sm font-medium leading-tight line-through">
												от <?php echo $fielsdEx['discount_price'];?> ₽
											</div>
										<?php endif ?>
									</div>
									<div class="relative mb-4">
										<a href="<?php echo get_permalink() ?>" class="inline-block font-bold text-[#ff7642] py-2 py-2 px-7 sm:px-8 border-2 border-[#ff7642] rounded-3xl hover:text-white hover:bg-[#FF7643]">Подробнее</a>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						</div>
						<?php endif; ?>
					</div>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>

</article><!-- #post-${ID} -->



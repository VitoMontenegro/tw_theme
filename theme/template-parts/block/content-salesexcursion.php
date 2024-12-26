<?php
$args = [
		'post_type'      => 'excursion',
		'posts_per_page' => -1, // Получаем все записи, чтобы отфильтровать вручную
];
$query = new WP_Query( $args );

$filtered_excursions = [];

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

		$fields = get_fields(get_the_ID()); // Получаем все ACF поля
		if ( isset( $fields['discount_price'], $fields['price'] ) && $fields['price'] > $fields['discount_price'] ) {
			$filtered_excursions[] = get_the_ID();
		}
	}
	wp_reset_postdata();
}

// Теперь выводим только отфильтрованные записи
if ( ! empty( $filtered_excursions ) ) {
	$args = [
			'post_type'      => 'excursion',
			'post__in'       => $filtered_excursions,
			'posts_per_page' => 5,
	];

	$query = new WP_Query( $args );
	$posts = $query->posts;


	if ( ! empty( $posts ) ) :$count=0; ?>
		<div class="mt-6">
			<h2 class="big-title">Горячие предложения</h2>
			<div class="swiper mySwiper4">
				<div class="swiper-wrapper h-auto content__tours" id="posts-container">
					<?php foreach($posts as $item) : ?>
						<?php $fielsdEx = get_fields($item->ID);?>
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
		</div>
	<?php
	endif;
	wp_reset_postdata();  // Сбрасываем глобальные данные о постах
}

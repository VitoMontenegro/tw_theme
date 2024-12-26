<?php $fields = get_fields();
$items = [];
if ($fields) {
	$items = $fields['gallery'] ??  [];

}
?>

<?php if(!$fields && is_admin()) : ?>
	<div class="sub_slide mt-6 relative">
		<div class="flex gap-4 overflow-x-auto overflow-y-hidden sm:overflow-hidden">
			<div class="w-full rounded-2xl h-[236px]">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4366.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
			</div>
			<div class="w-full  rounded-2xl h-[236px]">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Rectangle-4372.webp" class="w-full h-full object-cover rounded-2xl" loading="lazy" alt="bus">
			</div>
		</div>
	</div>
<?php else: ?>
	<?php if(count($items)) : ?>
	<div class="swiper_block mb-6">
		<div class="swiper swiperBlock">
			<div class="swiper-wrapper text-[14px]">
				<?php foreach ( $items as $item):  ?>
					<div class="swiper-slide">
						<img src="<?php echo $item; ?>" alt="image" class="object-cover h-[165px] w-full rounded-md">
					</div>
				<?php endforeach; ?>
			</div>

			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>

			<div class="swiper-pagination block sm:hidden relative mt-6"></div>
		</div>
	</div>
	<?php endif; ?>
<?php endif; ?>

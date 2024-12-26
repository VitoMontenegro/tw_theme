<?php $fields = get_fields();
$items = [];
if ($fields) {
	$items = $fields['items'] ??  [];

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
	<div class="sub_slide mt-6 relative">
		<div class="flex flex-wrap sm:flex-nowrap gap-4 overflow-x-auto overflow-y-hidden sm:overflow-hidden">
			<?php foreach ($items as $val): ?>
				<?php
					$default_color = "#3A21AA";
					$btn_color = !empty($val['color_btn']) ? $val['color_btn'] : $default_color;
					$hover_color = darken_color($btn_color, 20); // Затемняем на 20%
				?>
				<?php if(count($items) === 1): ?>
					<a href="<?php echo get_permalink($val["item"]->ID); ?>" class="w-full h-[236px] sm:h-auto rounded-2xl  bg-cover bg-center relative p-6" style="background-image: url(<?php echo get_the_post_thumbnail_url($val["item"]->ID, $size = 'full'); ?>)">
						<div class="text-white text-[18px] text-5 top-6 leading-[1.1] tracking-[0.4px] font-bold"><?php echo $val['bamr'] ?? $val['item']->post_title; ?></div>
						<div class="flex items-center justify-start lg:justify-center absolute bottom-5 left-5">
							<span class="bg-[var(--btn-bg)] hover:bg-[var(--btn-hover)] px-8 py-3 rounded-full justify-center items-center hidden sm:inline-flex text-sm font-bold text-white leading-tight" style="--btn-bg: <?php echo $btn_color; ?>">
								Подробнее
							</span>
						</div>
					</a>
				<?php else: ?>
				<div class="w-full rounded-2xl  bg-cover bg-center relative p-6 h-auto" style="background-image: url(<?php echo get_the_post_thumbnail_url($val["item"]->ID, $size = 'full'); ?>); aspect-ratio: 7/4">
					<div class="text-white text-[18px] text-5 top-6 leading-[1.1] tracking-[0.4px] font-bold"><?php echo $val['bamr'] ?? $val['item']->post_title; ?></div>
					<div class="flex items-center justify-start lg:justify-center absolute bottom-5 left-5">
						<a href="<?php echo get_permalink($val["item"]->ID); ?>" class="bg-[var(--btn-bg)] hover:bg-[var(--btn-hover)] px-8 py-3 rounded-full justify-center items-center inline-flex text-sm font-bold text-white leading-tight" style="--btn-bg: <?php echo $btn_color; ?>; --btn-hover: <?php echo $hover_color; ?>;">
							Подробнее
						</a>
					</div>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

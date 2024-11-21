<?php
/**
 * Template Name: Страница Избранное
 */

get_header(); // подключаем header.php ?>
<?php
$h1 = (get_field('h1'))?get_field('h1'):get_the_title();
?>
<section class="page-content page-default-content">
	<div class="container">
	</div>
</section>
<section class="content content--bus content--wishlist">
	<div class="container mx-auto">
		<h1><?=$h1?></h1>

		<div class="content__tours" id="tours">
			<?php
			if($_COOKIE["product"]) :
				$productCookie = $_COOKIE["product"];
				$productCookie = stripslashes($productCookie);
				$decodedProducts = json_decode($productCookie, true);

				$posts = get_posts(array(
					'posts_per_page'	=> -1,
					'post_type'		=> 'excursion',
					'include' => $decodedProducts,
				)); ?>

				<div class="grid grid-cols-4 gap-6 w-full mt-5"  id="posts-container">
					<?php foreach ($posts as $key => $item) : ?>
						<?php $post = get_post($item); setup_postdata($post); ?>
						<?php $fields = get_fields($item->ID ); ?>


						<div class="flex flex-col gap-4">
						<a href="<?php echo get_permalink() ?>" class="relative">
							<img class="rounded-xl w-full" src="<?php echo $fields['gallery'][0]['sizes']['medium_large']; ?>" alt="<?php echo $fields['gallery'][0]['name']; ?>">
							<div class="absolute left-3 bottom-4 flex gap-1 items-center">
								<span class="text-white font-600 leading-100"><?php echo $fields['duration'];?></span>
							</div>
						</a>
						<div class="flex flex-wrap text-xl text-global-luckypush font-400">
							<span class="mr-1"><?php echo $fields['price'];?> / <?php echo $fields['discount_price'];?></span>
						</div>
						<button class="wish-btn content__tour__wish-btn group" data-wp-id="<?php echo $post->ID; ?>">
							<div class="icon">
								<svg class="w-6 h-6 fill-current text-[#A5A5A5] group-[.active]:text-red-600">
									<path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
								</svg>
							</div>
						</button>
						<a href="<?php echo get_permalink() ?>" class="text-3xl font-700 leading-100"><?php echo get_the_title(); ?></a>
					</div>
					<?php endforeach;wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>

		</div>

	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>


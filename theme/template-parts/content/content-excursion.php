<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

$fields = get_fields();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container mx-auto">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->
		<div class="bold mb-2">Продолжительность: <?php echo $fields['duration'];	?></div>
		<div class="bold mb-2">Стоимость (старая): <?php echo $fields['price'];?></div>
		<div class="bold mb-2">Стоимость (новая): <?php echo $fields['discount_price'];?></div>

		<button class="wish-btn content__tour__wish-btn group" data-wp-id="<?php echo $post->ID; ?>">
			<div class="icon">
				<svg class="w-6 h-6 fill-current text-[#A5A5A5] group-[.active]:text-red-600">
					<path class="icon-path" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path>
				</svg>
			</div>
		</button>
		<div class="grid grid-cols-4 gap-6 w-full">
			<?php foreach ($fields["gallery"] as $image) : ?>
				<img src="<?php echo $image["sizes"]["medium_large"] ?>" alt="<?php $image["name"]; ?>">
			<?php endforeach; ?>
		</div>


		<div <?php tw_content_class( 'entry-content' ); ?>>
			<?php
			the_content(
					sprintf(
							wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers. */
									__( 'Continue reading<span class="sr-only"> "%s"</span>', 'tw' ),
									array(
											'span' => array(
													'class' => array(),
											),
									)
							),
							get_the_title()
					)
			);


			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php tw_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>

</article><!-- #post-${ID} -->

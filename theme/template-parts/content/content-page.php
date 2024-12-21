<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="flex gap-6">
			<?php get_sidebar('simple'); ?>
			<div class="overflow-x-hidden">
				<div class="entry-content">
						<h1 class="mt-0 text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<?php the_content(); ?>
				</div>
			</div>

		</div>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->

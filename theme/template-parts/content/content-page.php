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
					<div class="px-5 sm:px-8 md:pb-5 sm:pb-8 rounded-3xl big-title" id="sectionDesc">
						<h1 class="text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<?php the_content(); ?>
					</div>
				</div>
			</div>

		</div>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->

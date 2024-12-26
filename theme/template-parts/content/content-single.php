<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

?>

<article id="post-<?php the_ID(); ?>" class="mb-8">

	<div class="container"><article id="post-<?php the_ID(); ?>" class="mb-8">

			<div class="flex gap-6">
				<?php get_sidebar('simple'); ?>
				<div class="overflow-x-hidden w-full">
					<div class="entry-content">
						<h1 class="mt-0 text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<img class="w-full max-h-[320px] w-full rounded-xl overflow-hidden object-cover mb-6" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">

						<div class="content big-title">
							<?php the_content(); ?>
						</div>
					</div>
				</div>

			</div>
	</div>



</article><!-- #post-${ID} -->

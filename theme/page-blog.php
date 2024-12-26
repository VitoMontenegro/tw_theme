<?php
/**
 * Template Name: Блог
 *
* This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

get_header();
?>
<?php get_template_part( 'template-parts/layout/submenu', 'content' ); ?>

	<section id="primary">
		<main id="main">
			<?php get_template_part( 'template-parts/layout/breadcrumbs', 'content' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="container">
						<div class="flex gap-6">
							<?php get_sidebar('simple'); ?>

							<div class="product-cards">
								<h1 class="mt-0 text-2xl sm:text-3xl font-bold tracking-tight"><?php the_title() ; ?></h1>

								<div class="flex flex-col" >

									<div class="grid grid-col-12 xs:grid-cols-12 gap-3 sm:gap-6 w-full mt-1 content__tours"  id="posts-container">
										<?php
										get_template_part( 'template-parts/content/content', 'loop-blog' );
										?>

									</div>
								</div>

								<div class="entry-content mt-11">
									<?php the_content(); ?>
								</div
							</div>

						</div>
					</div>
				</article>

			<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

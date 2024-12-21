<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _tw
 */

get_header();
?>

	<section id="primary">
		<main id="main">
			<?php get_template_part( 'template-parts/layout/breadcrumbs', 'content' ); ?>
			<div class="container">
				<div class="flex gap-6">
					<?php get_sidebar('simple'); ?>
					<div class="overflow-x-hidden">
						<div class="entry-content">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.png" alt="hero">
						</div>
					</div>

				</div>
			</div>


		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

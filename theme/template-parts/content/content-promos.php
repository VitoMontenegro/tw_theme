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
	<div class="container">
		<div class="flex gap-6">
			<?php get_sidebar('simple'); ?>
			<div class="overflow-x-hidden w-full">
				<div class="entry-content">
						<h1 class="mt-0 text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<div class="p-5 sm:p-8 bg-white rounded-xl overflow-hidden w-full flex flex-col sm:flex-row gap-6">
							<img class="w-full min-w-[320px] aspect-square rounded-sm overflow-hidden object-cover" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">
							<div class="content big-title">
								<?php the_content(); ?>
							</div>
						</div>
					<div class="flex mt-6 gap-4">
						<a href="http://flagman.loc/excursion/ekskursiya-v-krepost-oreshek-s-kvestom-krepkij-oreshek-novye-priklyucheniya" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Назад к спецпредложеням</a>
						<a href="http://flagman.loc/excursion/ekskursiya-v-krepost-oreshek-s-kvestom-krepkij-oreshek-novye-priklyucheniya" class="inline-flex h-10 items-center justify-center font-bold text-[#FF7A45]  px-7 sm:px-8 border-2 border-[#FF7A45] rounded-3xl hover:text-white hover:bg-[#FF7A45] text-[12px] lg:text-sm">Дальше</a>
					</div>
				</div>
			</div>

		</div>
	</div>


</article><!-- #post-<?php the_ID(); ?> -->




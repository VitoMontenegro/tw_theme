<?php $fields = get_fields(); ?>

<?php if(!$fields && is_admin()) : ?>
	<div class="grid grid-cols-1 md:grid-cols-12 gap-4 mt-10">
		<!-- Левый блок -->
		<div class="md:col-span-7 order-1">
			<h2 class="!mt-0">Какие достопримечательности посетят школьники на наших экскурсиях?</h2>
		</div>

		<!-- Правый блок (картинка) -->
		<div class="md:col-span-5 order-2  md:row-span-2">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/help_choose.webp" class="w-full h-full object-cover" loading="lazy" alt="hero">
		</div>

		<!-- Контент -->
		<div class="md:col-span-7 order-3">
			<p>Во время экскурсий по Санкт-Петербургу и пригородам дети смогут погрузиться в удивительный мир истории и культуры. Их ждут роскошные залы царских дворцов в Пушкине и Петергофе, интерактивные опыты в «Парке чудес Галилео», тайны киностудии «Ленфильм», волшебная атмосфера новогоднего Петербурга, а также путешествия по мифам и легендам города с посещением Кунсткамеры.</p>
			<p>Школьники также познакомятся с производством мороженого и хлеба на фабриках города и узнают о жизни и творчестве Римского-Корсакова в его музее.</p>
		</div>
	</div>
<?php else: ?>
	<div class="grid grid-cols-1 md:grid-cols-12 gap-4 mt-10" style="grid-template-rows: 110px 1fr">
		<!-- Левый блок -->
		<div class="md:col-span-7 order-1 h-full">
			<h2 class="!mt-0 !mb-0"><?php echo $fields['title']; ?></h2>
		</div>

		<!-- Правый блок (картинка) -->
		<div class="md:col-span-5 order-2 md:row-span-2 rounded-xl overflow-hidden">
			<img src="<?php echo $fields['img']; ?>" class="object-cover sm:w-auto" loading="lazy" alt="hero">
		</div>

		<!-- Контент -->
		<div class="md:col-span-7 order-3"><?php echo $fields['text']; ?></div>
	</div>
<?php endif; ?>

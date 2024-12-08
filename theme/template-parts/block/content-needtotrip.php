
<?php $fields = get_fields(); ?>



<?php if(!$fields && is_admin()) : ?>
	<div class="grid grid-cols-12 gap-3 sm:gap-4 w-full mt-5 bg-right-bottom bg-no-repeat bg-50% sm:bg-27%"
		 style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/toneed.svg')">

		<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
			<div class="text-[22px] font-bold mb-1.5">01</div>
			<div class="">Определиться с экскурсией</div>
		</div>
		<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
			<div class="text-[22px] font-bold mb-1.5">02</div>
			<div class="">Сообщить нам количество детей и взрослых</div>
		</div>
		<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
			<div class="text-[22px] font-bold mb-1.5">03</div>
			<div class="">Заполнить план рассадки <a href="#">скачать файл</a></div>
		</div>
		<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
			<div class="text-[22px] font-bold mb-1.5">04</div>
			<div class="">Ознакомиться с договором и внести предоплату 30%</div>
		</div>
		<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
			<div class="text-[22px] font-bold mb-1.5">05</div>
			<div class="">Все остальное мы сделаем	за вас!</div>
		</div>
	</div>
<?php else: ?>
	<div class="grid grid-cols-12 gap-3 sm:gap-4 w-full mt-5 bg-right-bottom bg-no-repeat bg-50% sm:bg-27%"
		 style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/toneed.svg')">
		<?php foreach ($fields['items'] as $item) : ?>
			<div class="bg-[#CFC5FF] p-4 sm:p-6 rounded-2xl h-[118px] col-span-6 md:col-span-4">
				<div class="text-[22px] font-bold mb-1.5"><?php echo $item['title'] ?></div>
				<div class="text_link_underline"><?php echo $item['contetnt'] ?></div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>


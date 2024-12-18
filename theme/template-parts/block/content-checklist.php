<?php $fields = get_fields();
$color = '#08A500';
$cols = 1;
$list = [];
if ($fields) {
	$color = $fields['color'];
	$cols = $fields['count_colls'];
	$list = $fields['list'];
}
?>

<?php if(!$fields && is_admin()) : ?>
	<div class="grid-cols-1 sm:grid-cols-3"></div>
	<ul class="grid grid-cols-1 sm:grid-cols-2 mt-4 gap-4">
		<li class="w-wull sm:w-7/12 flex gap-4 items-center">
		<span class="bg-[#08A500] rounded-full flex items-center justify-center">
		<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
			<g clip-path="url(#clip0_135_6057)">
				<path d="M7.11719 13.8406L10.479 17.2024L18.8835 8.79785" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</g>
		</svg>
		</span>
			<span>
			За каждой группой закреплен личный менеджер, который на связи в любое время
		</span>
		</li>
		<li class="w-wull sm:w-7/12 flex gap-4 items-center">
		<span class="bg-[#FF7A45] rounded-full flex items-center justify-center">
			<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
				<g clip-path="url(#clip0_135_6057)">
					<path d="M7.11719 13.8406L10.479 17.2024L18.8835 8.79785" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
			</svg>
		</span>
			<span>
			Перемещение и скорость автобуса отслеживаются через спутниковую систему ГЛОНАСС и тахограф
		</span>
		</li>
	</ul>
<?php else: ?>
	<?php if ($fields['title']): ?>
		<div class="relative">
			<h2 class="wp-block-heading max-w-[200px] md:max-w-full"><?php echo $fields['title']; ?></h2>
			<?php echo $fields['desc']; ?>
			<div class="flex gap-6">
				<ul class="grid grid-cols-1 mt-4 gap-2 w-full md:w-2/3">
					<?php foreach ($list as $item) : ?>
						<li class="flex gap-4 items-start<?php if(isset($fields['is_margin']) && $fields['is_margin']) echo ' mb-4'; ?>">
							<?php if($item['element_spiska']) : ?>
								<span class="rounded-full flex items-center justify-center mt-1.5" style="background: <?php echo $color; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
									<g clip-path="url(#clip0_135_6057)">
										<path d="M7.11719 13.8406L10.479 17.2024L18.8835 8.79785" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</g>
								</svg>
							</span>
							<?php endif; ?>
							<span>
							<?php echo $item['element_spiska'] ?>
						</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="absolute left-[-15px] md:left-auto md:right-[5%] top-0 md:top-auto md:bottom-[20%]">

				<svg class="hidden md:block" width="253" height="64" viewBox="0 0 253 64" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M251.5 8.72224L217.61 17.3466L216.704 17.5725L216.622 17.4447L212.862 22.3305L213.834 12.1369L209.5 6L251.5 8.72224Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M251.499 8.72266L224.547 30.3877L218.47 20.4616L216.703 17.5729L217.609 17.347L251.499 8.72266Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M251.499 8.72266L217.609 17.347L216.621 17.4451L251.499 8.72266Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M213.836 12.1373L251.501 8.72266L216.627 17.4451L212.863 22.3309L213.836 12.1373Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M212.863 22.3299L218.783 20.9688" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M209.5 26.5265C198.12 30.6469 185.408 31.2243 173.681 28.1525C168.669 26.8406 163.642 24.7435 160.323 20.8679C157.003 16.9924 155.891 10.992 158.887 6.87622C162.368 2.09068 170.29 1.83662 174.946 5.55974C179.602 9.28285 181.124 15.8237 179.939 21.5654C178.751 27.3072 162.323 48.6598 148.5 57.5C105.5 85 80.5 1.5 1.5 1.5" stroke="#393488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 6"/>
				</svg>
				<svg class="block md:hidden" width="352" height="79" viewBox="0 0 352 79" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M350.5 6.72224L316.61 15.3466L315.704 15.5725L315.622 15.4447L311.862 20.3305L312.834 10.1369L308.5 4L350.5 6.72224Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M350.499 6.72266L323.547 28.3877L317.47 18.4616L315.703 15.5729L316.609 15.347L350.499 6.72266Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M350.499 6.72266L316.609 15.347L315.621 15.4451L350.499 6.72266Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M312.836 10.1373L350.501 6.72266L315.627 15.4451L311.863 20.3309L312.836 10.1373Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M311.863 20.3299L317.783 18.9688" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M308.5 24.5265C297.12 28.6469 284.408 29.2243 272.681 26.1525C267.669 24.8406 262.642 22.7435 259.323 18.8679C256.003 14.9924 254.891 8.99198 257.887 4.87622C261.368 0.0906792 269.29 -0.16338 273.946 3.55974C278.602 7.28285 280.124 13.8237 278.939 19.5654C277.751 25.3072 261.323 46.6598 247.5 55.5C204.5 83 80.5 84 1 64.5" stroke="#393488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 6"/>
				</svg>

			</div>
		</div>
	<?php else: ?>
		<ul class="grid grid-cols-1 sm:grid-cols-<?php echo $cols; ?> mt-4 gap-4">
			<?php foreach ($list as $item) : ?>
				<li class="flex gap-4 items-start<?php if(isset($fields['is_margin']) && $fields['is_margin']) echo ' mb-4'; ?>">
					<?php if($item['element_spiska']) : ?>
						<span class="rounded-full flex items-center justify-center mt-1.5" style="background: <?php echo $color; ?>">
				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
					<g clip-path="url(#clip0_135_6057)">
						<path d="M7.11719 13.8406L10.479 17.2024L18.8835 8.79785" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</g>
				</svg>
			</span>
					<?php endif; ?>
					<span>
				<?php echo $item['element_spiska'] ?>
			</span>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif ?>
<?php endif; ?>

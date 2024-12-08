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
		<span class="bg-[#FF7643] rounded-full flex items-center justify-center">
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
	<ul class="grid grid-cols-1 sm:grid-cols-<?php echo $cols; ?> mt-4 gap-4">
		<?php foreach ($list as $item) : ?>
		<li class="flex gap-4 items-center">
			<?php if($item['element_spiska']) : ?>
			<span class="rounded-full flex items-center justify-center" style="background: <?php echo $color; ?>">
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
<?php endif; ?>

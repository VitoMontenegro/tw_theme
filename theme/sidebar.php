<?php
$sidebar_term = get_query_var('sidebar_term');

if ($sidebar_term) {
	$current_category = $sidebar_term;
} else {
	$current_category = get_queried_object(); // Текущая категория
}

if ($current_category && isset($current_category->term_id)) : ?>
		<div class="bg-white p-4 rounded-lg  h-screen lg:h-full">
			<form id="filter-form" class="mb-7 excursions-container" data-category-id="<?php echo $current_category->term_id; ?>">
				<div class="flex justify-between items-center">
					<div class="text-lg font-bold mb-6">Фильтр</div>
					<div class="close-filter-btn block lg:hidden cursor-pointer">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
							<rect x="1.35156" y="15.4482" width="20.3974" height="1.69979" rx="0.849893" transform="rotate(-45 1.35156 15.4482)" fill="#999999"/>
							<rect x="2.2019" y="1" width="20.3974" height="1.69979" rx="0.849893" transform="rotate(45 2.2019 1)" fill="#999999"/>
						</svg>
					</div>
				</div>
				<input type="hidden" id="category_id" value="<?php echo $current_category->term_id; ?>">

				<div class="flex gap-3 flex-col w-full mb-6">
					<div class="font-bold">Стоимость</div>
					<div class="flex gap-2 flex-wrap radio-group">
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="price" value="1000-1500" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#927CF5] peer-checked:text-white transition">
						  	1000₽ - 1500₽
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="price" value="1500-2000" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#927CF5] peer-checked:text-white transition">
						  	1500₽ - 2000₽
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="price" value="2000-10000" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#927CF5] peer-checked:text-white transition">
						  	2000₽ - 10000₽
						</span>
						</label>
					</div>
				</div>
				<div class="flex gap-3 flex-col w-full mb-6">
					<div class="font-bold">Продолжительность</div>
					<div class="flex gap-4 flex-wrap radio-group">

						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="duration" value="12" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	1-2 часа
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="duration" value="23" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	2-3 часа
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="duration" value="45" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	4-5 часов
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="duration" value="67" class="hidden peer">
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	6-7 часов
						</span>
						</label>
					</div>
				</div>

				<div class="flex gap-1 flex-col w-full mb-[30px]">
					<div class="font-bold">Классы</div>
					<div class="flex gap-1.5 flex-wrap radio-group">
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="1" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	1
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="2" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	2
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="3" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	3
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="4" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	4
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="5" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	5
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="6" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	6
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="7" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	7
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="8" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	8
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="9" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	9
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="10" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	10
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="11" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#E3DFFF] peer-checked:text-white transition">
						  	11
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="d" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	Дошкольники
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="checkbox" name="grade" value="n" class="hidden peer">
							<span class="px-[13px] py-[6px] border rounded-xl bg-gray-200 text-black peer-checked:bg-[#7C64E8] peer-checked:text-white transition">
						  	Начальные классы
						</span>
						</label>
					</div>
				</div>

				<div class="block lg:hidden">
					<button type="button" class="close-filter-btn flex text-white px-8 py-2.5 bg-[#ff7642] rounded-full justify-center items-center gap-2 mb-3">
						<span class="text-center text-white text-sm font-bold  leading-tight  close-filter-btn">Показать</span>
					</button>
					<button type="button"  id="clearForm" class="flex px-8 py-2.5 bg-[#F2F1FA] rounded-full justify-center items-center gap-2 mb-3">
						<span class="text-center text-sm font-bold  leading-tight">Сбросить все фильтры</span>
					</button>
				</div>
			</form>
			<div class="hidden lg:block">
				<?php $categories = get_nested_categories_by_parent(0,'excursion_category'); ?>
				<?php if (!empty($categories)) : ?>
					<ul class="flex flex-col gap-5">
						<?php foreach ($categories as $category) : ?>
							<li class="flex flex-col gap-3">
								<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold">
									<?php $fields = get_fields('excursion_category_' . $category['id']); ?>
									<?php echo esc_html($fields['title_double'])?>
								</a>
								<ul class="flex flex-col gap-1.5">
									<?php foreach ($category["children"] as $child) : ?>
										<li class="group<?php echo is_current_category($child["id"]) ? ' active' : ''; ?>">
											<?php $link = $child["single_post_slug"] ?? $child['link']; ?>
											<a href="<?php echo $link; ?>" class="group-[.active]:text-[#927CF5]">
												<?php echo esc_html($child['name'])?>
											</a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
<?php endif; ?>

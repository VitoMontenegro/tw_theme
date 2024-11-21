<?php
$sidebar_term = get_query_var('sidebar_term');

if ($sidebar_term) {
	$current_category = $sidebar_term;
} else {
	$current_category = get_queried_object(); // Текущая категория
}

if ($current_category && isset($current_category->term_id)) {
	// Получаем самого верхнего родителя
	$top_parent = get_top_parent_category($current_category->term_id, 'excursion_category');
	if ($top_parent) {
		// Получаем все категории, у которых родительский ID равен ID верхнего родителя
		/*
			$sibling_categories = get_sibling_categories($top_parent->term_id, 'excursion_category');

			if (!empty($sibling_categories)) : ?>
				<ul class="categories">
					<?php foreach ($sibling_categories as $category) : ?>
						<li>
							<a href="<?php echo esc_url($category['link']); ?>">
								<?php echo esc_html($category['name']); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif;
		*/
		$categories_tree = get_nested_categories_by_parent($top_parent->term_id, 'excursion_category');
		if (!empty($categories_tree)) : ?>
			<form id="filter-form" class="mb-7">
				<input type="hidden" id="category_id" value="<?php echo $current_category->term_id; ?>" />
				<div class="flex gap-1 flex-col w-full mb-[30px]">
					<label for="posts_per_page">Экскурсий на странице:</label>
					<div class="flex gap-4 flex-wrap">

						<label class="flex items-center cursor-pointer">
							<input type="radio" name="posts_per_page" value="" class="hidden peer" checked  />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	Все
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="posts_per_page" value="5" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	5
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="posts_per_page" value="10" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	10
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="posts_per_page" value="20" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	20
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="posts_per_page" value="50" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	50
						</span>
						</label>
					</div>
				</div>

				<div class="flex gap-1 flex-col w-full mb-[30px]">
					<div class="text-grey">Продолжительность</div>
					<div class="flex gap-4 flex-wrap">

						<label class="flex items-center cursor-pointer">
							<input type="radio" name="duration" value="" class="hidden peer" checked  />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	Любая
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="duration" value="lt3" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	До 3 часов
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="duration" value="3-5" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	3-5 часов
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="duration" value="gt5" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	Более 5 часов
						</span>
						</label>
					</div>
				</div>

				<div class="flex gap-1 flex-col w-full">
					<div class="text-grey">Цена:</div>
					<div class="flex gap-4 flex-wrap">

						<label class="flex items-center cursor-pointer">
							<input type="radio" name="price" value="" class="hidden peer" checked  />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	Любая
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="price" value="1000-1500" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	1000₽ - 1500₽
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="price" value="1500-2000" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	1500₽ - 2000₽
						</span>
						</label>
						<label class="flex items-center cursor-pointer">
							<input type="radio" name="price" value="2000-10000" class="hidden peer" />
							<span class="px-4 py-2 border rounded-xl bg-gray-200 text-black peer-checked:bg-gray-400 peer-checked:text-white transition">
						  	2000₽ - 10000₽
						</span>
						</label>
					</div>
				</div>
			</form>
			<div class="flex flex-col gap-1">
				<div class="title_sidebar">Виды экскурсий</div>
			<div class="flex flex-col gap-4">
				<?php foreach ($categories_tree as $category) : ?>
					<div>
						<a href="<?php echo esc_url($category['link']); ?>" class="flex items-center gap-2 group<?php echo is_current_category($category["id"]) ? ' active' : ''; ?>">
							<span class="w-10 h-10 border-2 rounded-md border-black flex items-center justify-center group-active:bg-gray-200 group-[.active]:text-red-500 group-[.active]:border-red-500">
									<span class="invisible group-[.active]:visible">✓</span>
							</span>
							<span class="text-black group-[.active]:text-red-500"><?php echo esc_html($category['name']); ?></span>
						</a>
						<?php if (!empty($category['children'])) : ?>
							<?php render_children_categories($category['children']); ?>
						<?php endif; ?>
					</div>

				<?php endforeach; ?>
			</div>
			</div>
		<?php endif;
	}
}


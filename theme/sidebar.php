<?php
$sidebar_term = get_query_var('sidebar_term');
$options = get_fields( 'option');

if ($sidebar_term) {
	$current_category = $sidebar_term;
} else {
	$current_category = get_queried_object(); // Текущая категория
}

if ($current_category && isset($current_category->term_id)) : ?>
<div class="bg-white text-[14px] ps-4 pe-2 py-4 rounded-lg h-screen lg:h-full">
	<form id="filter-form" class="mb-5 excursions-container" data-category-id="<?php echo $current_category->term_id; ?>">
		<div class="flex justify-between items-center">
			<div class="text-lg font-bold mb-2">Фильтр</div>
			<div class="close-filter-btn block lg:hidden cursor-pointer">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
					<rect x="1.35156" y="15.4482" width="20.3974" height="1.69979" rx="0.849893" transform="rotate(-45 1.35156 15.4482)" fill="#999999"/>
					<rect x="2.2019" y="1" width="20.3974" height="1.69979" rx="0.849893" transform="rotate(45 2.2019 1)" fill="#999999"/>
				</svg>
			</div>
		</div>
		<input type="hidden" id="category_id" value="<?php echo $current_category->term_id; ?>">

		<div class="flex gap-3 flex-col w-full mb-4">
			<div class="font-bold">Стоимость</div>
			<div class="flex gap-2 flex-wrap radio-group">
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="price" value="1000-1500" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>1000 ₽ - 1500 ₽</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="price" value="1500-2000" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>1500 ₽ - 2000 ₽</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="price" value="2000-10000" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>2000 ₽ - 10000 ₽</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
			</div>
		</div>
		<div class="flex gap-3 flex-col w-full mb-4">
			<div class="font-bold">Продолжительность</div>
			<div class="flex gap-2 flex-wrap radio-group">
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="duration" value="12" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>1-2 часа</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="duration" value="23" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>2-3 часа</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="duration" value="45" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>4-5 часов</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="duration" value="67" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>6-7 часов</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
			</div>
		</div>
		<div class="flex gap-1 flex-col w-full">
			<div class="font-bold">Классы</div>
			<div class="flex gap-1.5 flex-wrap radio-group">
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="1" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			1
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="2" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			2
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="3" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			3
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="4" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			4
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="5" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			5
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="6" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			6
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="7" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			7
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="8" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			8
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="9" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			9
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="10" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			10
			</span>
				</label>
				<label class="flex items-center cursor-pointer">
					<input type="checkbox" name="grade" value="11" class="hidden peer">
					<span class="px-[13px] py-[6px] border rounded-xl bg-[#F2F1FA] peer-checked:bg-[#E3DFFF]  transition">
			11
			</span>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="grade" value="d" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>Дошкольники</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="grade" value="n" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>Начальные классы</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
				<label class="flex items-center cursor-pointer relative">
					<input type="checkbox" name="grade" value="s" class="hidden peer">
					<span class="ps-4 pe-4 peer-checked:pe-8 py-1.5 border rounded-2xl bg-[#F2F1FA]  peer-checked:bg-[#927CF5] peer-checked:text-white transition">
				<span>Старшие классы</span>
				</span>
					<svg class="hidden peer-checked:block absolute right-3" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
						<g clip-path="url(#clip0_135_6361)">
							<path d="M6 0.5C9.03757 0.5 11.5 2.96243 11.5 6C11.5 9.03757 9.03757 11.5 6 11.5C2.96243 11.5 0.5 9.03757 0.5 6C0.5 2.96243 2.96243 0.5 6 0.5ZM4.66885 4H3.89095C3.86442 4 3.83899 4.01054 3.82023 4.02929C3.78118 4.06834 3.78118 4.13166 3.82024 4.17071L5.57477 5.92517L3.6707 7.82929C3.65195 7.84804 3.64142 7.87348 3.64142 7.9C3.64142 7.95523 3.68619 8 3.74142 8H4.51883C4.54535 8 4.57079 7.98947 4.58954 7.97072L6.10502 6.45542L7.62046 7.97071C7.63921 7.98947 7.66465 8 7.69117 8H8.46909C8.49561 8 8.52104 7.98946 8.5398 7.97071C8.57885 7.93166 8.57885 7.86834 8.5398 7.82929L6.63552 5.92492L8.3898 4.17071C8.40855 4.15196 8.41909 4.12652 8.41909 4.1C8.41909 4.04477 8.37432 4 8.31909 4H7.54094C7.51442 4 7.48898 4.01054 7.47023 4.02929L6.10502 5.39467L4.73956 4.02929C4.7208 4.01054 4.69537 4 4.66885 4Z" fill="white"/>
						</g>
						<defs>
							<clipPath id="clip0_135_6361">
								<rect width="12" height="12" fill="white"/>
							</clipPath>
						</defs>
					</svg>
				</label>
			</div>
		</div>
		<div class="block lg:hidden mt-4">
			<button type="button" class="close-filter-btn flex text-white px-8 py-3 bg-[#FF7A45] rounded-full justify-center items-center gap-2 mb-3 w-full min-w-[280px]">
				<span class="text-center text-white text-sm font-bold  leading-tight  close-filter-btn">Показать</span>
			</button>
			<button type="button"  id="clearForm" class="flex px-8 py-3 bg-[#F2F1FA] rounded-full justify-center items-center gap-2 mb-3 w-full min-w-[280px]">
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
						<a href="<?php echo esc_url($category['link']) ?>" class="text-sm font-bold hover:text-[#927CF5]">
							<?php $fields = get_fields('excursion_category_' . $category['id']); ?>
							<?php echo esc_html($fields['title_double'])?>
						</a>
						<ul class="flex flex-col gap-1.5">
							<?php foreach ($category["children"] as $child) : ?>
								<li class="group<?php echo is_current_category($child["id"]) ? ' active' : ''; ?>">
									<?php $link = $child["single_post_slug"] ?? $child['link']; ?>

									<?php if (isset($child["children"]) && is_array($child["children"]) && count($child["children"]) > 0) : ?>
										<details class="sidebar_link">
											<summary class="flex items-center justify-between cursor-pointer group-[open]:text-[#927CF5] groups pe-1">
												<a href="<?php echo $link; ?>" class="inline-block group-[.active]:text-[#927CF5] hover:text-[#927CF5]">
													<?php $childtFields = get_fields(get_term_by('id', $child["id"],'excursion_category')); ?>
													<?php echo (isset($childtFields['title_double']) && !empty($childtFields['title_double']) ) ? $childtFields['title_double'] : esc_html($child['name']); ?>
												</a>
												<span class="ml-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none" class="arrow">
														<path d="M1.5 3.75L6 8.25L10.5 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
													</svg>
												</span>
											</summary>
											<ul class="flex flex-col gap-1.5 pl-4 mt-1.5">
												<?php foreach ($child["children"] as $subchild) : ?>
													<li class="group<?php echo is_current_category($subchild["id"]) ? ' active' : ''; ?>">
														<?php $sublink = $subchild["single_post_slug"] ?? $subchild['link']; ?>
														<a href="<?php echo $sublink; ?>" class="group-[.active]:text-[#927CF5] hover:text-[#927CF5]">
															<?php $catFields = get_fields(get_term_by('id', $subchild["id"],'excursion_category')); ?>
															<?php echo (isset($catFields['title_double']) && !empty($catFields['title_double']) ) ? $catFields['title_double'] : esc_html($subchild['name']); ?>
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										</details>
									<?php else : ?>
										<a href="<?php echo $link; ?>" class="group-[.active]:text-[#927CF5] hover:text-[#927CF5]">

											<?php $childtFields = get_fields(get_term_by('id', $child["id"],'excursion_category')); ?>
											<?php echo (isset($childtFields['title_double']) && !empty($childtFields['title_double']) ) ? $childtFields['title_double'] : esc_html($child['name']); ?>
										</a>

									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="pt-6 flex flex-col gap-4">
		<div class="text-sm font-bold">Работаем официально по лицензии №</div>
		<div class="image_block relative">
			<?php if(!empty($options['sert'])): ?>
				<?php foreach($options['sert'] as $key => $item): ?>
					<?php if($key === 0) :?>
						<img src="<?php echo $item['sizes']['medium']?>" alt="<?php echo $item['name']?>" class="h-[158px] w-[105px] object-contain">
					<?php else: ?>
						<img src="<?php echo $item['sizes']['medium']?>" alt="<?php echo $item['name']?>" class="h-[158px] w-[105px] absolute left-[80px] top-4  object-contain">
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<div class="tracking-tight flex flex-col gap-2 mt-3">
			<div class="ext-sm font-bold">Страхование пассажиров</div>
			<?php if(!empty($options['logo_sigur'])): ?>
				<div class="flex h-8">
					<img src="<?php echo $options['logo_sigur']?>" alt="logo" class="object-contain">
				</div>
			<?php endif; ?>
			<?php if(!empty($options['about_sig'])): ?>
				<div class="text-[#878787]"><?php echo $options['about_sig']?></div>
			<?php endif; ?>
			<?php if(!empty($options['strahovki'])): ?>
				<div class="text-[#878787]">№ страховки <span class="text-[#000]"><?php echo $options['strahovki']?></span> </div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php endif; ?>

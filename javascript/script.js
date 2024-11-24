/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

document.addEventListener('DOMContentLoaded', function() {

	//filter excursion
	const categoryIdElem = document.getElementById('category_id');

	if(categoryIdElem) {
		let currentPage = 1;
		const categoryId = document.getElementById('category_id').value;
		document.getElementById('filter-form').addEventListener('change', function() {
			loadPosts(1);
		});
		document.getElementById('pagination').addEventListener('click', function(event) {
			if (event.target.classList.contains('pagination-link')) {
				const page = parseInt(event.target.dataset.page);
				loadPosts(page);
			}
		});
		function loadPosts(page) {
			// Собираем массив значений выбранных чекбоксов
			const getCheckedValues = (name) => {
				return Array.from(document.querySelectorAll(`input[name="${name}"]:checked`)).map(input => input.value);
			};
			const duration = getCheckedValues('duration');
			const price = getCheckedValues('price');
			const postsPerPage = 10
			const grade = getCheckedValues('grade');

			const params = new URLSearchParams({
				grade: JSON.stringify(grade),
				price: JSON.stringify(price),
				duration: JSON.stringify(duration),
				page:currentPage,
				posts_per_page: postsPerPage,
				category_id: categoryId,
			});

			fetch('/wp-json/my_namespace/v1/filter-posts/?' + params.toString())
				.then(response => {
					if (!response.ok) {
						throw new Error('Failed to fetch the template.');
					}
					return response.text();
				})
				.then(html => {
					document.getElementById('posts-container').innerHTML = html;
					const wishBtns = document.getElementById('posts-container').querySelectorAll('.wish-btn');
					if (wishButtons) {
						let currentProducts = getCookie('product');
						try {
							currentProducts = currentProducts ? JSON.parse(currentProducts) : [];
						} catch (e) {
							console.error("Error parsing cookies:", e);
							currentProducts = []; // Сбрасываем в пустой массив при ошибке
						}

						wishBtns.forEach(button => {
							const productId = button.getAttribute('data-wp-id');

							// Добавляем класс active на кнопки, которые соответствуют продуктам в куки
							if (currentProducts.includes(productId)) {
								button.classList.add('active');
							}

						});
					}

				})
				.catch(error => console.error('Error loading posts:', error));
		}
	}


	//wishlist
	const wishButtons = document.querySelectorAll('.wish-btn');
	if (wishButtons) {
		let currentProducts = getCookie('product');
		try {
			currentProducts = currentProducts ? JSON.parse(currentProducts) : [];
		} catch (e) {
			console.error("Error parsing cookies:", e);
			currentProducts = []; // Сбрасываем в пустой массив при ошибке
		}

		wishButtons.forEach(button => {
			const productId = button.getAttribute('data-wp-id');

			// Добавляем класс active на кнопки, которые соответствуют продуктам в куки
			if (currentProducts.includes(productId)) {
				button.classList.add('active');
			}

		});
	}
	document.getElementById('posts-container').addEventListener('click', (event) => {
		const button = event.target.closest('.wish-btn');
		if (!button) return; // Если клик не по wish-btn, выходим

		let currentProducts = getCookie('product');
		try {
			currentProducts = currentProducts ? JSON.parse(currentProducts) : [];
		} catch (e) {
			console.error("Error parsing cookies:", e);
			currentProducts = [];
		}

		const productId = button.getAttribute('data-wp-id');

		// Обновляем куки и класс active
		if (currentProducts.includes(productId)) {
			// Если продукт уже в куки, удаляем его
			currentProducts = currentProducts.filter(id => id !== productId);
			button.classList.remove('active');
		} else {
			// Если продукта нет в куки, добавляем его
			currentProducts.push(productId);
			button.classList.add('active');
		}

		// Сохраняем обновленные куки
		setCookie('product', JSON.stringify(currentProducts), 7);
	});

// Функция получения куки
	function getCookie(name) {
		const cookieArr = document.cookie.split(";");
		for (let i = 0; i < cookieArr.length; i++) {
			let cookie = cookieArr[i].trim();
			if (cookie.startsWith(name + "=")) {
				return cookie.substring(name.length + 1);
			}
		}
		return null;
	}

// Функция установки куки
	function setCookie(name, value, days) {
		const date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		const expires = "expires=" + date.toUTCString();
		document.cookie = name + "=" + value + ";" + expires + ";path=/";
	}

});

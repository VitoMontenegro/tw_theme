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
		let currentPage = 1; // Первая страница по умолчанию
		const categoryId = document.getElementById('category_id').value;
		document.getElementById('filter-form').addEventListener('change', function(event) {
			loadPosts(1);
		});
		document.getElementById('pagination').addEventListener('click', function(event) {
			if (event.target.classList.contains('pagination-link')) {
				const page = parseInt(event.target.dataset.page);
				loadPosts(page);
			}
		});
		function loadPosts(page) {
			const duration = document.querySelector('input[name="duration"]:checked')?.value;
			const price = document.querySelector('input[name="price"]:checked')?.value;
			const postsPerPage = document.querySelector('input[name="posts_per_page"]:checked')?.value;
			const grade = document.querySelector('input[name="grade"]:checked')?.value;
			//const postsPerPage = document.getElementById('posts_per_page').value;

			// Формируем параметры запроса
			const params = new URLSearchParams({
				grade,
				price,
				duration,
				page,
				posts_per_page: postsPerPage,
				category_id: categoryId, // Добавляем category_id
			});

			// Запрос на API с использованием fetch
			fetch('/wp-json/my_namespace/v1/filter-posts/?' + params.toString())
				.then(response => response.json())
				.then(data => {
					// Обновляем посты
					let postsHtml = '';
					data.posts.forEach(post => {
						postsHtml += `
                        <div class="flex flex-col gap-4">
                            <a href="${post.url}" class="relative">
                                <img class="rounded-xl w-full" src="${post.image}" alt="${post.title}">
                                <div class="absolute left-3 bottom-4 flex gap-1 items-center">
                                    <span class="text-white font-600 leading-100">${post.duration}</span>
                                </div>
                            </a>
                            <div class="flex flex-wrap text-xl text-global-luckypush font-400">
                                <span class="mr-1">${post.price} / ${post.discount_price}</span>
                            </div>
                            <a href="${post.url}" class="text-3xl font-700 leading-100">${post.title}</a>
                        </div>
                    `;
					});
					document.getElementById('posts-container').innerHTML = postsHtml;

					// Обновляем пагинацию
					let paginationHtml = '';
					data.pagination.forEach(page => {
						paginationHtml += `<a href="#" class="pagination-link" data-page="${page.page}">${page.page}</a>`;
					});
					document.getElementById('pagination').innerHTML = paginationHtml;

					currentPage = page;
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

			// Обработчик кликов на кнопках wish-btn
			button.addEventListener('click', function () {
				const productId = this.getAttribute('data-wp-id');
				let updatedProducts = getCookie('product');
				try {
					updatedProducts = updatedProducts ? JSON.parse(updatedProducts) : [];
				} catch (e) {
					console.error("Error parsing cookies:", e);
					updatedProducts = []; // Сбрасываем в пустой массив при ошибке
				}

				if (!Array.isArray(updatedProducts)) {
					console.error("updatedProducts is not an array:", updatedProducts);
					updatedProducts = [];
				}

				if (updatedProducts.includes(productId)) {
					// Если продукт уже в куки, удаляем его
					console.log("Before removing:", updatedProducts);
					updatedProducts = updatedProducts.filter(id => id !== productId);
					console.log("After removing:", updatedProducts);
					setCookie('product', JSON.stringify(updatedProducts), 7); // Обновляем куки
					this.classList.remove('active'); // Убираем активный класс
				} else {
					// Если продукта нет в куки, добавляем его
					updatedProducts.push(productId);
					console.log("After adding:", updatedProducts);
					setCookie('product', JSON.stringify(updatedProducts), 7); // Обновляем куки
					this.classList.add('active'); // Добавляем активный класс
				}
			});
		});
	}

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

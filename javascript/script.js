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

	// Получаем элементы мобильного меню
	const menuToggle = document.getElementById('menu-toggle');
	const mobileMenu = document.getElementById('mobile-menu');

	if (menuToggle && mobileMenu ) {
		menuToggle.addEventListener('click', (event) => {
			event.stopPropagation(); // предотвращаем всплытие события, чтобы не закрывать меню сразу после его открытия
			// Переключаем меню
			if (menuToggle.classList.contains('is-active')) {
				mobileMenu.classList.remove('-translate-x-full');
				mobileMenu.classList.add('translate-x-0');
				document.body.style.overflow = 'hidden'; // Отключаем прокрутку
			} else {
				mobileMenu.classList.remove('translate-x-0');
				mobileMenu.classList.add('-translate-x-full');
				document.body.style.overflow = ''; // Включаем прокрутку обратно
			}
			// Переключаем класс is-active у кнопки
			menuToggle.classList.toggle('is-active');
		});

		document.addEventListener('click', (event) => {
			// Проверяем, был ли клик вне меню и кнопки
			if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target)) {
				mobileMenu.classList.remove('translate-x-0');
				mobileMenu.classList.add('-translate-x-full');
				menuToggle.classList.add('is-active');
				document.body.style.overflow = ''; // Включаем прокрутку обратно
			}
		});
	}

	// Получаем элементы мобильного меню
	const sidebarToggle = document.getElementById('sidebar-toggle');
	const sidebarMenu = document.getElementById('sidebar-menu');
	if (sidebarToggle && sidebarMenu) {
		sidebarToggle.addEventListener('click', (event) => {
			event.stopPropagation(); // предотвращаем всплытие события, чтобы не закрывать меню сразу после его открытия

			if (sidebarToggle.classList.contains('is-active')) {
				sidebarMenu.classList.remove('-translate-x-full');
				sidebarMenu.classList.add('translate-x-0');
			} else {
				sidebarMenu.classList.remove('translate-x-0');
				sidebarMenu.classList.add('-translate-x-full');
			}
			// Переключаем класс is-active у кнопки
			sidebarToggle.classList.toggle('is-active');
		});
		document.querySelectorAll('.close-filter-btn').forEach(button => {
			button.addEventListener('click', () => {
				sidebarToggle.classList.toggle('is-active');
				sidebarMenu.classList.remove('translate-x-0');
				sidebarMenu.classList.add('-translate-x-full');
			});
		});

		document.addEventListener('click', (event) => {
			// Проверяем, был ли клик вне меню и кнопки
			if (!sidebarMenu.contains(event.target) && !sidebarToggle.contains(event.target)) {
				sidebarMenu.classList.remove('translate-x-0');
				sidebarMenu.classList.add('-translate-x-full');
				sidebarToggle.classList.add('is-active');
			}
		});
	}

	// Функция для открытия/закрытия dropdown
	const dropdownButtons = document.querySelectorAll('.dropdown-button');
	const dropdownMenus = document.querySelectorAll('.dropdown-menu');
	if (dropdownButtons.length && dropdownMenus.length) {
		dropdownButtons.forEach((button, index) => {
			button.addEventListener('click', function () {
				const menu = dropdownMenus[index];
				const isExpanded = menu.classList.contains('hidden');
				const closeOnClick = button.getAttribute('data-close-on-click') === 'true';

				// Закрываем все меню, если они открыты
				dropdownMenus.forEach((otherMenu, otherIndex) => {
					if (otherIndex !== index) {
						otherMenu.classList.add('hidden');
						dropdownButtons[otherIndex].setAttribute('aria-expanded', 'false');
					}
				});

				// Переключаем текущее меню
				if (isExpanded) {
					menu.classList.remove('hidden');
					button.setAttribute('aria-expanded', 'true');
				} else {
					menu.classList.add('hidden');
					button.setAttribute('aria-expanded', 'false');
				}

				// Закрытие меню при клике на элемент внутри (если установлено)
				if (closeOnClick) {
					const menuItems = menu.querySelectorAll('.item');
					menuItems.forEach(item => {
						item.addEventListener('click', function () {
							menu.classList.add('hidden');
							button.setAttribute('aria-expanded', 'false');
						});
					});
				}
			});
		});

		// Функция для обновления текста кнопки фильтра
		function updateDropdownText(radio) {
			const dropdownText = radio.closest('.relative').querySelector('.dropdown-text');
			const span = radio.nextElementSibling; // Получаем <span> рядом с input
			if (dropdownText && span) {
				dropdownText.textContent = span.textContent; // Обновляем текст кнопки
			}
		}

		// Обработчик кликов по элементам с классом .change_text
		const changeTextElements = document.querySelectorAll('.change_text');
		changeTextElements.forEach(item => {
			item.addEventListener('click', function() {
				updateDropdownText(item); // Обновляем текст на кнопке при клике на элемент
			});
		});

		// Закрытие меню при клике вне его
		window.addEventListener('click', function (event) {
			if (!event.target.closest('.relative')) {
				dropdownMenus.forEach(menu => menu.classList.add('hidden'));
				dropdownButtons.forEach(button => button.setAttribute('aria-expanded', 'false'));
			}
		});
	}

	//filter excursion
	const categoryIdElem = document.getElementById('category_id');
	if(categoryIdElem) {
		const categoryId = document.getElementById('category_id').value;
		document.getElementById('filter-form').addEventListener('change', function() {
			loadPosts(1);
		});
		const clearForm = document.getElementById('clearForm');
		if(clearForm) {
			clearForm.addEventListener('click', function() {
				document.getElementById('filter-form').reset();
				loadPosts(1);
			})
		}
		/*document.getElementById('pagination').addEventListener('click', function(event) {
			if (event.target.classList.contains('pagination-link')) {
				const page = parseInt(event.target.dataset.page);
				loadPosts(page);
			}
		});*/
		function loadPosts(page) {
			// Собираем массив значений выбранных чекбоксов
			const getCheckedValues = (name) => {
				return Array.from(document.querySelectorAll(`#filter-form input[name="${name}"]:checked`)).map(input => input.value);
			};
			const duration = getCheckedValues('duration');
			const price = getCheckedValues('price');
			const postsPerPage = -1
			const grade = getCheckedValues('grade');

			const params = new URLSearchParams({
				grade: JSON.stringify(grade),
				price: JSON.stringify(price),
				duration: JSON.stringify(duration),
				page,
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
					adjustCardLayout();
					adjustWishBtn();
					sortExcursion();
				})
				.catch(error => console.error('Error loading posts:', error));
		}
	}

	function sortExcursion() {
		//sort excursion
		const sortForm = document.getElementById('sort_form');
		if (!sortForm) return;  // Если контейнера нет, выходим

		sortForm.addEventListener('change', function() {
			const getCheckedValues = (name) => {
				const checkedRadio = document.querySelector(`input[name="${name}"]:checked`);
				return checkedRadio ? checkedRadio.value : '';  // Возвращаем строку или пустую строку
			};
			const contentTours = document.querySelector('.content__tours'); // блок с карточками туров
			const cards = document.querySelectorAll('.card'); // карточки туров
			const sorts = getCheckedValues('grade' ?? '');

			cards.forEach(card => card.style.display = 'block'); // Показываем все карточки

			cards.forEach(card => {
				if(sorts) {
					const cardsSort = Array.from(contentTours.getElementsByClassName('card'));
					cardsSort.sort((a, b) => {
						const costA = parseInt(a.getAttribute('data-cost'), 10);
						const costB = parseInt(b.getAttribute('data-cost'), 10);
						const costC = parseInt(a.getAttribute('data-popular'), 10);
						const costD = parseInt(b.getAttribute('data-popular'), 10);


						if (sorts === 'expensive') {
							return costA - costB; // От меньшего к большему
						} else if(sorts === 'chip') {
							return costB - costA; // От большего к меньшему
						} else {
							return costC - costD; // От большего к меньшему
						}
					});

					// Очистка контента перед добавлением отсортированных элементов
					contentTours.innerHTML = '';

					// Добавление отсортированных карточек обратно в контейнер
					cardsSort.forEach(card => contentTours.appendChild(card));
				}

			});
		});


	}
	sortExcursion();

	function adjustWishBtn() {
		const devContainer = document.getElementById('posts-container');

		if (!devContainer) return;  // Если контейнера нет, выходим

		const wishButtons = devContainer.querySelectorAll('.wish-btn');
		updateWishBtns(wishButtons);

		if (devContainer.dataset.initialized) return;

		devContainer.dataset.initialized = true;
		devContainer.addEventListener('click', (event) => {
			const button = event.target.closest('.wish-btn');
			if (!button) return; // Если клик не по wish-btn, выходим
			handleWishButtonClick(button);
		});

		function updateWishBtns(buttons) {
			let currentProducts = getCookie('product');
			try {
				currentProducts = currentProducts ? JSON.parse(currentProducts) : [];
			} catch (e) {
				console.error("Error parsing cookies:", e);
				currentProducts = []; // Сбрасываем в пустой массив при ошибке
			}

			buttons.forEach(button => {
				const productId = button.getAttribute('data-wp-id');
				// Добавляем класс active на кнопки, которые соответствуют продуктам в куки
				if (currentProducts.includes(productId)) {
					button.classList.add('active');
				}
			});
		}

		function handleWishButtonClick(button) {
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
			updateProductCount('product', '#product-count span', '#product-count div');
		}
	}
	adjustWishBtn();

	// Функция для получения значения куки по имени
	function getCookie(name) {
		let cookieArr = document.cookie.split(';');
		for (let i = 0; i < cookieArr.length; i++) {
			let cookie = cookieArr[i].trim();
			if (cookie.startsWith(name + '=')) {
				return cookie.substring(name.length + 1, cookie.length);
			}
		}
		return null;
	}

	// Функция для обновления количества продуктов, используя куку
	function updateProductCount(cookieName, elementSelector, elementDiv) {
		// Получаем значение куки по имени
		let productCookie = getCookie(cookieName);

		// Если куки существует, парсим строку и подсчитываем количество элементов
		if (productCookie) {
			try {
				let productArray = JSON.parse(productCookie); // Парсим строку как JSON
				if (Array.isArray(productArray)) {
					// Обновляем текст в указанном элементе

					document.querySelector(elementSelector).textContent = productArray.length;
					if(productArray.length<1) {
						document.querySelector(elementDiv).style.visibility = "hidden";
					} else {
						document.querySelector(elementDiv).style.visibility = "visible";
					}
				}
			} catch (e) {
				console.error("Ошибка при парсинге куки '" + cookieName + "':", e);
			}
		} else {
			// Если куки нет, показываем 0
			document.querySelector(elementSelector).textContent = 0;
		}
	}

	// Пример вызова функции для обновления счетчика продуктов
	updateProductCount('product', '#product-count span', '#product-count div');

	// Функция установки куки
	function setCookie(name, value, days) {
		const date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		const expires = "expires=" + date.toUTCString();
		document.cookie = name + "=" + value + ";" + expires + ";path=/";
	}

	//Форма отзыва
	let filestoupload = [];
	function previewFiles() {
		const preview = document.querySelector('#preview');
		const files = document.querySelector('input[type=file]').files;

		function readAndPreview(file) {
			// Убедимся, что файл имеет допустимое расширение
			if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
				const reader = new FileReader();

				if (file.size > 5242880) {
					alert('Максимальный размер файла не может превышать 5Мб');
				} else {
					reader.addEventListener("load", function () {
						const image = new Image();
						const z = document.createElement('div');
						z.textContent = file.name;

						image.height = 100;
						image.title = file.name;
						image.src = this.result;

						filestoupload.push(file); // Добавляем файл, а не base64

						const div = document.createElement('div');
						const divdel = document.createElement('div');
						divdel.className = 'delete';
						divdel.textContent = 'X';

						div.className = 'fileprew';
						div.appendChild(divdel);
						div.appendChild(z);
						preview.appendChild(div);

						console.log('Files to upload:', filestoupload.length);
						console.log('File name:', file.name);
						console.log('File size:', file.size);
					}, false);

					reader.readAsDataURL(file);
				}
			}
		}

		if (files) {
			Array.from(files).forEach(readAndPreview);
		}
	}

	// Удаление файлов
	document.body.addEventListener("click", function (event) {
		if (event.target.classList.contains("delete")) {
			const index = Array.from(document.querySelectorAll('.delete')).indexOf(event.target);
			console.log('Удаляем файл:', index);

			filestoupload.splice(index, 1); // Удаляем из массива
			event.target.parentElement.remove(); // Удаляем из DOM

			console.log('Files to upload:', filestoupload.length);
		}
	});

	const formContainer = document.querySelector('.reviews_form');
	if(formContainer) {
		formContainer.addEventListener('submit', function (e) {
			e.preventDefault();

			const thisForm = e.target;
			const name = thisForm.querySelector('[name=name]').value;
			const formData = new FormData(thisForm);

			// Добавляем файлы из filestoupload
			filestoupload.forEach((file, index) => {
				formData.append(`file[${index}]`, file);
			});

			if (!name) {
				const nameField = document.querySelector('.name_field input');
				nameField.classList.add('alert');
				window.scrollTo({
					top: document.querySelector('.reviews_form').offsetTop - 50,
					behavior: 'smooth'
				});
				return;
			}

			//document.querySelector('.page-loader').style.display = 'block';

			fetch('/wp-json/custom/v1/reviews-form', {
				method: 'POST',
				headers: {
					// Убедитесь, что REST API доступен без авторизации или передайте токен авторизации.
					//'X-WP-Nonce': wpApiSettings.nonce // Если требуется авторизация
				},
				body: formData
			})
				.then(response => {
					if (!response.ok) {
						return response.json().then(err => {
							throw new Error(err.message || 'Ошибка при отправке формы');
						});
					}
					return response.json();
				})
				.then(data => {
					console.log('Ответ сервера:', data);
					// document.querySelectorAll('.modal').forEach(modal => modal.style.display = 'none');
					// document.body.style.overflow = 'visible';
					// closeModal();
					// openModal(document.querySelector('.modal__reviews--success'));
				})
				.catch(error => {
					console.error('Ошибка:', error);
					alert(error.message || 'Что-то пошло не так');
				})
				.finally(() => {
					//document.querySelector('.page-loader').style.display = 'none';
				});
		});
	}

	function adjustCardLayout() {
		let cards = document.querySelectorAll('.card');
		if (cards) {
			cards.forEach(card => {
				const title = card.querySelector('.card-title');
				const description = card.querySelector('.card-description');

				if (!title || !description) return;

				// Получаем line-height, если он задан, или используем размер шрифта как запасной вариант
				const computedStyle = window.getComputedStyle(title);
				let lineHeight = parseInt(computedStyle.lineHeight, 10);

				// Если lineHeight не удалось получить, пытаемся использовать размер шрифта
				if (isNaN(lineHeight)) {
					const fontSize = parseInt(computedStyle.fontSize, 10);
					lineHeight = fontSize * 1.2;  // Обычно line-height примерно в 1.2 раза больше font-size
				}

				// Получаем высоту заголовка
				const titleHeight = title.offsetHeight;

				// Вычисляем, сколько строк занимает заголовок
				const titleLines = Math.floor(titleHeight / lineHeight);

				// Применяем стили в зависимости от числа строк в заголовке
				if (titleLines >= 3) {
					title.classList.add('three-lines', 'mb-3');
					description.classList.add('two-lines');
				} else {
					title.classList.add('two-lines', 'mb-2', 'lg:mb-4');
					description.classList.add('three-lines');
				}
			});
		}
	}
	adjustCardLayout();

	// Находим элемент с data-category-id
	const container = document.querySelector('.excursions-container');
	if(container) {
		const categoryId = container ? container.getAttribute('data-category-id') : null;

		if (!categoryId) {
			console.error('Категория не найдена');
			return;
		}

		// Обработка клика по кнопке "Ещё"
		document.addEventListener('click', function(event) {
			const button = event.target.closest('.load-more');

			if (button) {
				const page = button.getAttribute('data-page');

				// Отправка запроса с использованием fetch
				fetch('/wp-json/my-api/v1/load-more/', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
					},
					body: JSON.stringify({
						category_id: categoryId,
						page: page
					})
				})
					.then(response => {
						if (!response.ok) {
							throw new Error('Failed to fetch the template.');
						}
						return response.text();
					})
					.then(html => {
						document.querySelector('.load-more').remove();
						//document.getElementById('posts-container').innerHTML = html;
						document.getElementById('posts-container').insertAdjacentHTML('beforeend', html);

						adjustCardLayout();
						adjustWishBtn();
						sortExcursion();
					})
					.catch(error => console.error('Error loading posts:', error));
			}
		});
	}

	// Swiper
	const swiperTour = document.querySelectorAll('.swiper_tour');
	const swiperRev = document.querySelectorAll('.swiper_reviews');

	if(swiperTour.length) {
		const swiper = new Swiper(".mySwiper", {
			spaceBetween: 8,
			direction: "horizontal", // Вертикальное направление для превью
			slidesPerView: 5,
			freeMode: true,
			watchSlidesProgress: true,
			breakpoints: {
				640: {
					direction: "vertical", // Горизонтальная ориентация на мобильных устройствах
					slidesPerView: 4,
				},
			},
		});
		const swiper2 = new Swiper(".mySwiper2", {
			spaceBetween: 8,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
			thumbs: {
				swiper: swiper,
			},
		});

		const swiperSlides = document.querySelectorAll('.mySwiper2 .swiper-slide img');

		if(swiperSlides) {

		}


		// Элементы попапа
		const popup = document.getElementById('popup');
		const popupContainer = document.getElementById('popup-media-container');
		const popupClose = document.getElementById('popup-close');

		// Открытие попапа при клике на слайд (изображение или превью)
		swiperSlides.forEach(slide => {
			slide.addEventListener('click', function () {
				const mediaSrc = slide.getAttribute('src');
				const mediaAlt = slide.getAttribute('alt');
				const videoId = slide.getAttribute('data-video-id'); // Получаем ID видео, если это превью
				const videoType = slide.getAttribute('data-video-type'); // Получаем ID видео, если это превью
				popupContainer.innerHTML = ''; // Очищаем контейнер попапа

				if (videoId) {
					// Если это превью видео, создаем iframe для воспроизведения

					const iframeElement = document.createElement('iframe');

					if (videoType === 'dzen') {
						iframeElement.src = videoId;
					}
					else if (videoType === 'rutube') {
						iframeElement.src = "https://rutube.ru/play/embed/" + videoId + "?autoplay=1";
					}  else if(videoType === 'youtube') {
						iframeElement.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1";
					}

					iframeElement.allow = "autoplay; fullscreen; accelerometer; gyroscope; encrypted-media; picture-in-picture";
					iframeElement.frameBorder = '0';
					iframeElement.allowFullscreen = true;
					iframeElement.classList.add('max-w-full', 'max-h-full', 'object-contain');
					popupContainer.appendChild(iframeElement);
				} else {
					// Если это изображение, создаем элемент img
					const imgElement = document.createElement('img');
					imgElement.src = mediaSrc;
					imgElement.alt = mediaAlt;
					imgElement.classList.add('max-w-full', 'max-h-full', 'object-contain');

					popupContainer.appendChild(imgElement);
				}

				// Показываем попап
				popup.classList.remove('hidden');
			});
		});

		// Закрытие попапа
		popupClose.addEventListener('click', function () {
			popup.classList.add('hidden'); // Скрываем попап
			popupContainer.innerHTML = ''; // Очищаем контейнер попапа
		});

		// Закрытие попапа при клике вне области контента
		popup.addEventListener('click', function (e) {
			if (e.target === popup) {
				popup.classList.add('hidden');
				popupContainer.innerHTML = ''; // очищаем контейнер
			}
		});
	}
	if(swiperRev) {
		const swiper3 = new Swiper(".mySwiper3", {
			slidesPerView: 1.3,
			spaceBetween: 18,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
			},
			breakpoints: {
				640: {
					slidesPerView: 2.5,
					spaceBetween: 12,
				},
				960: {
					slidesPerView: 3,
					spaceBetween: 18,
				}
			},
		});

	}

	const swiperExc = document.querySelectorAll('.swiper_excursion');
	if(swiperExc) {
		const swiper4 = new Swiper(".mySwiper4", {
			slidesPerView: 1.2,
			spaceBetween: 18,
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			breakpoints: {
				490: {
					slidesPerView: 2,
					spaceBetween: 12,
				},
				640: {
					slidesPerView: 2.5,
					spaceBetween: 12,
				},
				960: {
					slidesPerView: 3,
					spaceBetween: 18,
				}
			},
		});

	}


});

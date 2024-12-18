<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _tw
 */
$current_term = get_term_by('slug', 'ekskursii-peterburg','excursion_category');
set_query_var('sidebar_term', $current_term);
$sidebar_term = get_query_var('sidebar_term');

$sub = array(".01." => " января ", ".02." => " февраля ",
		".03." => " марта ", ".04." => " апреля ", ".05." => " мая ", ".06." => " июня ",
		".07." => " июля ", ".08." => " августа ", ".09." => " сентября ",
		".10." => " октября ", ".11." => " ноября ", ".12." => " декабря ", "2022" => '', '2023' => '', '2024'=>'', '2025'=>'','2026'=>'','00:00'=>'');
get_header();
?>

	<?php get_template_part( 'template-parts/layout/submenu', 'content' ); ?>
	<!-- Блок Hero -->
    <section class="hero container mt-[13px]">
		<div class="flex gap-3 flex-col lg:flex-row">
			<div class="main_slide">
				<div class="flex flex-col sm:flex-row px-4 bg-[#A392EE] rounded-2xl pt-12 pb-14 lg:pb-8 lg:ps-8 lg:pe-6 lg:ps-[55px] lg:pe-3 lg:pt-[65px] lg:pb-[42px] ">
					<div class="title_block w-full md:w-[48%]">
                        <h1 class="text-white text-[21px] lg:text-[28px] font-normal font-['Kaph'] mb-5 sm:mb-7 lg:mb-6 leading-[38px] lg:leading-[38px]">
                            Экскурсии <br>
                            для школьников<br>
                            в Санкт-петербурге
                        </h1>
                        <a href="#card_link" class="px-8 py-3 bg-[#ff7642] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex">
                            <span class="text-center text-white text-sm font-bold  leading-tight">Выбрать экскурсию</span>
                        </a>
					</div>
                    <div class="image_block w-full md:w-[45%] lg:w-[51%] mt-[10px] lg:mt-0">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero.webp" alt="hero">
					</div>
				</div>
                <div class="sub_slide -mt-5 sm:-mt-1 lg:-mt-6 relative">
                    <div class="flex gap-3 px-[18px] overflow-x-auto">
                        <div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#8fa9ff] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
                            <div class="flex gap-2 items-center justify-start w-full">
                                <svg class="min-w-10 w-10 lg:min-w-14 lg:h-14" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                    <g clip-path="url(#clip0_135_6807)">
                                        <path d="M13.0736 44.958H5.986C5.10598 44.958 4.39258 45.6628 4.39258 46.5321V52.8851C4.39258 53.7545 5.10598 54.4592 5.986 54.4592H13.0736C13.9536 54.4592 14.667 53.7545 14.667 52.8851V46.5321C14.667 45.6628 13.9536 44.958 13.0736 44.958Z" fill="#474747"/>
                                        <path d="M11.3395 8.14941H43.6733C45.3432 8.14941 46.7008 9.49054 46.7008 11.1402V32.1637C46.7008 33.3223 45.7512 34.2604 44.5784 34.2604H10.4281C9.25535 34.2604 8.30566 33.3223 8.30566 32.1637V11.1465C8.30566 9.49683 9.66326 8.15571 11.3332 8.15571L11.3395 8.14941Z" fill="#00A6ED"/>
                                        <path d="M49.0325 44.958H41.945C41.065 44.958 40.3516 45.6628 40.3516 46.5321V52.8851C40.3516 53.7545 41.065 54.4592 41.945 54.4592H49.0325C49.9126 54.4592 50.626 53.7545 50.626 52.8851V46.5321C50.626 45.6628 49.9126 44.958 49.0325 44.958Z" fill="#474747"/>
                                        <path d="M12.1685 4H42.8515C47.141 4 50.6274 7.44411 50.6274 11.6816V47.7093C50.6274 49.4723 49.1742 50.9079 47.3896 50.9079H7.63042C5.84578 50.9079 4.39258 49.4723 4.39258 47.7093V11.6816C4.39258 7.44411 7.87899 4 12.1685 4Z" fill="#FF3F51"/>
                                        <path d="M6.62295 19.0356V25.3572H3.94599C3.51258 26.2009 2.63301 26.7802 1.61322 26.7802C0.166387 26.7802 -1 25.6216 -1 24.1987V21.6172C-1 20.2634 0.0516605 19.1553 1.39651 19.0482C1.46662 19.0356 1.53673 19.0356 1.61322 19.0356H6.62295Z" fill="#FF3F51"/>
                                        <path d="M1.61319 19.0356C1.53671 19.0356 1.4666 19.0356 1.39648 19.0482V19.0356H1.61319Z" fill="#FF3F51"/>
                                        <path d="M56.0007 21.6172V24.1987C56.0007 25.6216 54.8279 26.7802 53.3874 26.7802C52.3676 26.7802 51.4817 26.2009 51.061 25.3572H48.3713V19.0356H53.3874C53.4576 19.0356 53.5277 19.0356 53.5978 19.0482C54.9426 19.149 56.0007 20.2634 56.0007 21.6172Z" fill="#FF3F51"/>
                                        <path d="M53.5968 19.0356V19.0482C53.5267 19.0356 53.4566 19.0356 53.3865 19.0356H53.5968Z" fill="#FF3F51"/>
                                        <path d="M11.6065 45.7704C13.2187 45.7704 14.5257 44.4793 14.5257 42.8867C14.5257 41.294 13.2187 40.0029 11.6065 40.0029C9.99433 40.0029 8.68738 41.294 8.68738 42.8867C8.68738 44.4793 9.99433 45.7704 11.6065 45.7704Z" fill="white"/>
                                        <path d="M43.2707 45.7704C44.8829 45.7704 46.1899 44.4793 46.1899 42.8867C46.1899 41.294 44.8829 40.0029 43.2707 40.0029C41.6585 40.0029 40.3516 41.294 40.3516 42.8867C40.3516 44.4793 41.6585 45.7704 43.2707 45.7704Z" fill="white"/>
                                        <path d="M11.3395 8.14941H43.6733C45.3432 8.14941 46.7008 9.49054 46.7008 11.1402V32.1637C46.7008 33.3223 45.7512 34.2604 44.5784 34.2604H10.4281C9.25535 34.2604 8.30566 33.3223 8.30566 32.1637V11.1465C8.30566 9.49683 9.66326 8.15571 11.3332 8.15571L11.3395 8.14941Z" fill="#00A6ED"/>
                                        <mask id="mask0_135_6807" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="8" y="8" width="39" height="27">
                                            <path d="M11.3395 8.14941H43.6733C45.3432 8.14941 46.7008 9.49054 46.7008 11.1402V32.1637C46.7008 33.3223 45.7512 34.2604 44.5784 34.2604H10.4281C9.25535 34.2604 8.30566 33.3223 8.30566 32.1637V11.1465C8.30566 9.49683 9.66326 8.15571 11.3332 8.15571L11.3395 8.14941Z" fill="white"/>
                                        </mask>
                                        <g mask="url(#mask0_135_6807)">
                                            <path d="M46.7067 8.06787H8.31152V15.252H46.7067V8.06787Z" fill="#005DB8"/>
                                        </g>
                                        <path d="M13.4884 12.8276C14.1431 12.8276 14.6739 12.3033 14.6739 11.6565C14.6739 11.0097 14.1431 10.4854 13.4884 10.4854C12.8336 10.4854 12.3029 11.0097 12.3029 11.6565C12.3029 12.3033 12.8336 12.8276 13.4884 12.8276Z" fill="#F6A41B"/>
                                        <path d="M28.8094 10.4917H18.5732C17.9185 10.4917 17.3877 11.0146 17.3877 11.6597C17.3877 12.3047 17.9185 12.8276 18.5732 12.8276H28.8094C29.4641 12.8276 29.9949 12.3047 29.9949 11.6597C29.9949 11.0146 29.4641 10.4917 28.8094 10.4917Z" fill="#F6A41B"/>
                                        <path d="M33.7569 45.7704H20.4231C19.8367 45.7704 19.3077 45.4052 19.1165 44.8574L18.0393 41.8289C17.7206 40.9348 18.3899 40.0029 19.3459 40.0029H34.8276C35.7837 40.0029 36.4529 40.9348 36.1342 41.8289L35.0635 44.8574C34.8659 45.4052 34.3432 45.7767 33.7569 45.7767V45.7704Z" fill="#9E3C44"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_135_6807">
                                            <rect width="57" height="57" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <div class="text-[14px] leading-[1.3] lg:text-sm font-bold">Собственный автопарк <br>
                                    и новые автобусы <br>
                                    2024 г.
                                </div>
                            </div>
                        </div>
                        <div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#FF7643] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
                            <div class="flex gap-2 items-center justify-start w-full">
                                <svg class="min-w-10 w-10 lg:min-w-14 lg:h-14" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                    <path d="M45.8484 47.7281C45.8484 49.5712 44.3696 51.0664 42.5466 51.0664H8.30026C6.47732 51.0664 5 49.5712 5 47.7281V4.33849C5 2.4954 6.47732 1.00016 8.30026 1.00016H30.174L31.7657 11.9002C33.5887 11.9002 35.0675 13.3955 35.0675 15.2386L45.8484 16.8313V47.7281Z" fill="#F0F5FA"/>
                                    <path d="M30.1737 11.771H12.837C11.9702 11.771 11.2695 11.0618 11.2695 10.1862C11.2695 9.31142 11.9702 8.60144 12.837 8.60144H30.1737C31.039 8.60144 31.7412 9.31142 31.7412 10.1862C31.7412 11.0618 31.039 11.771 30.1737 11.771Z" fill="#B0BBD0"/>
                                    <path d="M38.011 18.1094H12.837C11.9702 18.1094 11.2695 17.4002 11.2695 16.5246C11.2695 15.6498 11.9702 14.9398 12.837 14.9398H38.011C38.8762 14.9398 39.5784 15.6498 39.5784 16.5246C39.5784 17.4002 38.8762 18.1094 38.011 18.1094Z" fill="#B0BBD0"/>
                                    <path d="M38.011 24.4487H12.837C11.9702 24.4487 11.2695 23.7395 11.2695 22.864C11.2695 21.9892 11.9702 21.2792 12.837 21.2792H38.011C38.8762 21.2792 39.5784 21.9892 39.5784 22.864C39.5784 23.7395 38.8762 24.4487 38.011 24.4487Z" fill="#B0BBD0"/>
                                    <path d="M38.011 30.7881H12.837C11.9702 30.7881 11.2695 30.0789 11.2695 29.2033C11.2695 28.3285 11.9702 27.6185 12.837 27.6185H38.011C38.8762 27.6185 39.5784 28.3285 39.5784 29.2033C39.5784 30.0789 38.8762 30.7881 38.011 30.7881Z" fill="#B0BBD0"/>
                                    <path d="M22.3365 37.127H12.837C11.9702 37.127 11.2695 36.4178 11.2695 35.5422C11.2695 34.6674 11.9702 33.9574 12.837 33.9574H22.3365C23.2017 33.9574 23.9039 34.6674 23.9039 35.5422C23.9039 36.4178 23.2017 37.127 22.3365 37.127Z" fill="#B0BBD0"/>
                                    <path d="M22.3365 43.4658H12.837C11.9702 43.4658 11.2695 42.7566 11.2695 41.881C11.2695 41.0062 11.9702 40.2963 12.837 40.2963H22.3365C23.2017 40.2963 23.9039 41.0062 23.9039 41.881C23.9039 42.7566 23.2017 43.4658 22.3365 43.4658Z" fill="#B0BBD0"/>
                                    <path d="M30.1904 1.00038H30.174V13.5098C30.174 15.3529 31.6505 16.8481 33.4734 16.8481H45.8484V16.8315L30.1904 1.00038Z" fill="#CED6E6"/>
                                    <path d="M50.2294 47.6245C48.7999 46.1791 47.4761 45.0246 46.2606 44.1094C48.1588 41.8289 49.3626 39.4605 47.2473 38.0294C43.7668 35.6768 32.7147 33.081 30.3518 35.4724C27.9881 37.8622 30.554 49.0357 32.8801 52.5539C34.2963 54.6941 36.638 53.4778 38.8952 51.5571C39.7996 52.7861 40.9407 54.1228 42.371 55.5681C45.2151 58.4437 47.321 55.7971 48.8884 54.214V54.2124C50.4543 52.6292 53.0735 50.5 50.2294 47.6245Z" fill="#D59011"/>
                                    <path d="M50.2294 46.04C48.7999 44.5947 47.4761 43.4402 46.2606 42.525C48.1588 40.2445 49.3626 37.876 47.2473 36.445C43.7668 34.0924 32.7147 31.4965 30.3518 33.8879C27.9881 36.2778 30.554 47.4512 32.8801 50.9694C34.2963 53.1097 36.638 51.8934 38.8952 49.9726C39.7996 51.2016 40.9407 52.5384 42.371 53.9837C45.2151 56.8593 47.321 54.2127 48.8884 52.6295V52.6279C50.4543 51.0447 53.0735 48.9156 50.2294 46.04Z" fill="#FDC401"/>
                                    <mask id="mask0_135_6771" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="30" y="34" width="11" height="10">
                                        <path d="M30.5039 34.078H40.7926V43.3252H30.5039V34.078Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_135_6771)">
                                        <g opacity="0.5">
                                            <path d="M39.1665 34.576C35.8137 33.9413 32.4923 33.7725 31.3645 34.9136C30.359 35.9302 30.3088 38.7218 30.8324 41.7043C31.8606 47.5593 45.3798 35.7535 39.1665 34.576Z" fill="#FFC52F"/>
                                        </g>
                                    </g>
                                </svg>
                                <div class="text-[14px] leading-[1.3] lg:text-sm font-bold">Бесплатное уведомление и согласование <br> поездки в ГИБДД</div>
                            </div>
                        </div>
                        <div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#FDC401] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
                            <div class="flex gap-2 items-center justify-start w-full">
                                <svg class="min-w-10 w-10 lg:min-w-14 lg:h-14" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
                                    <path d="M14.6704 11.6595C4.21262 18.7958 0.252476 36.4806 8.22512 46.4363C13.4078 52.9118 24.9341 57.3986 32.4479 55.5983C41.0796 53.5294 47.4725 45.9484 50.3548 37.3885C51.8483 32.9542 51.8945 27.8188 49.6927 23.6068C39.6076 4.32242 22.1411 6.55811 14.6704 11.6595Z" fill="#3B3D54"/>
                                    <path d="M16.3888 14.4727C7.35683 20.6394 3.93866 35.9156 10.8212 44.5156C15.2987 50.108 25.2545 53.9834 31.7459 52.4301C39.2043 50.6453 44.7226 44.0957 47.2139 36.6999C48.5042 32.8678 48.5442 28.4334 46.6411 24.7958C37.9325 8.13614 22.8433 10.0661 16.3888 14.4727Z" fill="#8888A5"/>
                                    <path d="M17.6007 16.3038C9.53878 21.8066 6.48706 35.44 12.6305 43.1198C16.6245 48.11 25.5149 51.5716 31.3073 50.1851C37.9619 48.5917 42.889 42.7462 45.1154 36.1441C46.2671 32.7257 46.3041 28.7669 44.6042 25.5183C36.8287 10.6466 23.3593 12.3697 17.6007 16.3038Z" fill="#F2EFE4"/>
                                    <path d="M22.0092 24.138C17.7288 27.0623 16.1059 34.3006 19.3701 38.3798C21.4918 41.0293 26.2126 42.8697 29.289 42.1317C32.8241 41.2856 35.4417 38.1791 36.6211 34.6742C37.2339 32.8585 37.2524 30.7556 36.3501 29.0325C32.2206 21.1365 25.0671 22.0505 22.0092 24.138Z" stroke="white" stroke-width="2.28" stroke-miterlimit="10"/>
                                    <path d="M27.3516 29.7613C31.5889 28.1247 36.4728 27.2107 40.8887 26.2256C39.5492 28.347 35.8939 29.9559 33.7629 31.3208C32.3064 32.2533 30.3109 32.9234 29.0422 34.0474C28.5217 33.0469 28.3216 31.9106 27.3516 29.7613Z" fill="#DB6161"/>
                                    <path d="M27.2032 34.7637C22.9659 36.4003 18.0819 37.3143 13.666 38.2994C15.0056 36.1779 18.6609 34.5691 20.7918 33.2042C22.2484 32.2717 24.2439 31.6016 25.5126 30.4775C26.033 31.478 26.2332 32.6144 27.2032 34.7637Z" fill="#8888A5"/>
                                    <path d="M28.2326 35.026C26.7668 35.5973 25.1193 34.8685 24.5496 33.3986C23.9799 31.9288 24.7066 30.2767 26.1725 29.7054C27.6383 29.1341 29.2858 29.8629 29.8555 31.3328C30.4252 32.8027 29.6984 34.4547 28.2326 35.026Z" fill="#3B3D54"/>
                                    <path d="M29.0125 9.75711C28.5629 9.40508 29.0402 7.67582 29.1234 7.20953C29.3112 6.16888 29.3482 4.79473 29.8563 3.83128C30.6477 2.33361 33.5208 3.28162 34.7495 3.45764C36.6649 3.73247 38.6881 4.68665 40.3571 5.65937C41.592 6.37887 43.2672 6.94088 44.228 8.02785C46.088 10.1246 44.3542 12.4498 42.8392 14.1019C42.2356 14.7596 41.5242 15.6768 40.5973 15.8744C39.9907 16.0041 39.6612 15.5409 39.0884 15.2259C39.6889 14.0432 40.3941 12.8914 40.973 11.6964C41.2255 11.1776 41.7213 10.384 41.6074 9.77873C41.438 8.88322 39.6458 7.94756 38.9314 7.57083C38.1092 7.13542 37.287 6.72472 36.4309 6.3449C35.3561 5.86935 33.7179 4.73606 32.4984 5.27955C31.4545 5.74274 31.6208 7.24659 31.4237 8.18533C31.239 9.07776 31.0511 9.85593 30.697 10.6866C30.2197 10.5013 29.6007 10.2234 29.0094 9.7602L29.0125 9.75711Z" fill="#3B3D54"/>
                                    <path d="M32.5316 15.8496C33.2737 16.1214 34.0128 16.3807 34.721 16.7359C34.6163 17.3689 33.2429 18.1841 32.7225 18.4281C32.3837 17.9865 32.2606 16.356 32.5285 15.8496" fill="#3B3D54"/>
                                    <path d="M20.9646 48.0853C20.2225 47.8136 19.4834 47.5542 18.7751 47.1991C18.8798 46.566 20.2533 45.7508 20.7737 45.5068C21.1124 45.9484 21.2356 47.5789 20.9677 48.0853" fill="#3B3D54"/>
                                    <path d="M43.4659 38.0525C43.1949 38.7967 42.9362 39.5378 42.5821 40.248C41.9508 40.143 41.1378 38.7658 40.8945 38.2439C41.3349 37.9043 42.9608 37.7807 43.4659 38.0494" fill="#3B3D54"/>
                                    <path d="M11.3203 26.4539C11.5913 25.7097 11.85 24.9685 12.2041 24.2583C12.8354 24.3633 13.6484 25.7405 13.8916 26.2624C13.4513 26.6021 11.8253 26.7256 11.3203 26.4569" fill="#3B3D54"/>
                                </svg>
                                <div class="text-[14px] leading-[1.3] lg:text-sm font-bold">Более 50 увлекательных обучающих программ для детей</div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden lg:block absolute right-[-108px] bottom-[16px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="126" height="60" viewBox="0 0 126 60" fill="none">
                            <path d="M83 24.5265C71.62 28.6469 58.9084 29.2243 47.1812 26.1525C42.1688 24.8406 37.1422 22.7435 33.8228 18.8679C30.5035 14.9924 29.3907 8.99198 32.3867 4.87622C35.8677 0.0906792 43.7905 -0.16338 48.4462 3.55974C53.1018 7.28285 54.6236 13.8237 53.4395 19.5654C52.2506 25.3072 48.76 30.356 44.8082 34.7813C33.5755 47.3549 17.7966 55.7896 1 59" stroke="#393488" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="6 6"/>
                            <path d="M125 6.72224L91.11 15.3466L90.2039 15.5725L90.1223 15.4447L86.3618 20.3305L87.3344 10.1369L83 4L125 6.72224Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M124.999 6.72217L98.0474 28.3872L91.9701 18.4611L90.2031 15.5724L91.1093 15.3466L124.999 6.72217Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M124.999 6.72217L91.1088 15.3466L90.1211 15.4446L124.999 6.72217Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M87.3359 10.1369L125.001 6.72217L90.1268 15.4446L86.3633 20.3304L87.3359 10.1369Z" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M86.3633 20.3304L92.2835 18.9692" stroke="#393488" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
			</div>
            <div class="clouds relative lg:w-[240px] sm:min-w-[240px] h-[146px] lg:h-[323px] bg-[#FF7643] rounded-2xl py-6 px-4 relative">
				<div class="text-white text-[18px] lg:text-[17px] max-w-[295px] lg:max-w-[205px] lg:text-center absolute top-6 lg:top-[25px] left-8 lg:left-[18px] leading-[1.1] lg:leading-[20px] tracking-[0.4px] font-bold">Честный абонемент экскурсий для класса</div>
                <div class="flex items-center justify-start lg:justify-center absolute bottom-5 lg:left-1/2 lg:transform lg:-translate-x-1/2 left-8 lg:transform">
                    <a href="#" class="px-8 py-3 bg-[#3A21AA] hover:bg-[#301a8e] rounded-full justify-center items-center inline-flex text-sm font-bold text-white leading-tight">
                        Подробнее
                    </a>
                </div>
            </div>
		</div>

	</section>

    <div class="container mt-10 lg:mt-14">
		<div class="flex gap-8">
            <aside id="sidebar-menu" class="z-10 fixed top:105px top-0 left-0 w-full max-w-[455px] h-full text-[14px] transform -translate-x-full transition-transform duration-300 ease-in-out lg:relative lg:-translate-x-0 filter lg:w-[268px] min-w-[268px]">
				<?php get_sidebar(); ?>
			</aside>

            <section class="product-cards" id="card_link">
				<div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-12 mb-4">
					<h2 class="m-0 whitespace-nowrap">Выберите экскурсию</h2>
					<div class="flex w-full justify-between sm:justify-end items-center gap-8  text-[14px]">
						<div class="flex flex-col gap-2">
							<div id="sidebar-toggle" class="flex items-center gap-1.5 lg:hidden is-active">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5995 4.55965H8.87945V3.35965C8.87945 2.962 8.5571 2.63965 8.15945 2.63965C7.76181 2.63965 7.43945 2.962 7.43945 3.35965V7.19965C7.43945 7.59729 7.76181 7.91965 8.15945 7.91965C8.5571 7.91965 8.87945 7.59729 8.87945 7.19965V5.99965H21.5995C21.9971 5.99965 22.3195 5.67729 22.3195 5.27965C22.3195 4.882 21.9971 4.55965 21.5995 4.55965ZM21.6002 17.9996H13.6802V16.7996C13.6802 16.4019 13.3579 16.0796 12.9602 16.0796C12.5626 16.0796 12.2402 16.4019 12.2402 16.7996V20.6396C12.2402 21.0372 12.5626 21.3596 12.9602 21.3596C13.3579 21.3596 13.6802 21.0372 13.6802 20.6396V19.4396H21.6002C21.9979 19.4396 22.3202 19.1172 22.3202 18.7196C22.3202 18.3219 21.9979 17.9996 21.6002 17.9996ZM2.39969 5.99965C2.00204 5.99965 1.67969 5.6773 1.67969 5.27965C1.67969 4.88201 2.00204 4.55965 2.39969 4.55965H5.20621C5.60386 4.55965 5.92621 4.88201 5.92621 5.27965C5.92621 5.6773 5.60386 5.99965 5.20621 5.99965H2.39969ZM1.67969 18.7197C1.67969 19.1173 2.00204 19.4397 2.39969 19.4397H10.042C10.4397 19.4397 10.762 19.1173 10.762 18.7197C10.762 18.322 10.4397 17.9997 10.042 17.9997H2.39969C2.00204 17.9997 1.67969 18.322 1.67969 18.7197Z" fill="#2E2E2E"/>
									<path fill-rule="evenodd" clip-rule="evenodd" d="M21.5991 11.2804H18.4791V10.0804C18.4791 9.68271 18.1567 9.36035 17.7591 9.36035C17.3614 9.36035 17.0391 9.68271 17.0391 10.0804V13.9204C17.0391 14.318 17.3614 14.6404 17.7591 14.6404C18.1567 14.6404 18.4791 14.318 18.4791 13.9204V12.7204H21.5991C21.9967 12.7204 22.3191 12.398 22.3191 12.0004C22.3191 11.6027 21.9967 11.2804 21.5991 11.2804ZM1.67969 12.0004C1.67969 12.398 2.00204 12.7204 2.39969 12.7204H14.7502C15.1478 12.7204 15.4702 12.398 15.4702 12.0004C15.4702 11.6027 15.1478 11.2804 14.7502 11.2804H2.39969C2.00204 11.2804 1.67969 11.6027 1.67969 12.0004Z" fill="#2E2E2E"/>
								</svg>
								<span>Фильтр</span>
							</div>
						</div>
						<form class="flex items-start gap-3" id="sort_form">
							<div class="hidden lg:block">Сортировать по:</div>
							<div class="relative inline-block text-left">
								<button type="button" class="dropdown-button items-center gap-1 flex" aria-expanded="true" aria-haspopup="true" data-close-on-click="true">
									<span class="dropdown-text hidden lg:block text-[#999]">Цене</span>
									<span class="dropdown-text block lg:hidden">По популярности</span>
									<svg class="hidden lg:block mt-[3px]" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<rect x="2" y="7.6001" width="3" height="1.4" fill="#999999"/>
										<rect x="2" y="4.7998" width="6" height="1.4" fill="#999999"/>
										<rect x="2" y="2" width="8" height="1.4" fill="#999999"/>
									</svg>
									<svg class="lg:hidden mt-[3px]" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
										<g clip-path="url(#clip0_189_22709)">
											<path d="M1.5 3.75L6 8.25L10.5 3.75" stroke="#373F41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
										</g>
										<defs>
											<clipPath id="clip0_189_22709">
												<rect width="12" height="12" fill="white" transform="translate(12) rotate(90)"/>
											</clipPath>
										</defs>
									</svg>
								</button>
								<div class="dropdown-menu absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hidden">
									<div class="py-1">
										<div class="flex flex-col p-5 gap-4 text-[14px]">
											<label class="item flex gap-2 items-center lg:hidden">
												<input type="radio" name="grade" value="pops" class="scale-150 change_text">
												<span>По популярности</span>
											</label>

											<label class="item flex gap-2 items-center lg:hidden">
												<input type="radio" name="grade" value="expensive" class="scale-150 change_text ">
												<span>По возрастанию цены</span>
											</label>

											<label class="item flex gap-2 items-center lg:hidden">
												<input type="radio" name="grade" value="chip" class="scale-150 change_text">
												<span>По убыванию цены</span>
											</label>

											<label class="item hidden gap-2 items-center lg:flex">
												<input type="radio" name="grade" value="expensive" class="scale-150 change_text ">
												<span>Возрастанию цены</span>
											</label>

											<label class="item hidden gap-2 items-center lg:flex">
												<input type="radio" name="grade" value="chip" class="scale-150 change_text">
												<span>Убыванию цены</span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="hidden items-center gap-2 lg:flex">
								<label class="item flex gap-2 items-center cursor-pointer">
									<input type="radio" name="grade" value="pops" class="hidden peer">
									<span class=" peer-checked:text-[#FF7643]">По популярности</span>
								</label>
							</div>
						</form>
					</div>
				</div>
				<div class="flex flex-col" >

					<div class="grid grid-cols-12 gap-3 sm:gap-6 w-full mt-1 lg:mt-4 content__tours"  id="posts-container">
						<?php
						if ($current_term && isset($current_term->term_id)) {
							$category_id = $current_term->term_id;
							my_custom_template($category_id, 'template-parts/content/content-loop-excursion');
						}
						?>

					</div>
				</div>

				<div class="entry-content mt-11">
					<?php the_content(); ?>
				</div
			</section>
		</div>
	</div>

	<?php
		$args = array(
				'post_type'      => 'faqs',      // Тип записи 'faqs'
				'posts_per_page' => -1,          // Выводим все записи
				'meta_query'     => array(       // Мета-запрос для поля 'is_show'
						array(
								'key'     => 'is_show',   // Ключ поля ACF
								'value'   => '1',         // Значение поля (true)
								'compare' => '=',         // Сравниваем с true
						),
				),
		);

		$query = new WP_Query( $args );

		// Если записи найдены
		if ( $query->have_posts() ) : ?>
			<section class="bg-white pb-10 lg:pb-14">
				<div class="container">
					<div class="gap-6 grid grid-cols-12 w-full">
						<div class="col-span-12 lg:col-span-3"></div>
						<div class="entry-content col-span-12 lg:col-span-9">
							<h2 class="lg:mb-8">Популярные вопросы</h2>
							<?php while ( $query->have_posts() ) : $query->the_post(); ?>

								<details class="details w-full border border-[#e8e8e8] rounded-[30px] relative block mb-4" name="faq" open>
									<summary class="details__title py-6 ps-6 lg:ps-8 pe-14 sm:pe-10 text-[#393488] font-bold cursor-pointer list-none">
										<?php echo get_the_title(); ?>
									</summary>
									<div class="details__content ps-4 pe-14 lg:ps-8 pb-6 lg:pb-7 text-[14px]">
										<?php the_content(); ?>
									</div>
								</details>

							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</section>
		<?php else :
			echo 'Нет вопросов для отображения.';
		endif;

		// Восстановление оригинального поста
		wp_reset_postdata();
	?>


	<?php
		$args = array(
				'post_type'      => 'reviews',      // Тип записи 'faqs'
				'posts_per_page' => 7,          // Выводим все записи
		);

		$query = new WP_Query( $args );

		// Если записи найдены
		if ( $query->have_posts() ) : ?>
			<section class="swiper_reviews">
				<div class="container">
					<div class="gap-6 grid grid-cols-12 w-full">
						<div class="col-span-12 lg:col-span-3"></div>
						<div class="entry-content col-span-12 lg:col-span-9">
							<h2 class="mt-3 sm:mt-10">Отзывы</h2>
							<div class="swiper mySwiper3">
								<div class="swiper-wrapper text-[14px]">
									<?php while ( $query->have_posts() ) : $query->the_post(); $fieldsRev = get_fields();?>
										<div class="swiper-slide h-[235px] bg-white flex flex-col gap-2 py-8 px-4 rounded-xl">
											<div class="text-[#393488] lines min-h-[18px]">
												<div class="lines one-lines font-semibold"><?php the_title() ?></div>
											</div>
											<div class="h-[106px]">
												<div class="lines six-lines"><?php the_content(); ?></div>
											</div>
											<div class="text-[12px] text-[#abb7b9] font-semibold">
												<?php if(isset($fieldsRev['date'])) :?>
													<?php echo strtr($fieldsRev['date'], $sub);?>
												<?php endif;?>

												<?php if(isset($fieldsRev['date']) && isset($fieldsRev['excursion'])) :?>
													,
												<?php endif; ?>

												<?php if( isset($fieldsRev['excursion'])) :?>
													<?php echo $fieldsRev['excursion'];?>
												<?php endif; ?>
											</div>
										</div>
									<?php endwhile; ?>
								</div>

								<div class="swiper-pagination block sm:hidden"></div>
							</div>

							<div class="flex mt-6 mb-8 lg:mb-[64px] items-center justify-center">
								<a href="<?php echo esc_url(get_permalink(73)); ?>" class="inline-block font-bold text-[#ff7642] py-2 sm:py-2.5 px-4 text-[14px] sm:px-8 border-2 border-[#ff7642] rounded-3xl hover:text-white hover:bg-[#FF7643]">Все отзывы</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php else :
			echo 'Нет вопросов для отображения.';
		endif;

		// Восстановление оригинального поста
		wp_reset_postdata();
	?>

<?php
get_footer();

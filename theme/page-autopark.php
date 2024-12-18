<?php
/**
 * Template Name: Автопарк
 *
* This is the template that displays all pages by default. Please note that
 * this is the WordPress construct of pages: specifically, posts with a post
 * type of `page`.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _tw
 */

get_header();
?>
<?php get_template_part( 'template-parts/layout/submenu', 'content' ); ?>

	<section id="primary">
		<main id="main">
			<?php get_template_part( 'template-parts/layout/breadcrumbs', 'content' ); ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="container">
						<h1 class="text-2xl sm:text-3xl font-bold tracking-tight mb-[22px] sm:mb-6"><?php the_title() ; ?></h1>
						<div class="sub_slide mt-5 sm:-mt-1 lg:mt-6 relative">
							<div class="flex gap-3 overflow-x-auto">
								<div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#8FA9FF] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
									<div class="flex gap-2 items-center justify-start w-full">
										<svg class="min-w-[35px] lg:min-w-[57px]" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
											<g clip-path="url(#clip0_245_1598)">
												<path d="M13.0736 44.958H5.986C5.10598 44.958 4.39258 45.6628 4.39258 46.5321V52.8851C4.39258 53.7545 5.10598 54.4592 5.986 54.4592H13.0736C13.9536 54.4592 14.667 53.7545 14.667 52.8851V46.5321C14.667 45.6628 13.9536 44.958 13.0736 44.958Z" fill="#474747"/>
												<path d="M11.3386 8.14941H43.6723C45.3423 8.14941 46.6999 9.49054 46.6999 11.1402V32.1637C46.6999 33.3223 45.7502 34.2604 44.5774 34.2604H10.4271C9.25437 34.2604 8.30469 33.3223 8.30469 32.1637V11.1465C8.30469 9.49683 9.66229 8.15571 11.3322 8.15571L11.3386 8.14941Z" fill="#00A6ED"/>
												<path d="M49.0325 44.958H41.945C41.065 44.958 40.3516 45.6628 40.3516 46.5321V52.8851C40.3516 53.7545 41.065 54.4592 41.945 54.4592H49.0325C49.9126 54.4592 50.626 53.7545 50.626 52.8851V46.5321C50.626 45.6628 49.9126 44.958 49.0325 44.958Z" fill="#474747"/>
												<path d="M12.1685 4H42.8515C47.141 4 50.6274 7.44411 50.6274 11.6816V47.7093C50.6274 49.4723 49.1742 50.9079 47.3896 50.9079H7.63042C5.84578 50.9079 4.39258 49.4723 4.39258 47.7093V11.6816C4.39258 7.44411 7.87899 4 12.1685 4Z" fill="#FF3F51"/>
												<path d="M6.62295 19.0356V25.3572H3.94599C3.51258 26.2009 2.63301 26.7802 1.61322 26.7802C0.166387 26.7802 -1 25.6216 -1 24.1987V21.6172C-1 20.2634 0.0516605 19.1553 1.39651 19.0482C1.46662 19.0356 1.53673 19.0356 1.61322 19.0356H6.62295Z" fill="#FF3F51"/>
												<path d="M1.61319 19.0356C1.53671 19.0356 1.4666 19.0356 1.39648 19.0482V19.0356H1.61319Z" fill="#FF3F51"/>
												<path d="M56.0004 21.6172V24.1987C56.0004 25.6216 54.8277 26.7802 53.3872 26.7802C52.3674 26.7802 51.4815 26.2009 51.0608 25.3572H48.3711V19.0356H53.3872C53.4573 19.0356 53.5274 19.0356 53.5975 19.0482C54.9424 19.149 56.0004 20.2634 56.0004 21.6172Z" fill="#FF3F51"/>
												<path d="M53.5971 19.0356V19.0482C53.5269 19.0356 53.4568 19.0356 53.3867 19.0356H53.5971Z" fill="#FF3F51"/>
												<path d="M11.6067 45.7704C13.2189 45.7704 14.5258 44.4793 14.5258 42.8867C14.5258 41.294 13.2189 40.0029 11.6067 40.0029C9.99445 40.0029 8.6875 41.294 8.6875 42.8867C8.6875 44.4793 9.99445 45.7704 11.6067 45.7704Z" fill="white"/>
												<path d="M43.2707 45.7704C44.8829 45.7704 46.1899 44.4793 46.1899 42.8867C46.1899 41.294 44.8829 40.0029 43.2707 40.0029C41.6585 40.0029 40.3516 41.294 40.3516 42.8867C40.3516 44.4793 41.6585 45.7704 43.2707 45.7704Z" fill="white"/>
												<path d="M11.3386 8.14941H43.6723C45.3423 8.14941 46.6999 9.49054 46.6999 11.1402V32.1637C46.6999 33.3223 45.7502 34.2604 44.5774 34.2604H10.4271C9.25437 34.2604 8.30469 33.3223 8.30469 32.1637V11.1465C8.30469 9.49683 9.66229 8.15571 11.3322 8.15571L11.3386 8.14941Z" fill="#00A6ED"/>
												<mask id="mask0_245_1598" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="8" y="8" width="39" height="27">
													<path d="M11.3386 8.14941H43.6723C45.3423 8.14941 46.6999 9.49054 46.6999 11.1402V32.1637C46.6999 33.3223 45.7502 34.2604 44.5774 34.2604H10.4271C9.25437 34.2604 8.30469 33.3223 8.30469 32.1637V11.1465C8.30469 9.49683 9.66229 8.15571 11.3322 8.15571L11.3386 8.14941Z" fill="white"/>
												</mask>
												<g mask="url(#mask0_245_1598)">
													<path d="M46.7057 8.06787H8.31055V15.252H46.7057V8.06787Z" fill="#005DB8"/>
												</g>
												<path d="M13.4882 12.8276C14.143 12.8276 14.6738 12.3033 14.6738 11.6565C14.6738 11.0097 14.143 10.4854 13.4882 10.4854C12.8335 10.4854 12.3027 11.0097 12.3027 11.6565C12.3027 12.3033 12.8335 12.8276 13.4882 12.8276Z" fill="#F6A41B"/>
												<path d="M28.8084 10.4917H18.5722C17.9175 10.4917 17.3867 11.0146 17.3867 11.6597C17.3867 12.3047 17.9175 12.8276 18.5722 12.8276H28.8084C29.4631 12.8276 29.9939 12.3047 29.9939 11.6597C29.9939 11.0146 29.4631 10.4917 28.8084 10.4917Z" fill="#F6A41B"/>
												<path d="M33.7569 45.7704H20.4231C19.8367 45.7704 19.3077 45.4052 19.1165 44.8574L18.0393 41.8289C17.7206 40.9348 18.3899 40.0029 19.3459 40.0029H34.8276C35.7837 40.0029 36.4529 40.9348 36.1342 41.8289L35.0635 44.8574C34.8659 45.4052 34.3432 45.7767 33.7569 45.7767V45.7704Z" fill="#9E3C44"/>
											</g>
											<defs>
												<clipPath id="clip0_245_1598">
													<rect width="57" height="57" fill="white"/>
												</clipPath>
											</defs>
										</svg>
										<div class="text-[14px] leading-[1.3] lg:text-sm font-bold">
											35 автобусов 2024 г.в. собственной транспортной компании «Ультра»
										</div>
									</div>
								</div>
								<div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#FF7A45] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
									<div class="flex gap-2 items-center justify-start w-full">
										<svg class="min-w-[35px] lg:min-w-[50px]" xmlns="http://www.w3.org/2000/svg" width="50" height="55" viewBox="0 0 50 55" fill="none">
											<g clip-path="url(#clip0_283_5317)">
												<path d="M44.9507 7.44067C47.8483 7.83768 50 10.2791 50 13.1517V16.9553C50 45.3486 32.4194 53.0082 26.7427 54.74C25.6065 55.0868 24.3912 55.0868 23.255 54.74C17.5806 53.0059 0 45.3486 0 16.953V13.1723C0 10.2951 2.15633 7.8354 5.06088 7.45892C12.7149 6.46639 18.3474 3.39296 21.64 1.08389C23.6709 -0.339876 26.3849 -0.364975 28.4343 1.03598C31.7966 3.33592 37.4988 6.42075 44.9554 7.44067H44.9507Z" fill="#0DC143"/>
												<path d="M20.7162 38.9895C19.9145 38.9895 19.1431 38.6769 18.5738 38.1179L12.6624 32.3133C11.4797 31.1519 11.4797 29.2672 12.6624 28.1058C13.8452 26.9445 15.7645 26.9445 16.9472 28.1058L20.4234 31.5192L32.7991 15.7665C33.8215 14.4659 35.7245 14.2241 37.049 15.228C38.3735 16.2319 38.6198 18.1006 37.5974 19.4012L23.1165 37.8349C22.5844 38.5126 21.7804 38.9324 20.9113 38.9872C20.8463 38.9917 20.7812 38.994 20.7162 38.994V38.9895Z" fill="white"/>
											</g>
											<defs>
												<clipPath id="clip0_283_5317">
													<rect width="50" height="55" fill="white"/>
												</clipPath>
											</defs>
										</svg>
										<div class="text-[14px] leading-[1.3] lg:text-sm font-bold">
											Автобусы адаптированы для комфортной перевозки детей
										</div>
									</div>
								</div>
								<div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#FDC401] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
									<div class="flex gap-2 items-center justify-start w-full">
										<svg class="min-w-[35px] lg:min-w-[57px]" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
											<path d="M40.8484 47.7276C40.8484 49.5707 39.3696 51.0659 37.5466 51.0659H3.30026C1.47732 51.0659 0 49.5707 0 47.7276V4.33801C0 2.49491 1.47732 0.999672 3.30026 0.999672H25.174L26.7657 11.8998C28.5887 11.8998 30.0675 13.395 30.0675 15.2381L40.8484 16.8308V47.7276Z" fill="#FFF2DF"/>
											<path d="M25.1737 11.7705H7.83698C6.97018 11.7705 6.26953 11.0613 6.26953 10.1857C6.26953 9.31094 6.97018 8.60096 7.83698 8.60096H25.1737C26.039 8.60096 26.7412 9.31094 26.7412 10.1857C26.7412 11.0613 26.039 11.7705 25.1737 11.7705Z" fill="#FFE1B6"/>
											<path d="M33.011 18.1089H7.83698C6.97018 18.1089 6.26953 17.3997 6.26953 16.5241C6.26953 15.6493 6.97018 14.9393 7.83698 14.9393H33.011C33.8762 14.9393 34.5784 15.6493 34.5784 16.5241C34.5784 17.3997 33.8762 18.1089 33.011 18.1089Z" fill="#FFE1B6"/>
											<path d="M33.011 24.4482H7.83698C6.97018 24.4482 6.26953 23.7391 6.26953 22.8635C6.26953 21.9887 6.97018 21.2787 7.83698 21.2787H33.011C33.8762 21.2787 34.5784 21.9887 34.5784 22.8635C34.5784 23.7391 33.8762 24.4482 33.011 24.4482Z" fill="#FFE1B6"/>
											<path d="M33.011 37.127H7.83698C6.97018 37.127 6.26953 36.4178 6.26953 35.5422C6.26953 34.6674 6.97018 33.9574 7.83698 33.9574H33.011C33.8762 33.9574 34.5784 34.6674 34.5784 35.5422C34.5784 36.4178 33.8762 37.127 33.011 37.127Z" fill="#FFE1B6"/>
											<path d="M33.011 30.7876H7.83698C6.97018 30.7876 6.26953 30.0784 6.26953 29.2028C6.26953 28.328 6.97018 27.618 7.83698 27.618H33.011C33.8762 27.618 34.5784 28.328 34.5784 29.2028C34.5784 30.0784 33.8762 30.7876 33.011 30.7876Z" fill="#FFE1B6"/>
											<path d="M33.011 43.4663H7.83698C6.97018 43.4663 6.26953 42.7571 6.26953 41.8815C6.26953 41.0067 6.97018 40.2968 7.83698 40.2968H33.011C33.8762 40.2968 34.5784 41.0067 34.5784 41.8815C34.5784 42.7571 33.8762 43.4663 33.011 43.4663Z" fill="#FFE1B6"/>
											<path d="M25.1903 0.999895H25.1738V13.5093C25.1738 15.3524 26.6504 16.8477 28.4733 16.8477H40.8483V16.831L25.1903 0.999895Z" fill="#FFD08C"/>
											<path d="M56.8484 52.7281C56.8484 54.5712 55.3696 56.0664 53.5466 56.0664H19.3003C17.4773 56.0664 16 54.5712 16 52.7281V9.33849C16 7.4954 17.4773 6.00016 19.3003 6.00016H41.174L42.7657 16.9002C44.5887 16.9002 46.0675 18.3955 46.0675 20.2386L56.8484 21.8313V52.7281Z" fill="#F0F5FA"/>
											<path d="M41.1737 16.771H23.837C22.9702 16.771 22.2695 16.0618 22.2695 15.1862C22.2695 14.3114 22.9702 13.6014 23.837 13.6014H41.1737C42.039 13.6014 42.7412 14.3114 42.7412 15.1862C42.7412 16.0618 42.039 16.771 41.1737 16.771Z" fill="#B0BBD0"/>
											<path d="M49.011 23.1094H23.837C22.9702 23.1094 22.2695 22.4002 22.2695 21.5246C22.2695 20.6498 22.9702 19.9398 23.837 19.9398H49.011C49.8762 19.9398 50.5784 20.6498 50.5784 21.5246C50.5784 22.4002 49.8762 23.1094 49.011 23.1094Z" fill="#B0BBD0"/>
											<path d="M49.011 29.4487H23.837C22.9702 29.4487 22.2695 28.7395 22.2695 27.864C22.2695 26.9892 22.9702 26.2792 23.837 26.2792H49.011C49.8762 26.2792 50.5784 26.9892 50.5784 27.864C50.5784 28.7395 49.8762 29.4487 49.011 29.4487Z" fill="#B0BBD0"/>
											<path d="M49.011 42.1274H23.837C22.9702 42.1274 22.2695 41.4183 22.2695 40.5427C22.2695 39.6679 22.9702 38.9579 23.837 38.9579H49.011C49.8762 38.9579 50.5784 39.6679 50.5784 40.5427C50.5784 41.4183 49.8762 42.1274 49.011 42.1274Z" fill="#B0BBD0"/>
											<path d="M49.011 35.7881H23.837C22.9702 35.7881 22.2695 35.0789 22.2695 34.2033C22.2695 33.3285 22.9702 32.6185 23.837 32.6185H49.011C49.8762 32.6185 50.5784 33.3285 50.5784 34.2033C50.5784 35.0789 49.8762 35.7881 49.011 35.7881Z" fill="#B0BBD0"/>
											<path d="M49.011 48.4668H23.837C22.9702 48.4668 22.2695 47.7576 22.2695 46.882C22.2695 46.0072 22.9702 45.2972 23.837 45.2972H49.011C49.8762 45.2972 50.5784 46.0072 50.5784 46.882C50.5784 47.7576 49.8762 48.4668 49.011 48.4668Z" fill="#B0BBD0"/>
											<path d="M41.1903 6.00038H41.1738V18.5098C41.1738 20.3529 42.6504 21.8481 44.4733 21.8481H56.8483V21.8315L41.1903 6.00038Z" fill="#CED6E6"/>
										</svg>
										<div class="text-[14px] leading-[1.3] lg:text-sm font-bold">
											В наличии лицензия на перевозку и полис страхования
										</div>
									</div>
								</div>
								<div class="w-[266px] min-w-[266px] md:min-w-0 lg:w-1/3 bg-[#927CF5] rounded-2xl h-[78px] lg:h-[108px] flex justify-center items-center px-3 lg:px-4 tracking-[-0.2px] leading-[18px]">
									<div class="flex gap-2 items-center justify-start w-full">
										<svg class="min-w-[35px] lg:min-w-[57px]" xmlns="http://www.w3.org/2000/svg" width="57" height="57" viewBox="0 0 57 57" fill="none">
											<rect x="4" y="1" width="49" height="54" rx="3" fill="#373F41"/>
											<path d="M48 6H9V46H48V6Z" fill="#FFF2CF"/>
											<path d="M24.8931 50.2538C24.8931 51.0833 24.2476 51.7517 23.4466 51.7517C22.6455 51.7517 22 51.0833 22 50.2538C22 49.4243 22.6455 48.7559 23.4466 48.7559C24.2476 48.7559 24.8931 49.4243 24.8931 50.2538Z" fill="#CED5D8"/>
											<path d="M30.2818 50.2538C30.2818 51.0833 29.6363 51.7517 28.8352 51.7517C28.0342 51.7517 27.3887 51.0833 27.3887 50.2538C27.3887 49.4243 28.0342 48.7559 28.8352 48.7559C29.6363 48.7559 30.2818 49.4243 30.2818 50.2538Z" fill="#CED5D8"/>
											<path d="M35.6724 50.2538C35.6724 51.0833 35.0269 51.7517 34.2258 51.7517C33.4248 51.7517 32.7793 51.0833 32.7793 50.2538C32.7793 49.4243 33.4248 48.7559 34.2258 48.7559C35.0269 48.7559 35.6724 49.4243 35.6724 50.2538Z" fill="#CED5D8"/>
											<path d="M31.8931 7.042C32.1119 7.71186 32.3805 8.5093 32.5297 9.44498C32.6988 10.37 32.7784 11.4226 32.6789 12.5391C32.6391 13.6555 32.3109 14.8251 31.9428 16.0053C31.4754 17.1643 30.8985 18.4083 30.1525 19.4822C29.7844 20.0245 29.4761 20.5242 28.9191 21.1834L28.1731 22.1297L27.9841 22.3636L27.9642 22.3955C27.9642 22.3955 27.8846 22.5231 28.0239 22.2998V22.3211L27.9642 22.3849L27.8648 22.5125L27.4669 23.0016C26.4225 24.32 25.3085 25.6491 24.274 27.0207C23.2694 28.4136 22.2648 29.8065 21.2801 31.1675C20.3452 32.571 19.4201 33.9426 18.5349 35.2823C17.6496 36.622 16.844 37.9405 16.0582 39.1951C15.2625 40.4391 14.5662 41.6406 13.9097 42.7464C13.1836 43.9479 12.557 45.0324 12 46H24.8112C25.0001 45.4258 25.1891 44.8517 25.398 44.2562C25.8655 42.9272 26.333 41.5024 26.8701 40.067C27.4072 38.6316 27.9742 37.143 28.5411 35.6332C29.1578 34.1552 29.7844 32.656 30.4111 31.1462C31.0675 29.6683 31.7837 28.2435 32.4601 26.7974L32.7187 26.2552L32.7883 26.1276L32.8181 26.0638V26.0425C32.9773 25.8086 32.8679 25.9681 32.9077 25.9149L32.9276 25.883L33.0569 25.6066L33.584 24.5008C33.9222 23.8416 34.2902 22.8953 34.6185 22.0447C35.2749 20.3328 35.633 18.6635 35.8817 17.0154C36.0309 15.3567 36.0707 13.7831 35.8121 12.369C35.6131 10.9548 35.2153 9.71079 34.7776 8.69006C34.3599 7.64806 33.8625 6.85061 33.4746 6.19139C33.4249 6.11696 33.395 6.0638 33.3453 6H31.5151C31.6345 6.29771 31.7638 6.63796 31.913 7.05263L31.8931 7.042Z" fill="#AED9E4"/>
											<path d="M25.4153 25.7773C25.38 25.0048 24.8859 24.7656 24.3036 25.2531L13.3634 34.3029C12.7811 34.7812 12.9134 35.149 13.6545 35.1122L20.7833 34.7995L25.2212 40.6212C25.6799 41.2282 26.0329 41.0903 25.9976 40.3177L25.4064 25.7773H25.4153Z" fill="#0B2C3D"/>
											<mask id="mask0_245_1587" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="34" y="12" width="7" height="12">
												<path d="M40.4808 12.6279H34.1035V23.5806H40.4808V12.6279Z" fill="white"/>
											</mask>
											<g mask="url(#mask0_245_1587)">
												<path d="M34.1338 15.5673C34.4527 13.5217 36.5681 12.2896 38.4268 12.7003C39.0412 12.8372 39.3678 13.1593 39.7722 13.6828C40.2778 14.3432 40.4255 14.9955 40.4722 15.817C40.6744 19.5296 37.6102 23.4516 37.3458 23.5724C37.2602 23.4516 33.7294 18.1525 34.1338 15.5673Z" fill="#EF2B2B"/>
												<path d="M39.3209 16.1713C39.3209 15.1002 38.4965 14.2224 37.4621 14.2144C36.4278 14.2144 35.5879 15.068 35.5801 16.1391C35.5801 17.2102 36.4045 18.0881 37.4388 18.0961C38.4732 18.0961 39.3131 17.2424 39.3209 16.1713Z" fill="#B42E2E"/>
												<path d="M38.5661 16.1553C38.5661 16.7915 38.0683 17.315 37.4539 17.315C36.8395 17.315 36.3418 16.7996 36.3418 16.1553C36.3418 15.511 36.8395 14.9956 37.4539 14.9956C38.0683 14.9956 38.5661 15.511 38.5661 16.1553Z" fill="#FFF2CF"/>
											</g>
										</svg>
										<div class="text-[14px] leading-[1.3] lg:text-sm font-bold">
											Транспорт оснащен датчиками скорости и спутниковой системой навигации
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="flex gap-6 mt-3 md:mt-[59px]">
							<?php get_sidebar('simple'); ?>

							<div class="product-cards" id="card_link">
								<div class="sm:flex items-end sm:mt-4 justify-between mb-4">
									<h2 class="text-sm sm:text-xl md:text-2xl sm:w-1/2 mt-0 mb-0 sm:my-0">Вы можете заказать детский автобус
										отдельно от экскурсии</h2>
										<form class="flex items-center gap-3 text-[14px] justify-end" id="sort_form">
											<div class="hidden lg:block">Сортировать по:</div>
											<div class="relative inline-block text-left">
												<button type="button" class="dropdown-button items-center gap-1 flex" aria-expanded="true" aria-haspopup="true" data-close-on-click="true">
													<span class="dropdown-text hidden lg:block text-[#999]">Цене</span>
													<span class="dropdown-text block lg:hidden">По вместимости</span>
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
														<div class="flex flex-col p-5 gap-4">
															<label class="item flex gap-2 items-center lg:hidden">
																<input type="radio" name="grade" value="pops" class="scale-150 change_text">
																<span>По вместимости</span>
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
													<span class=" peer-checked:text-[#FF7A45]">По вместимости</span>
												</label>
											</div>
										</form>
								</div>
								<div class="flex flex-col" >

									<div class="grid grid-col-12 xs:grid-cols-12 gap-3 sm:gap-6 w-full mt-1 lg:mt-4 content__tours"  id="posts-container">
										<?php
										get_template_part( 'template-parts/content/content', 'loop-cars' );
										?>

									</div>
								</div>

								<div class="entry-content mt-11">
									<?php the_content(); ?>
								</div
							</div>

						</div>
					</div>
				</article>

			<?php endwhile; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();

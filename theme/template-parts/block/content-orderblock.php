<?php
$options = get_fields( 'option');

?>


<div class="rounded-3xl mt-10 sm:mt-6l flex flex-col gap-4 mb-14 sm:flex-row" id="sendMe">
	<div class="bg-white px-6 lg:px-8 py-5 lg:py-7 w-full md:w-[270px] min-w-[270px] lg:w-[325px] lg:min-w-[325px] bg-white rounded-2xl">
		<div class="title text-lg font-bold mb-4 sm:mb-6">Оставьте заявку</div>
		<input class="bg-[#F2F1FA] rounded-3xl w-full h-8 lg:h-10 px-4 focus:outline-none mb-3" type="text" placeholder="Имя">
		<input class="bg-[#F2F1FA] rounded-3xl w-full h-8 lg:h-10 px-4 focus:outline-none mb-5" type="tel" placeholder="Номер телефона">
		<button class="px-7 lg:px-10 py-2.5 lg:py-3 bg-[#FF7A45] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex mb-[18px] lg:mb-3">
			<span class="text-center text-white text-[12px] lg:text-sm font-bold leading-tight">Оставить заявку</span>
		</button>
		<label class="cursor-pointer block">
								<span class="flex gap-2 items-center">
								<input type="checkbox" class="checkbox-input hidden" checked />
								<span class="checkbox-box w-[16px] h-[16px]  border border-[#373F41] rounded-sm flex items-center justify-center bg-transparent"">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
										<path d="M4.37891 9.31366L6.44772 11.3825L11.6197 6.21045" stroke="#FF7643" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
			<span class="text-[9px] leading-[12px]">Соглашаюсь на обработку персональных данных</span>
		</label>
	</div>

	<div class="w-full bg-white rounded-2xl px-6 lg:px-8 py-5 lg:py-7 bg-phone">
		<div class="title text-lg font-bold mb-4 lg:mb-8">Вы можете связаться с нами прямо сейчас:</div>
		<div class="flex gap-1 mb-2 items-center">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<path d="M3 4.11111C3 3.49746 3.49746 3 4.11111 3H5.93291C6.17204 3 6.38434 3.15302 6.45996 3.37987L7.29208 5.87623C7.3795 6.13851 7.26077 6.42517 7.01348 6.54881L5.75945 7.17583C6.37181 8.53401 7.46599 9.6282 8.82417 10.2406L9.45119 8.98652C9.57483 8.73923 9.86149 8.6205 10.1238 8.70792L12.6201 9.54004C12.847 9.61566 13 9.82796 13 10.0671V11.8889C13 12.5025 12.5025 13 11.8889 13H11.3333C6.73096 13 3 9.26904 3 4.66667V4.11111Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<a class="font-semibold" href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['phone'];?></a>
		</div>
		<div class="flex gap-1 mb-8 items-center">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
				<path d="M3 5.77778L7.38367 8.70023C7.75689 8.94904 8.24311 8.94904 8.61633 8.70023L13 5.77778M4.11111 11.8889H11.8889C12.5025 11.8889 13 11.3914 13 10.7778V5.22223C13 4.60858 12.5025 4.11111 11.8889 4.11111H4.11111C3.49746 4.11111 3 4.60858 3 5.22223V10.7778C3 11.3914 3.49746 11.8889 4.11111 11.8889Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<a class="font-semibold" href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
		</div>
		<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="w-[90%] sm:w-[54%]  bg-[#30D26E] hover:bg-[#1ABF59] rounded-full justify-center items-center h-10 inline-flex mb-[18px] sm:mb-6 gap-1">
							<span class="flex gap-2 items-center">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
								</svg>
								<span class="text-white text-[12px] lg:text-sm font-semibold leading-tight">Написать в WhatsApp</span>
							</span>
		</a>
		<a target="_blank" href="tg://resolve?domain=<?php echo $options['telegram'];  ?>" class="w-[90%] sm:w-[54%] h-10  bg-[#69C5FD] hover:bg-[#4ea8de] rounded-full justify-center items-center inline-flex mb-6 gap-1">
								<span class="flex gap-2 items-center">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<g clip-path="url(#clip0_189_21039)">
										<path d="M10 0C4.48438 0 0 4.48438 0 10C0 15.5156 4.48438 20 10 20C15.5156 20 20 15.5156 20 10C20 4.48438 15.5156 0 10 0Z" fill="#419FD9"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2244 14.9521C12.9234 15.2579 13.1855 14.6172 13.1855 14.6172L15.0348 5.3268C15.0203 4.70065 14.1757 5.07925 14.1757 5.07925L3.82231 9.14197C3.82231 9.14197 3.32721 9.31672 3.37089 9.62251C3.41458 9.92831 3.80775 10.0739 3.80775 10.0739L6.41429 10.9476C6.41429 10.9476 7.20063 13.5251 7.3608 14.0202C7.50642 14.5007 7.63748 14.5152 7.63748 14.5152C7.78309 14.5735 7.91415 14.4716 7.91415 14.4716L9.60331 12.9426L12.2244 14.9521ZM12.6755 6.97208C12.6755 6.97208 13.0396 6.75365 13.025 6.97208C13.025 6.97208 13.0833 7.0012 12.894 7.20507C12.7192 7.37981 8.59826 11.0785 8.04491 11.5736C8.00123 11.6027 7.9721 11.6464 7.9721 11.7046L7.81193 13.0734C7.7828 13.2191 7.5935 13.2336 7.54981 13.1026L6.86541 10.8601C6.83629 10.7727 6.86541 10.6708 6.95278 10.6125L12.6755 6.97208Z" fill="white"/>
										</g>
										<defs>
										<clipPath id="clip0_189_21039">
										<rect width="20" height="20" fill="white"/>
										</clipPath>
										</defs>
									</svg>
									<span class="text-white text-[12px] lg:text-sm font-semibold leading-tight">Написать в Телеграм</span>
								</span>
		</a>
	</div>
</div>

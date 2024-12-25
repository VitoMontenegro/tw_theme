<?php
$options = get_fields( 'option');
$fields = get_fields();

?>
<div class="rounded-3xl mt-10 sm:mt-6l flex flex-col gap-4 mb-14 sm:flex-row" id="sendMe">
	<div class="w-full bg-white rounded-2xl px-6 lg:px-8 py-5 lg:py-7 text-[14px] leading-[18px] flex flex-col gap-[18px]">
		<div class="title text-[18px] font-bold">Контактная информация</div>
		<div class="flex gap-1 items-start">
			<svg class="mt-1 min-w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				<path d="M13.6611 12.5888C13.0045 13.2454 11.5718 14.6781 10.7061 15.5438C10.3156 15.9343 9.68424 15.9343 9.29371 15.5438C8.44257 14.6926 7.03961 13.2897 6.33877 12.5888C4.31676 10.5668 4.31676 7.28851 6.33877 5.2665C8.36078 3.2445 11.6391 3.2445 13.6611 5.2665C15.6831 7.28851 15.6831 10.5668 13.6611 12.5888Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M11.9416 8.92767C11.9416 10 11.0723 10.8693 9.99994 10.8693C8.92761 10.8693 8.05831 10 8.05831 8.92767C8.05831 7.85534 8.92761 6.98604 9.99994 6.98604C11.0723 6.98604 11.9416 7.85534 11.9416 8.92767Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<a href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['address'];?></a>
		</div>
		<div class="flex gap-1 items-center">
			<svg class="min-w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				<path d="M3.75 5.13889C3.75 4.37183 4.37183 3.75 5.13889 3.75H7.41614C7.71505 3.75 7.98042 3.94127 8.07495 4.22484L9.1151 7.34529C9.22438 7.67314 9.07596 8.03147 8.76685 8.18602L7.19931 8.96979C7.96476 10.6675 9.33249 12.0352 11.0302 12.8007L11.814 11.2331C11.9685 10.924 12.3269 10.7756 12.6547 10.8849L15.7752 11.9251C16.0587 12.0196 16.25 12.285 16.25 12.5839V14.8611C16.25 15.6282 15.6282 16.25 14.8611 16.25H14.1667C8.4137 16.25 3.75 11.5863 3.75 5.83333V5.13889Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<a class="font-bold" href="tel:<?php echo  preg_replace('/[^0-9+]/', '', $options['phone']);  ?>"><?php echo $options['phone'];?></a>
		</div>
		<div class="flex gap-1 items-start">
			<svg class="mt-1 min-w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				<path d="M10 7.22222V10L12.0833 12.0833M16.25 10C16.25 13.4518 13.4518 16.25 10 16.25C6.54822 16.25 3.75 13.4518 3.75 10C3.75 6.54822 6.54822 3.75 10 3.75C13.4518 3.75 16.25 6.54822 16.25 10Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<span><?php echo $options['work_time'];?></span>
		</div>
		<div class="flex gap-1 items-center">
			<svg class="min-w-5" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				<path d="M3.75 7.222L9.22958 10.8751C9.69611 11.1861 10.3039 11.1861 10.7704 10.8751L16.25 7.222M5.13889 14.8609H14.8611C15.6282 14.8609 16.25 14.2391 16.25 13.472V6.52756C16.25 5.7605 15.6282 5.13867 14.8611 5.13867H5.13889C4.37183 5.13867 3.75 5.7605 3.75 6.52756V13.472C3.75 14.2391 4.37183 14.8609 5.13889 14.8609Z" stroke="#373F41" stroke-width="1.13" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<a href="mailto:<?php echo $options['email'];?>">Email: <?php echo $options['email'];?></a>
		</div>
		<a target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo preg_replace('/[^0-9]/', '', $options['watsapp']);  ?>&text=Здравствуйте.+Я+обращаюсь+с+сайта+flagmanspb.ru" class="  px-8 py-2.5 bg-[#30D26E] hover:bg-[#1ABF59] rounded-full justify-center items-center inline-flex  max-w-[250px]">
			<span class="flex gap-2 items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M13.6894 2.33514C12.2071 0.821622 10.158 0 8.0654 0C3.61853 0 0.0435967 3.58919 0.0871935 7.95676C0.0871935 9.34054 0.479564 10.6811 1.13351 11.8919L0 16L4.22888 14.9189C5.40599 15.5676 6.7139 15.8703 8.0218 15.8703C12.4251 15.8703 16 12.2811 16 7.91351C16 5.79459 15.1717 3.80541 13.6894 2.33514ZM8.0654 14.5297C6.88828 14.5297 5.71117 14.227 4.70845 13.6216L4.44687 13.4919L1.91826 14.1405L2.57221 11.6757L2.39782 11.4162C0.479564 8.34595 1.3951 4.28108 4.53406 2.37838C7.67302 0.475676 11.7275 1.38378 13.6458 4.4973C15.564 7.61081 14.6485 11.6324 11.5095 13.5351C10.5068 14.1838 9.2861 14.5297 8.0654 14.5297ZM11.9019 9.72973L11.4223 9.51351C11.4223 9.51351 10.7248 9.21081 10.2888 8.99459C10.2452 8.99459 10.2016 8.95135 10.158 8.95135C10.0272 8.95135 9.94005 8.99459 9.85286 9.03784C9.85286 9.03784 9.80926 9.08108 9.19891 9.77297C9.15531 9.85946 9.06812 9.9027 8.98093 9.9027H8.93733C8.89373 9.9027 8.80654 9.85946 8.76294 9.81622L8.54496 9.72973C8.0654 9.51351 7.62943 9.25405 7.28065 8.90811C7.19346 8.82162 7.06267 8.73514 6.97548 8.64865C6.6703 8.34595 6.36512 8 6.14714 7.61081L6.10354 7.52432C6.05995 7.48108 6.05995 7.43784 6.01635 7.35135C6.01635 7.26486 6.01635 7.17838 6.05995 7.13514C6.05995 7.13514 6.23433 6.91892 6.36512 6.78919C6.45232 6.7027 6.49591 6.57297 6.58311 6.48649C6.6703 6.35676 6.7139 6.18378 6.6703 6.05405C6.6267 5.83784 6.10354 4.67027 5.97275 4.41081C5.88556 4.28108 5.79837 4.23784 5.66757 4.19459H5.53678C5.44959 4.19459 5.3188 4.19459 5.18801 4.19459C5.10082 4.19459 5.01362 4.23784 4.92643 4.23784L4.88283 4.28108C4.79564 4.32432 4.70845 4.41081 4.62125 4.45405C4.53406 4.54054 4.49046 4.62703 4.40327 4.71351C4.09809 5.1027 3.92371 5.57838 3.92371 6.05405C3.92371 6.4 4.0109 6.74595 4.14169 7.04865L4.18529 7.17838C4.57766 8 5.10082 8.73514 5.79837 9.38378L5.97275 9.55676C6.10354 9.68649 6.23433 9.77297 6.32153 9.9027C7.23706 10.6811 8.28338 11.2432 9.46049 11.5459C9.59128 11.5892 9.76567 11.5892 9.89646 11.6324C10.0272 11.6324 10.2016 11.6324 10.3324 11.6324C10.5504 11.6324 10.812 11.5459 10.9864 11.4595C11.1172 11.373 11.2044 11.373 11.2916 11.2865L11.3787 11.2C11.4659 11.1135 11.5531 11.0703 11.6403 10.9838C11.7275 10.8973 11.8147 10.8108 11.8583 10.7243C11.9455 10.5514 11.9891 10.3351 12.0327 10.1189C12.0327 10.0324 12.0327 9.9027 12.0327 9.81622C12.0327 9.81622 11.9891 9.77297 11.9019 9.72973Z" fill="white"/>
				</svg>
				<span class="text-white text-[12px] lg:text-sm font-semibold leading-tight">Написать в WhatsApp</span>
			</span>
		</a>
		<a target="_blank" href="tg://resolve?domain=<?php echo $options['telegram'];  ?>" class=" px-8 py-2.5 bg-[#69C5FD] hover:bg-[#4ea8de] rounded-full justify-center items-center inline-flex max-w-[250px]">
			<span class="flex gap-2 items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<g clip-path="url(#clip0_135_7087)">
					<path d="M8 0C3.5875 0 0 3.5875 0 8C0 12.4125 3.5875 16 8 16C12.4125 16 16 12.4125 16 8C16 3.5875 12.4125 0 8 0Z" fill="#419FD9"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M9.77836 11.9617C10.3375 12.2063 10.5472 11.6937 10.5472 11.6937L12.0267 4.26144C12.015 3.76052 11.3394 4.0634 11.3394 4.0634L3.05667 7.31358C3.05667 7.31358 2.6606 7.45337 2.69554 7.69801C2.73049 7.94265 3.04502 8.05914 3.04502 8.05914L5.13026 8.7581C5.13026 8.7581 5.75933 10.82 5.88747 11.2161C6.00397 11.6006 6.10881 11.6122 6.10881 11.6122C6.2253 11.6588 6.33015 11.5773 6.33015 11.5773L7.68148 10.3541L9.77836 11.9617ZM10.1393 5.57766C10.1393 5.57766 10.4305 5.40292 10.4188 5.57766C10.4188 5.57766 10.4654 5.60096 10.314 5.76405C10.1742 5.90384 6.87743 8.86279 6.43476 9.25886C6.39981 9.28216 6.37651 9.31711 6.37651 9.36371L6.24837 10.4588C6.22507 10.5752 6.07363 10.5869 6.03868 10.482L5.49116 8.68805C5.46786 8.61815 5.49116 8.5366 5.56106 8.49001L10.1393 5.57766Z" fill="white"/>
					</g>
				  <defs>
					<clipPath id="clip0_135_7087">
					  <rect width="16" height="16" fill="white"/>
					</clipPath>
				  </defs>
				</svg>
				<span class="text-white text-[12px] lg:text-sm font-semibold leading-tight">Написать в Телеграм</span>
			</span>
		</a>
	</div>
	<div class="bg-white px-6 lg:px-8 py-5 lg:py-7 w-full md:w-[270px] min-w-[270px] lg:w-[325px] lg:min-w-[325px] bg-white rounded-2xl flex flex-col gap-[18px]">
		<div class="title text-lg font-bold">Написать директору</div>
		<input class="bg-[#F2F1FA] rounded-3xl w-full h-8 lg:h-10 px-4 focus:outline-none" type="text" placeholder="Имя">
		<input class="bg-[#F2F1FA] rounded-3xl w-full h-8 lg:h-10 px-4 focus:outline-none" type="tel" placeholder="Номер телефона">
		<textarea class="bg-[#F2F1FA] rounded-[12px] w-full h-[85px] px-4 py-[11px] focus:outline-none" name="" id="" placeholder="Сообщение"></textarea>
		<button class="px-7 lg:px-10 py-2.5 lg:py-3 bg-[#FF7A45] hover:bg-[#ff6931] rounded-full justify-center items-center inline-flex">
			<span class="text-center text-white text-[12px] lg:text-sm font-bold leading-tight">Оставить</span>
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
</div>
<div >
	<iframe src="https://yandex.ru/map-widget/v1/?ll=30.473152%2C59.760634&mode=usermaps&source=constructorLink&um=constructor%3A604981676471e4aa52d9846e115c1f1f43fbc383be5168562bcdf2808a31f264&z=16" allowfullscreen="true" class="w-full h-[294px] mb-6"></iframe>
</div>
<div class="text-[#878787] text-[1p6x] leading-[21px] tracking-tight">
	<?php if(isset($fields['details']) && !empty($fields['details'])) : ?>
		<?php echo $fields['details']; ?>
	<?php else: ?>
		Реквизиты: <br>
		ИП Руссков Алексей Александрович <br>
		ИНН 782006227523<br>
		ОГРНИП 313784709900015<br>
		р/с 40802810500000900077 АО Банк «ПСКБ»<br>
		БИК 044030852 Корсчет 30101810000000000852 в Северо-Западном ГУ Банка России<br>
		Адрес: 196627, г. Санкт-Петербург, поселок Шушары, территория Ленсоветовский, д.3, кв. 41<br>
		Почтовый адрес: 196625, Россия , город Санкт-Петербург, пос.Тярлево, ул. Большая, д.34<br>
	<?php endif; ?>
</div>

<div class="container py-6 block sm:hidden">
	<div class="flex flex-col gap-4">
		<div class="font-bold">Работаем официально по лицензии №</div>
		<div class="image_block relative flex justify-center">
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

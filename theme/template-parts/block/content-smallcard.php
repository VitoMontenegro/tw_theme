<?php $fields = get_fields();
$list =[];
	if ($fields) {
		$list = $fields['list'];
	}
?>

<?php if(!$fields && is_admin()) : ?>

	<div class="flex flex-col sm:flex-row gap-4 mt-6 overflow-x-auto">
		<div class="bg-[#8FA9FF] rounded-2xl h-[108px] flex justify-center items-center px-4">
			<div class="flex gap-2 items-center justify-start w-full">
				<svg xmlns="http://www.w3.org/2000/svg" width="62" height="71" viewBox="0 0 62 71" fill="none">
					<g clip-path="url(#clip0_135_6034)">
						<path d="M31.5462 52.9599C31.2322 53.0496 30.8967 52.8702 30.8064 52.554L17.4334 6.78423C17.3431 6.47237 17.5237 6.13916 17.842 6.04945C18.156 5.95974 18.4915 6.13916 18.5819 6.45529L31.9591 52.2294C32.0495 52.5412 31.8688 52.8744 31.5505 52.9641L31.5462 52.9599Z" fill="#373F41"/>
						<path d="M36.6177 42.9206C34.8154 41.1819 35.1337 39.6782 36.4327 38.1403C35.4606 36.423 34.2949 35.5387 34.9703 33.612C35.6284 31.7452 37.4522 31.2112 39.0265 30.0834C38.1146 28.02 38.2049 28.3831 39.2114 26.9307C40.7857 24.6665 43.074 23.1585 39.3878 21.6035C37.7705 20.92 37.1424 21.313 35.9252 19.8435C35.0778 18.8225 34.3509 16.4003 32.7723 16.8659C30.7205 17.4768 32.5228 18.6858 31.9937 19.7239C31.0861 21.4882 29.6064 19.8862 28.3332 19.5829C25.589 18.925 24.8878 21.6633 22.7027 21.736C21.0166 21.7915 20.8144 19.9717 20.3026 18.6516C19.8294 17.4298 19.7821 15.7253 18.9734 14.747C18.4831 14.1532 17.3088 14.4352 16.7582 13.5295C16.4012 12.9443 16.4141 12.154 16.483 11.3679C15.8722 11.6499 15.2485 11.9617 14.6076 12.3035C11.9407 13.7389 9.61366 15.0931 7.8673 17.2419C8.1813 17.3658 8.50821 17.5879 8.92544 18.0108C10.4653 19.5615 10.1169 22.27 9.10179 24.0172C10.3836 24.7691 12.3536 25.4996 13.7688 25.8798C14.5817 26.1019 15.528 26.0122 16.2722 26.512C17.5927 27.4049 17.5669 29.2119 19.0423 30.0578C20.7155 31.0189 23.0985 30.972 24.5953 32.4714C25.589 33.4625 26.3976 34.9876 27.1504 36.3674C27.5848 37.1663 27.1332 38.1617 26.2385 38.3624C25.1287 38.6102 23.8598 38.67 23.1286 38.3667C21.7005 37.7815 20.9865 35.7053 20.0316 34.3468C19.0896 33.014 18.6121 32.3475 17.0636 32.1211C15.5625 31.9032 14.7925 32.5739 13.5752 31.0275C11.2052 31.6939 14.8957 34.522 13.2913 36.3076C12.4827 37.209 11.2267 37.0979 10.2374 37.8455C9.22223 38.6102 9.31686 39.7594 8.41357 40.4215C8.13399 40.6266 7.72535 40.7377 7.26941 40.7761C10.1556 45.7828 14.7065 50.5333 20.0488 50.0377C25.1158 49.5678 32.4023 47.1242 37.3231 43.57C37.1295 43.4119 36.9059 43.1983 36.6177 42.9206ZM27.7353 44.5611C26.8536 45.1079 26.3589 45.7401 25.5675 46.3638C25.0642 46.7611 24.4061 47.2268 23.7308 47.1969C22.8748 47.1584 22.2511 46.5091 21.3392 46.6458C19.9413 46.8594 18.6896 48.6237 17.2013 47.8889C16.5217 47.5557 16.2636 46.6928 15.6743 46.2784C15.1796 45.9281 14.5129 45.958 13.8806 45.1036C13.4419 43.6682 15.0377 42.801 16.2937 43.1257C17.154 43.3478 17.9196 44.3176 18.9046 44.2321C19.3778 44.1894 19.623 43.7024 20.2122 43.7707C20.9349 43.8519 21.7822 44.5226 22.5092 44.7063C25.1502 45.3856 26.5095 43.9032 28.7806 42.8779C29.6107 43.6682 28.273 44.2236 27.7353 44.5568V44.5611Z" fill="#81E2F8"/>
						<path d="M10.2369 37.8454C11.2262 37.0978 12.4822 37.2088 13.2909 36.3075C14.8953 34.5218 11.2047 31.6937 13.5748 31.0273C14.7877 32.5738 15.5577 31.9031 17.0632 32.1209C18.6117 32.3474 19.0934 33.0095 20.0311 34.3466C20.9903 35.7051 21.7044 37.7813 23.1281 38.3665C23.8593 38.6699 25.1283 38.6058 26.238 38.3623C27.1327 38.1615 27.5843 37.1704 27.1499 36.3673C26.3972 34.9832 25.5885 33.4623 24.5949 32.4712C23.098 30.9761 20.715 31.0188 19.0418 30.0576C17.5664 29.2117 17.5922 27.4047 16.2717 26.5119C15.5276 26.012 14.5856 26.0975 13.7683 25.8796C12.3575 25.4951 10.3831 24.7689 9.10133 24.017C10.1208 22.2741 10.4649 19.5614 8.92498 18.0107C8.50344 17.5877 8.17654 17.3656 7.86684 17.2417C7.36788 17.8569 6.91193 18.5404 6.51621 19.3093C3.90097 24.3502 2.89445 28.9853 4.48596 34.4107C5.03654 36.2904 5.99144 38.5545 7.26895 40.7717C7.72489 40.7332 8.13352 40.6221 8.41311 40.4171C9.3164 39.7549 9.22177 38.6101 10.2369 37.8411V37.8454Z" fill="#08A500"/>
						<path d="M18.9773 14.7426C19.7859 15.7209 19.8333 17.4254 20.3064 18.6472C20.8183 19.9672 21.0204 21.7914 22.7066 21.7316C24.8874 21.6589 25.5928 18.9206 28.3371 19.5785C29.6103 19.8861 31.09 21.4881 31.9975 19.7195C32.5309 18.6814 30.7243 17.4724 32.7761 16.8615C34.3547 16.3916 35.0816 18.8181 35.929 19.8391C37.1506 21.3086 37.7743 20.9156 39.3916 21.5991C43.0779 23.1541 40.7896 24.6664 39.2152 26.9263C38.2087 28.3745 38.1141 28.0114 39.0303 30.079C37.4517 31.2068 35.6279 31.7408 34.9741 33.6076C34.2945 35.5343 35.4601 36.4186 36.4366 38.1359C35.1332 39.6738 34.8149 41.1775 36.6215 42.9162C36.9054 43.1896 37.1334 43.4075 37.3269 43.5656C39.0776 42.3011 40.5272 40.8999 41.4735 39.3919C44.0113 35.342 44.1919 32.4414 43.3274 27.9131C42.5445 23.8206 39.6196 18.8053 37.2667 15.3065C34.8451 11.7053 28.2812 5.92958 16.4954 11.3678C16.4266 12.1496 16.4137 12.9441 16.7707 13.5294C17.3213 14.4308 18.4955 14.1531 18.9859 14.7469L18.9773 14.7426Z" fill="#08A500"/>
						<path d="M22.5084 44.7062C21.7814 44.5182 20.9341 43.8518 20.2114 43.7706C19.6221 43.7023 19.377 44.1936 18.9038 44.232C17.9188 44.3175 17.1531 43.352 16.2929 43.1256C15.0369 42.8009 13.4411 43.6681 13.8798 45.1035C14.5121 45.9579 15.1788 45.928 15.6735 46.2783C16.2628 46.6969 16.5165 47.5556 17.2005 47.8888C18.6887 48.6193 19.9404 46.8593 21.3384 46.6457C22.2503 46.5047 22.874 47.1583 23.7299 47.1968C24.4053 47.2267 25.0634 46.761 25.5666 46.3637C26.3581 45.74 26.857 45.1078 27.7345 44.561C28.2722 44.2277 29.6099 43.6724 28.7798 42.8821C26.5086 43.9074 25.1494 45.3855 22.5084 44.7105V44.7062Z" fill="#08A500"/>
						<path d="M1.19109 14.8282C1.44056 15.2212 2.62344 16.7207 2.87722 17.1137C5.78495 13.7474 18.0138 7.18566 21.9925 6.18174C24.3368 5.59221 27.1155 5.45978 29.4683 6.00659C36.3978 7.61285 47.8653 15.956 46.149 31.271C45.8049 34.334 46.149 42.0577 32.647 51.0886C29.7049 53.0537 26.2853 53.5493 23.1453 55.006C23.1281 56.168 23.6959 57.5564 24.6895 57.8041C25.653 58.0476 27.3864 57.535 28.251 57.3214C29.8812 56.9198 31.5846 56.4627 33.1159 55.8006C36.2903 54.4335 38.841 52.0626 41.7659 50.2855C47.9986 46.4963 51.0999 39.3535 51.8183 36.9014C57.6509 16.9471 42.4757 5.50677 39.8475 4.04576C37.8818 2.95214 29.6834 -2.72102 18.517 1.61929C14.3146 3.25118 9.80674 5.37434 6.18928 8.12121C5.10103 8.94998 4.00418 9.88554 3.02347 10.8553C2.06857 11.7951 0.537277 12.7905 0.00390625 14.0464C0.163057 14.1404 0.446948 14.4266 1.19539 14.8325L1.19109 14.8282Z" fill="#373F41"/>
						<path d="M24.8013 69.2745C25.0637 69.723 25.6057 70.7611 26.109 70.9277C27.4252 71.3634 29.821 69.676 30.8534 69.1079C39.7959 64.178 50.2612 57.9367 58.5413 52.0414C59.8876 51.0844 60.4296 50.905 61.6899 49.8157C62.6448 48.9912 61.1867 47.748 60.5372 46.6715C60.0984 45.941 60.0984 45.847 59.3371 45.8897C58.1026 45.9581 56.4422 47.543 55.5002 48.1881C52.171 50.4522 48.5621 52.2721 45.2243 54.4977C40.011 57.9708 34.6343 61.2304 29.3135 64.5539C28.4747 65.0794 23.1754 67.5443 24.8056 69.2745H24.8013Z" fill="#373F41"/>
						<path d="M42.871 58.2272C42.1097 58.7014 41.0946 58.475 40.6128 57.7146L37.761 53.2077C37.2836 52.4515 37.5115 51.4433 38.2772 50.9649C39.0385 50.4907 40.0536 50.7171 40.5354 51.4775L43.3872 55.9844C43.8647 56.7406 43.6367 57.7487 42.871 58.2272Z" fill="#373F41"/>
						<path d="M46.7947 54.8866C49.9433 52.9215 53.1005 50.9607 56.2448 48.987C56.7222 48.688 57.0406 48.2822 57.4793 48.6325C57.8492 48.9272 57.746 49.521 57.5395 49.8542C57.2083 50.384 55.6899 51.0376 55.1522 51.3452C53.7973 52.1184 52.4682 52.9514 51.1047 53.7204C49.7841 54.468 48.5066 55.3053 47.1947 56.0571C46.9753 55.8692 46.7302 55.6299 46.7947 54.8909V54.8866Z" fill="#E0C75F"/>
						<path d="M40.9871 6.60449C40.6129 7.14276 40.6387 7.5016 40.9312 8.05269C41.2839 8.71057 42.3506 9.1634 42.8797 9.67176C43.512 10.2827 44.1142 11.0174 44.682 11.6753C46.1702 13.3926 47.2929 15.3449 48.5618 17.2289C48.8758 17.0665 49.1855 16.87 49.4694 16.6607C48.3424 13.0338 44.6304 8.87718 40.9828 6.60449H40.9871Z" fill="#E0C75F"/>
					</g>
					<defs>
						<clipPath id="clip0_135_6034">
							<rect width="62" height="71" fill="white"/>
						</clipPath>
					</defs>
				</svg>
				<div class="flex flex-col">
					<div class="font-bold">Знания и опыт от 3 лет.</div>
					<div class="">Наши гиды знают все о посещаемых местах и ответят на любой вопрос школьника.</div>
				</div>
			</div>
		</div>
		<div class=" bg-[#CFC5FF] rounded-2xl h-[108px] flex justify-center items-center px-4">
			<div class="flex gap-2 items-center justify-start w-full">
				<svg xmlns="http://www.w3.org/2000/svg" width="59" height="72" viewBox="0 0 59 72" fill="none">
					<path d="M49.4749 36.0091C50.5311 37.4879 48.9549 38.9341 49.8974 41.2904C50.7424 43.4029 52.5136 43.4679 53.1311 45.7916C53.3586 46.6529 53.4236 47.7904 53.1311 48.5379C51.5874 52.5029 36.7674 53.7704 34.2649 48.4729C32.1524 44.0041 38.8961 35.1316 45.0386 34.6766C45.5586 34.6279 48.3536 34.4329 49.4749 36.0091Z" fill="#7D1913"/>
					<path d="M22.3049 36.0091C23.3612 37.4879 21.7849 38.9341 22.7274 41.2904C23.5724 43.4029 25.3437 43.4679 25.9612 45.7916C26.1887 46.6529 26.2537 47.7904 25.9612 48.5379C24.4174 52.5029 9.59745 53.7704 7.09495 48.4729C4.98245 44.0041 11.7262 35.1316 17.8687 34.6766C18.3887 34.6279 21.1837 34.4329 22.3049 36.0091Z" fill="#7D1913"/>
					<path d="M48.0626 37.3571H10.0701C7.97383 37.3571 6.26758 35.6509 6.26758 33.5546V32.6609C6.26758 30.5646 7.97383 28.8584 10.0701 28.8584H48.0626C50.1588 28.8584 51.8651 30.5646 51.8651 32.6609V33.5546C51.8651 35.6509 50.1588 37.3571 48.0626 37.3571Z" fill="#F9B17B"/>
					<path d="M34.0705 49.4805H24.418V58.2392H34.0705V49.4805Z" fill="#F9AE7B"/>
					<g opacity="0.5">
						<path d="M30.1542 42.0702C29.9917 42.0214 29.8292 41.9727 29.6667 41.9402C28.6105 41.9077 27.5542 41.9402 26.498 42.0214C25.7992 42.1514 25.1005 42.2977 24.418 42.4439V53.1364C25.848 53.5589 27.018 53.7214 27.668 53.8027C28.2855 53.8839 28.9842 53.9327 29.7805 53.9002C30.463 53.8839 31.0967 53.8189 31.633 53.7214C32.1205 53.6564 33.0142 53.5102 34.1192 53.1689C34.1192 53.1039 34.1192 53.0389 34.1192 52.9739V42.6877C32.7542 42.6389 31.4055 42.4439 30.1542 42.0702Z" fill="#D5855B"/>
					</g>
					<path d="M31.5688 51.3651C31.0163 51.4464 30.3663 51.5276 29.6676 51.5439C28.8551 51.5601 28.1401 51.5114 27.5063 51.4464C25.8163 51.2676 20.6488 50.4876 16.5863 46.2951C15.8063 45.4989 13.7588 43.3376 12.6701 39.8276C12.2151 38.3489 11.9551 36.7726 11.9551 35.1314V22.9926C11.9551 14.2826 19.0238 7.21387 27.7338 7.21387H30.3663C39.0763 7.21387 46.1451 14.2826 46.1451 22.9926V35.1314C46.1126 36.4314 45.8038 41.7776 41.5301 46.2951C37.6626 50.3576 32.9663 51.1701 31.5688 51.3651Z" fill="#F9B17B"/>
					<path d="M30.0893 40.3475C30.0568 40.3475 30.0406 40.3475 30.0081 40.3475C27.2618 39.7788 26.0106 39.145 25.9781 38.3C25.9456 37.7313 26.4493 37.4063 26.9856 37.0488C27.4568 36.74 28.0256 36.3663 28.4481 35.7488C29.0981 34.7413 29.1793 33.3438 28.6756 31.5563C28.6106 31.345 28.7406 31.1338 28.9356 31.085C29.1468 31.02 29.3581 31.15 29.4068 31.345C29.9756 33.3438 29.8618 34.9688 29.0818 36.1713C28.5781 36.9188 27.9118 37.3738 27.4081 37.6988C27.1156 37.8938 26.7418 38.1375 26.7581 38.2675C26.7581 38.3325 26.8881 38.9175 30.1868 39.6C30.3981 39.6488 30.5281 39.8438 30.4793 40.055C30.4306 40.2175 30.2681 40.3475 30.0893 40.3475Z" fill="#8A5D3B"/>
					<path d="M38.3937 35.9437C39.3629 35.9437 40.1487 34.7141 40.1487 33.1974C40.1487 31.6807 39.3629 30.4512 38.3937 30.4512C37.4244 30.4512 36.6387 31.6807 36.6387 33.1974C36.6387 34.7141 37.4244 35.9437 38.3937 35.9437Z" fill="#321B0F"/>
					<path d="M20.7296 35.9437C21.6989 35.9437 22.4846 34.7141 22.4846 33.1974C22.4846 31.6807 21.6989 30.4512 20.7296 30.4512C19.7603 30.4512 18.9746 31.6807 18.9746 33.1974C18.9746 34.7141 19.7603 35.9437 20.7296 35.9437Z" fill="#321B0F"/>
					<path d="M31.519 43.4509C31.0965 43.4996 29.8127 43.6134 28.1715 43.4509C27.3265 43.3696 26.2702 43.1909 25.084 42.8496C25.2627 43.0934 26.9365 45.1571 29.7965 45.1246C32.5427 45.0921 34.1515 43.1259 34.3465 42.8659C33.6315 43.0934 32.6727 43.3209 31.519 43.4509Z" fill="white"/>
					<path d="M49.8009 17.4513C49.0859 14.1851 47.4284 11.8938 46.6484 10.8213C46.1771 10.1876 44.5034 7.99384 41.5784 6.02759C35.5821 2.01384 29.1146 2.22509 25.7184 2.32259C23.5409 2.38759 20.4534 2.51759 16.8459 4.01259C16.3584 4.20759 14.0671 5.18259 11.4671 7.18134C9.95589 8.33509 8.08714 9.76509 6.72214 11.9263C4.30089 15.7451 4.57714 19.9701 4.86964 22.0176C4.90214 23.1713 5.22714 25.5276 6.78714 27.8188C9.19214 31.3613 12.9296 33.0351 15.1071 31.5563C16.3746 30.6951 16.8459 28.9726 16.5534 26.9901C17.2521 27.1201 17.9834 27.1851 18.7471 27.1851C23.6221 27.1851 27.5871 24.2763 27.5871 20.6851C27.5871 20.6526 27.5871 20.6363 27.5871 20.6038C28.1559 21.0263 28.8221 21.3351 29.5371 21.4976C29.5371 21.4976 30.1059 21.6276 30.7071 21.6276C31.9909 21.6276 33.9084 20.5226 35.5821 18.5238C35.7284 18.4913 35.9721 18.4588 36.2484 18.4263C37.2234 18.3451 37.9709 18.5401 40.4409 19.2063C40.8146 19.3038 41.1071 19.3851 41.3184 19.4501C41.4484 21.2701 42.0496 26.0476 45.4784 28.8751C46.2909 29.5576 46.7134 29.6551 47.0546 29.6063C49.2321 29.4113 51.0034 22.9113 49.8009 17.4513Z" fill="#7D1913"/>
					<path d="M35.2889 28.5099C35.8577 28.9649 36.8814 28.6237 39.0914 28.9812C41.1714 29.3224 42.3252 29.9562 42.6339 29.7449C42.9264 29.5499 42.1464 28.8674 42.0327 28.7699C41.0902 27.9737 39.7089 27.6324 38.4739 27.3562C37.0439 27.0312 36.2314 26.8524 35.6302 27.0962C34.9802 27.3887 34.7852 28.1199 35.2889 28.5099Z" fill="#7D1913"/>
					<path d="M24.4103 28.5265C23.8415 28.9815 22.8178 28.6403 20.6078 28.9978C18.5278 29.339 17.374 29.9728 17.0653 29.7615C16.7728 29.5665 17.5528 28.884 17.6665 28.7865C18.609 27.9903 19.9903 27.649 21.2253 27.3728C22.6553 27.0478 23.4678 26.869 24.069 27.1128C24.719 27.4053 24.914 28.1365 24.4103 28.5265Z" fill="#7D1913"/>
					<path d="M39.7418 32.3039C39.303 32.3039 38.9618 32.1901 38.8318 32.1414C38.6368 32.0601 38.5393 31.8326 38.6205 31.6376C38.7018 31.4426 38.9293 31.3451 39.1243 31.4264C39.2705 31.4914 39.823 31.6701 40.408 31.3939C40.9768 31.1339 41.2043 30.6301 41.2693 30.4839C41.3505 30.2889 41.5618 30.1914 41.7568 30.2564C41.9518 30.3376 42.0493 30.5489 41.9843 30.7439C41.8705 31.0201 41.5455 31.7189 40.733 32.0764C40.3755 32.2551 40.0343 32.3039 39.7418 32.3039Z" fill="#3B2314"/>
					<path d="M19.1688 32.466C18.8763 32.466 18.535 32.4173 18.1938 32.2548C17.3813 31.881 17.04 31.1985 16.9425 30.9223C16.8613 30.7273 16.975 30.4998 17.17 30.4348C17.365 30.3535 17.5925 30.451 17.6575 30.6623C17.7063 30.8085 17.95 31.3123 18.5188 31.5723C19.1038 31.8323 19.6563 31.6535 19.8025 31.6048C19.9975 31.5235 20.225 31.621 20.3063 31.816C20.3875 32.011 20.29 32.2385 20.095 32.3198C19.9325 32.3523 19.6075 32.466 19.1688 32.466Z" fill="#3B2314"/>
					<path d="M47.688 59.7173C44.048 58.1573 38.0193 56.0935 30.3005 55.8173C22.6793 55.541 16.5855 57.101 12.848 58.3848C11.6455 58.7423 9.2568 59.6523 7.03055 61.8623C6.18555 62.7073 4.49555 64.6085 3.5693 67.566C3.16305 68.8823 2.93555 70.2635 2.93555 71.7098H55.0168C55.0005 70.361 54.7405 65.3885 50.938 61.8623C49.8493 60.8385 48.6955 60.156 47.688 59.7173Z" fill="#F9B17B"/>
					<path d="M5.72992 63.1465C4.96617 64.1702 4.13742 65.5677 3.58492 67.3552C3.17867 68.6715 2.95117 70.0527 2.95117 71.499H55.0324C55.0162 70.329 54.8212 66.4615 52.3187 63.1465H5.72992Z" fill="#FF7643"/>
					<path d="M46.3071 37.8291C46.8187 37.8291 47.2334 37.4144 47.2334 36.9028C47.2334 36.3913 46.8187 35.9766 46.3071 35.9766C45.7956 35.9766 45.3809 36.3913 45.3809 36.9028C45.3809 37.4144 45.7956 37.8291 46.3071 37.8291Z" fill="#FDED16"/>
					<path d="M11.7914 37.9266C12.3299 37.9266 12.7664 37.49 12.7664 36.9516C12.7664 36.4131 12.3299 35.9766 11.7914 35.9766C11.2529 35.9766 10.8164 36.4131 10.8164 36.9516C10.8164 37.49 11.2529 37.9266 11.7914 37.9266Z" fill="#FDED16"/>
				</svg>
				<div class="flex flex-col">
					<div class="font-bold">Дружелюбие и подход.</div>
					<div class="">Легко находят общий язык с детьми, обладают чувством юмора и умением вовлекать в процесс. </div>
				</div>
			</div>
		</div>

	</div>


<?php else: ?>
	<div class="flex flex-col sm:flex-row gap-4 mt-6 overflow-x-auto">
	<?php foreach ($list as $item) : ?>
		<div class="rounded-2xl h-[108px] sm:max-w-[380px] flex justify-center items-center px-4" style="background: <?php echo $item['color']; ?>">
			<div class="flex gap-4 items-center justify-start w-full">
				<div class="w-[60px] min-w-[60px]">
					<?php if($item['svg']) : ?>
						<?php echo $item['svg']; ?>
					<?php elseif($item['svg_url']): ?>
						<img src="<?php echo $item['svg_url']; ?>" alt="icon">
					<?php endif; ?>

				</div>
				<div class="flex flex-col">
					<div class="font-bold"><?php echo $item['title']; ?></div>
					<div class=""><?php echo $item['text']; ?></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
<?php endif; ?>

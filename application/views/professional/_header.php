<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<script type="text/javascript">
			var base_url = "<?php echo base_url(); ?>";
		</script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta charset="utf-8" />
		<title><?php echo $profData['title']; ?></title>
		<meta name="description" content="User panel" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="<?php echo base_url() ?>assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/style.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?php echo base_url(); ?>assets/css/pages/wizard/wizard-2.css?v=7.1.2" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/logos/logo.png" />
		<!-- Hotjar Tracking Code for keenthemes.com -->
		<script>(function(h,o,t,j,a,r){ h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)}; h._hjSettings={hjid:1070954,hjsv:6}; a=o.getElementsByTagName('head')[0]; r=o.createElement('script');r.async=1; r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv; a.appendChild(r); })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');</script>
		<style type="text/css">

			#div-image {
				margin-top: 40px; 
				margin-bottom: 50px; 
				width: 100%; 
				background: rgb(34,193,195,.2);
				background: linear-gradient(0deg, rgba(34,193,195,.2) 0%, rgba(253,187,45,.2) 100%);
				height: 150px; 
				border-radius: 5px;
				position: relative;
			}

			#image-last {
				margin-top: 40px; 
				margin-bottom: 50px; 
				width: 100%; 
				background: rgb(34,193,195,.2);
				background: linear-gradient(0deg, rgba(34,193,195,.2) 0%, rgba(253,187,45,.2) 100%);
				height: 300px; 
				border-radius: 5px;
			}

			.apply-image{
				width: 100%;
				height: 100%;
				margin-top: -10%;
				border-radius: 5px;
			}

			.cases-img {
			  overflow: hidden;
			  border-radius: 5px;
			  box-shadow: 5px 10px 18px #888888;
			}

			.cases-img img {
				width: 100%;
				transform: scale(1.05);
				-webkit-transition: 0.4s;
				-moz-transition: 0.4s;
				-o-transition: 0.4s;
				transition: 0.4s;
			}

			.cases-img1 {
			  overflow: hidden;
			  border-radius: 5px;
			}

			.cases-img1 img {
				width: 100%;
				height: 10%;
				transform: scale(1.05);
				-webkit-transition: 0.4s;
				-moz-transition: 0.4s;
				-o-transition: 0.4s;
				transition: 0.4s;
			}

			.cases-img:hover img {
			  transform: scale(1);
			}

			.card-home{
				background-color:rgba(247, 247, 247, 1);
			}

			.card-entry-1{
				box-shadow: 5px 10px 18px #888888;
				border-radius: 10px;
				margin-bottom: 10px;
			}

			.login-modal {
				box-shadow: 5px 10px 18px #888888;
				background-color:rgba(247, 247, 247, 1);
			}

			.shadow {
		        box-shadow: 5px 10px 18px #888888 !important;
		    }

		</style>
	</head>
	<!--end::Head-->

	<!--begin::Body-->
	<?php if($profData['background']): ?>
		<body id="kt_body" style="background-image: url(<?php echo base_url(); ?>assets/media/bg/sea1.jpg);" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<?php else: ?>
		<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
	<?php endif; ?>

		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!--begin::Main-->

		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile">
			<!--begin::Logo-->
			<a href="<?php echo base_url() ?>../user/">
				<!-- <img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-letter-1.png" class="logo-default max-h-30px" /> -->
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<button class="btn btn-icon btn-hover-transparent-white p-0 ml-3" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:<?php echo base_url(); ?>assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
							</g>
						</svg>
						<!--end::Svg Icon-->
					</span>
				</button>
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->


		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container d-flex align-items-stretch justify-content-between">

							<!--begin::Left-->
							<div class="d-flex align-items-stretch mr-3">
								<!--begin::Header Logo-->
								<div class="header-logo">
									<a href="/metronic/demo2/index.html">
										<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo.png" class="logo-default max-h-40px" />
										<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo.png" class="logo-sticky max-h-40px" />
									</a>
								</div>
								<!--end::Header Logo-->
								<!--begin::Header Menu Wrapper-->
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<!--begin::Header Menu-->
									<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
										<!--begin::Header Nav-->
										<ul class="menu-nav">
											<li class="menu-item">
												<a href="<?php echo base_url(); ?>professional/home/" class="menu-link">
													<span class="menu-text">
														<i class="flaticon-buildings"></i> &nbsp;
														Home
													</span>
												</a>
											</li>
											<li class="menu-item">
												<a href="<?php echo base_url(); ?>professional/calendar" class="menu-link">
													<span class="menu-text">
														<i class="flaticon-event-calendar-symbol"></i> &nbsp;
														Calendar
													</span>
												</a>
											</li>
											<li class="menu-item">
												<a href="<?php echo base_url(); ?>professional/bookings" class="menu-link">
													<span class="menu-text">
														<i class="fas fa-address-book"></i> &nbsp;
														Bookings
													</span>
												</a>
											</li>
										</ul>
										<!--end::Header Nav-->
									</div>
									<!--end::Header Menu-->
								</div>
								<!--end::Header Menu Wrapper-->
							</div>
							<!--end::Left-->

							<!--begin::Topbar-->
							<div class="topbar">

								<!--begin::My Notification-->
								<div class="dropdown">

									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-success">
											<span class="svg-icon svg-icon-xl">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
														<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
													</g>
												</svg>
											</span>
											<span class="pulse-ring"></span>
										</div>
									</div>
									<!--end::Toggle-->

									<!-- <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1 pulse pulse-primary">
										<span class="svg-icon svg-icon-xl">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"></path>
													<path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"></path>
												</g>
											</svg>
										</span>
										<span class="pulse-ring"></span>
									</div> -->

									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
										<form>
											<!--begin::Header-->
											<div class="d-flex align-items-center py-5 px-8 bgi-size-cover bgi-no-repeat rounded-top">
												<span class="btn btn-md btn-icon bg-white-o-15 mr-4">
													<i class="flaticon-alert text-success"></i>
												</span>
												<h4 class="text-dark m-0 flex-grow-1 mr-3">Notification</h4>
												<!-- <button type="button" class="btn btn-success btn-sm">2 Items</button> -->
											</div>
											<!--end::Header-->
											<!--begin::Scroll-->
											<div class="scroll scroll-push" data-scroll="true" data-height="250" data-mobile-height="200">
												<!--begin::Item-->
												<div class="d-flex align-items-center justify-content-between p-8">
													<div class="d-flex flex-column mr-2">
														<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">iBlender</a>
														<span class="text-muted">Best kichen gadget in 2020</span>
														<div class="d-flex align-items-center mt-2">
															<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
															<span class="text-muted mr-1">for</span>
															<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
															<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
																<i class="ki ki-minus icon-xs"></i>
															</a>
															<a href="#" class="btn btn-xs btn-light-success btn-icon">
																<i class="ki ki-plus icon-xs"></i>
															</a>
														</div>
													</div>
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-solid"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex align-items-center justify-content-between p-8">
													<div class="d-flex flex-column mr-2">
														<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">SmartCleaner</a>
														<span class="text-muted">Smart tool for cooking</span>
														<div class="d-flex align-items-center mt-2">
															<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
															<span class="text-muted mr-1">for</span>
															<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
															<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
																<i class="ki ki-minus icon-xs"></i>
															</a>
															<a href="#" class="btn btn-xs btn-light-success btn-icon">
																<i class="ki ki-plus icon-xs"></i>
															</a>
														</div>
													</div>
												</div>
												<!--end::Item-->
												<!--begin::Separator-->
												<div class="separator separator-solid"></div>
												<!--end::Separator-->
												<!--begin::Item-->
												<div class="d-flex align-items-center justify-content-between p-8">
													<div class="d-flex flex-column mr-2">
														<a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">CameraMax</a>
														<span class="text-muted">Professional camera for edge cutting shots</span>
														<div class="d-flex align-items-center mt-2">
															<span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
															<span class="text-muted mr-1">for</span>
															<span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
															<a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
																<i class="ki ki-minus icon-xs"></i>
															</a>
															<a href="#" class="btn btn-xs btn-light-success btn-icon">
																<i class="ki ki-plus icon-xs"></i>
															</a>
														</div>
													</div>
													<!-- <a href="#" class="symbol symbol-70 flex-shrink-0">
														<img src="/metronic/theme/html/demo2/dist/assets/media/stock-600x400/img-3.jpg" title="" alt="" />
													</a> -->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Scroll-->
										</form>
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::My Notification-->

								<!--begin::User-->
								<div class="dropdown">

									<!--begin::User-->
									<div class="dropdown">
										<!--begin::Toggle-->
										<div class="topbar-item">
											<div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto" id="kt_quick_user_toggle">
												<span class="text-white opacity-70 font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
												<span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">
													<!-- <?php echo $profData['name']; ?> -->
													Atty. Randy
												</span>
												<span class="symbol symbol-35">
													<span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30">
														R
													</span>
												</span>
											</div>
										</div>
										<!--end::Toggle-->
									</div>
									<!--end::User-->

								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->

						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->


<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js?v=7.1.1"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.1.1"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js?v=7.1.1"></script>
<!--end::Global Theme Bundle-->
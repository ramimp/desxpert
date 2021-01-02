<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<script> 
			var base_url = '<?php echo base_url();?>';
		</script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta charset="utf-8" />
		<title><?php echo $userData['title']; ?></title>
		<meta name="description" content="Home panel" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--<link rel="canonical" href="https://keenthemes.com/metronic" />-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="<?php echo base_url() ?>assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url(); ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />

		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url(); ?>assets/css/style.bundle.css?v=7.1.1" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
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
	<?php if($userData['background']): ?>
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
												<a href="<?php echo base_url(); ?>home/" class="menu-link">
													<span class="menu-text">
														<i class="flaticon-buildings"></i> &nbsp;
														Home
													</span>
												</a>
											</li>
											<li class="menu-item">
												<a href="<?php echo base_url() ?>home/search" class="menu-link" target="_blank">
													<span class="menu-text">
														<i class="flaticon-layers"></i> &nbsp;
														Find a Professional
													</span>
												</a>
											</li>
											<li class="menu-item">
												<a href="<?php echo base_url(); ?>desxpert/about" class="menu-link">
													<span class="menu-text">
														<i class="flaticon-info"></i> &nbsp;
														About us
													</span>
												</a>
											</li>
											<li class="menu-item">
												<a href="<?php echo base_url(); ?>desxpert/contact" class="menu-link">
													<span class="menu-text">
														<i class="flaticon2-email"></i> &nbsp;
														Contact us
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

								<!--begin::User-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item">
										<a id="sign_in" type="button" class="btn btn-icon d-flex align-items-center btn-lg px-md-5 w-md-auto" data-toggle="modal" data-target="#login-modal">
											<span class="font-weight-bold text-white">
												Sign in
												<i class="flaticon-lock text-white"></i>
											</span>
										</a>
									</div>
									<!--end::Toggle-->
								</div>
								<!--end::User-->
							</div>
							<!--end::Topbar-->

						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
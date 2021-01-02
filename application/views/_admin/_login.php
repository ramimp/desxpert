<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <script> 
			var base_url = '<?php echo base_url();?>';
		</script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta charset="utf-8" />
		<title>Desxpert | Login</title>
		<meta name="description" content="Home panel" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--<link rel="canonical" href="https://keenthemes.com/metronic" />-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="<?php echo base_url() ?>assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css"/>

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
    </head>
    <body  id="kt_body" style="background-image: url(<?php echo base_url(); ?>assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">

    	<div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login" style="background-image: url(<?php echo base_url(); ?>assets/media/bg/gradient.jpg);">
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                    <div class="d-flex flex-column-fluid flex-center">

                        <div class="login-form login-signin">
                            <form class="form" novalidate="novalidate" id="kt_login_signin_form">
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-white font-size-h4 font-size-h1-lg">
                                        Welcome, Admin!
                                    </h3>
                                </div>
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-white">
                                        Email or Phone number
                                    </label>
                                    <div class="input-group input-group-lg">
								     	<div class="input-group-prepend">
								     		<span class="input-group-text">
								     			<i class="fa fa-user" aria-hidden="true"></i>
								     		</span>
								     	</div>
								     	<input class="form-control h-auto border-0 py-7 px-4 font-size-h6" type="text" id="username" name="username" autocomplete="on" placeholder="Email or Phone number"/>
								    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-white pt-5">
                                            Password
                                        </label>
                                    </div>
                                    <div class="input-group input-group-lg">
								     	<div class="input-group-prepend">
								     		<span class="input-group-text">
                                                <a id="btn_lock" type="button">
								     			    <i id="i_lock" class="fa fa-lock" aria-hidden="true"></i>
                                                </a>
								     		</span>
								     	</div>
								     	<input class="form-control h-auto border-0 py-7 px-4 font-size-h6" type="password" id="password" name="password" autocomplete="off" onPaste="return false" onCopy="return false" placeholder="Password" />
								    </div>

                                </div>
                                <a href="javascript:;" class="text-white font-size-h6 font-weight-bolder text-hover-dark pt-5" id="kt_login_forgot">
                                    Forgot Password ?
                                </a>
                                <div id="div_login" class="pb-lg-0 pb-5">
                                    <button type="submit" id="kt_login_signin_submit" class="btn btn-custom1 font-weight-bolder font-size-h6 px-8 py-5 my-3 mr-3">
                                        Sign In
                                    </button>

                                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
                                </div>

                                <div id="div_loader" class="pb-lg-0 pb-5" hidden>
                                    <img src="<?php echo base_url(); ?>assets/loader/loader3.gif">
                                </div>

                            </form>
                        </div>

                        <div class="login-form login-forgot">
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <div class="pb-13 pt-lg-0 pt-5">
                                    <h3 class="font-weight-bolder text-white font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
                                    <p class="text-dark font-weight-bold font-size-h4">Enter your email to reset your password</p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off"/>
                                </div>
                                <div class="form-group d-flex flex-wrap pb-lg-0">
                                    <div id="div_loader_forgot" class="pb-lg-0 pb-5" hidden>
                                        <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                                    </div>
                                    <button type="button" id="kt_login_forgot_submit" class="btn btn-custom1 font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">
                                    	Submit
                                   	</button>
                                    <button type="button" id="kt_login_forgot_cancel" class="btn btn-custom2 font-weight-bolder font-size-h6 px-8 py-4 my-3">
                                    	Cancel
                                    </button>
                                </div>
                                <!--end::Form group-->
                            </form>
                            <!--end::Form-->
                        </div>


                    </div>

                    <!-- <div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
                        <a href="#" class="text-primary font-weight-bolder font-size-h5">Terms</a>
                        <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Plans</a>
                        <a href="#" class="text-primary ml-10 font-weight-bolder font-size-h5">Contact Us</a>
                    </div> -->
                </div>
            </div>
    	</div>

        <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
        <!--begin::Global Config(global config for global JS scripts)-->
        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1400
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <!--end::Global Config-->

        <script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/custom/login/login-prof.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/pages/crud/forms/validation/form-widgets.js"></script>


    </body>
</html>
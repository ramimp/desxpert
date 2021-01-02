<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <script> 
			var base_url = '<?php echo base_url();?>';
		</script>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta charset="utf-8" />
		<title>Desxpert | Verification</title>
		<meta name="description" content="Home panel" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--<link rel="canonical" href="https://keenthemes.com/metronic" />-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
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
        <!-- <style type="text/css">
            .overlay {
              height: 100%;
              width: 0;
              position: fixed;
              z-index: 1;
              top: 40%;
              left:40%;
              background-color: rgba(0,0,0, 0.9);
              transition: 0.5s;
            }
        </style> -->
    </head>
    <body  id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

        <div class=" container" style="margin-top: 50px;">
            <!--begin::Card-->
            <div class="card card-custom gutter-b" style="padding-bottom: 150px;">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon"><i class="icon-2x text-dark-50 flaticon-chat"></i></span>
                        <h3 class="card-label">Verification</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-4">
                            &nbsp;
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <h4 class="text-primary">
                                    We sent a verification code to 
                                    <?php 
                                        $arr_email = explode('@', urldecode($email));
                                        $new_email = '';
                                        $count = (int)(strlen($arr_email[0]) / 2);
                                        for ($i=0; $i < strlen($arr_email[0]); $i++) { 
                                            if ($i > $count)
                                                $new_email .= '*';
                                            else
                                                $new_email .= $arr_email[0][$i];
                                        }
                                        echo $new_email . '@' . $arr_email[1];
                                    ?> 
                                    <i class="icon-2x text-primary flaticon2-paperplane"></i>
                                    
                                </h4>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            &nbsp;
                        </div>

                        <div class="col-lg-4">
                            &nbsp;
                        </div>

                        <div class="col-lg-4">
                            <form class="form" novalidate="novalidate" id="kt_login_verify_form">
                                <div class="form-group">
                                    <label>Verification code:</label>
                                    <input id="code" name="code" type="text" class="form-control"  autocomplete="off" placeholder="Enter verification code">
                                    <input id="email" name="email" type="text" value="<?php echo base64_encode($email); ?>" hidden readonly>
                                    <input id="type" name="type" type="text" value="<?php echo $type; ?>" hidden readonly>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row" style="margin: 0px; padding: 0px;">
                                        <div class="col-lg-7 col-md-7 col-sm-7" style="margin: 0px; padding: 0px;">
                                            <a  type="button" id="resend" class="font-weight-bold text-primary">
                                                <h4>Didn't get the code? Resend.</h4>
                                            </a>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5" style="margin: -15px 0px 0px -15px; padding: 0px;">
                                            <div id="div_loader2" class="pb-lg-0 pb-5" hidden>
                                                <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                                            </div>
                                            <h3 class="text-danger" id="timer" style="margin: 15px 0px 0px 15px;" hidden></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="div_loader" class="pb-lg-0 pb-5" hidden>
                                        <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                                    </div>
                                    <button id="btn_submit" type="button" class="btn btn-primary mr-2">Submit</button>
                                    <a href="<?php echo base_url(); ?>" class="btn btn-default mr-2">Go to Login</a>

                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Card-->
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
        <script src="<?php echo base_url(); ?>assets/js/pages/custom/login/verify.js"></script>

    </body>
</html>
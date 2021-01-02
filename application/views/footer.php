					<!--begin::Modal-->
					<div class="modal" id="login-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
					    <div class="modal-dialog" role="document">
					        <div class="modal-content login-modal">
					            <div class="modal-header text-center">
						            <h5 class="modal-title text-center">Login</h5>
						            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                    	<i aria-hidden="true" class="ki ki-close"></i>
					                </button>
					            </div>

					            <div class="modal-body">
					                <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">

						                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
						                    <div class="d-flex flex-column-fluid flex-center">

						                        <div class="login-form login-signin">
						                            <form class="form" novalidate="novalidate" id="kt_login_signin_form">
						                                <div class="pb-2 pt-lg-0 pt-2">
						                                    <span class="text-muted font-weight-bold">New Here? <a href="javascript:;" id="kt_login_signup" class="text-success text-hover-dark">Create an Account</a></span>
						                                </div>
														<input type="hidden" id="prof_id" name="prof_id" readonly>
						                                <div class="form-group">
						                                    <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="text" id="username" name="username" autocomplete="on" placeholder="Email or Phone number" />
						                                </div>
						                                <div class="form-group">
						                                    <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="password" id="password" name="password" autocomplete="off" onPaste="return false" onCopy="return false" placeholder="Password" />
						                                </div>
						                                <!-- <a href="javascript:;" class="text-dark font-weight-bolder text-hover-dark pt-5" id="kt_login_forgot">
						                                    Forgot Password ?
						                                </a> -->
						                                <div id="div_login" class="pb-lg-0 pb-5">
						                                    <button type="submit" id="kt_login_signin_submit" class="btn btn-custom2 font-weight-bolder py-7" style="width: 100%">
						                                        SIGN IN
						                                    </button>

						                                    <hr> 

						                                    <!-- GOOGLE -->
						                                    <a href="<?php echo $loginURL; ?>" class="btn btn-custom2 font-weight-bolder px-8 py-7 my-3 text-uppercase" style="width: 100%">
						                                        <span class="svg-icon svg-icon-md">
						                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
						                                                <path d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z" fill="#4285F4"/>
						                                                <path d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z" fill="#34A853"/>
						                                                <path d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z" fill="#FBBC05"/>
						                                                <path d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z" fill="#EB4335"/>
						                                            </svg>
						                                        </span>
						                                        Sign in with google
						                                    </a>

						                                    <!-- FACEBOOK -->
						                                    <a href="<?php echo $authURL; ?>" class="btn btn-custom2 font-weight-bolder px-8 py-7 my-3 text-uppercase" style="width: 100%">
						                                        <span class="svg-icon svg-icon-md">
						                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
						                                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" fill="#4285F4"/>
						                                            </svg>
						                                        </span>
						                                        Sign in with facebook
						                                    </a>

						                                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
						                                </div>

						                                <div id="div_loader" class="pb-lg-0 pb-5 text-center" hidden>
						                                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
						                                </div>

						                            </form>
						                        </div>

						                        <div class="login-form login-signup">

						                            <div class="form-group">
						                                <label class="font-size-h6 font-weight-bolder text-dark">
						                                    Sign up by
						                                </label>

						                                <select class="form-control kt-bootstrap-select" id="kt_bootstrap_select" name="select" tabindex="null">
						                                    <option value="individual" selected>Individual</option>
						                                    <option value="company">Company</option>
						                                </select>
						                            </div>

						                            <!-- Individual -->
						                            <form class="form" novalidate="novalidate" id="kt_login_signup_form">
						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="text" placeholder="First name" name="first_name" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="text" placeholder="Last name" name="last_name" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="text" placeholder="Email" id="email" name="email" autocomplete="off"/>
						                                        <span id="email_msg" style="color:red" hidden>
						                                            This email address is not available
						                                        </span>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="text" placeholder="Mobile number" id="phone" name="phone" autocomplete="off"/>
						                                        <span id="phone_msg" style="color:red" hidden>This mobile number is not available</span>
						                                    <p class="text-muted font-weight-bold font-size-h4">e.g. (0917*******)</p>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="password" placeholder="Password" id="password" name="password" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 bg-white" type="password" placeholder="Confirm Password" name="cpassword" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group">
						                                    <label class="checkbox mb-0">
						                                        <input type="checkbox" name="agree"/>I Agree the &nbsp; <a href="#"> terms and conditions</a>. &nbsp;
						                                        <span></span> 
						                                    </label>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
						                                    <div id="div_loader_signup" class="pb-lg-0 pb-5" hidden>
						                                        <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
						                                    </div>
						                                    <button type="submit" id="kt_login_signup_submit" class="btn btn-custom2 font-weight-bolder py-7 font-size-h6 px-8 my-3 mr-4">Submit</button>
						                                    <button type="button" id="kt_login_signup_cancel" class="btn btn-custom1 font-weight-bolder font-size-h6 px-8 py-4 my-3 text-dark">Cancel</button>
						                                </div>
						                                <!--end::Form group-->
						                            </form>
						                            <!-- Individual -->

						                            <!-- Company -->
						                            <form class="form" novalidate="novalidate" id="kt_login_signup_form_company">

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Company name" name="company_name" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        &nbsp;
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Representative name" name="representative" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        &nbsp;
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Mobile number" id="phone_company" name="phone_company" autocomplete="off"/>
						                                        <p class="text-muted font-weight-bold font-size-h4">e.g. (0917*******)</p>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->  

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" id="email_company" name="email_company" autocomplete="off"/>
						                                        <span id="email_msg_company" style="color:red" hidden>
						                                            This email address is not available
						                                        </span>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" id="password_company" name="password_company" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group row fv-plugins-icon-container">
						                                    <label class="col-form-label col-lg-1 col-sm-1 text-danger">
						                                        *
						                                    </label>
						                                    <div class="col-lg-11 col-sm-11">
						                                        <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm Password" name="cpassword_company" autocomplete="off"/>
						                                    </div>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group">
						                                    <label class="checkbox mb-0">
						                                        <input type="checkbox" name="agree"/>I Agree the &nbsp; <a href="#"> terms and conditions</a>. &nbsp;
						                                        <span></span> 
						                                    </label>
						                                </div>
						                                <!--end::Form group-->

						                                <!--begin::Form group-->
						                                <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
						                                    <div id="div_loader_company" class="pb-lg-0 pb-5" hidden>
						                                        <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
						                                    </div>
						                                    <button type="submit" id="kt_login_signup_submit_company" class="btn btn-custom2 font-weight-bolder py-7 px-8 my-3 mr-4">Submit</button>
						                                    <button type="button" id="kt_login_signup_cancel_company" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
						                                </div>
						                                <!--end::Form group-->
						                            </form>
						                            <!-- Company -->

						                        </div>

						                        <div class="login-form login-forgot">
						                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
						                                <div class="pb-13 pt-lg-0 pt-5">
						                                    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Forgotten Password ?</h3>
						                                    <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
						                                </div>
						                                <div class="form-group">
						                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off"/>
						                                </div>
						                                <div class="form-group d-flex flex-wrap pb-lg-0">
						                                    <div id="div_loader_forgot" class="pb-lg-0 pb-5" hidden>
						                                        <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
						                                    </div>
						                                    <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
						                                    <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
						                                </div>
						                                <!--end::Form group-->
						                            </form>
						                            <!--end::Form-->
						                        </div>

						                    </div>

						                </div>
				            		</div>
					            </div>

					        </div>
					    </div>
					</div>
					<!--end::Modal-->

					<!--begin::Footer-->
					<div class="footer bg-white py-10 d-flex flex-lg-column" id="kt_footer"> 
						<!-- style="background-image: url('<?php echo base_url(); ?>assets/media/bg/bg-2.jpg');" -->

						<!--begin::Container-->
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">

							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2"><?php echo date('Y') ?> ©</span>
								<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">DesxPert</a>
							</div>

							<div class="nav nav-dark order-1 order-md-2">
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pr-3 pl-0">About</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link px-3">Team</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0">Contact</a>
							</div>
						</div>
						<!--end::Container-->

					</div>
					<!--end::Footer-->

				</div>

				<!--end::Wrapper-->
			</div>
			<!--end::Page-->

		</div>
		<!--end::Main-->

		<!-- <script>var HOST_URL = "/metronic/theme/html/tools/preview";</script> -->

		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->

		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js?v=7.1.1"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.1.1"></script>
		<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js?v=7.1.1"></script>
		<!--end::Global Theme Bundle-->

		<!--begin::Page Scripts(used by this page)-->
		<script src="<?php echo base_url(); ?>assets/js/pages/widgets.js?v=7.1.1"></script>
		<script src="<?php echo base_url(); ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.1.1"></script>
		<script src="<?php echo base_url(); ?>assets/js/pages/custom/login/login-general.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>
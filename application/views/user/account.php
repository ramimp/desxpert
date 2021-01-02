begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Mobile Toggle-->
				<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
					<span></span>
				</button>
				<!--end::Mobile Toggle-->
				<!--begin::Heading-->
				<div class="d-flex flex-column">
					<!--begin::Title-->
					<h2 class="text-white font-weight-bold my-2 mr-5">My Account</h2>
					<!--end::Title-->
				</div>
				<!--end::Heading-->
			</div>
			<!--end::Info-->
		</div>
	</div>
	<!--end::Subheader-->

	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Account Management-->
			<div class="d-flex flex-row">

				<!--begin::Aside-->
				<div class="flex-row-auto offcanvas-mobile w-300px w-xxl-350px" id="kt_profile_aside">
					<!--begin::Profile Card-->
					<div class="card card-custom card-stretch" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Body-->
						<div class="card-body pt-4">
							<!--begin::Toolbar-->
							<!-- <div class="d-flex justify-content-end">
								<div class="dropdown dropdown-inline">
									<a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="ki ki-bold-more-hor"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
										<ul class="navi navi-hover py-5">
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-drop"></i>
													</span>
													<span class="navi-text">New Group</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-list-3"></i>
													</span>
													<span class="navi-text">Contacts</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-rocket-1"></i>
													</span>
													<span class="navi-text">Groups</span>
													<span class="navi-link-badge">
														<span class="label label-light-primary label-inline font-weight-bold">new</span>
													</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Calls</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-gear"></i>
													</span>
													<span class="navi-text">Settings</span>
												</a>
											</li>
											<li class="navi-separator my-3"></li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-magnifier-tool"></i>
													</span>
													<span class="navi-text">Help</span>
												</a>
											</li>
											<li class="navi-item">
												<a href="#" class="navi-link">
													<span class="navi-icon">
														<i class="flaticon2-bell-2"></i>
													</span>
													<span class="navi-text">Privacy</span>
													<span class="navi-link-badge">
														<span class="label label-light-danger label-rounded font-weight-bold">5</span>
													</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div> -->
							<!--end::Toolbar-->
							<!--begin::User-->
							<div class="d-flex align-items-center">
								<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
									<div class="symbol-label profile_picture" style="background-image:url('<?php echo $userData['picture']; ?>')"></div>
									<i class="symbol-badge bg-success"></i>
								</div>
								<div>
									<div class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
										<span class="span_fullname">
											<?php echo $userData['fname'].' '.$userData['lname']; ?>
										</span>
									</div>
									<!-- <div class="text-muted">Application Developer</div> -->
								</div>
							</div>
							<!--end::User-->
							<!--begin::Contact-->
							<div class="py-9">
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="font-weight-bold mr-2">Email:</span>
									<span id="span_email" class="text-muted text-hover-primary">
										<?php echo $userData['email']; ?>
									</span>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-2">
									<span class="font-weight-bold mr-2">Phone:</span>
									<span id="span_phone" class="text-muted">
										<?php echo $userData['phone']; ?>
									</span>
								</div>
								<!-- <div class="d-flex align-items-center justify-content-between">
									<span class="font-weight-bold mr-2">Location:</span>
									<span class="text-muted">Melbourne</span>
								</div> -->
							</div>
							<!--end::Contact-->

							<!--begin::Nav-->
							<div class="navi navi-bold navi-hover navi-active navi-link-rounded">

								<div class="navi-item mb-2">
									<a id="btn_personal_info" type="button" class="navi-link py-4 active">
										<span class="navi-icon mr-2">
											<span class="svg-icon">
												<!--begin::Svg Icon | path:<?php echo base_url();?>assets/media/svg/icons/General/User.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24" />
														<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</span>
										<span class="navi-text font-size-lg">Personal Information</span>
									</a>
								</div>

								<div class="navi-item mb-2">
									<a id="btn_change_pass"  type="button" class="navi-link py-4">
										<span class="navi-icon mr-2">
											<span class="svg-icon">
												<!--begin::Svg Icon | path:<?php echo base_url();?>assets/media/svg/icons/Communication/Shield-user.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
														<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
														<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</span>
										<span class="navi-text font-size-lg">Change Password</span>
										<!-- <span class="navi-label">
											<span class="label label-light-danger label-rounded font-weight-bold">5</span>
										</span> -->
									</a>
								</div>

							</div>
							<!--end::Nav-->

						</div>
						<!--end::Body-->
					</div>
					<!--end::Profile Card-->
				</div>
				<!--end::Aside-->

				<!--begin::Personal Info-->
				<div id="div_personal_info" class="flex-row-fluid ml-lg-8">
					<!--begin::Card-->
					<div class="card card-custom card-stretch" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Header-->
						<div class="card-header py-3">
							<div class="card-title align-items-start flex-column">
								<h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
								<span class="text-muted font-weight-bold font-size-sm mt-1">Update your personal informaiton</span>
							</div>
							<div class="card-toolbar">
								<div id="div_loader_personal" hidden>
                                    <img width="50" height="50" src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                                </div>
								<button id="btn_save_profile" type="button" class="btn btn-success mr-2">Save Changes</button>
								<button id="btn_cancel_profile" type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Form-->
						<form enctype="multipart/form-data" class="form" id="kt_form_personal">
							<!--begin::Body-->
							<div class="card-body">
								<div class="row">
									<label class="col-xl-3"></label>
									<div class="col-lg-9 col-xl-6">
										<h5 class="font-weight-bold mb-6">Personal Info</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
									<div class="col-lg-9 col-xl-6">
										<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url(<?php echo $userData['picture']; ?>">
											<div class="image-input-wrapper profile_picture" style="background-image: url(<?php echo $userData['picture']; ?>)"></div>
											<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
												<i class="fa fa-pen icon-sm text-muted"></i>
												<input type="file"   name="profile_avatar" accept=".png, .jpg, .jpeg" />
												<input type="hidden" name="profile_avatar_remove" />
											</label>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
											<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
												<i class="ki ki-bold-close icon-xs text-muted"></i>
											</span>
										</div>
										<span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
									<div class="col-lg-9 col-xl-6">
										<input id="fname" name="fname" class="form-control form-control-lg form-control-solid span_fname" type="text" 
										placeholder="<?php echo $userData['fname']; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
									<div class="col-lg-9 col-xl-6">
										<input id="lname" name="lname" class="form-control form-control-lg form-control-solid span_lname" type="text" 
										placeholder="<?php echo $userData['lname']; ?>"/>
									</div>
								</div>
								<div class="row">
									<label class="col-xl-3"></label>
									<div class="col-lg-9 col-xl-6">
										<h5 class="font-weight-bold mt-10 mb-6">Contact Info</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg input-group-solid">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-phone"></i>
												</span>
											</div>
											<input name="phone" type="text" class="form-control form-control-lg form-control-solid" 
											placeholder="<?php echo $userData['phone']; ?>"/>
										</div>
										<!-- <span class="form-text text-muted">
											We'll never share your email with anyone else.
										</span> -->
									</div>
								</div>
								<!-- <div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
									<div class="col-lg-9 col-xl-6">
										<div class="input-group input-group-lg input-group-solid">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="la la-at"></i>
												</span>
											</div>
											<input type="text" class="form-control form-control-lg form-control-solid" 
											placeholder="<?php echo $userData['email']; ?>" />
										</div>
									</div>
								</div> -->
							</div>
							<!--end::Body-->
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Personal Info-->

				<!--begin::Change Pass-->
				<div id="div_change_pass" class="flex-row-fluid ml-lg-8" hidden>
					<!--begin::Card-->
					<div class="card card-custom card-stretch" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Header-->
						<div class="card-header py-3">
							<div class="card-title align-items-start flex-column">
								<h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
								<span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
							</div>
							<div class="card-toolbar">
								<div id="div_loader_change_pass" hidden>
                                    <img width="50" height="50" src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                                </div>
								<button id="btn_save_change_pass" type="reset" class="btn btn-success mr-2">Save Changes</button>
								<button id="cancel_save_change_pass" type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Form-->
						<form class="form" id="kt_form_change_pass">
							<div class="card-body">

								<!--begin::Alert-->
								<div id="err_msg" class="alert alert-custom alert-light-danger fade show mb-10 display-hide" role="alert" hidden>
									<div class="alert-icon">
										<span class="svg-icon svg-icon-3x svg-icon-danger">
											<!--begin::Svg Icon | path:<?php echo base_url(); ?>assets/media/svg/icons/Code/Info-circle.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
													<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
													<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</div>
									<div class="alert-text font-weight-bold">
										Old password is incorrect.
									</div>
									<div class="alert-close">
										<button id="close_err_msg" type="button" class="close"> <!-- data-dismiss="alert" aria-label="Close" -->
											<span aria-hidden="true">
												<i class="ki ki-close"></i>
											</span>
										</button>
									</div>
								</div>
								<!--end::Alert-->

								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-alert">Current Password</label>
									<div class="col-lg-9 col-xl-6">
										<input type="password" name="old_password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Current password" />
										<!-- <a href="#" class="text-sm font-weight-bold">Forgot password ?</a> -->
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
									<div class="col-lg-9 col-xl-6">
										<input type="password" name="new_password" class="form-control form-control-lg form-control-solid" value="" placeholder="New password" />
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-alert">Confirm Password</label>
									<div class="col-lg-9 col-xl-6">
										<input type="password" name="c_new_password" class="form-control form-control-lg form-control-solid" value="" placeholder="Confirm password" />
									</div>
								</div>
							</div>
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Change Pass-->

			</div>
			<!--end::Account Management-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/js/my_account.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/custom/profile/profile.js?v=7.1.2"></script>
<!-- <script src="/metronic/theme/html/demo2/dist/assets/js/pages/widgets.js?v=7.1.2"></script> 
<!--begin::Content-->
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
			</div>
			<!--end::Info-->
		</div>
	</div>
	<!--end::Subheader-->
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Profile Personal Information-->
			<div class="d-flex flex-row">
				<!--begin::Aside-->
				<div class="flex-row-auto offcanvas-mobile w-300px w-xxl-350px" id="kt_profile_aside">
					<!--begin::Profile Card-->
					<div class="card card-custom card-stretch">
						<!--begin::Body-->
						<div class="card-body pt-4">
							<!--begin::User-->
							<br>
							<div class="d-flex align-items-center">
								<div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
									<div class="symbol-label" style="background-image:url('<?php echo base_url();?>assets/media/professionals/<?php echo $prof[0]->picture ?>')"></div>
									<i class="symbol-badge bg-success"></i>
								</div>
								<div>
									<div class="mt-2 font-weight-bolder text-success">
										<!-- <a href="#" class="btn btn-sm btn-success font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1"> -->
										<i class="flaticon2-correct text-success"></i> Verified
									</div>
									<span class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
										Atty. <?php echo $prof[0]->fname. ' '.$prof[0]->lname; ?>
									</span>
									<div class="text-muted"><?php echo $prof[0]->experience; ?> of experience</div>
								</div>
							</div>
							<!--end::User-->
							<!--begin::Contact-->
							<div class="py-11">
								<!-- <div class="d-flex align-items-center justify-content-between mb-5">
									<span class="font-weight-bold mr-2">Email:</span>
									<a href="#" class="text-muted text-hover-primary">matt@fifestudios.com</a>
								</div>
								<div class="d-flex align-items-center justify-content-between mb-5">
									<span class="font-weight-bold mr-2">Phone:</span>
									<span class="text-muted">44(76)34254578</span>
								</div> -->
								<div class="d-flex align-items-center between mb-5"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<i class="fa fa-map"></i>
										Location:
									</span>
									<span class="text-muted">San pedro, Laguna</span>
								</div>

								<div class="d-flex align-items-center mb-3"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<i class="fa fa-clock"></i>
										Availability:
									</span>
								</div>

								<div class="d-flex align-items-center mb-3"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<span class="text-muted">MON</span> <br> 8:00 AM - 12:00 PM
									</span>
								</div>
								<div class="d-flex align-items-center mb-3"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<span class="text-muted">TUE</span> <br> 8:00 AM - 12:00 PM
									</span>
								</div>

								<div class="d-flex align-items-center mb-3"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<span class="text-muted">WED</span> <br> 8:00 AM - 12:00 PM
									</span>
								</div>
								<div class="d-flex align-items-center mb-3"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<span class="text-muted">THUR</span> <br> 8:00 AM - 12:00 PM
									</span>
								</div>

								<div class="d-flex align-items-center mb-5"> <!-- justify-content-between -->
									<span class="font-weight-bold mr-2">
										<span class="text-muted">FRI</span> <br> 8:00 AM - 12:00 PM
									</span>
								</div>

								<div class="d-flex align-items-center"> <!-- justify-content-between -->
									<button type="button" class="btn btn-success mr-2 font-weight-bolder text-uppercase">
										Book
									</button>
									<button type="button" class="btn btn-default mr-2 font-weight-bolder text-uppercase">
										More Schedule
									</button>
								</div>

							</div>
							<!--end::Contact-->
							<!--begin::Nav-->
							<div class="navi navi-bold navi-hover navi-active navi-link-rounded">

								

							</div>
							<!--end::Nav-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Profile Card-->
				</div>
				<!--end::Aside-->
				<!--begin::Content-->
				<div class="flex-row-fluid ml-lg-8">
					<!--begin::Card-->
					<div class="card card-custom card-stretch">
						<!--begin::Header-->
						<div class="card-header py-3">
							<div class="card-title align-items-start flex-column">
								<h3 class="card-label font-weight-bolder text-dark">
									<i class="flaticon2-user icon-lg"></i>
									PROFILE
								</h3>
							</div>
							<div class="card-toolbar">
								<button type="button" class="btn btn-success mr-2 font-weight-bolder text-uppercase">Book Appointment</button>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Form-->
						<form class="form">
							<!--begin::Body-->
							<div class="card-body">
								<div class="row">
									<!-- <label class="col-xl-3"></label> -->
									<div class="col-lg-12 col-xl-6">
										<h5 class="font-weight-bold mb-6">
											<i class="fas fa-graduation-cap icon-lg"></i>
											Educational Background
										</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-muted">MED SCHOOL</label>
									<div class="col-lg-9 col-xl-6">
										<label class="col-form-label">Davao Medical School Foundation, 1990</label>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-muted">RESIDENCY</label>
									<div class="col-lg-9 col-xl-6">
										<label class="col-form-label">Davao Medical School Foundation, 1990</label>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-muted">FELLOWSHIP TRAINING</label>
									<div class="col-lg-9 col-xl-6">
										<label class="col-form-label">Davao Medical School Foundation, 1990</label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-xl-6">
										<h5 class="font-weight-bold mb-6">
											<i class="flaticon-medal icon-lg"></i>
											Certification(s)
										</h5>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-muted">LOCAL BOARD CERTIFICATION</label>
									<div class="col-lg-9 col-xl-9">
										<label class="col-form-label">Fellow, Philippine College of Cardiology</label>
									</div>
									<label class="col-xl-3 col-lg-3 col-form-label"></label>
									<div class="col-lg-9 col-xl-6">
										<label class="col-form-label">Fellow, Philippine College of Cardiology</label>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-xl-3 col-lg-3 col-form-label text-muted">INTERNATIONAL BOARD CERTIFICATION</label>
									<div class="col-lg-9 col-xl-9">
										<label class="col-form-label">Fellow, American College of Cardiology</label>
									</div>
								</div>
							</div>
							<!--end::Body-->
						</form>
						<!--end::Form-->
					</div>
				</div>
				<!--end::Content-->

			</div>
			<!--end::Profile Personal Information-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo base_url(); ?>assets/js/pages/custom/profile/profile.js?v=7.1.2"></script>
<!--end::Page Scripts-->
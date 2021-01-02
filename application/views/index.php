<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

	<!--begin::Subheader-->
	<div class="subheader py-10 py-lg-15 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<div class="d-flex align-items-center flex-wrap mr-1">
				<div class="d-flex flex-column">
					<h1 class="text-white font-weight-bolder my-10 mr-5">The #1 Practice Management App for Doctors</h1>
					<div class="d-flex align-items-center font-weight-bold my-2">
						<p class="text-white font-weight-bold opacity-95">
							Desxpert is a Practice Management App equipping you with  <br> essential tools to make your daily practice a breeze!
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end::Subheader-->

	<!--begin::Hero-->
	<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="margin-bottom: 100px;">
		<div class="container">
			<div class="d-flex align-items-stretch text-center flex-column py-0">
				
				<form class="d-flex position-relative w-75 px-lg-40 m-auto">
					<div class="row">
						<div class="col-lg-12 col-xl-12">
							<select class="form-control font-size-h6 shadow">
								<option> I am looking for a lawyer now </option>
								<option disabled> I am looking for a doctor now </option>
								<option disabled> I am looking for a engineer now </option>
							</select>
						</div>

						<div class=" col-lg-12 col-xl-12 ">&nbsp;</div>
						
						<div class="col-lg-12 col-xl-12">
							<div class="row">
								<div class="col-lg-8 col-xl-8">
									<textarea name="short_desc" class="form-control font-size-h6 shadow" id="kt_maxlength_5" maxlength="150" placeholder="Short description" rows="3"></textarea>
								</div>
								<div class="col-lg-4 col-xl-4">
									<button id="btn_book_now" type="button" class="btn btn-success px-10 font-size-h6 text-uppercase shadow" style="height: 100%;">
										Book now
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--end::Hero-->


	<!--begin::Book Now-->
	<div class="d-flex flex-column-fluid">
		<div id="div_book_now"  class="container-fluid" style="margin: 0px; padding: 0px;" hidden>
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12" style="padding: 10px;">
				<div class="container">

					<!--begin::Div Loading-->
					<div id="div_loading">
						<div class="text-center">
							<h3 class="text-muted font-weight-bold my-7 mr-5">
								Desxpert is finding an available lawyer. <br> This might take a few minutes. Please wait.
							</h3>
							<img src="<?php echo base_url(); ?>assets/loader/loader1.gif">
						</div>
                    </div>
                    <!--end::Div Loading-->

                    <!--begin::Div Result-->
					<div id="div_result" class="row" hidden>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<h3 class="text-muted font-weight-bold my-10 mr-5 text-uppercase">
								Available professionals
							</h3>
						</div>

						<!--begin::Col-->
						<?php foreach ($professionals as $prof) : ?>
							<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<!--begin::Card-->
								<div class="card card-custom gutter-b card-stretch card-home shadow">
									<!--begin::Body-->
									<div class="card-body pt-4">
										<!--begin::User-->
										<div class="d-flex align-items-end mb-7">
											<!--begin::Pic-->
											<div class="d-flex align-items-center">
												<!--begin::Pic-->
												<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
													<div class="symbol symbol-circle symbol-lg-75">
														<img src="<?php echo base_url() ?>assets/media/professionals/<?php echo $prof->picture; ?>">
													</div>
													<div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
														<span class="font-size-h3 font-weight-boldest">
															<?php echo $prof->fname[0]; ?>
															<?php echo $prof->lname[0]; ?>
														</span>
													</div>
												</div>
												<!--end::Pic-->
												<!--begin::Title-->
												<div class="d-flex flex-column">
													<a href="<?php echo base_url() ?>user/profile" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">
														<?php
															if($prof->prof_type == 'Lawyer')
																$suf = 'Atty.';
															else if($prof->prof_type == 'Doctor') 
																$suf = 'Dr.';
															else
																$suf = 'Engr.';
															echo $suf.' '.$prof->fname.' '.$prof->lname; 
														?>
													</a>
													<span class="text-muted font-weight-bold">
														<?php echo $prof->prof_type; ?>
													</span>
												</div>
												<!--end::Title-->
											</div>
											<!--end::Title-->
										</div>
										<!--end::User-->
										<!--begin::Info-->
										<div class="mb-7">
											<div class="d-flex justify-content-between align-items-center">
												<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
												<span class="text-muted font-weight-bold">
													<?php echo $prof->city; ?>
												</span>
											</div>
											<div class="d-flex justify-content-between align-items-center">
												<span class="text-dark-75 font-weight-bolder mr-2">Experience:</span>
												<span class="text-muted font-weight-bold">
													<?php echo $prof->experience; ?>
												</span>
											</div>
										</div>
										<!--end::Info-->
										<a href="<?php echo base_url() ?>checkout/prof/<?php echo $prof->professional_id; ?>" class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4 book_appointment" data-toggle="modal" data-target="#login-modal">
											Checkout
										</a>
									</div>
									<!--end::Body-->
								</div>
								<!--end::Card-->
							</div>
						<?php endforeach; ?>
						<!--end::Col-->
					</div>
					<!--end::Div Result-->
					<hr>

				</div>
			</div>
			<!--end::Card-->

		</div>
	</div>
	<!--end::Book Now-->


	<!--begin::Professionals-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12" style="padding: 10px;">
				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1 class="text-muted font-weight-bold my-10 mr-5 text-uppercase text-center">Professionals</h1>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
			                <div class="card card-entry-1">
			                	<div class="cases-img1">
									<img src="<?php echo base_url() ?>assets/media/home/lawyer.jpg">
								</div>
							  	<div class="card-body">
								    <h5 class="text-muted font-weight-bolder card-title text-uppercase">
								    	Lawyers
								    </h5>
								    <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
							  	</div>
							</div>
	           			</div>

			            <div class="col-lg-4 col-md-4 col-sm-12">
			                <div class="card card-entry-1">
			                	<div class="cases-img1">
									<img src="<?php echo base_url() ?>assets/media/home/doctor.jpg">
								</div>
							  	<div class="card-body">
							  		<h5 class="text-muted font-weight-bolder card-title text-uppercase">
								    	Doctors
								    </h5>
								    <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
							  	</div>
							</div>
			            </div>

			            <div class="col-lg-4 col-md-4 col-sm-12">
			                <div class="card card-entry-1">
			                	<div class="cases-img1">
									<img src="<?php echo base_url() ?>assets/media/home/engr.jpg">
								</div>
							  	<div class="card-body">
								    <h5 class="text-muted font-weight-bolder card-title text-uppercase">
								    	Engineers
								    </h5>
								    <p class="card-text">Quick sample text to create the card title and make up the body of the card's content.</p>
							  	</div>
							</div>
			            </div>

					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::Professionals-->


	<!--begin::How it works-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12 bg-white" style="padding: 20px;">
				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1 class="text-muted font-weight-bold my-10 mr-5 text-uppercase text-center">How it works</h1>
						</div>

						<!--begin::Card-->
						<div class="col-lg-6 col-xl-6">
							<div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0 shadow">
								<div class="card-body">
									<div class="d-flex align-items-center p-5">
										<div class="mr-6">
											<span class="svg-icon svg-icon-warning svg-icon-4x">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"></rect>
														<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"></rect>
														<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"></rect>
														<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
														<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"></rect>
													</g>
												</svg>
											</span>
										</div>
										<div class="d-flex flex-column">
										    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
										    	Get Started
										    </a>
										    <div class="text-dark-75">
										     	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy since the 1500s.
										    </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Card-->

						<!--begin::Card-->
						<div class="col-lg-6 col-xl-6">
							<div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0 shadow">
								<div class="card-body">
									<div class="d-flex align-items-center p-5">
										<div class="mr-6">
											<span class="svg-icon svg-icon-success svg-icon-4x">
												<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Shopping/Settings.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect opacity="0.200000003" x="0" y="0" width="24" height="24"></rect>
														<path d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z" fill="#000000" opacity="0.3"></path>
														<path d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z" fill="#000000"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column">
											<a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Tutorials</a>
											<div class="text-dark-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy since the 1500s.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Card-->
					</div>

					<br>

					<div class="row">
						<!--begin::Card-->
						<div class="col-lg-6 col-xl-6">
							<div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0 shadow">
								<div class="card-body">
									<div class="d-flex align-items-center p-5">
										<div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-4x">
												<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Weather/Cloud2.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"></polygon>
														<circle fill="#000000" opacity="0.3" cx="16" cy="10" r="5"></circle>
														<path d="M5.74714567,18.0425758 C4.09410362,16.9740356 3,15.1147886 3,13 C3,9.6862915 5.6862915,7 9,7 C11.7957591,7 14.1449096,8.91215918 14.8109738,11.5 L17.25,11.5 C19.3210678,11.5 21,13.1789322 21,15.25 C21,17.3210678 19.3210678,19 17.25,19 L8.25,19 C7.28817895,19 6.41093178,18.6378962 5.74714567,18.0425758 Z" fill="#000000"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column">
											<a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">User Guide</a>
											<div class="text-dark-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy since the 1500s.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Card-->

						<!--begin::Card-->
						<div class="col-lg-6 col-xl-6">
							<div class="card card-custom wave wave-animate-slow wave-danger mb-8 mb-lg-0 shadow">
								<div class="card-body">
									<div class="d-flex align-items-center p-5">
										<div class="mr-6">
											<span class="svg-icon svg-icon-primary svg-icon-4x">
												<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Weather/Cloud2.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"></polygon>
														<circle fill="#000000" opacity="0.3" cx="16" cy="10" r="5"></circle>
														<path d="M5.74714567,18.0425758 C4.09410362,16.9740356 3,15.1147886 3,13 C3,9.6862915 5.6862915,7 9,7 C11.7957591,7 14.1449096,8.91215918 14.8109738,11.5 L17.25,11.5 C19.3210678,11.5 21,13.1789322 21,15.25 C21,17.3210678 19.3210678,19 17.25,19 L8.25,19 C7.28817895,19 6.41093178,18.6378962 5.74714567,18.0425758 Z" fill="#000000"></path>
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="d-flex flex-column">
											<a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">User Guide</a>
											<div class="text-dark-75">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy since the 1500s.</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Card-->
					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::How it works-->


	<!--begin::Top professionals-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12" style="padding: 10px;">
				<div class="container">
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12">
							<h1 class="text-muted font-weight-bold my-10 mr-5 text-uppercase">Top Professionals</h1>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12">
							<!--begin::Nav-->
							<ul class="nav nav-secondary nav-pills" id="myTab3" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="lawyer-tab-3" data-toggle="tab" href="#lawyer-3">
										<!-- <span class="nav-icon">
											<i class="flaticon2-layers"></i>
										</span> -->
										<span class="nav-text">Lawyers</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="doctor-tab-3" data-toggle="tab" href="#doctor-3" aria-controls="profile">
										<!-- <span class="nav-icon">
											<i class="flaticon2-heart-rate-monitor"></i>
										</span> -->
										<span class="nav-text">Doctors</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="engr-tab-3" data-toggle="tab" href="#engr-3" aria-controls="contact">
										<!-- <span class="nav-icon">
											<i class="flaticon2-graphic-design"></i>
										</span> -->
										<span class="nav-text">Engineers</span>
									</a>
								</li>
							</ul>
							<!--end::Nav-->
							<hr>
							<!--begin::Nav Content-->
							<div class="tab-content mt-5" id="myTabContent3">

								<!--begin::Lawyer Panel-->
								<div class="tab-pane fade active show" id="lawyer-3" role="tabpanel" aria-labelledby="home-tab-3">
									<br>
									<h4>Lawyers</h4>
									<br>
									<div class="row" style="margin-top: 10px;">

										<!--begin::Col-->
										<?php foreach ($professionals as $prof) : ?>
											<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
												<!--begin::Card-->
												<div class="card card-custom gutter-b card-stretch card-home shadow">
													<!--begin::Body-->
													<div class="card-body pt-4">
														<!--begin::User-->
														<div class="d-flex align-items-end mb-7">
															<!--begin::Pic-->
															<div class="d-flex align-items-center">
																<!--begin::Pic-->
																<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
																	<div class="symbol symbol-circle symbol-lg-75">
																		<img src="<?php echo base_url() ?>assets/media/professionals/<?php echo $prof->picture; ?>">
																	</div>
																	<div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
																		<span class="font-size-h3 font-weight-boldest">
																			<?php echo $prof->fname; ?>
																			<?php echo $prof->lname; ?>
																		</span>
																	</div>
																</div>
																<!--end::Pic-->
																<!--begin::Title-->
																<div class="d-flex flex-column">
																	<a href="<?php echo base_url() ?>home/prof/<?php echo $prof->professional_id; ?>" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">
																		<?php
																			if($prof->prof_type == 'Lawyer')
																				$suf = 'Atty.';
																			else if($prof->prof_type == 'Doctor') 
																				$suf = 'Dr.';
																			else
																				$suf = 'Engr.';
																			echo $suf.' '.$prof->fname.' '.$prof->lname; 
																		?>
																	</a>
																	<span class="text-muted font-weight-bold">
																		<?php echo $prof->prof_type; ?>
																	</span>
																</div>
																<!--end::Title-->
															</div>
															<!--end::Title-->
														</div>
														<!--end::User-->
														<!--begin::Info-->
														<div class="mb-7">
															<div class="d-flex justify-content-between align-items-center">
																<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
																<span class="text-muted font-weight-bold">
																	<?php echo $prof->city; ?>
																</span>
															</div>
															<div class="d-flex justify-content-between align-items-center">
																<span class="text-dark-75 font-weight-bolder mr-2">Experience:</span>
																<span class="text-muted font-weight-bold">
																	<?php echo $prof->experience; ?>
																</span>
															</div>
														</div>
														<!--end::Info-->
														<button id="<?php echo $prof->professional_id; ?>" class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4 book_appointment" data-toggle="modal" data-target="#login-modal">
															Book Appointment
														</button>
													</div>
													<!--end::Body-->
												</div>
												<!--end::Card-->
											</div>
										<?php endforeach; ?>
										<!--end::Col-->

									</div>
								</div>
								<!--end::Lawyer Panel-->


								<!--begin::Doctor Panel-->
								<div class="tab-pane fade" id="doctor-3" role="tabpanel" aria-labelledby="profile-tab-3">
									<center>
										<h3 class="text-muted py-10">Coming Soon</h3>
									</center>
								</div>
								<!--end::Doctor Panel-->


								<!--begin::Engr Panel-->
								<div class="tab-pane fade" id="engr-3" role="tabpanel" aria-labelledby="contact-tab-3">
									<center>
										<h3 class="text-muted py-10">Coming Soon</h3>
									</center>
								</div>
								<!--end::Engr Panel-->
							</div>
							<!--end::Nav Content-->
						</div>
					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::Top professionals-->


	<!--begin::Image 1-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12 bg-white" style="padding: 10px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xl-6">
							<div class="cases-img">
								<img src="<?php echo base_url() ?>assets/media/home/finding.jpg">
							</div>
						</div>
						<div class="col-lg-6 col-xl-6">
							<h1 class="font-weight-bolder my-15 mx-3 mr-2 text-uppercase text-muted">The #1 Practice Management</h1>
							<div class="d-flex align-items-center font-weight-bold">
								<p class="font-weight-bold opacity-95 mx-3">
									Desxpert is a Practice Management App equipping you with  <br> essential tools to make your daily practice a breeze!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::Image 1-->


	<!--begin::Image 2-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12" style="padding: 10px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xl-6">
							<h1 class="font-weight-bolder my-15 mx-3 mr-2 text-uppercase text-muted">The #1 Practice Management</h1>
							<div class="d-flex align-items-center font-weight-bold">
								<p class="font-weight-bold opacity-95 mx-3">
									Desxpert is a Practice Management App equipping you with  <br> essential tools to make your daily practice a breeze!
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-xl-6">
							<div class="cases-img opacity-70">
								<img src="<?php echo base_url() ?>assets/media/home/create.jpg">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::Image 2-->


	<!--begin::Image 3-->
	<div class="d-flex flex-column-fluid">
		<div class="container-fluid" style="margin: 0px; padding: 0px;">
			<!--begin::Card-->
			<div class="col-lg-12 col-xl-12 mb-12 bg-white" style="padding: 10px;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-xl-6">
							<div class="cases-img">
								<img src="<?php echo base_url() ?>assets/media/home/third.jpg">
							</div>
						</div>
						<div class="col-lg-6 col-xl-6">
							<h1 class="font-weight-bolder my-15 mx-3 mr-2 text-uppercase text-muted">The #1 Practice Management</h1>
							<div class="d-flex align-items-center font-weight-bold">
								<p class="font-weight-bold opacity-95 mx-3">
									Desxpert is a Practice Management App equipping you with  <br> essential tools to make your daily practice a breeze!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Card-->
		</div>
	</div>
	<!--end::Image 3-->

</div>
<!--end::Content-->

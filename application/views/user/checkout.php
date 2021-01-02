<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

	<!--begin::Subheader-->
	<div class="subheader py-5 py-lg-5 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<div class="d-flex align-items-center flex-wrap mr-1">
				<div class="d-flex flex-column">
					<h1 class="text-white font-weight-bolder my-5 mr-5">DesxPert | Checkout</h1>
					<!-- <div class="d-flex align-items-center font-weight-bold my-2">
						<p id="btn_desc" class="text-white font-weight-bold opacity-95">
							You can change booking type by clicking the button below
						</p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<!--end::Subheader-->


	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<div class="container" id="div_book_schedule">
			<div class="card card-custom" style="box-shadow: 5px 10px 18px #888888;">
				<div class="card-header">
			  		<div class="card-title">
			   			<h3 class="card-label text-uppercase">
			    			Instant Booking
			   			</h3>
			  		</div>
			 	</div>
				<div class="card-body p-0">

					<!--begin: Wizard 1-->
					<div class="wizard wizard-2" id="kt_wizard_v2" data-wizard-state="step-first" data-wizard-clickable="false">
						<!--begin: Wizard Nav-->
						<div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
							<!--begin::Wizard Step 1 Nav-->
							<div class="wizard-steps">

								<!--begin::Wizard Step 1 Nav-->
								<div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
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
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Set up booking</h3>
											<div class="wizard-desc">Book appointment</div>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 1 Nav-->

								<!--begin::Wizard Step 2 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:<?php echo base_url(); ?>assets/media/svg/icons/Shopping/Credit-card.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
														<rect fill="#000000" x="2" y="8" width="20" height="3" />
														<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Make Payment</h3>
											<div class="wizard-desc">Use Credit or Debit Cards</div>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 2 Nav-->

								<!--begin::Wizard Step 3 Nav-->
								<div class="wizard-step" data-wizard-type="step">
									<div class="wizard-wrapper">
										<div class="wizard-icon">
											<span class="svg-icon svg-icon-2x">
												<!--begin::Svg Icon | path:<?php echo base_url(); ?>assets/media/svg/icons/General/Like.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000" />
														<rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</div>
										<div class="wizard-label">
											<h3 class="wizard-title">Completed!</h3>
											<div class="wizard-desc">Review and Submit</div>
										</div>
									</div>
								</div>
								<!--end::Wizard Step 3 Nav-->

							</div>
						</div>
						<!--end: Wizard Nav-->

						<!--begin: Wizard Body-->
						<div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
							<!--begin: Wizard Form-->
							<div class="row">
								<div class="offset-xxl-2 col-xxl-8">
									<form class="form" id="kt_form">

										<!--begin: Wizard Step 1-->
										<div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
											<h4 class="mb-10 font-weight-bold text-dark">
												Set up your booking infomartion
											</h4>

											<div class="row">
												<div class="col-xl-3">
													<!--begin::Input-->
													<img src="<?php echo base_url() ?>assets/media/professionals/<?php echo $prof[0]->picture; ?>">
													<!--end::Input-->
												</div>
												<div class="col-xl-4">
													<!--begin::Input-->
													<div class="mt-2 font-weight-bolder text-success">
														<i class="flaticon2-correct text-success"></i> Verified
													</div>
													<a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
														Atty. 
														<?php echo $prof[0]->fname.' '.$prof[0]->lname ; ?>
													</a>
													<span id="prof_id" hidden><?php echo $prof[0]->professional_id; ?></span>

													<div class="text-muted">
														<?php echo $prof[0]->experience; ?> of experience
													</div>
													<!--end::Input-->
												</div>
												<div class="col-xl-5">
													<!--begin::Input-->
													<button class="btn btn-custom2">View Schedule</button>
													<!--end::Input-->
												</div>
											</div>
											<br>
											<hr>

											<div class="row">

												<div class="col-xl-12">
													<div class="form-group">
														<label>Short Description</label>
														<textarea name="short_desc" class="form-control" id="kt_maxlength_5" maxlength="500" placeholder="Short description" rows="6" readonly><?php echo $booking[0]->short_desc; ?></textarea>
													</div>
												</div>

											</div>
										</div>
										<!--end: Wizard Step 1-->

										<!--begin: Wizard Step 2-->
										<div class="pb-5" data-wizard-type="step-content">
											<h4 class="mb-10 font-weight-bold text-dark">Choose payment option</h4>

											<!--begin: Payment Options-->
											<div class="row">
												<div class="col-lg-6">
										     		<label class="option">
										      			<span class="option-control">
										       				<span class="radio">
										        			<input type="radio" name="m_option_1" value="Paypal" checked="checked"/>
										        			<span></span>
										       				</span>
										      			</span>
											     			<span class="option-label">
											       				<span class="option-head">
											        				<span class="option-title">
											         					Paypal
											        				</span>
											        				<span class="option-focus"> 
											        					<i class="fab fa-paypal"></i> 
											        				</span>
										       					</span>
														       <span class="option-body">
														        	Payment via paypal
														       </span>
										      				</span>
										     		</label>
										    	</div>

										    	<div class="col-lg-6">
											     	<label class="option">
											      		<span class="option-control">
											       			<span class="radio">
												        		<input type="radio" name="m_option_1" value="Gcash"/>
												        		<span></span>
											       			</span>
											      		</span>
											      		<span class="option-label">
											       			<span class="option-head">
											        			<span class="option-title">
											         				Gcash
											        			</span>
														        <!-- <span class="option-focus"> Free </span> -->
											       			</span>
												       		<span class="option-body">
														        Payment via Gcash
												       		</span>
											      		</span>
											     	</label>
											    </div>

											</div>
											<!--end: Payment Options-->
										</div>
										<!--end: Wizard Step 2-->

										<!--begin: Wizard Step 3-->
										<div class="pb-5" data-wizard-type="step-content">

											<!--begin::Section Professional-->
											<h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
											<h6 class="font-weight-bolder mb-3">Professional:</h6>
											<div class="text-dark-50 line-height-lg">
												<div class="row">
													<div class="col-xl-3">
														<div class="symbol symbol-circle symbol-lg-75">
															<img src="<?php echo base_url() ?>assets/media/professionals/<?php echo $prof[0]->picture;?>">
														</div>
													</div>
													<div class="col-xl-9">
														<div><i class="flaticon2-correct text-success"></i> Verified</div>
														<div> Atty. <?php echo $prof[0]->fname.' '.$prof[0]->lname; ?> </div>
														<div><?php echo $prof[0]->prof_type; ?></div>
														<div><?php echo $prof[0]->experience; ?> of experience</div>
													</div>
												</div>
												
											</div>
											<div class="separator separator-dashed my-5"></div>
											<!--end::Section Professional-->

											<!--begin::Section Booking Sched-->
											<h6 class="font-weight-bolder mb-3">Booking Schedule:</h6>
											<div class="text-dark-50 line-height-lg">
												<div class="row">
													<div class="col-sm-3"> 
														Date: 
													</div>
													<div class="col-sm-9"> 
														<span id="span_date">
															<?php echo date('M d, Y') ?> 
														</span>
														- Today
													</div>
													
													<div class="col-sm-3"> 
														Time:
													</div>
													<div class="col-sm-9"> 
														<span id="span_time">
															ASAP
														</span>
													</div>

													<div class="col-sm-3"> 
														Duration:
													</div>
													<div class="col-sm-9"> 
														60 mins
													</div>
												</div>
											</div>
											<div class="separator separator-dashed my-5"></div>
											<!--end::Section Booking Sched-->

											<!--begin::Section Payment Type-->
											<h6 class="font-weight-bolder mb-3">Type of payment:</h6>
											<div class="text-dark-50 line-height-lg">
												<div> Payment via <span id="span_payment_type"> </span> </div>
											</div>
											<div class="separator separator-dashed my-5"></div>
											<!--end::Section Payment Type-->

											<!--begin::Section Payment Amount-->
											<h6 class="font-weight-bolder mb-3">Total amount of Payment:</h6>
											<div class="text-dark-50 line-height-lg">
												<div> ‎₱ <span id="total_amount"></span> </div>
											</div>
											<!--end::Section Payment Amount-->
										</div>
										<!--end: Wizard Step 3-->


										<!--begin: Wizard Actions-->
										<div class="d-flex justify-content-between border-top mt-5 pt-10">
											<div class="mr-2">
												<button id="btn_prev" type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">
													Previous
												</button>
											</div>
											<div>
												<div id="div_loader_request" hidden>
				                                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
				                                </div>

												<!-- <button id="btn_request" type="submit" class="btn btn-custom2 font-weight-bolder text-uppercase px-9 py-4" >
													Pay
												</button> -->

												<div id="paypal-button" data-wizard-type="action-submit"></div>

												<button id="" type="button" class="btn btn-custom2 font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
											</div>
										</div>
										<!--end: Wizard Actions-->

									</form>
								</div>
								<!--end: Wizard-->
							</div>
							<!--end: Wizard Form-->
						</div>
						<!--end: Wizard Body-->
					</div>
					<!--end: Wizard 1-->

				</div>
			</div>

			<br>
			<hr>
			<h3 class="font-weight-bold text-muted"> You may also like </h3>
			<div class="row">

				<!--begin::Col-->
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<!--begin::Card-->
					<div class="card card-custom gutter-b card-stretch card-home" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Body-->
						<div class="card-body pt-4">
							<!--begin::User-->
							<div class="d-flex align-items-center mb-7">
								<!--begin::Pic-->
								<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
									<div class="symbol symbol-circle symbol-lg-75">
										<img src="<?php echo base_url() ?>assets/media/professionals/100_5.jpg">
									</div>
									<div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
										<span class="font-size-h3 font-weight-boldest">JM</span>
									</div>
								</div>
								<!--end::Pic-->
								<!--begin::Title-->
								<div class="d-flex flex-column">
									<div class="mt-2 font-weight-bolder text-success">
										<i class="flaticon2-correct text-success"></i> Verified
									</div>
									<a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">Atty. Charlie Stone</a>
									<span class="text-muted font-weight-bold">Lawyer</span>
								</div>
								<!--end::Title-->
							</div>
							<!--end::User-->
							<!--begin::Info-->
							<div class="mb-7">
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
									<span class="text-muted font-weight-bold">Barcelona</span>
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">
										Experience:
									</span>
									<span class="text-muted font-weight-bold">
										10yrs
									</span>
								</div>
							</div>
							<!--end::Info-->
							<button class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4 book_appointment" data-toggle="modal" data-target="#login-modal">Book</button>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Col-->

				<!--begin::Col-->
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<!--begin::Card-->
					<div class="card card-custom gutter-b card-stretch card-home" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Body-->
						<div class="card-body pt-4">
							<!--begin::User-->
							<div class="d-flex align-items-center mb-7">
								<!--begin::Pic-->
								<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
									<div class="symbol symbol-circle symbol-lg-75 d-none">
										<img src="<?php echo base_url() ?>assets/media/professionals/100_4.jpg">
									</div>
									<div class="symbol symbol-lg-75 symbol-circle symbol-primary">
										<span class="symbol-label font-size-h3 font-weight-boldest">AK</span>
									</div>
								</div>
								<!--end::Pic-->
								<!--begin::Title-->
								<div class="d-flex flex-column">
									<div class="mt-2 font-weight-bolder text-success">
										<i class="flaticon2-correct text-success"></i> Verified
									</div>
									<a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">Atty. Anna Krox</a>
									<span class="text-muted font-weight-bold">Lawyer</span>
								</div>
								<!--end::Title-->
							</div>
							<!--end::User-->
							<!--begin::Info-->
							<div class="mb-7">
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
									<span class="text-muted font-weight-bold">Moscow</span>
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">
										Experience:
									</span>
									<span class="text-muted font-weight-bold">
										4yrs
									</span>
								</div>
							</div>
							<!--end::Info-->
							<button class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4 book_appointment" data-toggle="modal" data-target="#login-modal">Book</button>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Col-->

				<!--begin::Col-->
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
					<!--begin::Card-->
					<div class="card card-custom gutter-b card-stretch card-home" style="box-shadow: 5px 10px 18px #888888;">
						<!--begin::Body-->
						<div class="card-body pt-4">
							<!--begin::User-->
							<div class="d-flex align-items-center mb-7">
								<!--begin::Pic-->
								<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
									<div class="symbol symbol-circle symbol-lg-75">
										<img src="<?php echo base_url() ?>assets/media/professionals/100_1.jpg">
									</div>
									<div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
										<span class="font-size-h3 font-weight-boldest">JM</span>
									</div>
								</div>
								<!--end::Pic-->
								<!--begin::Title-->
								<div class="d-flex flex-column">
									<div class="mt-2 font-weight-bolder text-success">
										<i class="flaticon2-correct text-success"></i> Verified
									</div>
									<a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">Atty. Jason Muller</a>
									<span class="text-muted font-weight-bold">Lawyer</span>
								</div>
								<!--end::Title-->
							</div>
							<!--end::User-->
							<!--begin::Info-->
							<div class="mb-7">
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
									<span class="text-muted font-weight-bold">Melbourne</span>
								</div>
								<div class="d-flex justify-content-between align-items-center">
									<span class="text-dark-75 font-weight-bolder mr-2">
										Experience:
									</span>
									<span class="text-muted font-weight-bold">
										5yrs
									</span>
								</div>
							</div>
							<!--end::Info-->
							<button class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4 book_appointment" data-toggle="modal" data-target="#login-modal">Book</button>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Col-->
			</div>

		</div>
	</div>
	<!--end::Entry-->

</div>
<!--end::Content-->

<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo base_url(); ?>assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js?v=7.1.2"></script>
<script src="<?php echo base_url(); ?>assets/js/pages/custom/wizard/wizard-2.js?v=7.1.1"></script>
<script src="<?php echo base_url(); ?>assets/js/checkout.js"></script>
<!--end::Page Scripts-->
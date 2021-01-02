<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

	<!--begin::Subheader-->
	<!-- <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<div class="d-flex align-items-center flex-wrap mr-1">
				<div class="d-flex flex-column">
					<h2 class="text-white font-weight-bold my-6 mr-5">My Bookings</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6">
					<select class="form-control font-size-h6">
						<option value="Scheduled Booking">Scheduled Booking</option>
						<option value="Instant Booking">Instant Booking</option>
					</select>
				</div>
				<div class="col-xl-6">
					<select class="form-control font-size-h6">
						<option value="Pending">Pending</option>
						<option value="Accepted">Accepted</option>
						<option value="Declined">Declined</option>
						<option value="All">All</option>
					</select>
				</div>
			</div>
		</div>
	</div> -->

	<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<div class="d-flex align-items-center flex-wrap mr-1">
				<div class="d-flex flex-column">
					<h2 class="text-white font-weight-bold my-2 mr-5">My Bookings</h2>
					<div class="d-flex align-items-center font-weight-bold my-2">
						<a href="#" class="opacity-75 hover-opacity-100">
							<i class="flaticon2-shelter text-white icon-1x"></i>
						</a>
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="<?php echo base_url();?>user" class="text-white text-hover-white opacity-75 hover-opacity-100">
							Home
						</a>
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="<?php echo base_url();?>user/bookings" class="text-white text-hover-white opacity-75 hover-opacity-100">
							My Bookings
						</a>
					</div>
				</div>
			</div>
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">

				<!--begin::Dropdown-->
				<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Quick actions">
					<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking Type</a>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">
						<!--begin::Navigation-->
						<ul class="navi navi-hover py-5">

							<li class="navi-item">
								<a href="#" class="navi-link active">
									<span class="navi-icon">
										<i class="flaticon-mail-1"></i>
									</span>
									<span class="navi-text">Scheduled Booking</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>
							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-mail-1"></i>
									</span>
									<span class="navi-text">Instant Booking</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>
						</ul>
						<!--end::Navigation-->
					</div>
				</div>
				<!--end::Dropdown-->

				<!--begin::Dropdown-->
				<div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Quick actions">
					<a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Booking Status</a>
					<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">
						<!--begin::Navigation-->
						<ul class="navi navi-hover py-5">
							<li class="navi-item">
								<a href="#" class="navi-link active">
									<span class="navi-icon">
										<i class="flaticon2-crisp-icons-1"></i>
									</span>
									<span class="navi-text">Pending</span>
								</a>
							</li>

							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-check-mark"></i>
									</span>
									<span class="navi-text">Accepted</span>
								</a>
							</li>

							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-cancel"></i>
									</span>
									<span class="navi-text">Declined</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>

							<li class="navi-item">
								<a href="#" class="navi-link">
									<span class="navi-icon">
										<i class="flaticon2-soft-icons"></i>
									</span>
									<span class="navi-text">All</span>
									<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
									</span>
								</a>
							</li>
						</ul>
						<!--end::Navigation-->
					</div>
				</div>
				<!--end::Dropdown-->
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
	<!--end::Subheader-->

	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<?php 
				if($bookings) :
				$ctr = 0;
				foreach($bookings as $book): 
				$arr_date = explode('T', $book->start_date);
				$date = date("M d, Y", strtotime($arr_date[0]));
				$day  = date("l", strtotime($arr_date[0]));
				$time = date("h:i A", strtotime($arr_date[1]));
				$ctr += 1;
				$text_decor = ($book->booking_status == "Pending") ? "text-danger" : "text-success";
			?>
				<!--begin::Card-->
				<div class="card card-custom gutter-b" style="box-shadow: 5px 10px 18px #888888;">
					<div class="card-body">
						<!--begin::Top-->
						<div class="d-flex">
							<!--begin::Pic-->
							<div class="flex-shrink-0 mr-7">
								<div class="symbol symbol-50 symbol-lg-120">
									<img alt="Pic" src="<?php echo base_url(); ?>assets/media/professionals/<?php echo $book->picture; ?>" />
								</div>
							</div>
							<!--end::Pic-->
							<!--begin: Info-->
							<div class="flex-grow-1">
								<!--begin::Title-->
								<div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
									<!--begin::User-->
									<div class="mr-3">
										<!--begin::Name-->
										<a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
											<?php 
												if($book->prof_type == "Lawyer")
													$suff = "Atty. ";
												else if($book->prof_type == "Doctor")
													$suff = "Dr. ";
												else
													$suff = "Engr. ";
												
												echo $suff . $book->fname . ' ' . $book->lname;
											?>
											<i class="flaticon2-correct text-success icon-md ml-2"></i>
										</a>
										<!--end::Name-->
										<!--begin::Contacts-->
										<div class="d-flex flex-wrap my-2">
											<span class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
												<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<mask fill="white">
																<use xlink:href="#path-1" />
															</mask>
															<g />
															<path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000" />
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span><?php echo $book->prof_type; ?>
											</span>
											<span class="text-muted text-hover-primary font-weight-bold">
											<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span><?php echo $book->state . ", " . $book->city; ?>
											</span>
										</div>
										<!--end::Contacts-->
									</div>
									<!--begin::User-->
									<!--begin::Actions-->
									<div class="my-lg-0 my-1">
										<?php if($book->booking_status == "Pending"): ?>

											<span class="form-text text-danger">
												Note: Checkout is not allowed until the lawyer  
												<br> accepted the request.
											</span>
											<button type="button" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2" disabled>
												Proceed to checkout
											</button>

										<?php elseif($book->booking_status == "Accepted" && $book->payment_type == "Paypal"): ?>
											<div id="paypal-button"></div>
											<script src="https://www.paypalobjects.com/api/checkout.js"></script>
											<script>
												 //Paypal button
										        paypal.Button.render({
										            env: 'sandbox',
										            client: {
										                sandbox: 'AYgCsiTCoE-b3wytnLL0jGyiMumO_21eRVwGJ778mQV61GdD_MYQplUejW27fXCqaQ9Rs5pcfIbFz9T-',
										                production: 'AYgCsiTCoE-b3wytnLL0jGyiMumO_21eRVwGJ778mQV61GdD_MYQplUejW27fXCqaQ9Rs5pcfIbFz9T-'
										            },
										            //Customize Button (optional)
										            locale: 'en_US',
										            style: {
										                size: 'medium',
										                color: 'blue',
										                shape: 'pill',
										                label: 'checkout',
										                tagline: 'true'
										            },
										            //Set up payment
										            payment: function(data, actions){
										                return actions.payment.create({
										                    transactions:[{
										                        amount: {
										                            total: <?php echo $book->payment_amount; ?>,
										                            currency: 'PHP'
										                        }
										                    }]
										                })
										            },

										            onAuthorize: function(data, actions){
										                return actions.payment.execute()
										                .then(function(){
										                	if(data.paymentID)
										                	{
										                		$.ajax({
											                        url : base_url + 'checkout/paypal_validate',
											                        type: 'post',
											                        data: {
											                            'data1'    : data.paymentID,
											                            'data2'    : <?php echo $book->booking_id; ?>,
											                            'data3'    : <?php echo $book->bkn_id; ?>,
											                            'data4'    : <?php echo $book->payment_type; ?>,
											                            'data5'    : <?php echo $book->payment_amount; ?>
											                        },
											                        success: function(res)
											                        {
											                        	alert(res);
											                        }
										                    	})
										                	}
										                	else
										                	{
										                		swal.fire({
										                            text: "Oops! An error occured. Please try again.",
										                            icon: "error",
										                            buttonsStyling: false,
										                            confirmButtonText: "Ok, got it!",
										                            customClass: {
										                                confirmButton: "btn font-weight-bold btn-light-danger"
										                            }
										                        });
										                	}
										                    
										                })
										            }
										        }, "#paypal-button");

											</script>

										<?php endif; ?>
									</div>
									<!--end::Actions-->
								</div>
								<!--end::Title-->
								<!--begin::Content-->
								<div class="d-flex align-items-center flex-wrap justify-content-between">
									<!--begin::Description-->
									<div class="flex-grow-1 font-weight-bold text-dark py-4">
										<div class="row">
											<div class="col-xl-2">
												Booking Status:
											</div>
											<div class="col-xl-10">
												<span class="<?php echo $text_decor; ?> text-uppercase">
													<?php echo $book->booking_status; ?>
												</span>
											</div>
											<div class="col-xl-2">
												Booking type:
											</div>
											<div class="col-xl-10">
												<?php echo $book->booking_type; ?>
											</div>
											<div class="col-xl-2">
												Payment Via:
											</div>
											<div class="col-xl-10">
												<?php echo $book->payment_type; ?>
												<!-- <a type="button" class="copy" id="<?php echo $book->meeting_pass; ?>">
													<i class="flaticon2-copy"></i>
												</a> -->
											</div>

											<div class="col-xl-2">
												Short Description:
											</div>
											<div class="col-xl-10">
												<span class="text-muted">
													<?php echo $book->short_desc; ?>
												</span>
											</div>
										</div>
									</div>
									<!--end::Description-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Info-->
						</div>
						<!--end::Top-->
						<!--begin::Separator-->
						<div class="separator separator-solid my-7"></div>
						<!--end::Separator-->
						<!--begin::Bottom-->
						<div class="d-flex align-items-center flex-wrap">
							<!--begin: Item-->
							<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
								<span class="mr-4">
									<i class="flaticon-event-calendar-symbol icon-2x text-muted font-weight-bold"></i>
								</span>
								<div class="d-flex flex-column text-dark-75">
									<span class="font-weight-bolder font-size-sm">Date</span>
									<span class="font-weight-bolder font-size-h5">
										<?php echo $date . " - " . $day; ?>
									</span>
								</div>
							</div>
							<!--end: Item-->
							<!--begin: Item-->
							<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
								<span class="mr-4">
									<i class="flaticon-clock-1 icon-2x text-muted font-weight-bold"></i>
								</span>
								<div class="d-flex flex-column text-dark-75">
									<span class="font-weight-bolder font-size-sm">Time</span>
									<span class="font-weight-bolder font-size-h5">
										<?php echo $time; ?>
									</span>
								</div>
							</div>
							<!--end: Item-->
							<!--begin: Item-->
							<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
								<span class="mr-4">
									<i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
								</span>
								<div class="d-flex flex-column text-dark-75">
									<span class="font-weight-bolder font-size-sm">Duration</span>
									<span class="font-weight-bolder font-size-h5">
										<?php echo $book->duration; ?>
										<span class="text-dark-50 font-weight-bold">min(s)</span>
									</span>
								</div>
							</div>
							<!--end: Item-->
						</div>
						<!--end::Bottom-->
					</div>
				</div>
				<!--end::Card-->
			<?php endforeach; ?>

				<!--begin::Pagination-->
				<div class="card card-custom" style="box-shadow: 5px 10px 18px #888888;">
					<div class="card-body py-7">
						<div class="d-flex justify-content-between align-items-center flex-wrap">
							<div class="d-flex flex-wrap mr-3">
								<a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
									<i class="ki ki-bold-double-arrow-back icon-xs"></i>
								</a>
								<a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
									<i class="ki ki-bold-arrow-back icon-xs"></i>
								</a>
								<a href="#" class="btn btn-icon btn-sm border-0 btn-hover-primary active mr-2 my-1">1</a>
								<a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
									<i class="ki ki-bold-arrow-next icon-xs"></i>
								</a>
								<a href="#" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1">
									<i class="ki ki-bold-double-arrow-next icon-xs"></i>
								</a>
							</div>
							<!--<div class="d-flex align-items-center">
								<select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span class="text-muted">Displaying 10 of 230 records</span>
							</div>-->
						</div>
					</div>
				</div>
				<!--end::Pagination-->

			<?php else: ?>

				<!--begin::Card-->
				<div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert" style="box-shadow: 5px 10px 18px #888888;">
					<div class="alert-icon">
						<span class="svg-icon svg-icon-primary svg-icon-xl">
							<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Tools/Compass.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"></rect>
									<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"></path>
									<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"></path>
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</div>
					<div class="alert-text">
						<p class="text-dager font-weight-bolder text-uppercase">
							No booking found.
						</p>
						<a href="<?php echo base_url();?>user/book" class="btn btn-custom2 font-weight-bolder text-uppercase px-9">Get started</a>
					</div>
				</div>
				<!--end::Card-->

			<?php endif; ?>

		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
<script src="<?php echo base_url(); ?>assets/js/bookings.js"></script>
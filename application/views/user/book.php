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
				<!--begin::Heading-->
				<div class="d-flex flex-column">
					<!--begin::Title-->
					<h2 class="text-white font-weight-bold my-2 mr-5">Book now</h2>
					<!--end::Title-->
				</div>
				<!--end::Heading-->
			</div>
			<!--end::Info-->
		</div>
	</div>
	<!--end::Subheader-->

	<!--begin::Hero-->
	<div class="d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url('/metronic/theme/html/demo2/dist/assets/media/bg/bg-9.jpg')">
		<div class="container">
			<div class="d-flex align-items-stretch text-center flex-column py-8">
				<!--begin::Heading-->
				<h1 class="text-white font-weight-bolder mb-12">How can we help?</h1>
				<!--end::Heading-->
				<!--begin::Form-->
				<form class="d-flex position-relative w-75 px-lg-40 m-auto">
					<div class="input-group">
						<!--begin::Icon-->
						<div class="input-group-prepend">
							<span class="input-group-text bg-white border-0 py-7 px-8">
								<span class="svg-icon svg-icon-xl">
									<!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/General/Search.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24" />
											<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
											<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
						</div>
						<!--end::Icon-->
						<!--begin::Input-->
						<input type="text" class="form-control h-auto border-0 py-7 px-1 font-size-h6" placeholder="Ask a question" />
						<!--end::Input-->
					</div>
				</form>
				<!--end::Form-->
			</div>
		</div>
	</div>
	<!--end::Hero-->

	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">

			<!--begin::Row-->
			<div class="row" style="margin-top: 30px;">

				<?php foreach ($professionals as $prof): ?>

					<!--begin::Col-->
					<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
						<!--begin::Card-->
						<div class="card card-custom gutter-b card-stretch" style="box-shadow: 5px 10px 18px #888888;">
							<!--begin::Body-->
							<div class="card-body text-center pt-4">
								<!--begin::User-->
								<div class="mt-7">
									<div class="symbol symbol-circle symbol-lg-75">
										<img src="<?php echo base_url(); ?>assets/media/professionals/<?php echo $prof->picture; ?>" alt="image" />
									</div>
								</div>
								<!--end::User-->
								<!--begin::Name-->
								<div class="my-2">
									<span class="text-dark font-weight-bold font-size-h4">
										<?php
											if($prof->prof_type == 'Lawyer')
												$suf = 'Atty.';
											else if($prof->prof_type == 'Doctor') 
												$suf = 'Dr.';
											else
												$suf = 'Engr.';
											echo $suf.' '.$prof->fname.' '.$prof->lname; 
										?>
									</span>
								</div>
								<!--end::Name-->
								<!--begin::Exp-->
								<div class="mb-2">
									<span class="text-muted font-weight-bold">
										<?php echo $prof->experience; ?> of experience
									</span>
								</div>
								<!--end::Exp-->
								<!--begin::Label-->
								<span class="label label-inline label-lg label-light-default btn-sm font-weight-bold">
									<?php echo $prof->prof_type; ?>
								</span>
								<!--end::Label-->
								<!--begin::Buttons-->
								<div class="mt-9 mb-6">
									<a href="<?php echo base_url(); ?>booking/request/<?php echo $prof->professional_id; ?>" class="btn btn-md btn-icon btn-light-twitter btn-pill mx-2">
										<i class="fa fa-book"></i>
									</a>
									<a href="<?php echo base_url(); ?>user/prof/<?php echo $prof->professional_id; ?>" class="btn btn-md btn-icon btn-light-twitter btn-pill mx-2" target="_blank">
										<i class="fa fa-eye"></i>
									</a>
								</div>
								<!--end::Buttons-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->

				<?php endforeach; ?>

			</div>
			<!--end::Row-->

			<!--begin::Card-->
			<!-- <div class="card card-custom gutter-b" style="box-shadow: 5px 10px 18px #888888;">
				<div class="card-body">
					<div class="d-flex">
						<div class="flex-shrink-0 mr-7">
							<div class="symbol symbol-50 symbol-lg-120">
								<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media//users/300_1.jpg" />
							</div>
						</div>
						<div class="flex-grow-1">
							<div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
								<div class="mr-3">
									<a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">Jason Muller 
									<i class="flaticon2-correct text-success icon-md ml-2"></i></a>
									<div class="d-flex flex-wrap my-2">
										<a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
										<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
										</span>jason@siastudio.com</a>
										<a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
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
										</span>PR Manager</a>
										<a href="#" class="text-muted text-hover-primary font-weight-bold">
										<span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
												</g>
											</svg>
										</span>Melbourne</a>
									</div>
								</div>
								<div class="my-lg-0 my-1">
									<a href="#" class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">Ask</a>
									<a href="#" class="btn btn-sm btn-primary font-weight-bolder text-uppercase">Hire</a>
								</div>
							</div>
							<div class="d-flex align-items-center flex-wrap justify-content-between">
								<div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
									I distinguish three main text objectives could be merely to inform people. 
									<br />A second could be persuade people. You want people to bay objective.
								</div>
								<div class="d-flex mt-4 mt-sm-0">
									<span class="font-weight-bold mr-4">Progress</span>
									<div class="progress progress-xs mt-2 mb-2 flex-shrink-0 w-150px w-xl-250px">
										<div class="progress-bar bg-success" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<span class="font-weight-bolder text-dark ml-4">78%</span>
								</div>
							</div>
						</div>
					</div>
					<div class="separator separator-solid my-7"></div>
					<div class="d-flex align-items-center flex-wrap">
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">Earnings</span>
								<span class="font-weight-bolder font-size-h5">
								<span class="text-dark-50 font-weight-bold">$</span>249,500</span>
							</div>
						</div>
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">Expenses</span>
								<span class="font-weight-bolder font-size-h5">
								<span class="text-dark-50 font-weight-bold">$</span>164,700</span>
							</div>
						</div>
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">Net</span>
								<span class="font-weight-bolder font-size-h5">
								<span class="text-dark-50 font-weight-bold">$</span>782,300</span>
							</div>
						</div>
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column flex-lg-fill">
								<span class="text-dark-75 font-weight-bolder font-size-sm">73 Tasks</span>
								<a href="#" class="text-primary font-weight-bolder">View</a>
							</div>
						</div>
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column">
								<span class="text-dark-75 font-weight-bolder font-size-sm">648 Comments</span>
								<a href="#" class="text-primary font-weight-bolder">View</a>
							</div>
						</div>
						<div class="d-flex align-items-center flex-lg-fill my-1">
							<span class="mr-4">
								<i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
							</span>
							<div class="symbol-group symbol-hover">
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Mark Stone">
									<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media/users/300_25.jpg" />
								</div>
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Charlie Stone">
									<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media/users/300_19.jpg" />
								</div>
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Luca Doncic">
									<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media/users/300_22.jpg" />
								</div>
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Nick Mana">
									<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media/users/300_23.jpg" />
								</div>
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="Teresa Fox">
									<img alt="Pic" src="/metronic/theme/html/demo2/dist/assets/media/users/300_18.jpg" />
								</div>
								<div class="symbol symbol-30 symbol-circle symbol-light" data-toggle="tooltip" title="More users">
									<span class="symbol-label font-weight-bold">5+</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!--end::Card-->


		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content
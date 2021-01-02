<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Subheader-->
	<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Heading-->
				<div class="d-flex flex-column">
					<!--begin::Title-->
					<h2 class="text-white font-weight-bold my-2 mr-5">Bookings</h2>
					<!--end::Title-->
					<!--begin::Breadcrumb-->
					<div class="d-flex align-items-center font-weight-bold my-2">
						<!--begin::Item-->
							<i class="flaticon2-shelter text-white icon-1x"></i>
						<!--end::Item-->
						<!--begin::Item-->
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="<?php echo base_url(); ?>professional/home" class="text-white text-hover-white opacity-75 hover-opacity-100">Home</a>
						<!--end::Item-->
						<!--begin::Item-->
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="<?php echo base_url(); ?>professional/home/bookings" class="text-white text-hover-white opacity-75 hover-opacity-100">Bookings</a>
						<!--end::Item-->
					</div>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Heading-->
			</div>
			<!--end::Info-->

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
			<!--begin::Row-->
			<div class="row">
				<?php 
					foreach ($bookings as $book) : 
					$arr_date = explode('T', $book->start_date);
					$date = date("M d, Y", strtotime($arr_date[0]));
					$time = date("h:i A", strtotime($arr_date[1]));
					$text_decor = ($book->booking_status == "Pending") ? "text-danger" : "text-success";
					$booking_id = $book->booking_id;
				?>

					<!--begin::Col-->
					<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
						<!--begin::Card-->
						<div class="card card-custom gutter-b card-stretch">
							<!--begin::Body-->
							<div class="card-body pt-4">
								<!--begin::User-->
								<div class="d-flex align-items-center mb-7">
									<!--begin::Pic-->
									<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
										<div class="symbol symbol-circle symbol-lg-75">
											<img src="<?php echo base_url().'assets/media/professionals/'.$book->picture; ?>" alt="picture"/>
										</div>
									</div>
									<!--end::Pic-->
									<!--begin::Title-->
									<div class="d-flex flex-column">
										<span class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">	
											<?php echo $book->fname.' '.$book->lname; ?>
										</span>
										<span class="text-muted font-weight-bold">
											<?php 
												echo $book->prof_type;
											 ?>
										</span>
									</div>
									<!--end::Title-->
								</div>
								<!--end::User-->
								<!--begin::Info-->
								<div class="mb-7">

									<div class="d-flex justify-content-between align-items-center">
										<span class="text-dark-75 font-weight-bolder mr-4 mb-2">Status:</span>
										<span class="font-weight-bold <?php echo $text_decor;?> text-uppercase">
											<?php echo $book->booking_status; ?>
										</span>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<span class="text-dark-75 font-weight-bolder mr-2">Date Scheduled:</span>
										<span class="text-muted text-hover-primary">
											<?php echo $date . ' - ' . $time; ?>
										</span>
									</div>
									<div class="d-flex justify-content-between align-items-cente my-2">
										<span class="text-dark-75 font-weight-bolder mr-2">Duration:</span>
										<span class="text-muted text-hover-primary">
											<?php echo $book->duration . ' minutes'; ?>
										</span>
									</div>
									<div class="d-flex justify-content-between align-items-cente my-2">
										<span class="text-dark-75 font-weight-bolder mr-2">Date Created:</span>
										<span class="text-muted text-hover-primary">
											<?php echo date('M d, Y - h:i A', strtotime($book->date_created)); ?>
										</span>
									</div>
								</div>
								<!--end::Info-->
								<!--begin::Buttons-->
								<div class="mt-9 mb-6">
									<a type="button" class="btn btn-md btn-icon btn-light-facebook btn-pill mx-2" data-toggle="modal" data-target="#modalDetails" onclick="bookingDetails('<?php echo $booking_id; ?>')">
										<i class="fas fa-grip-horizontal"></i>
									</a>
									<?php if($book->booking_status == "Accepted" && $book->payment_type == "Other") : ?>
										<a type="button" class="btn btn-md btn-icon btn-light-success btn-pill mx-2" data-toggle="modal" data-target="#acceptModal" onclick="acceptBooking('<?php echo $booking_id; ?>')">
											<i class="far fa-check-square"></i>
										</a>
										<a type="button" class="btn btn-md btn-icon btn-light-danger btn-pill mx-2" data-toggle="modal" data-target="#rejectModal" onclick="declineBooking('<?php echo $booking_id; ?>')">
											<i class="far fa-window-close"></i>
										</a>
									<?php endif; ?>
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
			<!--begin::Pagination-->
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
				<!-- <div class="d-flex align-items-center">
					<select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="30">30</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
					<span class="text-muted">Displaying 10 of 230 records</span>
				</div> -->
			</div>
			<!--end::Pagination-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->

<div class="modal" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailsLabel">Booking Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div data-scroll="true" data-height="300">
                    <div id="div_loader_book_details" class="pb-lg-0 pb-5 text-center">
	                    <img src="<?php echo base_url(); ?>assets/loader/loader3.gif">
	                </div>
	                <div id="booking_body" hidden>

	                	<div class="form-group row">

	                		<div class="col-xl-12">
	                			<h3 class="font-weight-bold text-muted">
		                			Booking Details
		                		</h3>
	                		</div>

							<label class="col-xl-5 col-lg-3">Client Id: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_uid"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Client Name: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_client_name"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Client Type: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_client_type"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Date Scheduled: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_date_scheduled"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Time: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_time"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Status: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_booking_status"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Short Description: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_short_desc"></span>
								</p>
							</div>

							<label class="col-xl-5 col-lg-3">Duration: </label>
							<div class="col-lg-9 col-xl-7">
								<p class="form-text text-muted">
									<span id="span_duration"></span>
								</p>
							</div>

							<div id="payment_details" hidden>
								<div class="form-group row">

									<div class="col-xl-12">
			                			<h3 class="font-weight-bold text-muted">
				                			Payment Details
				                		</h3>
			                		</div>

			                		<label class="col-xl-5 col-lg-3 col-form-label">Payment Type: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_payment_type"></span>
										</p>
									</div>

									<label class="col-xl-5 col-lg-3 col-form-label">Payment Amount: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_payment_amount"></span>
										</p>
									</div>

									<label class="col-xl-5 col-lg-3 col-form-label">Payment Date: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_payment_date"></span>
										</p>
									</div>

		                		</div>
							</div>

							
							<div id="zoom_details" hidden>
								<div class="form-group row">

									<div class="col-xl-12">
			                			<h3 class="font-weight-bold text-muted">
				                			Zoom Details
				                		</h3>
			                		</div>

			                		<label class="col-xl-5 col-lg-3 col-form-label">Meeting Id: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_meeting_id"></span>
										</p>
									</div>

									<label class="col-xl-5 col-lg-3 col-form-label">Meeting Password: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_meeting_password"></span>
										</p>
									</div>

									<label class="col-xl-5 col-lg-3 col-form-label">Start Meeting Url: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_start_meeting_url"></span>
										</p>
									</div>

									<label class="col-xl-5 col-lg-3 col-form-label">Start Date: </label>
									<div class="col-lg-9 col-xl-7">
										<p class="form-text text-muted pt-2">
											<span id="span_meeting_start_date"></span>
										</p>
									</div>

		                		</div>
							</div>

						</div>
	                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
	        <div class="modal-header">
		        <h5 class="modal-title" id="acceptModalLabel">
		        	Confirmation <i class="text-success icon-lg flaticon2-check-mark"></i>
		       	</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <i aria-hidden="true" class="ki ki-close"></i>
		        </button>
	        </div>
	        <div class="modal-body">
	        	<span class="text-uppercase text-muted">
	        		Are you sure you want to <span class="text-success">approve</span> this request?
	        	</span>
	            
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-light-default font-weight-bold btn_cancel" data-dismiss="modal">
	            	Cancel
	            </button>
	            <div id="div_loader_accept" hidden>
                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                </div>
	            <button type="button" class="btn btn-light-success font-weight-bold btn_yes" onclick="updateBookingStatus('Approved')">
	            	Yes, I'll approve
	            </button>
	        </div>
    	</div>
    </div>
</div>

<div class="modal" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    	<div class="modal-content">
	        <div class="modal-header">
		        <h5 class="modal-title" id="rejectModalLabel">
		        	Confirmation <i class="text-danger icon-lg flaticon2-cancel"></i>
		        </h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <i aria-hidden="true" class="ki ki-close"></i>
		        </button>
	        </div>
	        <div class="modal-body">
	        	<span class="text-uppercase text-muted">
	        		Are you sure you want to <span class="text-danger">reject</span> this request?
	        	</span>
	            
	        </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-light-default font-weight-bold btn_cancel" data-dismiss="modal">
	            	Cancel
	            </button>
	            <div id="div_loader_decline" hidden>
                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                </div>
	            <button type="button" class="btn btn-light-danger font-weight-bold btn_yes" onclick="updateBookingStatus('Reject')">Yes, I'll reject</button>
	        </div>
    	</div>
    </div>
</div>

<script>

	var booking_id;

	function acceptBooking(book_id)
    {
        booking_id = book_id;
    }

    function declineBooking(book_id)
    {
        booking_id = book_id;
    }

	function bookingDetails(book_id)
	{
	    $.ajax({  
	        type: "POST",  
	        url:  base_url + "professional/booking_details",  
	        data: { "booking_id" : book_id},
	        dataType: 'json',
	        beforeSend: function()
	        {
	            $("#div_loader_book_details").prop('hidden', false);
	            $("#booking_body").prop('hidden', true);
	        },
	        complete: function(){
	            $("#div_loader_book_details").prop('hidden', true);
	            $("#booking_body").prop('hidden', false);
	        },
	        success: function(result)
	        {
	        	var strdate = result[0].start_date;
	        	var arr_date = strdate.split('T');
	        	$("#span_uid").text(result[0].uid);
	        	$("#span_client_name").text(result[0].fname + ' ' + result[0].lname);
	        	$("#span_client_type").text(result[0].client_type);
	        	$("#span_date_scheduled").text(arr_date[0]);
	        	$("#span_time").text(arr_date[1]);
	        	$("#span_booking_status").text(result[0].booking_status);
	        	$("#span_short_desc").text(result[0].short_desc);
	        	$("#span_duration").text(result[0].duration + ' minutes');
	        } 
	    });
	}

	function updateBookingStatus(status)
	{
		$.ajax({
			url: base_url + "booking/update_booking_status",
			type: "POST",
			data: {
				"booking_id" : booking_id,
				"status"	 : status
			},
			dataType: "json",
			beforeSend:function() {
				$(".btn_cancel").prop('disabled', true);
				$(".btn_yes").prop('hidden', true);
				$(".btn_yes").prop('disabled', true);
				$("#div_loader_accept").prop('hidden', false);
			},
			complete: function() {
				$(".btn_cancel").prop('disabled', false);
				$(".btn_yes").prop('disabled', false);
				$(".btn_yes").prop('disabled', true);
				$("#div_loader_accept").prop('hidden', true);
			},
			success: function(res) {
				if(res) 
				{
					$(".modal").modal('hide');
					swal.fire({
                        text: "Success! Request has been accepted!",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-success"
                        }
                    });
				}
				else
				{
					swal.fire({
                        text: "Oops! An error occured. Sorry for inconvenience.",
                        icon: "danger",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-danger"
                        }
                    });
				}
			}
		});
	}

</script>
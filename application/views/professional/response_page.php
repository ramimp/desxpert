<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid py-40" id="kt_content">


    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-2 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex flex-column">
                    <h1 class="text-white font-weight-bolder my-2 mr-5">Confirmation</h1>
                </div>
            </div>
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b shadow" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <!--begin::Svg Icon | path:/metronic/theme/html/demo2/dist/assets/media/svg/icons/Tools/Compass.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <div class="alert-text">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <?php 
                                    if($client[0]->oauth_provider == "individual" || $client[0]->oauth_provider == "company")
                                        $pic = base_url() . 'assets/media/users/' . $client[0]->picture;
                                    else
                                        $pic = $client[0]->picture;
                                ?>
                                <img src="<?php echo $pic; ?>" alt="image" />
                            </div>
                        </div>
                        <div class="col-lg-5">
                            Client name:  <?php echo $client[0]->fname . ' ' . $client[0]->lname; ?> 
                            <br>
                            Client type:  <?php echo ucfirst($client[0]->oauth_provider); ?>
                            <br>
                            Short Description: 
                            <span class="text-muted">
                                <?php echo $booking[0]->short_desc; ?>
                            </span>
                        </div>
                    </div>
                    

                </div>

                <span id="result_msg" class="text-uppercase font-size-h3" hidden></span>

                <button type="button" class="btn btn-success text-uppercase shadow btn_action" 
                onclick="acceptResponse('<?php echo $bkn_id; ?>')" data-toggle="modal" data-target="#acceptModal">
                    Accept
                </button>
                &emsp;
                <button type="button" class="btn btn-danger text-uppercase shadow btn_action"
                onclick="declineResponse('<?php echo $bkn_id; ?>')" data-toggle="modal" data-target="#rejectModal">
                    Decline
                </button>
            </div>
            <!--end::Notice-->
            
            <!--end::Example-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

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
                    Are you sure you want to <span class="text-success">accept</span> this request?
                </span>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-default font-weight-bold btn_cancel" data-dismiss="modal">
                    Cancel
                </button>
                <div class="div_loader" hidden>
                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                </div>
                <button id="btn_accept" type="button" class="btn btn-light-success font-weight-bold btn_yes">
                    Yes, I'll accept
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
                    Are you sure you want to <span class="text-danger">decline</span> this request?
                </span>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-default font-weight-bold btn_cancel" data-dismiss="modal">
                    Cancel
                </button>
                <div class="div_loader" hidden>
                    <img src="<?php echo base_url(); ?>assets/loader/loader2.gif">
                </div>
                <button id="btn_decline" type="button" class="btn btn-light-danger font-weight-bold btn_yes">
                    Yes, I'll decline
                </button>
            </div>
        </div>
    </div>
</div>

<script  type="text/javascript" src="<?php echo base_url()?>assets/js/response_page.js"></script>




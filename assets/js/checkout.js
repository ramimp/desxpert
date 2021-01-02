"use strict";

// Class Definition
var KTRequest = function() {

    var total_amount = 1000;

    //Initialize value of SPAN
    $('#span_payment_type').text($('input[name="m_option_1"]:checked').val());
    $("#total_amount").text(total_amount);
    $("#span_date").text($("#kt_datepicker_1").val());
    $('#span_time').text($('input[name="radio_time"]:checked').data('name'));
    
    //Format Date into YYYY-MM-DD
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();
    
        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;
    
        return [year, month, day].join('-');
    }


    //Change the type of payment
    $('input[type=radio][name="m_option_1"]').change(function(){
        $('#span_payment_type').text($('input[name="m_option_1"]:checked').val());
    });


    var _request = function(e) {

        // $("#kt_form").on('submit', function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: base_url + "booking/request_booking",
        //         type: "POST",
        //         data: {
        //             'prof_id'       : $("#prof_id").text(),
        //             'booking_type'  : booking_type,
        //             'date'          : $("#kt_datepicker_1").val(),
        //             'time'          : $('input[name="radio_time"]:checked').val(),
        //             'payment_type'  : $("#span_payment_type").html(),
        //             'short_desc'    : $("textarea#kt_maxlength_5").val()
        //         },
        //         beforeSend:function(){
        //             $("#btn_prev").prop('disabled',  true);
        //             $("#btn_request").prop('disabled',  true);
        //             $("#btn_request").prop('hidden',  true);
        //             $("#div_loader_request").prop('hidden', false);
        //         },
        //         complete:function(){
                    
        //             // $("#btn_prev").prop('disabled',  false);
        //             // $("#btn_request").prop('disabled',  false);
        //             // $("#btn_request").prop('hidden',  false);
        //             // $("#div_loader_request").prop('hidden', true);
        //         },
        //         success: function(res)
        //         {
        //             if(res == "success")
        //             {
        //                 location.replace(base_url + "user/bookings");
        //             }
        //             else
        //             {
        //                 $("#btn_prev").prop('disabled',  false);
        //                 $("#btn_request").prop('disabled',  false);
        //                 $("#btn_request").prop('hidden',  false);
        //                 swal.fire({
        //                     text: "There was an error in submitting your request, please try again.",
        //                     icon: "error",
        //                     buttonsStyling: false,
        //                     confirmButtonText: "Ok, got it!",
        //                     customClass: {
        //                         confirmButton: "btn font-weight-bold btn-light-danger"
        //                     }
        //                 });
        //             }
        //         }
        //     })
        // });

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
                            total: total_amount,
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
                                // 'data2'    : <?php echo $book->booking_id; ?>,
                                // 'data3'    : <?php echo $book->bkn_id; ?>,
                                // 'data4'    : <?php echo $book->payment_type; ?>,
                                // 'data5'    : <?php echo $book->payment_amount; ?>
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

    }



    // Public Functions
    return {
        // public functions
        init: function() {
            _request();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTRequest.init();
});

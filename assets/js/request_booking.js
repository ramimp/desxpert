"use strict";

// Class Definition
var KTRequest = function() {

    var total_amount = 1000;
    var bool = false;
    var booking_type = "Scheduled Booking";

    $("#div_book_instant").prop('hidden', true);
    $("#div_join").prop('hidden', true);

    //Click button in sub header
    $("#btn_toggle").click(function(){
        bool = !bool;
        if(bool)
        {
            booking_type = "Instant Booking";
            $(this).text('Scheduled Booking');
            $("#div_book_instant").fadeIn();
            $("#div_book_schedule").fadeOut();
            $("#div_book_schedule").prop('hidden', true);
            $("#div_book_instant").prop('hidden', false);
        }
        else
        {
            booking_type = "Scheduled Booking";
            $(this).text('Instant Booking');
            $("#div_book_schedule").fadeIn();
            $("#div_book_instant").fadeOut();
            $("#div_book_instant").prop('hidden', true);
            $("#div_book_schedule").prop('hidden', false);
        }
    })

    //Initialize value of SPAN
    $('#span_payment_type').text($('input[name="m_option_1"]:checked').val());
    $("#span_date").text($("#kt_datepicker_1").val());
    $("#total_amount").text(total_amount);
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


    //Change the value of date
    $("#kt_datepicker_1").change(function(){
        $("#span_date").text($(this).val());
        var new_date = formatDate($(this).val());
        $.ajax({
            url : base_url + 'booking/check_sched/' + new_date + '/' +  $("#prof_id").text() + "/echo",
            dataType:'html',
            beforeSend: function() {
                $("#div_time").prop('hidden', true);
                $("#div_loader").prop('hidden', false);
            },
            complete: function() {
                $("#div_time").prop('hidden', false);
                $("#div_loader").prop('hidden', true);
            },
            success: function(res)
            {
                $("#div_time").empty();
                $("#div_time").html(res);
                $('#span_time').text($('input[name="radio_time"]:checked').data('name'));
            }
        })
    });

    //Change the value of cbo time
    $('#div_time').on('click','input[name="radio_time"]', {} ,function(e){
        $('#span_time').text($(this).data('name'));
    });

     $('input[type=radio][name="m_option_1"]').change(function(){
        $('#span_payment_type').text($('input[name="m_option_1"]:checked').val());
    });

    //Verify otp
    var _request = function(e) {

        $("#kt_form").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: base_url + "booking/request_booking",
                type: "POST",
                data: {
                    'prof_id'       : $("#prof_id").text(),
                    'booking_type'  : booking_type,
                    'date'          : $("#kt_datepicker_1").val(),
                    'time'          : $('input[name="radio_time"]:checked').val(),
                    'payment_type'  : $("#span_payment_type").html(),
                    'short_desc'    : $("textarea#kt_maxlength_5").val()
                },
                beforeSend:function(){
                    $("#btn_prev").prop('disabled',  true);
                    $("#btn_request").prop('disabled',  true);
                    $("#btn_request").prop('hidden',  true);
                    $("#div_loader_request").prop('hidden', false);
                },
                complete:function(){
                    
                    // $("#btn_prev").prop('disabled',  false);
                    // $("#btn_request").prop('disabled',  false);
                    // $("#btn_request").prop('hidden',  false);
                    // $("#div_loader_request").prop('hidden', true);
                },
                success: function(res)
                {
                    if(res == "success")
                    {
                        location.replace(base_url + "user/bookings");
                    }
                    else
                    {
                        $("#btn_prev").prop('disabled',  false);
                        $("#btn_request").prop('disabled',  false);
                        $("#btn_request").prop('hidden',  false);
                        swal.fire({
                            text: "There was an error in submitting your request, please try again.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-danger"
                            }
                        });
                    }
                }
            })
        });

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

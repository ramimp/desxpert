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
            $("#span_client_name").text(result[0].fname + ' ' + result[0].lname);
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
            "status"     : status
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
                    icon: "error",
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
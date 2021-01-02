var id;
function acceptResponse(bkn_id)
{
    id = bkn_id;
}

function declineResponse(bkn_id)
{
    id = bkn_id;
}

$("#btn_accept").click(function(){
    updateResponse("Accept");
});

$("#btn_decline").click(function(){
    updateResponse("Decline");
});

function updateResponse(response)
{
    $.ajax({
        url: base_url + "professional/prof_response",
        type: "POST",
        data: {"response" : response, "bkn_id" : id},
        beforeSend:function() {
            $(".btn_cancel").prop('disabled', true);
            $(".btn_yes").prop('hidden', true);
            $(".btn_yes").prop('disabled', true);
            $(".div_loader").prop('hidden', false);
        },
        complete: function() {
            $(".btn_cancel").prop('disabled', false);
            $(".btn_yes").prop('disabled', false);
            $(".btn_yes").prop('hidden', false);
            $(".div_loader").prop('hidden', true);
        },
        success:function(res)
        {
            if(res == "success")
            {
                resultAction(response);
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

function resultAction(status)
{
    if(status == "Accept")
    {
        $("#result_msg").addClass('text-success').text("Accepted");
    }
    else
    {
        $("#result_msg").addClass('text-danger').text("Declined");
    }
    $("#result_msg").prop('hidden', false);
    $(".btn_action").prop('hidden', true);
}
"use strict";

// Class Definition
var KTVerify = function() {

    var finishSend = true;

    var timer = function(sec)
    {
        var timeLeft = 30;
        var timerId = setInterval(countdown, 1000);
        function countdown()
        {
            if (timeLeft == -1) 
            {
                finishSend = true;
                clearTimeout(timerId);
                $("#resend").css('cursor', 'pointer');
                $("#timer").html('30s').prop('hidden', true);
            } else {
                $("#timer").html(timeLeft + 's');
                timeLeft--;
            }
        }
    }

    $("#resend").click(function(){
        if(finishSend)
        {
            $.ajax({
                url:  base_url + 'user/resend_email',
                type: 'post',
                data: {
                    email: $("#email").val(),
                    type: $("#type").val()
                },
                dataType: "json",
                beforeSend: function()
                {
                    $("#resend").css('cursor', 'not-allowed');
                    $("#btn_submit").prop('disabled', true);
                    $("#div_loader2").prop('hidden', false);
                },
                complete: function(){
                    $("#btn_submit").prop('disabled', false);
                    $("#div_loader2").prop('hidden', true);
                },
                success:function(result)
                {
                    if(result)
                    {
                        finishSend = false;
                        $("#timer").prop('hidden', false);
                        timer(30);
                    }
                    else
                    {
                        swal.fire({
                            text: "There was an error in resending an email, please contact the support.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn font-weight-bold btn-light-primary"
                            }
                        }).then(function() {
                            KTUtil.scrollTop();
                        }); 
                    }

                }
            }); 
        }
        
    }); 

    //Verify otp
    var _handleVerifyForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_verify_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    code: {
                        validators: {
                            notEmpty: {
                                message: 'Code is required'
                            },
                            digits: {
                                message: 'The value is not a valid'
                            },
                            stringLength: {
                                min:5,
                                max:5,
                                message: 'Please enter at 5 numbers'
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#btn_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    $.ajax({  
                        type: "POST",  
                        url:  base_url + "user/verify_otp",  
                        data: {
                            "email" : $("#email").val(), 
                            "otp"   : $("#code").val(),
                            "type"  : $("#type").val()
                        },
                        beforeSend: function()
                        {
                            $("#btn_submit").prop('hidden', true);
                            $("#btn_submit").prop('disabled', true);
                            $("#div_loader").prop('hidden', false);
                        },
                        complete: function(){
                            $("#btn_submit").prop('hidden', false);
                            $("#div_loader").prop('hidden', true);
                        },
                        success: function(result)
                        {
                            $("#btn_submit").prop('disabled', false); 
                            if(result == "invalid") 
                            {
                                $("#btn_submit").prop('disabled', false);  
                                swal.fire({
                                    text: "Oops, Invalid code",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                            else if(result == "failed")
                            {
                                $("#btn_submit").prop('disabled', false);
                                swal.fire({
                                    text: "There was an error in submitting your code, please contact the support.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                }); 
                            }
                            else if(result == "success")
                            {
                                location.replace( base_url + "user/");
                            } 
                        } 
                    });

                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        $("#code").keypress(function (e) {
            if($(this).val().length <= 4)
            {
               //if the letter is not digit then display error and don't type anything
                if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                           return false;
                } 
            }
            else
                return false;
            
        });

    }



    // Public Functions
    return {
        // public functions
        init: function() {
            //_login = $('#kt_login');
            _handleVerifyForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTVerify.init();
});

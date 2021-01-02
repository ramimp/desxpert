"use strict";

// Class Definition
var KTMyAccount = function() {

    //Verify otp
    var _myaccount = function(e) {
        var bool = false;

        $("#div_change_pass").prop('hidden', true);

        $("#btn_personal_info").click(function(){
            $("#div_personal_info").fadeIn();
            $("#div_change_pass").fadeOut();
            $("#div_change_pass").prop('hidden', true);
            $("#div_personal_info").prop('hidden', false);
            $('.navi-link').removeClass('active');
            $(this).addClass('active');
        });

        $("#btn_change_pass").click(function(){
            $("#div_change_pass").fadeIn();
            $("#div_personal_info").fadeOut();
            $("#div_personal_info").prop('hidden', true);
            $("#div_change_pass").prop('hidden', false);
            $('.navi-link').removeClass('active');
            $(this).addClass('active');
        });

    }

    //Verify otp
    var _handlePersonalIfo = function(e) {
        var validation;
        var form = KTUtil.getById('kt_form_personal');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    fname: {
                        validators: {
                            notEmpty: {
                                message: 'First name is required'
                            },
                            stringLength: {
                                max:50,
                                message: 'Please enter a maximum of 50 characters'
                            }
                        }
                    },
                    lname: {
                        validators: {
                            notEmpty: {
                                message: 'Last name is required'
                            },
                            stringLength: {
                                max:50,
                                message: 'Please enter a maximum of 50 characters'
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

        $('#btn_save_profile').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') 
                {
                    $('#fname, #lname').val(function() {
                      return this.value.split('.').map(function(word) {
                        return word[0].toUpperCase() + word.substr(1);
                      }).join('.');
                    });

                    var form_data = new FormData($('#kt_form_personal')[0]);
                    $.ajax({
                        type: "POST",
                        url:  base_url + "user/update_user_info",  
                        data: form_data,
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $("#btn_cancel_profile").prop('disabled', true);
                            $("#btn_save_profile").prop('disabled', true);
                            $("#div_loader_personal").prop('hidden', false);
                        },
                        complete: function(){
                            $("#btn_cancel_profile").prop('disabled', false);
                            $("#btn_save_profile").prop('disabled', false);
                            $("#div_loader_personal").prop('hidden', true);
                        },
                        success: function(result)
                        {
                            if(result != "failed") 
                            {
                                var fname = $("#fname").val();
                                var lname = $("#lname").val();
                                $(".span_fullname").text(fname + " " + lname);
                                $(".span_name_single").text(fname.charAt(0));
                                $("#header_name").text(fname);
                                $(".span_fname").attr('placeholder', fname);
                                $(".span_lname").attr('placeholder', lname);
                                $('#kt_form_personal')[0].reset();

                                if(result != "success")
                                {
                                    var imageUrl = base_url + "assets/media/users/" + result;
                                    $(".profile_picture").attr('src', 'url(' + imageUrl + ')');
                                }
                                swal.fire({
                                    text: "Success!",
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
                                    text: "There was an error in updating your info, please try again.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-danger"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
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
                            confirmButton: "btn font-weight-bold btn-light-danger"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        $("#btn_cancel_profile").click(function(){
            $("#kt_form_personal")[0].reset();
        })
    }

    //Verify otp
    var _handleChangePass = function(e) {
        var validation;
        var form = KTUtil.getById('kt_form_change_pass');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    old_password: {
                        validators: {
                            notEmpty: {
                                message: 'Old password is required'
                            }
                        }
                    },
                    new_password: {
                        validators: {
                            notEmpty: {
                                message: 'New password is required'
                            },
                            stringLength: {
                                min:8,
                                max: 70,
                                message: 'Please enter within text length range 8 and 70 characters'
                            }
                        }
                    },
                    c_new_password: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm password is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="new_password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
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

        $('#btn_save_change_pass').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') 
                {
                    var form_data = new FormData($('#kt_form_change_pass')[0]);
                    $.ajax({
                        type: "POST",
                        url:  base_url + "user/change_pass",  
                        data: form_data,
                        processData: false,
                        contentType: false,
                        //dataType: 'json',
                        beforeSend: function() {
                            $("#btn_cancel_change_pass").prop('disabled', true);
                            $("#btn_save_change_pass").prop('disabled', true);
                            $("#div_loader_change_pass").prop('hidden', false);
                        },
                        complete: function(){
                            $("#btn_cancel_change_pass").prop('disabled', false);
                            $("#btn_save_change_pass").prop('disabled', false);
                            $("#div_loader_change_pass").prop('hidden', true);
                        },
                        success: function(result)
                        {
                            if(result == "good") 
                            {
                                $("#err_msg").prop('hidden', true);
                                $("#kt_form_change_pass")[0].reset();
                                swal.fire({
                                    text: "Success!",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-success"
                                    }
                                });
                            } 
                            else if(result == "failed_pass")
                            {
                               $("#err_msg").prop('hidden', false);
                            }
                            else
                            {
                                $("#err_msg").prop('hidden', true);
                                swal.fire({
                                    text: "Sorry, there was an error updating your password.",
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

                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-danger"
                        }
                    }).then(function() {
                        KTUtil.scrollTop();
                    });
                }
            });
        });

        $("#close_err_msg").click(function(){
            $("#err_msg").prop('hidden', true);
        });
        
        $("#btn_cancel_change_pass").click(function(){
            $("#kt_form_change_pass")[0].reset();
        })
    }



    // Public Functions
    return {
        // public functions
        init: function() {
            _myaccount();
            _handlePersonalIfo();
            _handleChangePass();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTMyAccount.init();
});

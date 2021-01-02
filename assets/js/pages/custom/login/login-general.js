"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var isModalSignIn = false;
    $(".book_appointment").click(function(){
        isModalSignIn = true;
        $("#prof_id").val($(this).attr('id'));
    })
    $("#sign_in").click(function(){
        isModalSignIn = false;
    })

    $("#kt_login_signup_form_company").prop("hidden", true);

    //Toggle cbo option Company or Individual
    $("#kt_bootstrap_select").change(function(){
        if($(this).val() == "individual")
        {
            $("#kt_login_signup_form").fadeIn();
            $("#kt_login_signup_form_company").fadeOut();
            $("#kt_login_signup_form").prop("hidden", false);
            $("#kt_login_signup_form_company").prop("hidden", true);
            $("#kt_login_signup_form_company")[0].reset();
        }
        else
        {
            $("#kt_login_signup_form_company").fadeIn();
            $("#kt_login_signup_form").fadeOut();
            $("#kt_login_signup_form").prop("hidden", true);
            $("#kt_login_signup_form_company").prop("hidden", false);
            $("#kt_login_signup_form")[0].reset();
        }

        $("#email_msg").prop('hidden', true);
        $("#email").removeClass('is-invalid');
        $("#email_msg_company").prop('hidden', true);
        $("#email_company").removeClass('is-invalid');
    });

    var check_email_users = function(email, type)
    {
        $.ajax({  
            type: "POST",  
            url:  base_url + "user/check_email_users",  
            data: {"email" : email},
            success: function(result){
                if(result == "false")
                {
                    if(type == 'individual')
                    {
                        //$("#kt_login_signup_submit").prop('disabled', true);
                        $("#email_msg").prop('hidden', false);
                        $("#email").removeClass('is-valid');
                        $("#email").addClass('is-invalid');
                    }
                    else if(type == 'company')
                    {
                        //$("#kt_login_signup_submit").prop('disabled', true);
                        $("#email_msg_company").prop('hidden', false);
                        $("#email_company").removeClass('is-valid');
                        $("#email_company").addClass('is-invalid');
                    }
                    
                }
                else
                {
                    if(type == 'individual')
                    {
                        //$("#kt_login_signup_submit").prop('disabled', false);
                        $("#email_msg").prop('hidden', true);
                        $("#email").removeClass('is-invalid');
                        $("#email").addClass('is-valid');
                    }
                    else if(type == 'company')
                    {
                        //$("#kt_login_signup_submit").prop('disabled', false);
                        $("#email_msg_company").prop('hidden', true);
                        $("#email_company").removeClass('is-invalid');
                        $("#email_company").addClass('is-valid');
                    }
                    
                }
            }  
        });
    }

    var _showForm = function(form) 
    {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    //Login
    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_signin_form'),
			{
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'Username is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);
        //Handle signin button
        $('#kt_login_signin_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') 
                {
                    var url = base_url + "user/login";
                    if(isModalSignIn)
                    {
                        url = base_url + "user/book_and_login";
                    }

                    $.ajax({  
                        type: "POST",  
                        url:  url,  
                        data: $("#kt_login_signin_form").serialize(), 
                        datatype: "json",
                        beforeSend: function()
                        {
                            $("#div_login").prop('hidden', true);
                            $("#div_loader").prop('hidden', false);
                        },
                        complete: function(){
                        },
                        success: function(result){ 
                            if(!result)
                            {
                                $("#div_login").prop('hidden', false);
                                $("#div_loader").prop('hidden', true);
                                swal.fire({
                                    text: "Sorry, Invalid user or password.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }) 
                            }
                            else
                            {
                                location.replace(result);
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

        // Handle forgot button
        $('#kt_login_forgot').on('click', function (e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function (e) {
            e.preventDefault();
            _showForm('signup');
        });

        $("#username").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#kt_login_signin_submit").click();
            }
        });

        $("#password").keyup(function(event) {
            if (event.keyCode === 13) {
                $("#kt_login_signin_submit").click();
            }
        });
    }


    
    //Forgot password
    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			KTUtil.getById('kt_login_forgot_form'),
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		);

        // Handle submit button
        $('#kt_login_forgot_submit').on('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Submit form
                    KTUtil.scrollTop();
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

        // Handle cancel button
        $('#kt_login_forgot_cancel').on('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }



    //Register
    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'First name is required'
                            }
                        }
                    },
                    last_name: {
                        validators: {
                            notEmpty: {
                                message: 'Last name is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },
                            stringLength: {
                                max: 100,
                                message: 'Please enter a maximum of 150 characters'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'Mobile number is required'
                            },
                            digits: {
                                message: 'The value is not a valid phone number'
                            },
                            stringLength: {
                                min:11,
                                max:11,
                                message: 'Please enter at least 11 characters'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            stringLength: {
                                min:8,
                                max: 70,
                                message: 'Please enter within text length range 8 and 70 characters'
                            }
                        }
                    },
                    cpassword: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
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

        

        $("#email").bind('focusout, focusin', function(){
            if($(this).val() != '')
                check_email_users($(this).val(), 'individual');
        });

        $("#phone").focusin(function(){
            if($("#email").val() != '')
            {
                check_email_users($("#email").val(), 'individual');
            }
        });

        //Submit Sign up form
        $('#kt_login_signup_form').on('submit', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    $.ajax({  
                        type: "POST",  
                        url:  base_url + "user/register",  
                        data: $("#kt_login_signup_form").serialize(), 
                        beforeSend: function()
                        {
                            $("#kt_login_signup_submit").prop('hidden', true);
                            $("#kt_login_signup_submit").prop('disabled', true);
                            $("#div_loader_signup").prop('hidden', false);
                        },
                        complete: function(){
                            $("#kt_login_signup_submit").prop('hidden', false);
                            $("#kt_login_signup_submit").prop('disabled', false);
                            $("#div_loader_signup").prop('hidden', true);
                        },
                        success: function(result){
                            if(result == "internet") 
                            {   
                                swal.fire({
                                    text: "Oops, No internet connection.",
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
                            else if(result == "email_exists")
                            {   
                                swal.fire({
                                    text: "Email address is not available.",
                                    icon: "warning",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                            else if(result == "failed_otp" || result == "failed_register" || result == "failed_otp_update" || result == "failed_register_update")
                            {   
                                swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please refresh the page.",
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
                            else
                            {
                                $("#kt_login_signup_form")[0].reset();
                                location.replace(base_url + "user/verify_page/" + result + "/23b79ae0fc0f07a3669598dd23c694cc");
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

        // Handle cancel button
        $('#kt_login_signup_cancel').on('click', function (e) {
            e.preventDefault();
            //$("#kt_login_signup_form")[0].reset();
            _showForm('signin');
        });
    }



    //Register Company
    var _handleSignUpFormCompany = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form_company');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    company_name: {
                        validators: {
                            notEmpty: {
                                message: 'Company name is required'
                            }
                        }
                    },
                    email_company: {
                        validators: {
                            notEmpty: {
                                message: 'Email address is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            }
                        }
                    },
                    phone_company: {
                        validators: {
                            digits: {
                                message: 'The value is not a valid phone number'
                            },
                            stringLength: {
                                min:11,
                                max:11,
                                message: 'Please enter at least 11 characters'
                            }
                        }
                    },
                    password_company: {
                        validators: {
                            notEmpty: {
                                message: 'The password is required'
                            },
                            stringLength: {
                                min:8,
                                max: 70,
                                message: 'Please enter within text length range 8 and 70 characters'
                            }
                        }
                    },
                    cpassword_company: {
                        validators: {
                            notEmpty: {
                                message: 'The password confirmation is required'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password_company"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                    agree: {
                        validators: {
                            notEmpty: {
                                message: 'You must accept the terms and conditions'
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

        $('#kt_login_signup_form_company').on('submit', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    $.ajax({  
                        type: "POST",  
                        url:  base_url + "user/register_company",  
                        data: $("#kt_login_signup_form_company").serialize(), 
                        beforeSend: function()
                        {
                            $("#kt_login_signup_submit_company").prop('hidden', true);
                            $("#kt_login_signup_submit_company").prop('disabled', true);
                            $("#div_loader_company").prop('hidden', false);
                        },
                        complete: function(){
                            $("#kt_login_signup_submit_company").prop('hidden', false);
                            $("#kt_login_signup_submit_company").prop('disabled', false);
                            $("#div_loader_company").prop('hidden', true);
                        },
                        success: function(result){
                            if(result == "internet") 
                            {   
                                swal.fire({
                                    text: "Oops, No internet connection.",
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
                            else if(result == "email_exists")
                            {   
                                swal.fire({
                                    text: "Email address is not available.",
                                    icon: "warning",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }
                            else if(result == "failed_otp" || result == "failed_register" || result == "failed_otp_update" || result == "failed_register_update")
                            {   
                                swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please refresh the page.",
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
                            else
                            {
                                $("#kt_login_signup_form")[0].reset();
                                location.replace(base_url + "user/verify_page/" + result + '/93c731f1c3a84ef05cd54d044c379eaa' );
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

        $("#email_company").bind('focusout, focusin', function(){
            if($(this).val() != '')
                check_email_users($(this).val(), 'company');
        });

        $("#password_company").focusin(function(){
            if($("#email_company").val() != '')
                check_email_users($("#email_company").val(), 'company');
        });

        // Handle cancel button
        $('#kt_login_signup_cancel_company').on('click', function (e) {
            e.preventDefault();
            //$("#kt_login_signup_form_company")[0].reset();
            _showForm('signin');
        });
    }


    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleSignUpForm();
            _handleForgotForm();
            _handleSignUpFormCompany();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

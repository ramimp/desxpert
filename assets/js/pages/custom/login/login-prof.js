"use strict";

// Class Definition
var KTLogin = function() {
    var _login;
    var _showPassword = false;
    var redirect_uri  = $("#redirect_uri").text();

    var show_password = function (show) 
    {
        if(show)
        {
            $("#i_lock").attr('class', 'fas fa-lock-open');
            $("#password").attr('type', 'text');
        }
        else
        {
            $("#i_lock").attr('class', 'fas fa-lock');
            $("#password").attr('type', 'password');
        }
    }

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
                    $.ajax({  
                        type: "POST",  
                        url:  base_url + 'professional/check_login',  
                        data: $("#kt_login_signin_form").serialize(), 
                        datatype: "json",
                        beforeSend: function()
                        {
                            $("#div_login").prop('hidden', true);
                            $("#div_loader").prop('hidden', false);
                        },
                        complete: function(){
                        },
                        success: function(result)
                        { 
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
                                if(redirect_uri != "")
                                    location.replace(redirect_uri);
                                else
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

    //Toggle show password
    $("#btn_lock").click(function(){
        _showPassword = !_showPassword;
        show_password(_showPassword);
    })


    // Public Functions
    return {
        // public functions
        init: function() {
            _login = $('#kt_login');

            _handleSignInForm();
            _handleForgotForm();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

"use strict";

// Class Definition
var KTLogin = function() {
    var _login;

    var _showForm = function(form) {
        var cls = 'login-' + form + '-on';
        var form = 'kt_login_' + form + '_form';

        _login.removeClass('login-forgot-on');
        _login.removeClass('login-signin-on');
        _login.removeClass('login-signup-on');

        _login.addClass(cls);

        KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('kt_login_signin_form'), {
                fields: {
                    username: {
                        validators: {
                            notEmpty: {
                                message: 'El usuario es requerido'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'La cotraseña es requerida'
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

        $('#kt_login_signin_submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {

                    $.ajax({
                        url: PATH + 'auth/login',
                        method: "POST",
                        dataType: "json",
                        data: $('#kt_login_signin_form').serialize(),
                        beforeSend: function() {

                        },
                        success: function(result) {
                            // debugger;
                            // console.log(result);

                            if (result.estatus == 'error') {
                                swal.fire({
                                    text: result.mensaje,
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, vamos!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            } else {
                                console.log(result.estatus);

                                swal.fire({
                                    text: result.mensaje,
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, vamos!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    window.location.href = PATH + 'auth/index';
                                });

                            }

                        },
                        complete: function() {

                        },
                        error: function() {
                            swal.fire({
                                text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, vamos!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                        }
                    });


                } else {
                    swal.fire({
                        text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, vamos!",
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
        $('#kt_login_forgot').on('click', function(e) {
            e.preventDefault();
            _showForm('forgot');
        });

        // Handle signup
        $('#kt_login_signup').on('click', function(e) {
            e.preventDefault();
            _showForm('signup');
        });
    }

    var _handleSignUpForm = function(e) {
        var validation;
        var form = KTUtil.getById('kt_login_signup_form');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form, {
                fields: {
                    first_name: {
                        validators: {
                            notEmpty: {
                                message: 'Nombre es requerido'
                            }
                        }
                    },
                    ap1: {
                        validators: {
                            notEmpty: {
                                message: 'Primer apellido es requerido'
                            }
                        }
                    },
                    company: {
                        validators: {
                            notEmpty: {
                                message: 'El departamento es requerido'
                            }
                        }
                    },
                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'El teléfono es requerido'
                            },
                            stringLength: {
                                max: 10,
                                message: 'El teléfono debe tener por minimo 10 digitos',
                            },
                            integer: {
                                message: 'El valor no es un numero',
                                // The default separators
                                thousandsSeparator: '',
                                decimalSeparator: '',
                            },
                            phone: {
                                message: 'El formato no es valido, favor de verificar'
                            }
                        }
                    },
                    // email: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Correo electronico es requerido'
                    //         },
                    //         emailAddress: {
                    //             message: 'El formato de correo electrónico no es valido, favor de verificar'
                    //         }
                    //     }
                    // },
                    // identity: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'El usuario es requerido'
                    //         }
                    //     }
                    // },
                    password: {
                        validators: {
                            stringLength: {
                                max: 4,
                                min: 4,
                                message: 'El teléfono debe tener 4 digitos',
                            },
                            integer: {
                                message: 'El valor no es un numero',
                                // The default separators
                                thousandsSeparator: '',
                                decimalSeparator: '',
                            },
                            notEmpty: {
                                message: 'El NIP es requerido'
                            }
                        }
                    },
                    password_confirm: {
                        validators: {
                            notEmpty: {
                                message: 'La confirmación del NIP es requerida'
                            },
                            identical: {
                                compare: function() {
                                    return form.querySelector('[name="password"]').value;
                                },
                                message: 'La confirmación del NIP no coincide, favor de verificar'
                            }
                        }
                    },
                    // agree: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Debes de aceptar los terminos y condiciones'
                    //         }
                    //     }
                    // },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap()
                }
            }
        );

        $('#kt_login_signup_submit').on('click', function(e) {
            e.preventDefault();

            validation.validate().then(function(status) {
                if (status == 'Valid') {

                    // console.log(form);



                    $.ajax({
                        url: PATH + 'auth/create_user',
                        method: "POST",
                        dataType: "json",
                        data: $('#kt_login_signup_form').serialize(),
                        beforeSend: function() {

                        },
                        success: function(result) {
                            // debugger;
                            console.log(result);

                            if (result.estatus == 'error') {
                                swal.fire({
                                    text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, vamos!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            } else {
                                swal.fire({
                                    text: "Todo salió correctamente! Se enviarán los datos",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, vamos!",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    _showForm('signin');
                                });

                            }

                        },
                        complete: function() {

                        },
                        error: function() {
                            swal.fire({
                                text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, vamos!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function() {
                                KTUtil.scrollTop();
                            });
                        }
                    });




                } else {
                    swal.fire({
                        text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, vamos!",
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
        $('#kt_login_signup_cancel').on('click', function(e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    var _handleForgotForm = function(e) {
        var validation;

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            KTUtil.getById('kt_login_forgot_form'), {
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
        $('#kt_login_forgot_submit').on('click', function(e) {
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
        $('#kt_login_forgot_cancel').on('click', function(e) {
            e.preventDefault();

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
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLogin.init();
});

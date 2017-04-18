// bootstrap wizard//
$("#gender, #gender1").select2({
    theme:"bootstrap",
    placeholder:"",
    width: '100%'
});
$("#commentForm").bootstrapValidator({
    fields: {
        username: {
            validators: {
                notEmpty: {
                    message: 'The full name is required'
                }
            },
            required: true,
            minlength: 3
        },
        password: {
            validators: {
                notEmpty: {},
                identical: {
                    field: 'confirmPassword',
                    message: 'The password and its confirm are not the same'
                },
                different: {
                    field: 'username',
                    message: 'The password cannot be the same as username'
                }
            }
        },
        confirm: {
            validators: {
                notEmpty: {},
                identical: {
                    field: 'password'
                },
                different: {
                    field: 'username',
                    message: 'The password cannot be the same as username'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'The email address is required'
                },
                emailAddress: {
                    message: 'The input is not a valid email address'
                }
            }
        },
        fname: {
            validators: {
                notEmpty: {
                    message: 'The first name is required and cannot be empty'
                }
            }
        },
        lname: {
            validators: {
                notEmpty: {
                    message: 'The last name is required and cannot be empty'
                }
            }
        },
        gender: {
            validators: {
                notEmpty: {
                    message: 'Please select a gender'
                }
            }
        },
        address: {
            validators: {
                notEmpty: {
                    message: 'The address is required'
                }
            },
            required: true,
            minlength: 3
        },
        password3: {
            validators: {
                notEmpty: {
                    message: 'This field is required and mandatory'
                }
            },
            required: true,
            minlength: 3
        },
        age: {
            validators: {
                notEmpty: {},
                digits: {},
                greaterThan: {
                    value: 18
                },
                lessThan: {
                    value: 100
                }
            }
        },
        phone1: {
            validators: {
                notEmpty: {
                    message: 'The home number is required'
                },
                regexp: {
                    regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                    message: 'Enter valid phone number'
                }
            }
        },
        phone2: {
            validators: {
                notEmpty: {
                    message: 'The personal number is required'
                },
                regexp: {
                    regexp: /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/,
                    message: 'Enter valid phone number'
                }
            }
        },
        acceptTerms:{
            validators:{
                notEmpty:{
                    message: 'The checkbox must be checked'
                }
            }
        }
    }
});

$('#rootwizard').bootstrapWizard({
    'tabClass': 'nav nav-pills',
    'onNext': function(tab, navigation, index) {
        var $validator = $('#commentForm').data('bootstrapValidator').validate();
        return $validator.isValid();
    },
    onTabClick: function(tab, navigation, index) {
        return false;
    },
    onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;

        // If it's the last tab then hide the last button and show the finish instead
        if($current >= $total) {
            $('#rootwizard').find('.pager .next').hide();
            $('#rootwizard').find('.pager .finish').show();
            $('#rootwizard').find('.pager .finish').removeClass('disabled');
        } else {
            $('#rootwizard').find('.pager .next').show();
            $('#rootwizard').find('.pager .finish').hide();
        }
        $('#rootwizard .finish').click(function() {
            var $validator = $('#commentForm').data('bootstrapValidator').validate();
            return $validator.isValid();
            $('#rootwizard').find("a[href='#tab1']").tab('show');
        });

    }});


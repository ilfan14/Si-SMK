 function Validation() {

        var Name = document.frmOnline.txtName;

        var lastname = document.frmOnline.txtlastname;

        var Email = document.frmOnline.txtEmail;

        var Address1 = document.frmOnline.txtAddress1;
        var Address2 = document.frmOnline.txtAddress2;
        var Phone = document.frmOnline.txtPhone;
        var Conditions = document.frmOnline.e1;
        var chkConditions = document.frmOnline.chkConditions;

        if (Name.value == "") {
            alert("Enter your Name");
            Name.focus();
            return false;

        }

        if (Name.value != "") {
            var ck_name = /^[A-Za-z ]{3,50}$/;
            if (!ck_name.test(Name.value)) {
                alert("You can not enter Numaric values (or) your name should be 3 - 20 characters...");
                Name.focus();
                return false;
            }
        }
        //lastname Validation
        if (lastname.value == "") {
            alert("Enter your last name");
            lastname.focus();
            return false;
        }
        if (lastname.value != "") {
            var ck_name = /^[A-Za-z ]{3,20}$/;
            if (!ck_name.test(lastname.value)) {
                alert("You can not enter Numaric values (or) your name should be 3 - 20 characters...");
                lastname.focus();
                return false;
            }
        }
        //lastname Validation Completed

        //email validation
        if (Email.value == "") {
            alert("Enter your Email_Id");
            txtEmail.focus();
            return false;
        }


        var x = document.forms["frmOnline"]["txtEmail"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
            alert("Not a valid e-mail address");
            txtEmail.focus();
            return false;
        }
        //address validation

        if (Address1.value == "") {
            alert("Enter your address line1");
            txtAddress1.focus();
            return false;
        }
        //address validation

        if (Address2.value == "") {
            alert("Enter your address line1");
            txtAddress2.focus();
            return false;
        }
        if (Conditions.value == "") {

            alert("Please Select Any One");
            Conditions.focus();
            return false;
        }
        //mobile Validation
        if (Phone.value == "") {
            alert("Please Enter your Phone number");
            txtPhone.focus();
            return false;
        }
        if (Phone.value != "") {
            var reg = /^[987][0-9]{9}$/;
            if (reg.test(Phone.value) == false) {
                alert("Plase Enter Correct Phone Number");
                txtPhone.focus();
                return false;
            }
        }
        //Mobile Validation Completed
        //Condtion validtion
        if (chkConditions.checked == false) {
            alert("Please Check the Terms and Conditions");
            chkConditions.focus();
            return false;
        }
        return true;
    }
   $('#example-form').bootstrapValidator({
       fields:{

           validateText:{
               validators:{
                   notEmpty:{
                       message:'name should not be empty'
                   }
               }
           },
           validateEmail: {
               validators: {
                   notEmpty: {
                       message: 'The email address is required'
                   },
                   emailAddress: {
                       message: 'The input is not a valid email address'
                   }
               }
           },
           validatePhone:{
               notEmpty: {
                   message: 'The phone number is required'
               }
           },
           validateLength:{
               notEmpty:{
                   message:''
               }
           }
       }

   })
    $(document).ready(function() {
        $('#tryitForm').bootstrapValidator({
            fields: {
                firstName: {
                    validators: {
                        notEmpty: {
                            message: 'The first name is required and cannot be empty'
                        }
                    }
                },
                lastName: {
                    validators: {
                        notEmpty: {
                            message: 'The last name is required and cannot be empty'
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
                gender: {
                    validators: {
                        notEmpty: {
                            message: 'The gender is required'
                        }
                    }
                }
            },
            submitHandler: function(validator, form, submitButton) {
                var fullName = [validator.getFieldElements('firstName').val(),
                    validator.getFieldElements('lastName').val()
                ].join(' ');
                $('#helloModal')
                    .find('.modal-title').html('Hello ' + fullName).end()
                    .modal();
            }
        });
    });

 $(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
 $("input[type=password]").keyup(function(){
    var ucase = new RegExp("[A-Z]+");
    var lcase = new RegExp("[a-z]+");
    var num = new RegExp("[0-9]+");

    if($("#password1").val().length >= 8){
        $("#8char").removeClass("glyphicon-remove");
        $("#8char").addClass("glyphicon-ok");
        $("#8char").css("color","#00A41E");
    }else{
        $("#8char").removeClass("glyphicon-ok");
        $("#8char").addClass("glyphicon-remove");
        $("#8char").css("color","#FF0004");
    }

     if (ucase.test($("#password1").val())) {
        $("#ucase").removeClass("glyphicon-remove");
        $("#ucase").addClass("glyphicon-ok");
        $("#ucase").css("color","#00A41E");
    }else{
        $("#ucase").removeClass("glyphicon-ok");
        $("#ucase").addClass("glyphicon-remove");
        $("#ucase").css("color","#FF0004");
    }

     if (lcase.test($("#password1").val())) {
        $("#lcase").removeClass("glyphicon-remove");
        $("#lcase").addClass("glyphicon-ok");
        $("#lcase").css("color","#00A41E");
    }else{
        $("#lcase").removeClass("glyphicon-ok");
        $("#lcase").addClass("glyphicon-remove");
        $("#lcase").css("color","#FF0004");
    }

     if (num.test($("#password1").val())) {
        $("#num").removeClass("glyphicon-remove");
        $("#num").addClass("glyphicon-ok");
        $("#num").css("color","#00A41E");
    }else{
        $("#num").removeClass("glyphicon-ok");
        $("#num").addClass("glyphicon-remove");
        $("#num").css("color","#FF0004");
    }

     if ($("#password1").val() == $("#password2").val()) {
        $("#pwmatch").removeClass("glyphicon-remove");
        $("#pwmatch").addClass("glyphicon-ok");
        $("#pwmatch").css("color","#00A41E");
    }else{
        $("#pwmatch").removeClass("glyphicon-ok");
        $("#pwmatch").addClass("glyphicon-remove");
        $("#pwmatch").css("color","#FF0004");
    }
});

 $(document).ready(function() {
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup, change', function() {
        var $group = $(this).closest('.input-group'),
            $addon = $group.find('.input-group-addon'),
            $icon = $addon.find('span'),
            state = false;

        if (!$group.data('validate')) {
            state = $(this).val() ? true : false;
        }else if ($group.data('validate') == "email") {
            state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
        }else if($group.data('validate') == 'phone') {
            state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
        }else if ($group.data('validate') == "length") {
            state = $(this).val().length >= $group.data('length') ? true : false;
        }else if ($group.data('validate') == "number") {
            state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
        }

        if (state) {
                $addon.removeClass('danger');
                $addon.addClass('success');
                $icon.attr('class', 'glyphicon glyphicon-ok');
        }else{
                $addon.removeClass('success');
                $addon.addClass('danger');
                $icon.attr('class', 'glyphicon glyphicon-remove');
        }
    });
});

 //Phone validation

 var telInput = $("#phone"),
     errorMsg = $("#error-msg"),
     validMsg = $("#valid-msg");

 // initialise plugin
 telInput.intlTelInput({
     utilsScript: "../../public/assets/vendors/intl-tel-input/lib/libphonenumber/build/utils.js"
 });

 // on blur: validate
 telInput.blur(function () {
     if ($.trim(telInput.val())) {
         if (telInput.intlTelInput("isValidNumber")) {
             validMsg.removeClass("hide");
         } else {
             telInput.addClass("error");
             errorMsg.removeClass("hide").addClass("error");
             validMsg.addClass("hide");
         }
     }
 });

 // on keydown: reset
 telInput.keydown(function () {
     telInput.removeClass("error");
     errorMsg.addClass("hide");
     validMsg.addClass("hide");
 });
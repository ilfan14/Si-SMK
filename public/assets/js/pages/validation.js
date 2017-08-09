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
 
 function Validation() {


        // // get variable from HTML
        // var username = document.FormKiriSatuNO.iusername;
        // var password = document.FormKiriSatuNO.ipassword;
        // var Name = document.FormKiriSatuNO.inama;
        // var tempatlahir = document.FormKiriSatuNO.itempatlahir;
        // var tgllahir = document.FormKiriSatuNO.itanggallahir;
        // var Email = document.FormKiriSatuNO.iemail;
        // var Address1 = document.FormKiriSatuNO.ialamat;
        var Phone = document.FormKiriSatuNO.inotujaun;


        // validation username

        // if (username.value == "") {
        //     alert("Username Harus diisi");
        //     username.focus();
        //     return false;

        // }

        // // end validation username

        // // validation password

        // if (password.value == "") {
        //     alert("Password Harus Diisi");
        //     password.focus();
        //     return false;

        // }

        // // end validation password


        // // name validation
        // if (Name.value == "") {
        //     alert("Masukan Nama Anda");
        //     Name.focus();
        //     return false;

        // }

        // if (Name.value != "") {
        //     var ck_name = /^[A-Za-z ]{3,50}$/;
        //     if (!ck_name.test(Name.value)) {
        //         alert("Nama tidak boleh mengandung angka dan tidak lebih dari 30 karakter");
        //         Name.focus();
        //         return false;
        //     }
        // }
        // // name validation end


        // // tempat lahir validation
        // if (tempatlahir.value == "") {
        //     alert("Tempat Lahir harus diisi");
        //     tempatlahir.focus();
        //     return false;

        // }

        // if (tempatlahir.value != "") {
        //     var ck_tempatlahir = /^[A-Za-z ]{3,50}$/;
        //     if (!ck_tempatlahir.test(tempatlahir.value)) {
        //         alert("Tempat Lahir tidak boleh mengandung angka dan tidak lebih dari 30 karakter");
        //         tempatlahir.focus();
        //         return false;
        //     }
        // }
        // // tempat lahir validation end

        // // Tanggal lahir validation
        // if (tgllahir.value == "") {
        //     alert("Isi Tanngal lahir Anda");
        //     tgllahir.focus();
        //     return false;

        // }

        // // Tangagl lahir validation end


        // //email validation
        // if (Email.value == "") {
        //     alert("Masukan Email anda, jika tidak mempunyai email inputkan a@a.com");
        //     Email.focus();
        //     return false;
        // }


        // var x = document.forms["FormKiriSatuNO"]["iemail"].value;
        // var atpos = x.indexOf("@");
        // var dotpos = x.lastIndexOf(".");
        // if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
        //     alert("Alamat Email Tidak Valid");
        //     Email.focus();
        //     return false;
        // }
        // //address validation

        // if (Address1.value == "") {
        //     alert("Masukan alamat anda!");
        //     Address1.focus();
        //     return false;
        // }
        //address validation

       
       // phone validation
        if (Phone.value != "") {
            var ck_phone = /^[0-9 ]{5,12}$/;
            if (!ck_phone.test(Phone.value)) {
                alert("Masukan Nomor Handphone Yang benar contoh : 089694201527");
                Phone.focus();
                return false;
            }
        }
        //Mobile Validation Completed
        return true;
    }
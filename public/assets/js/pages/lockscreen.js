$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if (textfield.val() !== "") {
                    //$("body").scrollTo("#output");
                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back Admin");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                    "height":"0",
                    "padding":"0",
                    "margin":"0",
                    "opacity":"0"
                    });
                    //change button text 
                    $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-success").click(function(){

                        window.location.href = '../admin';
                    });
                    
                    //show avatar
                    $(".avatar").css({
                        "background-image": "url('../assets/img/img_holder/400-x-699-green.jpg')"
                    });
                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter Your Password ");
                }
                //console.log(textfield.val());

            });
});

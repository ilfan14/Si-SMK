$(document).ready(function () {
    $(document).mousemove(function (event) {
        TweenLite.to($('body'), .5, {css: {'background-position': parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"}});
    });

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].minimal-blue').iCheck({
        checkboxClass: 'icheckbox_minimal-blue'
    });
});
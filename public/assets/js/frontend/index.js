
// skills sliders
$(document).ready(function() {
    $('#myStat3').circliful();
    $('#myStat4').circliful();
    $('#myStat5').circliful();
    $('#myStat6').circliful();
    //accordians tab panels toggle buttons
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
    });
});

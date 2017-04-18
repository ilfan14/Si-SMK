$(document).ready(function() {
//accordians tab panels toggle buttons
$('.collapse').on('shown.bs.collapse', function() {
$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function() {
$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});
});
$("li.bg-primary").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
   $("#invoice, #footer-bg").addClass("bg-primary");
});
$("li.bg-success").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
    $("#invoice, #footer-bg").addClass("bg-success");
});
$("li.bg-warning").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
    $("#invoice, #footer-bg").addClass("bg-warning");
});
$("li.bg-danger").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
    $("#invoice, #footer-bg").addClass("bg-danger");
});
$("li.bg-info").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
    $("#invoice, #footer-bg").addClass("bg-info");
});

$("li.bg-default").click(function(){
    $("#invoice, #footer-bg").removeAttr('class');
    $("#invoice, #footer-bg").addClass("bg-default");
});

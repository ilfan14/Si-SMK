$("[data-toggle='popover']").popover();

$('.po-markup > .po-link').popover({
    html: true, // must have if HTML is contained in popover

    // get the title and conent
    title: function() {
        return $(this).parent().find('.po-title').html();
    },
    content: function() {
        return $(this).parent().find('.po-body').html();
    },

    container: 'body',
    placement: 'right'

});


$(".tooltip-examples a").tooltip({
    placement: 'top'
});



$('#myTabContent').slimscroll({
    height: '130px',
    size: '3px',
    color: '#D84A38',
    opacity: 1

});
$('#slim1').slimscroll({
    height: '100px',
    size: '3px',
    color: '#D84A38',

    opacity: 1

});
$('#slim2').slimscroll({
    height: '120px',
    size: '3px',
    color: '#35AA47',
    opacity: 1
});
$('#slim3').slimscroll({
    height: '100px',
    size: '3px',
    color: '#FE6A0A',
    opacity: 1
});
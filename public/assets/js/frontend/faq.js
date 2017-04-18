$('.collapse').on('shown.bs.collapse', function() {
    $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function() {
    $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});

$(function() {
    gallery();
});

function gallery() {
    function mixitup() {
        $("#faq").mixItUp({
            animation: {
                duration: 300,
                effects: "fade translateZ(-360px) stagger(34ms)",
                easing: "ease"

            }
        });
    }

    mixitup();
}

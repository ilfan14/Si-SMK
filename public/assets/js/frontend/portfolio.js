// portfolio page//
$(function() {  
    gallery();
});

function gallery(){
    function mixitup() {
        $("#gallery").mixItUp({
            animation: {
                duration: 300,
                effects: "fade translateZ(-360px) stagger(34ms)",
                easing: "ease"
               
            }
        });
    }

    mixitup();
}
$(document).ready(function(){
    $(".fancybox").fancybox();
});

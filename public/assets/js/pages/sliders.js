$(function($) {
    $("#example_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });
    $("#example_2").ionRangeSlider({
        min: 1000,
        max: 100000,
        from: 30000,
        to: 90000,
        type: 'double',
        step: 500,
        postfix: " &euro;",
        hasGrid: true
    });
    $("#example_3").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });
    $("#example_4").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        type: 'single',
        step: 1,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });
    $("#example_5").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });
    $("#example_6").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " light years",
        from: 55000,
        hideMinMax: false,
        hideFromTo: true
    });
    $("#example_7").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " light years",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });
    $("#example_8").ionRangeSlider({
        min: 1000000,
        max: 100000000,
        type: "double",
        postfix: " р.",
        step: 10000,
        from: 25000000,
        to: 35000000,
        onChange: function(obj) {
            delete obj.input;
            delete obj.slider;
            var t = "Range Slider value: " + JSON.stringify(obj, "", 2);

            $("#result").html(t);
        },
        onLoad: function(obj) {
            delete obj.input;
            delete obj.slider;
            var t = "Range Slider value: " + JSON.stringify(obj, "", 2);

            $("#result").html(t);
        }
    });

    $("#updateLast").on("click", function() {
        $("#example_8").ionRangeSlider("update", {
            min: Math.round(10000 + Math.random() * 40000),
            max: Math.round(200000 + Math.random() * 100000),
            step: 1,
            from: Math.round(40000 + Math.random() * 40000),
            to: Math.round(150000 + Math.random() * 80000)
        });

    });
});
$(document).ready(function() {
    /* Example 1 */
    $('#ex1').bootstrapSlider({
        formater: function(value) {
            return 'Current value: ' + value;
        }
    });

    /* Example 2 */
    $("#ex2").bootstrapSlider({});

    /* Example 3 */
    var RGBChange = function() {
        $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
    };

    var r = $('#R').bootstrapSlider()
        .on('slide', RGBChange)
        .data('slider');
    var g = $('#G').bootstrapSlider()
        .on('slide', RGBChange)
        .data('slider');
    var b = $('#B').bootstrapSlider()
        .on('slide', RGBChange)
        .data('slider');

    /* Example 4 */
    $("#ex4").bootstrapSlider({
        reversed: true
    });

    /* Example 5 */
    $("#ex5").bootstrapSlider();
    $("#destroyEx5Slider").click(function() {
        $("#ex5").slider('destroy');
    });

    /* Example 6 */
    $("#ex6").bootstrapSlider();
    $("#ex6").on('slide', function(slideEvt) {
        $("#ex6SliderVal").text(slideEvt.value);
    });

    /* Example 7 */
    $("#ex7").bootstrapSlider();
    $("#ex7-enabled").click(function() {
        if (this.checked) {
            $("#ex7").bootstrapSlider("enable");
        } else {
            $("#ex7").bootstrapSlider("disable");
        }
    });

    /* Example 8 */
    $("#ex8").bootstrapSlider({
        tooltip: 'always'
    });

    /* Example 9 */
    $("#ex9").bootstrapSlider({
        step: 0.01,
        value: 8.115
    });
});
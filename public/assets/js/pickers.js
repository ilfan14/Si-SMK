$(function() {
    $('#t1').clockface();
});

$(function() {
    $('#t3').clockface({
        format: 'H:mm'
    }).clockface('show', '14:30');
});

$(function() {
    $('#t2').clockface({
        format: 'HH:mm',
        trigger: 'manual'
    });

    $('#toggle-btn').click(function(e) {
        e.stopPropagation();
        $('#t2').clockface('toggle');
    });
});
<!--panel js-->
$(function() {
    //Colorpicker
    $(".demo1").colorpicker();

    $(".demo2").colorpicker({
        format: 'rgb'
    });

    $(".demo3").colorpicker();
    $(".demo4").colorpicker();
    $(".demo5").colorpicker();

    // Disabled / enabled triggers
    $(".disable-button").click(function(e) {
        e.preventDefault();
        $("#enable_disable").colorpicker('disable');
    });

    $(".enable-button").click(function(e) {
        e.preventDefault();
        $("#enable_disable").colorpicker('enable');
    });
});
//Timepicker
$('#timepicker1').timepicker({
    showInputs: false

});
$('#timepicker2').timepicker({
    minuteStep: 5,
    showInputs: false,
    disableFocus: true
});
$('#timepicker3').timepicker({

    showSeconds: true,
    showMeridian: false,
    defaultTime: false
});

$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 1
});

$(".form_datetime0").datetimepicker({
    format: "dd MM yyyy - hh:ii"
});
$(".form_datetime2").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true,
    todayBtn: true,
    pickerPosition: "bottom-left"
});
$(".form_datetime3").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    autoclose: true,
    todayBtn: true,
    startDate: "2013-02-14 10:00",
    minuteStep: 10
});
$(".form_datetime4").datetimepicker({
    format: "dd MM yyyy - hh:ii",
    linkField: "mirror_field",
    linkFormat: "yyyy-mm-dd hh:ii"
});
$(".form_datetime5").datetimepicker({
    format: "dd MM yyyy - HH:ii P",
    showMeridian: true,
    autoclose: true,
    todayBtn: true
});

$("input[name='demo1']").TouchSpin({
    min: 0,
    max: 100,
    step: 0.1,
    decimals: 2,
    boostat: 5,
    maxboostedstep: 10,
    postfix: '%'
});

$("input[name='demo2']").TouchSpin({
    min: -1000000000,
    max: 1000000000,
    stepinterval: 50,
    maxboostedstep: 10000000,
    prefix: '$'
});

$("input[name='demo_vertical']").TouchSpin({
    verticalbuttons: true
});

$("input[name='demo_vertical2']").TouchSpin({
    verticalbuttons: true,
    verticalupclass: 'glyphicon glyphicon-plus',
    verticaldownclass: 'glyphicon glyphicon-minus'
});

$("input[name='demo3']").TouchSpin();

$("input[name='demo3_21']").TouchSpin({
    initval: 40
});

$("input[name='demo3_22']").TouchSpin({
    initval: 40
});

$("input[name='demo4']").TouchSpin({
    postfix: "a button",
    postfix_extraclass: "btn btn-default"
});

$("input[name='demo4_2']").TouchSpin({
    postfix: "a button",
    postfix_extraclass: "btn btn-default"
});

$("input[name='demo5']").TouchSpin({
    prefix: "pre",
    postfix: "post"
});

$("input[name='demo6']").TouchSpin({
    buttondown_class: "btn btn-link",
    buttonup_class: "btn btn-link"
});

$(document).ready(function() {
    $('.multiselect').multiselect();
    $('#example2').multiselect();
    $('#example27').multiselect({
        includeSelectAllOption: true
    });

    // Add options for example 28.
    for (var i = 1; i <= 100; i++) {
        $('#example28').append('<option value="' + i + '">' + i + '</option>');
    }

    $('#example28').multiselect({
        includeSelectAllOption: true,
        enableFiltering: true,
        maxHeight: 150
    });

    $('#example28-values').on('click', function() {
        var values = [];

        $('option:selected', $('#example28')).each(function() {
            values.push($(this).val());
        });

        alert(values);
    })

    $('#example3').multiselect({
        buttonClass: 'btn btn-link'
    });
    $('#example6').multiselect();

    $('#example9').multiselect({
        onChange: function(element, checked) {
            alert('Change event invoked!');
            console.log(element);
        }
    });

    $('#example13').multiselect();

    $('#example19').multiselect();

    $('#example35').multiselect();
    $('#example35-enable').on('click', function() {
        $('#example35').multiselect('enable');
    });
    $('#example35-disable').on('click', function() {
        $('#example35').multiselect('disable');
    });
});
$("[name='my-checkbox']").bootstrapSwitch();
$(function(){
      $('#customize-spinner').spinner('changed',function(e, newVal, oldVal){
        $('#old-val').text(oldVal);
        $('#new-val').text(newVal);
      });
    })
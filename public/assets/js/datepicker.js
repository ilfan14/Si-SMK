$("#daterange1").daterangepicker({
    locale: {
        format: 'MM/DD/YYYY'
    }
});
$("#daterange2").daterangepicker({
    timePicker:true,
    timePickerIncrement: 30,
    format: 'MM/DD/YYYY HH:mm A',
    showShortcuts: false,
    time: {
        enabled: true
    }
});

function cb(start, end) {
    $('#daterange3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}
cb(moment().subtract(29, 'days'), moment());

$('#daterange3').daterangepicker({
    ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cb);

$("#rangepicker4").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });


//datetimepicker


$("#datetime1").datetimepicker().parent().css("position :relative");
$("#datetime2").datetimepicker({
    format: 'LT'
}).parent().css("position :relative");
$("#datetime3").datetimepicker({
    viewMode: 'years'
}).parent().css("position :relative");
$("#datetime4").datetimepicker({
    viewMode: 'years',
    format: 'MM/YYYY'
}).parent().css("position :relative");
$("#datetime5").datetimepicker({
    inline: true,
    sideBySide: true
});
//dtetime picker end

//clockface picker
$("#clockface1").clockface();

$("#clockface2").clockface();

$("#clockface3").clockface({
    format: 'H:mm'
}).clockface('show', '14:30');
//clockface picker end
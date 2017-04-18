$('input[type="radio"],input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%' // optional
});

function format(state) {
    if (!state.id) return state.text; // optgroup
    return "<img class='flag' src='assets/img/countries_flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
}

$("#countries").select2({
    placeholder: "Select a Country",
    theme:'bootstrap',
    allowClear: true,
    formatResult: format,
    formatSelection: format,
    templateResult: format,
    escapeMarkup: function (m) {
        return m;
    }
});

$(function() {
    $( "#datepicker" ).datetimepicker({
        format: 'yyyy-mm-dd',
        keepOpen: false
    });
});

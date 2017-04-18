$(document).ready(function() {

    function ini_events(ele) {
        ele.each(function() {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1070,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });
    }
    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        //Random events
        events: [{
            title: 'Team Out',
            start: new Date(y, m, 2),
            backgroundColor: "#F89A14"
        }, {
            title: 'Client Meeting',
            start: new Date(y, m, d - 2),
            end: new Date(y, m, d - 5),
            backgroundColor: "#418BCA"
        }, {
            title: 'Repeating Event',
            start: new Date(y, m, 6)
        }, {
            title: 'Birthday Party',
            start: new Date(y, m, 12),
            backgroundColor: "#00bc8c"
        }, {
            title: 'Product Seminar',
            start: new Date(y, m, 16),
            backgroundColor: "#A9B6BC"
        }, {
            title: 'Anniversary Celebrations',
            start: new Date(y, m, 26),
            backgroundColor: "#F89A14"
        }, {
            title: 'Client Meeting',
            start: new Date(y, m, 10),
            backgroundColor: "#5bc0de"
        }],
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        }
    });

    /* ADDING EVENTS */
    var currColor = "#418BCA"; //default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function(e) {
        e.preventDefault();
        //Save color
        currColor = $(this).css("background-color");
        //Add color effect to button
        colorChooser
            .css({
                "background-color": currColor,
                "border-color": currColor
            })
            .html($(this).text() + ' <span class="caret"></span>');
    });
    $("#add-new-event").click(function(e) {
        e.preventDefault();
        //Get value and make sure it is not null
        var val = $("#new-event").val();
        if (val.length == 0) {
            return;
        }

        //Create event
        var event = $("<div />");
        event.css({
            "background-color": currColor,
            "border-color": currColor,
            "color": "#fff"
        }).addClass("external-event");
        event.html(val);
        $('#external-events').prepend(event);

        //Add draggable funtionality
        ini_events(event);

        //Remove event from text input
        $("#new-event").val("");
    });
});
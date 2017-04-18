     //sparkline
            $("#sparkline_bar").sparkline([9, 11, 12, 13, 12, 13, 10, 14, 13, 11, 11, 12, 11, 11, 10, 12, 11], {
                type: 'bar',
                width: '100',
                barWidth: 5,
                height: '55',
                barColor: '#fff',
               negBarColor: '#fff'
            });

            $("#sparkline_line").sparkline([9, 10, 9, 10, 10, 11, 12, 10, 10, 11, 11, 12, 11, 10, 12, 11, 10, 12], {
                type: 'line',
                width: '100',
                height: '55',
                fillColor:'#fff',
                lineColor: '#fff'
            });

    /* Calendar */


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
                    right: 'month'
                },
                //Random events
                events: [{
                        title: 'Team Out',
                        start: new Date(y, m, 1),
                        backgroundColor: ('#418BCA')
                    },{
                    title: 'Long Event',
                    start: new Date(y, m, d - 8),
                    end: new Date(y, m, d - 4),
                    backgroundColor: "#F89A14",
                    borderColor: "#F89A14"
                    },

                     {
                       title: 'Holiday',
                       start: new Date(y, m,  10),
                       backgroundColor: ('#01BC8C')
                    }, {
                       title: 'Seminar',
                       start: new Date(y, m, 12),
                       backgroundColor: ('#67C5DF')
                    },{
                       title: 'Anniversary Celebrations',
                       start: new Date(y, m, 22),
                       backgroundColor: ('#EF6F6C')
                    },{
                       title: 'Event Day',
                       start: new Date(y, m, 31),
                       backgroundColor: ('#EF6F6C')
                    },{
                    title: 'Client Meeting',
                    start: new Date(y, m,  28),
                    end: new Date(y, m,30),
                    backgroundColor: "#A9B6BC",
                    borderColor: "#A9B6BC"
                    }],
                editable: true,
                droppable: false,
                 height:450
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
    /* realtime chart */
    var data = [], totalPoints = 300;
        function getRandomData() {
            if (data.length > 0)
                data = data.slice(1);

            // do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i)
                res.push([i, data[i]])
            return res;
        }

        // setup control widget
        var updateInterval = 30;
        $("#updateInterval").val(updateInterval).change(function () {
            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                if (updateInterval < 1)
                    updateInterval = 1;
                if (updateInterval > 2000)
                    updateInterval = 2000;
                $(this).val("" + updateInterval);
            }
        });


         if($("#realtimechart").length)
        {
            var options = {
                series: { shadowSize: 1 },
                lines: { fill: true, fillColor: { colors: [ { opacity: 1 }, { opacity: 0.1 } ] }},
                yaxis: { min: 0, max: 100 },
                xaxis: { show: false },
                colors: ["rgba(65,139,202,0.5)"],
                grid: { tickColor: "#dddddd",
                        borderWidth: 0
                }
            };
            var plot = $.plot($("#realtimechart"), [ getRandomData() ], options);
            function update() {
                plot.setData([ getRandomData() ]);
                // since the axes don't change, we don't need to call plot.setupGrid()
                plot.draw();

                setTimeout(update, updateInterval);
            }

            update();
        }
        // top menu

     var useOnComplete = false,
         useEasing = false,
         useGrouping = false,
         options = {
             useEasing : useEasing, // toggle easing
             useGrouping : useGrouping, // 1,000,000 vs 1000000
             separator : ',', // character to use as a separator
             decimal : '.' // character to use as a decimal
         }

     var demo = new CountUp("myTargetElement1", 12.52, 9500, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement2", 1, 100, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement3", 24.02, 5000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement4", 1254, 8000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement1.1", 1254, 98000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement1.2", 1254, 396000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement2.1", 154, 920, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement2.2", 2582, 3929, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement3.1", 2582, 42000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement3.2", 25858, 173929, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement4.1", 2544, 56000, 0, 6, options);
        demo.start();
        var demo = new CountUp("myTargetElement4.2", 1584, 219864, 0, 6, options);
        demo.start();
        var my_posts = $("[rel=tooltip]");

            var size = $(window).width();
            for (i = 0; i < my_posts.length; i++) {
                the_post = $(my_posts[i]);

                if (the_post.hasClass('invert') && size >= 767) {
                    the_post.tooltip({
                        placement: 'left'
                    });
                    the_post.css("cursor", "pointer");
                } else {
                    the_post.tooltip({
                        placement: 'right'
                    });
                    the_post.css("cursor", "pointer");
                }
            }
    //Percentage Monitor
              $(document).ready(function()

        {

            /** BEGIN WIDGET PIE FUNCTION **/
            if ($('.widget-easy-pie-1').length > 0)
            {
                $('.widget-easy-pie-1').easyPieChart({
                    easing: 'easeOutBounce',
                    barColor : '#F9AE43',
                    lineWidth: 5
                });
            }
            if ($('.widget-easy-pie-2').length > 0)
            {
                $('.widget-easy-pie-2').easyPieChart({
                    easing: 'easeOutBounce',
                    barColor : '#F9AE43',
                    lineWidth: 5,
                    onStep: function(from, to, percent) {
                        $(this.el).find('.percent').text(Math.round(percent));
                    }
                });
            }

            if ($('.widget-easy-pie-3').length > 0)
            {
                $('.widget-easy-pie-3').easyPieChart({
                    easing: 'easeOutBounce',
                    barColor : '#EF6F6C',
                    lineWidth: 5
                });
            }
            /** END WIDGET PIE FUNCTION **/



        });

    //world map
    $(function(){
      $('#world-map-markers').vectorMap({
        map: 'world_mill_en',
        scaleColors: ['#C8EEFF', '#0071A4'],
        normalizeFunction: 'polynomial',
        hoverOpacity: 0.7,
        hoverColor: false,
        markerStyle: {
          initial: {
            fill: '#EF6F6C',
            stroke: '#383f47'
          }
        },
        backgroundColor: '#515763',
        markers: [
            {latLng: [60,-100], name: 'canada - 1222 views'},
            {latLng: [43.93, 12.46], name: 'San Marino- 300 views'},
            {latLng: [47.14, 9.52], name: 'Liechtenstein- 52 views'},
            {latLng: [12.05, -61.75], name: 'Grenada- 5 views'},
            {latLng: [41.90, 12.45], name: 'Vatican City- 1254 views'},
            {latLng: [50, 0], name: 'France - 5254 views'},
            {latLng: [0, 120], name: 'Indonesia - 525 views'},
            {latLng: [-25, 130], name: 'Australia - 4586 views'},
            {latLng: [0, 20], name: 'Africa - 1 views'},
            {latLng: [35, 100], name: 'China -29 views'},
            {latLng: [46, 105], name: 'Mongolia - 2123 views'},
            {latLng: [40, 70], name: 'Kyrgiztan - 24446 views'},
            {latLng: [58, 50], name: 'Russia - 3405 views'},
            {latLng: [35, 135], name: 'Japan - 47566 views'}
        ]
      });
    });
     $(document).ready(function() {
         var composeHeight = $('#calendar').height() + 21 - $('.adds').height();
         $('.list_of_items').slimScroll({
             color: '#A9B6BC',
             height: composeHeight + 'px',
             size: '5px'
         });
     });

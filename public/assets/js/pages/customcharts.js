//start bar chart
    var d1 = [["1", 100],["2", 80],["3", 66],["4", 48],["5", 68],["6", 48],["7",66],["8", 80],["9", 64],["10", 48],["11",64],["12",100]];
    $.plot("#bar-chart", [{
        data: d1,
        label: "Project",
        color: "#F89A14"
    }], {
        series: {
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .6,
                fill: .9
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
         legend: {
             container: '#basicFlotLegend',
            show: true
         },
          tooltip: true,
        tooltipOpts: {
            content: '%s: %y'
        },
       
        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
    //end bar chart 

    //start bar stack
    var d11 = [["Jan", 130],["Feb",63],["Mar", 104],["Apr", 54],["May", 92],["Jun", 150],["Jul", 50],["Aug", 80],["Sep",120],["Oct", 91],["Nov", 79],["Dec", 112]];

    var d12 = [["Jan", 58],["Feb", 30],["Mar", 46],["Apr", 35],["May", 55],["Jun", 46],["Jul", 20],["Aug", 50],["Sep", 50],["Oct", 40],["Nov", 35],["Dec", 57]];
    $.plot("#bar-chart-stacked", [{
        data: d11,
        label: "New Visitor",
        color: "#EF6F6C"
    },{
        data: d12,
        label: "Returning Visitor",
        color: "#01BC8C"
    }], {
        series: {
            stack: !0,
            bars: {
                align: "center",
                lineWidth: 0,
                show: !0,
                barWidth: .5,
                fill: .9
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
         legend: {
             container: '#basicFlotLegend',
            show: true
         },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
    //end bar chart stack
	
//start line chart

        var s2 = [["Jan", 50],["Feb", 80],["Mar", 60],["Apr", 90],["May", 60],["Jun", 80],["Jul", 60]];
        var s1 = [["Jan", 70],["Feb", 100],["Mar", 80],["Apr", 100],["May", 80],["Jun", 90],["Jul", 80]];
        var s3 = [["Jan", 32],["Feb", 41],["Mar", 36],["Apr", 39],["May", 30],["Jun", 44],["Jul", 26]];
        $.plot("#spline-chart", [{
            data: s1,
            label: "product 1",
            color: "#01bc8c"
        },{
            data: s2,
            label: "product 2",
            color: "#01BC8C"
        },{
            data: s3,
            label: "product 3",
            color: "#67C5DF"
        }], {
            series: {
                lines: {
                    show: !1
                },
                splines: {
                    show: !0,
                    tension: .4,
                    lineWidth: 2,
                    fill: 0
                },
                points: {
                    show: !0,
                    radius: 4
                }
            },
            grid: {
                borderColor: "#fafafa",
                borderWidth: 1,
                hoverable: !0
            },
            tooltip: !0,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "#fafafa",
                mode: "categories"
            },
            yaxis: {
                tickColor: "#fafafa"
            },
            shadowSize: 0
        });
   
//end spline chart
     //line chart start
$(function () {
    
    var d1, d2, data, Options;

    d1 = [
        [1262304000000, 100], [1264982400000,560], [1267401600000, 1605], [1270080000000, 1129], 
        [1272672000000, 2163], [1275350400000, 1905], [1277942400000, 2002], [1280620800000, 2917], 
        [1283299200000, 2700], [1285891200000, 2700], [1288569600000, 2100], [1291161600000, 2700]
    ];
 
    d2 = [
        [1262304000000, 434], [1264982400000,232], [1267401600000, 875], [1270080000000, 553],
        [1272672000000, 975], [1275350400000, 1379], [1277942400000, 789], [1280620800000, 1026], 
        [1283299200000, 1240], [1285891200000, 1892], [1288569600000, 1147], [1291161600000, 2256]
    ];

    data = [{ 
        label: "Total visitors", 
        data: d1,
         color: "#EF6F6C"
    }, {
        label: "Total Sales",
        data: d2,
         color: "#418BCA"
    }];
 
   Options = {
        xaxis: {
            min: (new Date(2009, 12, 1)).getTime(),
            max: (new Date(2010, 11, 2)).getTime(),
            mode: "time",
            tickSize: [1, "month"],
            monthNames: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
            tickLength: 0
        },
        yaxis: {

        },
        series: {
            lines: {
                show: true, 
                fill: false,
                lineWidth: 2
            },
            points: {
                show: true,
                radius: 4.5,
                fill: true,
                fillColor: "#ffffff",
                lineWidth: 2
            }
        },
       grid: { 
            hoverable: true, 
            clickable: false, 
            borderWidth: 0 
        },
        legend: {
             container: '#basicFlotLegend',
            show: true
         },
        
        tooltip: true,
        tooltipOpts: {
            content: '%s: %y'
        }
       
    };
 

    var holder = $('#line-chart');

    if (holder.length) {
        $.plot(holder, data, Options );
    }


});
    //line chart end
//start area chart
    var da1 = [["Jan", 50],["Feb", 80],["Mar", 60],["Apr", 90],["May", 60],["Jun", 80],["Jul", 80]];
    var da2 = [["Jan", 20],["Feb", 40],["Mar", 30],["Apr", 40],["May", 30],["Jun", 30],["Jul", 50]];
    $.plot("#area-chart", [{
        data: da1,
        label: "Product 1",
        color: "#418BCA"
    },{
        data: da2,
        label: "product 2",
        color: "#fafafa"
    }], {
        series: {
            lines: {
                show: !0,
                fill: .8
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
    //end  area chart
     //start spline area chart 
    var ds1 = [["Jan", 50],["Feb", 80],["Mar", 60],["Apr", 90],["May", 60],["Jun", 80],["Jul", 70]];
    var ds2 = [["Jan", 20],["Feb", 40],["Mar", 30],["Apr", 40],["May", 30],["Jun", 30],["Jul", 50]];
    $.plot("#chart-spline", [{
        data: ds1,
        label: "product 1",
        color: "#EF6F6C"
    },{
        data: ds2,
        label: "product 2",
        color: "#fafafa"
    }], {
        series: {
            lines: {
                show: !1
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 2,
                fill: .8
            },
            points: {
                show: !0,
                radius: 4
            }
        },
        grid: {
            borderColor: "#ddd",
            borderWidth: 1,
            hoverable: !0
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%x : %y",
            defaultTheme: false
        },
        xaxis: {
            tickColor: "#ddd",
            mode: "categories"
        },
        yaxis: {
            tickColor: "#ddd"
        },
        shadowSize: 0
    });
    //end spline area chart
    //real time 
     var data = [],
         totalPoints = 300;

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
     var updateInterval = 50;

     // setup plot
     var options = {
         colors: ["#67C5DF"],
         series: {
             shadowSize: 0,
             lines: {
                 show: true,
                 fill: true,
                 fillColor: {
                     colors: [{
                         opacity: 0.5
                     }, {
                         opacity: 0.5
                     }]
                 }
             }
         },
         yaxis: {
             min: 0,
             max: 90
         },
         xaxis: {
             show: false
         },
         grid: {
             backgroundColor: '#fff',
             borderWidth: 1,
             borderColor: '#fff'
         }
     };

     var plot4 = $.plot($("#realtime"), [getRandomData()], options);

     function update() {
         plot4.setData([getRandomData()]);
         // since the axes don't change, we don't need to call plot.setupGrid()
         plot4.draw();
         setTimeout(update, updateInterval);
     }
     update();
 var d8 = [
        [2, 5],
        [3, 6],
        [4, 8],
        [5, 6],
        [6, 2],
        [7, 5],
        [8, 4],
        [9, 1],
        [10, 4],
        [11, 8],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var d9 = [
        [2, 4.5],
        [2.5, 5],
        [4.5, 8],
        [6.5, 2],
        [7.5, 5],
        [9.5, 1],
        [10.5, 4],
        [11.5, 8],
        [12.5, 5],
        [13.5, 6],
        [14.5, 4],
        [15, 3]
    ];
    var plot1 = $.plotAnimator($("#chart1"), [{
        data: d8,
        bars: {
            barWidth: 0.5,
            show: true,
            fill: true,
            fillColor: '#F89A14',
        }
    }, {
        data: d9,
        lines: {
            lineWidth: 3,
            fill: true,
            fillColor: 'rgba(239,111,108,.2)'
        },
        animator: {
            start: $("#start").val(),
            steps: $("#steps").val(),
            duration: $("#duration").val(),
            direction: $("#dir").val()
        }
    }]);
    //animation on bar chart end
    var d0 = [
        [2, 5],
        [4, 8],
        [6, 2],
        [7, 3],
        [10, 4],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var d1 = [
        [2, 5],
        [4, 8],
        [6, 2],
        [7, 3],
        [10, 4],
        [12, 5],
        [13, 6],
        [14, 4]
    ];
    var plot2 = $.plotAnimator($("#chart2"), [{
        data: d1,
        animator: {
            steps: 26,
            duration: 1500,
            start: 0
        },
        points: {
            show: true,
            fill: true,
            radius: 10,
            fillColor: "#418bca"
        },
        label: "Bars"
    }], {
        grid: {
                hoverable: true,
             clickable: true,
             borderColor: '#ddd',
             borderWidth: 0,
             labelMargin: 5,
             backgroundColor: '#fff'
            }
    });
    setTimeout(function() {
        plot2 = $.plotAnimator($("#chart2"), [{
            data: d1,
            points: {
                show: true,
                fill: true,
                radius: 5,
                fillColor: "rgba(239,111,108,0.5)"
            },
            label: "Points",
             color: 'rgba(239,111,108,0.5)'
        }, {
            data: d0,
            animator: {
                steps: 136,
                duration: 1500,
                start: 0
            },
            lines: {
                show: true,
                fill: true,
                fillColor: "rgba(1,188,140,0.5)"
            },
            label: "Evolution",
             color: '#67C5DF'
        }], {
            grid: {
                hoverable: true,
             clickable: true,
             borderColor: '#ddd',
             borderWidth: 0,
             labelMargin: 5,
             backgroundColor: '#fff'
            }
        });

    }, 3000);

    //animation on points ends
    var d5 = [
        [1, 4],
        [2, 2],
        [4, 4],
        [6, 2],
        [8, 4],
        [10, 2],
        [15, 4],
        [20, 2]
    ];
    var d6 = [
        [1, 3],
        [20, 3]
    ];
    var plot3 = $.plotAnimator($("#chart3"), [{
        data: d5,
        animator: {
            steps: 136,
            duration: 2000,
            start: 0
        },
        lines: {
            show: true,
            fill: true,
            fillColor: 'rgba(239,111,108,0.5)'
        },
        label: "Fill this",
         color: 'rgba(239,111,108,0.5)'
    }, {
        data: d6,
        lines: {
            show: true,
            fill: false
        },
        label: "Standard Values",
        color: '#67C5DF'
    }], {
        grid: {
             hoverable: true,
             clickable: true,
             borderColor: '#ddd',
             borderWidth: 0,
             labelMargin: 5,
             backgroundColor: '#fff'
        }
    });

    //animation area ends
    var d2 = [];
    for (var i = 0; i < 20.1; i += 0.1) d2.push([i, Math.sin(i)]);
    var d3 = [
        [0, 0],
        [20, 0]
    ];
    var plot4 = $.plotAnimator($("#chart4"), [{
        data: d2,
        animator: {
            steps: 136,
            duration: 3000,
            start: 0
        },
        lines: {
            show: true,
            fill: true,
            fillColor: 'rgba(65,139,202,0.8)'
        },
        label: "sin(x)",
        color: '#418bca'
    }, {
        data: d3,
        lines: {
            show: true,
            fill: false,
            linecolor: '#fafafa',
         
        }
    }, {
        data: d2,
        lines: {
            show: true,
            fill: false
        }
    }], {
        grid: {
            hoverable: true,
             clickable: true,
             borderColor: '#ddd',
             borderWidth: 0,
             labelMargin: 5,
             backgroundColor: '#fff'
            
        }
    });

    //animation wave ends
   
    $(document).ready(function() {
        $('#myStathalf').circliful();
        $('#myStat').circliful();
        $('#myStathalf2').circliful();
        $('#myStat2').circliful();
    });
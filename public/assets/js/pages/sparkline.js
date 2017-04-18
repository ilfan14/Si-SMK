$("#sparklinebar").sparkline([3, 9, 16, 8, 13, 7, 11], {
        type: 'bar',
        height: '40',
        barWidth: 14,
        barColor: '#00bc8c'
    });

    $("#sparklinebarcolor").sparkline([
        [1, 3],
        [3, 9],
        [4, 16],
        [3, 8],
        [5, 13],
        [2, 7],
        [3, 10]
    ], {
        type: 'bar',
        height: '40',
        barWidth: 12,
        barColor: '#00bc8c'
    });

    $("#sparklineline").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
        type: 'line',
        width: '120',
        height: '30 ',
        lineColor: '#5bc0de',
        fillColor: '#8bd2e5',
        lineWidth: 2,
        spotColor: '#F89A14',
        minSpotColor: '#F89A14',
        maxSpotColor: '#F89A14',
        highlightSpotColor: '#00bc8c',
        highlightLineColor: '#EF6F6C',
        drawNormalOnTop: true
    });

    $("#sparklinebullet").sparkline([10, 12, 12, 9, 7, 7], {
        type: 'bullet',
        performanceColor: '#44abff',
        width: 110,
        height: 30,
        rangeColors: ['#418bca', '#8bacc6', '#b9dbf7']
    });

    $("#sparklinetristate").sparkline([1, 0, 1, -1, -1, 1, -1, 0, 0, 1, 1], {
        type: 'tristate',
        height: '70 ',
        barWidth: 10,
        zeroAxis: true
    });

    $("#sparklinediscrete").sparkline([4, 6, 7, 7, 4, 3, 2, 1, 1, 3, 4, 5, 6, 3, 2, 1, 1, 3, 4, 5, 6, 7, 8], {
        type: 'discrete',
        width: '120',
        height: '30',
        lineColor: '#00bc8c',
        thresholdValue: 4,
        thresholdColor: '#ff0000'
    });

    $("#sparklinepie").sparkline([1, 2, 3], {
        type: 'pie',
        width: '150',
        height: '80 ',
        sliceColors: ['#F89A14', '#00bc8c', '#418bca']
    });

    $("#sparklinebox").sparkline([4, 27, 34, 52, 54, 59, 61, 68, 78, 82, 85, 87, 91, 93, 100], {
        type: 'box',
        width: '120',
        height: '40 ',
        raw: false,
        showOutliers: false,
        boxLineColor: '#cccccc',
        boxFillColor: '#A9B6BC',
        whiskerColor: '#111010',
        outlierLineColor: '#141313',
        medianColor: '#EF6F6C',
        targetColor: '#00bc8c'
    });
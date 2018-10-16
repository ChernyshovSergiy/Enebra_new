$(document).ready( function(){
$(function () {
    $.getJSON('/participants/statistic', function (data) {

        $('#container').highcharts({
            chart: {
                zoomType: 'x'
            },
            title: {
                text: document.getElementById('members').value
            },
            xAxis: {
                type: 'linear',
                                labels: {
                    style: {
                        color: '#292626!important'
                    }
                }
            },
            yAxis: {
                title: {
                    text: document.getElementById('exchange').value
                }
            },
              credits: {
                    enabled: false
                },
            legend: {
                enabled: false
            },
            plotOptions: {
                area: {
                    fillColor: {
                        linearGradient: {
                            x1: 0,
                            y1: 0,
                            x2: 0,
                            y2: 1
                        },
                        stops: [
                            [0, Highcharts.getOptions().colors[0]],
                            [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                        ]
                    },
                    marker: {
                        radius: 2
                    },
                    lineWidth: 1,
                    states: {
                        hover: {
                            lineWidth: 1
                        }
                    },
                    threshold: null
                }
            },
            series: [{
                type: 'area',
                name: document.getElementById('one_member').value,
                data:  data
            }]
        });
    });
});
})

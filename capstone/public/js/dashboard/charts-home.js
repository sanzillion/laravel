
/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function () {

    var stats;
    'use strict';

    //-------------------------------------------------------------------------
    //calling statistics table through ajax
    $.ajax({
        url: '/stat',
        method: 'GET',
        success: function(stat){
          stats = stat;
          console.log(stats);
          barchart();
        }
    });



    // ------------------------------------------------------- //
    // Bar Chart
    // ------------------------------------------------------ //
    function barchart(){

        var BARCHARTHOME = $('#barChartHome');
        var barChartHome = new Chart(BARCHARTHOME, {
            type: 'bar',
            options:
            {
                scales:
                {
                    xAxes: [{
                        display: false
                    }],
                    yAxes: [{
                        display: false
                    }],
                },
                legend: {
                    display: false
                }
            },
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [
                    {
                        label: "Data Set 1",
                        backgroundColor: [
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)'
                        ],
                        borderColor: [
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)',
                            'rgb(121, 106, 238)'
                        ],
                        borderWidth: 1,
                        data: [stats[0].uptime, 
                                stats[1].uptime, 
                                stats[2].uptime, 
                                stats[3].uptime, 
                                stats[4].uptime, 
                                stats[5].uptime, 
                                stats[6].uptime, 
                                stats[7].uptime, 
                                stats[8].uptime, 
                                stats[9].uptime, 
                                stats[10].uptime, 
                                stats[11].uptime]
                    }
                ]
            }
        });
    }
});

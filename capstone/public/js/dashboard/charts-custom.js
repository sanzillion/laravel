/*global $, document*/
$(document).ready(function () {

    var stats;
    var months = [];
    var today = new Date();
    var month = today.getMonth();
    'use strict';
    //-------------------------------------------------------------------------
    //calling statistics table through ajax
    $.ajax({
        url: '/stat',
        method: 'GET',
        success: function(stat){
          stats = stat;
          barchart();
        }
    });

    //get current month - 6
    for(var x = 0; x < 7; x++){
        if(x == 0){
            (month > 5) ? months[x] = month - 6: months[x] = month;;
        }
        else{
            months[x] = months[x-1] + 1;
        }
    }
    console.log(months);

    function barchart(){
        console.log(stats);
        // ------------------------------------------------------- //
        // Charts Gradients
        // ------------------------------------------------------ //
        var ctx1 = $("canvas").get(0).getContext("2d");
        var gradient1 = ctx1.createLinearGradient(150, 129, 150, 300);
        gradient1.addColorStop(0, 'rgba(246, 83, 83, 0.91)');
        gradient1.addColorStop(1, 'rgba(246, 255, 112, 0.94)');

        var gradient2 = ctx1.createLinearGradient(146.000, 50.000, 154.000, 300.000);
        gradient2.addColorStop(0, 'rgba(104, 179, 112, 0.85)');
        gradient2.addColorStop(1, 'rgba(76, 162, 205, 0.85)');

        // ------------------------------------------------------- //
        // Bar Chart
        // ------------------------------------------------------ //
        var BARCHARTEXMPLE    = $('#barChartExample');
        var barChartExample = new Chart(BARCHARTEXMPLE, {
            type: 'bar',
            options: {
                scales: {
                    xAxes: [{
                        display: true,
                        gridLines: {
                            color: '#eee'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        gridLines: {
                            color: '#eee'
                        }
                    }]
                },
            },
            data: {
                labels: [
                    stats[months[0]].month,
                    stats[months[1]].month,
                    stats[months[2]].month,
                    stats[months[3]].month,
                    stats[months[4]].month,
                    stats[months[5]].month,
                    stats[months[6]].month
                        ],
                datasets: [
                    {
                        label: "Visitors",
                        backgroundColor: [
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1
                        ],
                        hoverBackgroundColor: [
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1
                        ],
                        borderColor: [
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1,
                            gradient1
                        ],
                        borderWidth: 1,
                        data: [
                            stats[months[0]].visitor, 
                            stats[months[1]].visitor, 
                            stats[months[2]].visitor, 
                            stats[months[3]].visitor, 
                            stats[months[4]].visitor, 
                            stats[months[5]].visitor, 
                            stats[months[6]].visitor
                        ],
                    },
                    {
                        label: "Members",
                        backgroundColor: [
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2
                        ],
                        hoverBackgroundColor: [
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2
                        ],
                        borderColor: [
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2,
                            gradient2
                        ],
                        borderWidth: 1,
                        data: [
                           stats[months[0]].m_log,
                           stats[months[1]].m_log,
                           stats[months[2]].m_log,
                           stats[months[3]].m_log,
                           stats[months[4]].m_log,
                           stats[months[5]].m_log,
                           stats[months[6]].m_log,
                        ],
                    }
                ]
            }
        });
    }
});

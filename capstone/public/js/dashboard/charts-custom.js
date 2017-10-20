/*global $, document*/
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
        }
    });

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
                labels: ["January", "February", "March", "April", "May", "June", "July"],
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
                        data: [65, 59, 80, 81, 56, 55, 40],
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
                        data: [35, 40, 60, 47, 88, 27, 30],
                    }
                ]
            }
        });
    }
});

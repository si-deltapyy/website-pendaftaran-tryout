/*
 Template Name: Xacton - Admin & Dashboard Template
 Author: Myra Studio
 File: Dashboard
*/

$(function() {
  'use strict';

  if ($('#morris-line-example').length) {
    Morris.Line({
      labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      element: 'morris-line-example',
      gridLineColor: '#eef0f2',
      lineColors: ['#f15050', '#e9ecef'],
      data: [{
          y: '2',
          a: 200
        },
        {
          y: '2014',
          a: 110
        }
      ],
      xkey: 'y',
      ykeys: ['a'],
      hideHover: 'auto',
      resize: true,
      labels: ['Series A']
    });
  }
  if ($('#lineChart').length) {
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var data = {
      labels: ["2013", "2014", "2014", "2015", "2016", "2017", "2018", "2019"],
      datasets: [
        {
          label: 'Apple',
          data: [120, 180, 140, 210, 160, 240, 180, 210],
          borderColor: [
            '#1d84c6'
          ],
          borderWidth: 3,
          fill: false,
          pointBackgroundColor: "#ffffff",
          pointBorderColor: "#1d84c6"
        }
      ]
    };
    var options = {
      scales: {
        yAxes: [{
          gridLines: {
            drawBorder: false,
            borderDash: [3, 3]
          },
          ticks: {
            min: 0
          },
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            color: "#ffffff"
          }
        }]
      },
      elements: {
        line: {
          tension: 0.2
        },
        point: {
          radius: 4
        }
      },
      stepsize: 1
    };
    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: data,
      options: options
    });
  }
});
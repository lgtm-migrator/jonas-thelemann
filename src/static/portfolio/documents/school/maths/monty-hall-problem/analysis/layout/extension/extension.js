//var dataRowElements = document.getElementById('roundsTable').getElementsByClassName('body');
var playerOneElementsLength = 0;
var playerTwoElementsLength = 0;
var playerThreeElementsLength = 0;
var rows = 0;
// var winCountRed = 0;
// var winCountBlue = 0;
// var countRed = 0;
// var countBlue = 0;
var dataRed = [];
var dataBlue = [];

var lineChart = document.getElementById('lineChart');
new Chart(lineChart, {
    type: 'line',
    data: {
        datasets: [{
            label: 'Gewinnwahrscheinlichkeit bei einem Wechseln',
            fill: false,
            lineTension: 0.1,
            backgroundColor: 'rgba(255,0,0,0.4)',
            borderColor: 'rgba(255,0,0,1)',
            borderCapStyle: 'round',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'round',
            pointBorderColor: 'rgba(255,0,0,1)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 2,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: 'rgba(255,0,0,1)',
            pointHoverBorderColor: 'rgba(245,245,245,1)',
            pointHoverBorderWidth: 4,
            pointRadius: 4,
            pointHitRadius: 0,
            data: dataRed,
        },
        {
            label: 'Gewinnwahrscheinlichkeit bei gleicher Wahl',
            fill: false,
            lineTension: 0.1,
            backgroundColor: 'rgba(0,0,255,0.4)',
            borderColor: 'rgba(0,0,255,1)',
            borderCapStyle: 'round',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'round',
            pointBorderColor: 'rgba(0,0,255,1)',
            pointBackgroundColor: '#fff',
            pointBorderWidth: 2,
            pointHoverRadius: 10,
            pointHoverBackgroundColor: 'rgba(0,0,255,1)',
            pointHoverBorderColor: 'rgba(245,245,245,1)',
            pointHoverBorderWidth: 4,
            pointRadius: 4,
            pointHitRadius: 0,
            data: dataBlue,
        }
        ]
    },
    options: {
        showLines: false,
        scales: {
            xAxes: [{
                ticks: {
                    min: 0,
                    max: rows
                },
                type: 'linear',
                position: 'bottom'
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 1
                }
            }]
        }
    }
});
var doughnutChart = document.getElementById('doughnutChart');
new Chart(doughnutChart, {
    type: 'doughnut',
    data: {
        labels: [
            'Tür 1',
            'Tür 2',
            'Tür 3'
        ],
        datasets: [{
            data: [playerOneElementsLength, playerTwoElementsLength, playerThreeElementsLength],
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56'
            ],
            hoverBackgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56'
            ]
        }]
    }
});

document.addEventListener('DOMContentLoaded', function () {
    addPreloaderHtml('roundlist', 'big', 'green');
});

var page = getQueryValue(getQueryArray(window.location.href), 'page');

if (!isNumeric(page)) {
    page = 1;
}

insertDatabaseTableHtml('REDACTED', 'monty-hall-problem', '[{"Spieler":"player"},{"Moderator":"moderator"},{"Auto":"car"},{"Wechsel":"change"}]', '10', page, '[]', 'centered,responsive-table,striped', 'roundlist');

let colordataRequest = new XMLHttpRequest();

colordataRequest.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let response = Dargmuesli.Prototyping.tryParseJSON(colordataRequest.responseText);
        let lineChart = document.getElementById('lineChart');

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
                    data: response['dataRed'],
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
                    data: response['dataBlue'],
                }]
            },
            options: {
                showLines: false,
                scales: {
                    xAxes: [{
                        ticks: {
                            min: 1,
                            max: response['rows']
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
    }
};
colordataRequest.open('GET', 'layout/extension/extension.php?type=colordata', true);
colordataRequest.send();

let playercountsRequest = new XMLHttpRequest();

playercountsRequest.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        let response = Dargmuesli.Prototyping.tryParseJSON(playercountsRequest.responseText);
        let doughnutChart = document.getElementById('doughnutChart');

        new Chart(doughnutChart, {
            type: 'doughnut',
            data: {
                labels: [
                    'Tür 1',
                    'Tür 2',
                    'Tür 3'
                ],
                datasets: [{
                    data: [response[0], response[1], response[2]],
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
    }
};
playercountsRequest.open('GET', 'layout/extension/extension.php?type=playercounts', true);
playercountsRequest.send();

document.addEventListener('DOMContentLoaded', function () {
    Dargmuesli.Html.addPreloaderHtml('roundlist', 'big', 'green');
});

let page = Dargmuesli.Prototyping.getQueryValue(Dargmuesli.Prototyping.getQueryArray(window.location.href), 'page');

if (!Dargmuesli.Prototyping.isNumeric(page)) {
    page = 1;
}

Dargmuesli.Html.insertDatabaseTableHtml('monty_hall_problem', '[{"Spieler":"player"},{"Moderator":"moderator"},{"Auto":"car"},{"Wechsel":"change"}]', '10', page, '[]', 'centered,responsive-table,striped', 'roundlist');

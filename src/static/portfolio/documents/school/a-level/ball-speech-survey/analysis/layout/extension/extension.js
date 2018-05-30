document.addEventListener('DOMContentLoaded', function(event) {
    var barChart = document.getElementById('barChart');
    var myChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Wert',
                data: [],
                backgroundColor: '#FF6384',
                hoverBackgroundColor: '#FE446C'
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    gridLines: {
                        zeroLineColor: 'rgba(0,0,0,0)'
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                labels: {
                    boxWidth: 50,
                    fontSize: 14
                }
            },
            tooltips: {
                bodyFontSize: 14
            }
        }
    });
});

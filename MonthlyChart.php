<!DOCTYPE html>
<html>
<head>
    <title>Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        #cowPerformanceChart {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #f5f5f5;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Monthly Milk Production</h1>
        <div id="cowPerformanceChart">
            <canvas id="chartCanvas"></canvas>
        </div>
    </div>

    <script>
        var labels = ['January', 'Feburary', 'March', 'April', 'May'];
        var chartData = [
            [120, 150, 180, 90, 200],
            [140, 160, 110, 190, 180],
            [110, 130, 100, 70, 190],
            [90, 120, 160, 110, 150],
            [130, 100, 170, 140, 120]
        ];

        var ctx = document.getElementById('chartCanvas').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Milk (Liters)',
                        data: chartData[0],
                        fill: false,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)'
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[1],
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)'
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[2],
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(255, 99, 132, 1)'
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[3],
                        fill: false,
                        borderColor: 'rgba(255, 205, 86, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(255, 205, 86, 1)'
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[4],
                        fill: false,
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        pointRadius: 4,
                        pointBackgroundColor: 'rgba(153, 102, 255, 1)'
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Monthly Milk Production',
                        font: {
                            size: 18,
                            style: 'italic'
                        },
                        align: 'center',
                        padding: 20
                    }
                }
            }
        });
    </script>
</body>
</html>

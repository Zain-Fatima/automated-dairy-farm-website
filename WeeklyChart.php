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
<body><br><br><br>
    <div class="container">
        <h1>Weekly Milk Production</h1>
        <div id="cowPerformanceChart">
            <canvas id="chartCanvas"></canvas>
        </div>
    </div>

    <script>
        var labels = ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'];
        var chartData = [
            [10, 15, 12, 8, 20],
            [14, 16, 11, 9, 18],
            [11, 13, 10, 7, 19],
            [9, 12, 16, 11, 15],
            [13, 10, 17, 14, 12]
        ];

        var ctx = document.getElementById('chartCanvas').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Milk (Liters)',
                        data: chartData[0],
                        backgroundColor: 'rgba(75, 192, 192, 0.8)',
                        borderWidth: 0,
                        barThickness: 40
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[1],
                        backgroundColor: 'rgba(54, 162, 235, 0.8)',
                        borderWidth: 0,
                        barThickness: 40
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[2],
                        backgroundColor: 'rgba(255, 99, 132, 0.8)',
                        borderWidth: 0,
                        barThickness: 40
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[3],
                        backgroundColor: 'rgba(255, 205, 86, 0.8)',
                        borderWidth: 0,
                        barThickness: 40
                    },
                    {
                        label: 'Milk (Liters)',
                        data: chartData[4],
                        backgroundColor: 'rgba(153, 102, 255, 0.8)',
                        borderWidth: 0,
                        barThickness: 40
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
                        },
                        ticks: {
                            stepSize: 5
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    animation: {
                        duration: 2000,
                        easing: 'easeOutBounce'
                    },
                    title: {
                        display: true,
                        text: 'Weekly Milk Production',
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

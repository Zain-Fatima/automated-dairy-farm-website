<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Milk Production</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #cowPerformanceChart {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Milk Record for Last 7 Days</h1>
        <canvas id="cowPerformanceChart"></canvas>
    </div>

    <script>
        var labels = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
        var chartData = [10, 15, 12, 8, 20, 17, 14];
        var ctx = document.getElementById('cowPerformanceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Milk (Liters)',
                    data: chartData,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderWidth: 0,
                    barThickness: 30,
                }]
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
                    animation: {
                        duration: 2000,
                        easing: 'easeOutBounce'
                    }
                }
            }
        });
    </script>

</body>

</html>

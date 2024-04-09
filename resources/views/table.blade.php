<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belajarphp.net - ChartJS</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="Default page" name="description">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <style type="text/css">
    .container {
        width: 50%;
        margin: 15px auto;
    }
    </style>
</head>

<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const ctx = document.getElementById('myChart');



    new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $aidi;?>,
            datasets: [{
                label: '# of Votes',
                data: <?php echo $vals; ?>,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>

</html>
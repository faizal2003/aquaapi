<!DOCTYPE html>
<html lang="en">

<head>
    <title>Belajarphp.net - ChartJS</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta content="Default page" name="description">
    <!-- <script src="resources/js/app.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    const config = {
        type: 'line',
        data: {
            datasets: [{
                label: 'ph',
                borderWidth: 5
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    const mychart = new Chart(ctx, config);

    window.onload = function() {
        Echo.channel('ph-val').listen("PhEvent", (e) => {
            var arrval = JSON.parse(e.phval);
            var arrid = JSON.parse(e.phid);
            // console.log(typeof arrey);
            console.log(arrid);
            // console.log(typeof e.ecval);
            // console.log(e.ecval);

            mychart.config.data.labels = arrid;
            mychart.config.data.datasets[0] = {
                label: 'ph',
                data: arrval,
                borderWidth: 5
            };
            mychart.update('none');
        })
    }
    </script>
</body>

</html>
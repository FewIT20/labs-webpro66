<?php
$url = "http://10.0.15.21/lab/lab12/restapis/products.php?list=10";
$response = file_get_contents($url);
$result = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>65070159 - Peeranat Matsor</title>
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
    <script>
        window.onload = function () {
            var data = <?php echo json_encode($result); ?>;

            var chartData = [];
            for (var i = 0; i < data.length; i++) {
                chartData.push({
                    label: data[i].ProductCode,
                    y: parseFloat(data[i].UnitPrice)
                });
            }

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Price of Products"
                },
                axisY: {
                    title: "Unit Price (in THB)"
                },
                data: [{
                    type: "column",
                    dataPoints: chartData
                }]
            });
            chart.render();
        }
    </script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Price of products</h1>
        <hr>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
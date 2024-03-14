<?php
$url = "http://10.0.15.21/lab/lab12/restapis/10countries.json";
$response = file_get_contents($url);
$result = json_decode($response);
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
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Country Information</h1>
        <div class="row">
            <?php
            foreach ($result as $data) {
                $name = $data->name;
                $capital = $data->capital;
                $population = $data->population;
                $region = $data->region;
                $latlng = $data->latlng;
                $borders = $data->borders;
                $flag = $data->flag;
                ?>
                <div class="col-md-6">
                    <div class="card mt-3">
                        <img src="<?php echo $flag; ?>" class="card-img-top" alt="Flag">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $name; ?>
                            </h5>
                            <p class="card-text">Capital:
                                <?php echo $capital; ?>
                            </p>
                            <p class="card-text">Population:
                                <?php echo $population; ?>
                            </p>
                            <p class="card-text">Region:
                                <?php echo $region; ?>
                            </p>
                            <p class="card-text">Latitude:
                                <?php echo $latlng[0]; ?>, Longitude:
                                <?php echo $latlng[1]; ?>
                            </p>
                            <p class="card-text">Borders:
                                <?php echo implode(", ", $borders); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div class="container-fluid mx-auto">
        <div class="row">
            <?php
            for ($i = 0; $i < 20; $i++) {
                echo "<div class='col-md-3 mb-4'>
                        <img src='https://picsum.photos/200/200?random=$i' class='img-fluid' alt='Image $i'>
                      </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
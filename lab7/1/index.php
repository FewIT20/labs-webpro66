<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>656070159 - Peeranat Matsor</title>
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="mt-5 mb-5">
            <form id="form1" class="form-control"  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <p>
                    <label>Enter a number :</label>
                    <input class="form-control" type="text" id="value" name="value" value="0" />
                </p>
                <input class="btn btn-success" type="submit" id="submit" name="submit" value="Submit">
            </form>
        </div>
        <?php
        if (isset($_POST['value']) && isset($_POST['submit'])) {
            echo '<table class="table table-striped">';
            echo "<thead>";
                $number = intval($_POST['value']);
                for ($i = 1; $i <= 12; $i++) {
                    echo "<tr>";
                    echo '<th scope="col">'.$number.'</th>';
                    echo '<th> x </th>';
                    echo '<th>'.$i.'</th>';
                    echo '<th> = </th>';
                    echo '<th> '.$number*$i.' </th>';
                    echo "</tr>";
                }
                echo "</thead>";
            echo '</table>';
        }
        ?>
    </div>
</body>
</html>
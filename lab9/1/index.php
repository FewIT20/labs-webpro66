<?php
$servername = "localhost";
$username = "S159Y";
$password = "BB85998";
$dbname = "S159Y";

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
    <style>
        body {
            font-family: Kanit;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <?php
            $_error = "";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                echo "<div class='alert alert-danager' role='alert'>".$_error."</div>";
            }
            
            if (isset($_POST['action'])) {
                if (!isset($_POST['record'])) {
                    $_error = "Please enter the record for searching id";
                } else {
                    echo "<table class='table table-responsive'>";
                    echo "<tr><th>Course ID</th><th>Title</th><th>Department</th><th>Credit</th></tr>";
                    $result = mysqli_query($conn, "SELECT * FROM `course`;");
                    if (mysqli_num_rows($result) < $_POST['record']) {
                        $_error = "Not found record";
                    }
                    if (mysqli_num_rows($result) > 0) {
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($count != $_POST['record']) {
                                $count++;
                                continue;
                            }
                            echo "<tr><td>".$row['course_id']."</td><td>".$row['title']."</td><td>".$row['dept_name']."</td><td>".$row['credit']."</td></tr>";
                            break;
                        }
                    }
                    echo "</table>";
                }
            }
            if ($_error != "") {
                echo "<div class='alert alert-danager' role='alert'>".$_error."</div>";
                $_error = "";
            }
        ?>
        <div class="mt-3">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="record">Record ID:</label>
                    <input class="form-control" id="record" name="record" type="number">
                </div>
                <button class="btn btn-success mt-2" name="action" id="action">Display</button>    
            </form>
        </div>
    </div>
</body>
</html>
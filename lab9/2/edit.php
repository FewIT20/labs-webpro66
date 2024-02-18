<?php
$servername = "localhost";
$username = "S159Y";
$password = "BB85998";
$dbname = "S159Y";

// Establishing connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("<div class='alert alert-danger' role='alert'>Connection failed: " . mysqli_connect_error() . "</div>");
}

$course_id = $_GET['id'];
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
        <form method="post" action="process_edit.php">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `course` WHERE `course_id`='$course_id' LIMIT 1");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="form-group mt-3">
                        <label for="course_id">Course ID</label>
                        <input name="course_id" class="form-control" id="course_id" value="<?php echo htmlspecialchars($row['course_id']); ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" id="title" value="<?php echo htmlspecialchars($row['title']); ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="dept_name">Dept. Name</label>
                        <input name="dept_name" class="form-control" id="dept_name" value="<?php echo htmlspecialchars($row['dept_name']); ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="credit">Credits</label>
                        <input name="credit" class="form-control" id="credit" value="<?php echo htmlspecialchars($row['credit']); ?>">
                    </div>
            <?php
                }
            }
            ?>
            <div class="form-group mt-3">
                <input type="hidden" name="course_old_id" value="<?php echo $course_id ?>">
                <a href="./index.php" class="btn btn-primary btn-sm">Back</a>
                <button class="btn btn-success btn-sm" type="submit" name="action">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
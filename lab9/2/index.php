<?php
$servername = "localhost";
$username = "S159Y";
$password = "BB85998";
$dbname = "S159Y";

// Connect to MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo "<div class='alert alert-danger' role='alert'>Failed to connect to database: " . mysqli_connect_error() . "</div>";
}

// Process delete request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['delete_id'])) {
    $course_id = $_GET['delete_id'];
    // Perform deletion query
    mysqli_query($conn, "DELETE FROM course WHERE course_id = '" . $course_id. "' LIMIT 1");
}
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class='table table-responsive'>
                <tr>
                    <th>Course ID</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Credit</th>
                    <th>Action</th>
                </tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM `course`;");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['course_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>
                            <td><?php echo htmlspecialchars($row['dept_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['credit']); ?></td>
                            <td>
                                <a class='btn btn-warning btn-sm' href="./edit.php?id=<?php echo $row['course_id']; ?>">Edit</a>
                                <a class='btn btn-danger btn-sm' href="./index.php?delete_id=<?php echo $row['course_id']; ?>">Delete</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No courses found.</td></tr>";
                }
                ?>
            </table>
        </form>
    </div>
</body>

</html>

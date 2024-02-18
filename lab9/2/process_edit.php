<?php
$servername = "localhost";
$username = "S159Y";
$password = "BB85998";
$dbname = "S159Y";

// Establishing connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $course_old_id = $_POST['course_old_id'];
    $course_new_id = $_POST['course_id'];
    $title = $_POST['title'];
    $dept_name = $_POST['dept_name'];
    $credit = $_POST['credit'];

    $sql = "UPDATE `course` SET `course_id`='$course_new_id', `title`='$title', `dept_name`='$dept_name', `credit`='$credit' WHERE `course_id`='$course_old_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirecting to edit page after successful update
        header("Location: ./edit.php?id=".$course_new_id);
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>

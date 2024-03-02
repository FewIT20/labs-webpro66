<?php

class FewDB extends SQLite3 {

    public function __construct(string $filename) {
        $this->open($filename);
    }

}

$conn = new FewDB("customers.db");
if (!$conn) {
    echo $conn->lastErrorMsg();
}
if (isset($_POST['trigger'])) {
    $sql = "DELETE FROM customers WHERE CustomerId = (
        SELECT MAX(CustomerId) FROM customers
    )";
    $conn->query($sql);
    echo "[Watch Dog] - You're currently on ". $_SERVER['REMOTE_ADDR'];
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
        <table class="table table-responsive">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </thead>
            <?php
            $sql = "SELECT CustomerId, FirstName, LastName, Address, Phone, Email FROM customers;";
            $result = $conn->query($sql);
            while ($row = $result->fetchArray(SQLITE3_ASSOC) ) {
                echo "
                <tr>
                    <td>".$row['CustomerId']."</td>
                    <td>".$row['FirstName']." ".$row['LastName']."</td>
                    <td>".$row['Address']."</td>
                    <td>".$row['Phone']."</td>
                    <td>".$row['Email']."</td>
                </tr>
                ";
            }
            ?>
        </table>
        <form method="post">
            <button class="btn btn-success" name="trigger">Delete last row</button>
        </form>
    </div>
</body>
<?php
$conn->close();
?>

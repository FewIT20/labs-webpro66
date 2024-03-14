<?php 
$url = "http://10.0.15.21/lab/lab12/restapis/products.php";
$response = file_get_contents($url);
$result = json_decode($response, true);
$currentID =  $_GET['id'] ?? 0; // Get id from URL
$maxID = count($result); // Get max a size of array

if ($currentID < 1 || $currentID > $maxID) {
    $currentID = 1;
}
$currentID -= 1; // Decrease 1 for array index
$product = $result[$currentID];
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
        <h1 class="mt-5">Product Detail</h1>
        <hr />
        <p><strong>ID : </strong> <?= $product['ProductID'] ?></p>
        <p><strong>Product Code : </strong> <?= $product['ProductCode'] ?></p>
        <p><strong>Product Name : </strong> <?= $product['ProductName'] ?></p>
        <p><strong>Description : </strong> <?= $product['Description'] ?></p>
        <p><strong>Price : </strong> <?= $product['UnitPrice'] ?></p>
        <div class="m-2">
            <?php 
                if ($currentID == 0) {
                    $currentID = 1;
                } else {
                    $currentID = $currentID + 1;
                }
            ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $currentID - 1 ?>" class="btn btn-primary">Previous</a>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?id=<?= $currentID + 1 ?>" class="btn btn-primary">Next</a>
        </div>
    </div>
</body>
</html>
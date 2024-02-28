<?php
$directories = array_filter(scandir('.'), function ($item) {
    return is_dir($item) && !in_array($item, ['.', '..']);
});

usort($directories, function ($a, $b) {
    $aNum = intval(substr($a, 3)); // Extract the numeric suffix from directory name $a
    $bNum = intval(substr($b, 3)); // Extract the numeric suffix from directory name $b
    return $aNum - $bNum; // Compare the numeric suffixes
});

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to workspace EiEi</title>
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;700&display=swap" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Kanit', sans-serif;
        }

        .folder-icon {
            color: blue;
            /* Set the desired color */
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <?php
        echo "<div class='row justify-content-center align-items-center'>
            <div class='col-md-auto text-center'>
            <img src='header.gif' class='img-thumbnail' witdh='20%' height='20%'>
            </div>
            </div>";
        echo '<table class="table table-bordered">';
        echo '<thead class="thead-dark"><tr><th>Folder</th></tr></thead>';
        echo '<tbody>';
        foreach ($directories as $dir) {
            echo '<tr><td><i class="fas fa-folder folder-icon"></i> <a href=' . $_SERVER['REQUEST_URI'] . $dir . '>' . $dir . '</a></td></tr>';
        }
        echo '</tbody>';
        echo '</table>';
        ?>
    </div>
</body>

</html
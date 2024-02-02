<!DOCTYPE html>
<html lang="en">
<?php

$months = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December',
];   

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar of 2024</title>
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="mt-4 mb-4">
            <label for="month">Select month:</label>
            <select name="month" id="month" class="form-control mb-2">
                <?php
                    foreach ($months as $key => $value) {
                        echo "<option value='$key'>$value</option>";
                    }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Show Calender</button>
        </form>
        <?php 

            if (isset($_GET['month'])) {
                $selectedMonth = $_GET['month'];
            } else {
                $selectedMonth = date('n');
            }

            $selectedYear = 2024;
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $selectedMonth, $selectedYear);
            $firstDay = mktime(0, 0, 0, $selectedMonth, 1, $selectedYear);
            $firstDayOfWeek = date('w', $firstDay);

            echo "<h2>Calender of $selectedYear in <code>{$months[$selectedMonth]}</code></h2>";
            echo "<table class='table'>";
            echo "<tr><th>Sun</th><th>Mo</th><th>Tu</th><th>We</th><th>Th</th><th>Fr</th><th>Sa</th></tr>";
            echo "<tr>";

            for ($i = 0; $i < $firstDayOfWeek; $i++) {
                echo "<td></td>";
            }

            for ($day = 1; $day <= $daysInMonth; $day++) {
                echo "<td>$day</td>";

                if (($firstDayOfWeek + $day) % 7 == 0) {
                    echo "</tr><tr>";
                }
            }

            while (($firstDayOfWeek + $day) % 7 != 0) {
                echo "<td></td>";
                $day++;
            }

            echo "</tr>";
            echo "</table>";
        ?>
    </div>
    
</body>
</html>

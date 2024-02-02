<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>65070159</title>
    <link href="http://10.0.15.21/lab/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://10.0.15.21/lab/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <?php
        $_error = "";
        if (isset($_POST['submit'])) {
            if (!isset($_POST['name']) || (isset($_POST['name']) && strlen($_POST['name']) < 5)) {
                $_error .= "** ให้ใส่ค่าที่กรอกไว้ใน FORM ด้วย name ** <br />";
            }
            if (!isset($_POST['address']) || (isset($_POST['address']) && strlen($_POST['address']) < 5)) {
                $_error .= "** ให้ใส่ค่าที่กรอกไว้ใน FORM ด้วย address ** <br />";
            }
            if (!isset($_POST['age']) || (isset($_POST['age']) && strlen($_POST['age']) < 5)) {
                $_error .= "** ให้ใส่ค่าที่กรอกไว้ใน FORM ด้วย age ** <br />";
            }
            if (!isset($_POST['perferssion']) || (isset($_POST['perferssion']) && strlen($_POST['perferssion']) < 5)) {
                $_error .= "** ให้ใส่ค่าที่กรอกไว้ใน FORM ด้วย perferssion ** <br />";
            }
            if (!isset($_POST['resident_status'])) {
                $_error .= "** ให้ใส่ค่าที่กรอกไว้ใน FORM ด้วย status ** <br />";
            }
            if ($_error != "") {
                echo '<div class="alert alert-danger m-2" role="alert">
                        '.$_error.'
                    </div>';
            } else {
                echo '<div class="alert alert-success m-2" role="alert">
                        Name: '.$_POST['name'].'<br />
                        Address: '.$_POST['address'].'<br />
                        Age: '.$_POST['age'].'<br />
                        Perferssion: '.$_POST['perferssion'].'<br />
                        Resident Status: '.$_POST['perferssion'].'<br />
                    </div>';
            }
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="mt-4 mb-4">
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" id="name" name="name">
            </div>
            <div class="form-group mt-2">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="form-group mt-2">
                <label for="perferssion">Profession:</label>
                <input class="form-control" id="perferssion" name="perferssion">
            </div>
            <div class="form-group mt-2">
                <label>Resident status:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="resident_status" id="resident" value="resident">
                    <label class="form-check-label" for="resident">
                        Resident
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="resident_status" id="non_resident" value="non_resident">
                    <label class="form-check-label" for="non_resident">
                        Non-Resident
                    </label>
                </div>
            </div>
            <input class="btn btn-warning mt-2" type="submit" id="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
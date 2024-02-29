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
<?php
$success_msg = "";
$error_msg = "";
$toggle_show_data = false;
if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $employeeId = $_POST['employeeId'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];

    setcookie('firstname', $firstname, time() + (86400), "/");
    setcookie('lastname', $lastname, time() + (86400), "/");
    setcookie('employeeId', $employeeId, time() + (86400), "/");
    setcookie('address', $address, time() + (86400), "/");
    setcookie('phone_num', $phone_num, time() + (86400), "/");
    setcookie('email', $email, time() + (86400), "/");

    $success_msg = "Save employee account successfully.";
}
if (isset($_POST['show'])) {
    if (count($_COOKIE) != 7) {
        $error_msg = "Invaild account data";
    } else {
        $toggle_show_data = true;
        $success_msg = "Show Account ID : " . $_COOKIE['employeeId'];
    }
}
if (isset($_POST['clear'])) {
    setcookie('firstname', null, -1, '/');
    setcookie('lastname', null, -1, '/');
    setcookie('employeeId', null, -1, '/');
    setcookie('address', null, -1, '/');
    setcookie('phone_num', null, -1, '/');
    setcookie('email', null, -1, '/');

    $success_msg = "Destroy all cookie data";
}
?>

<body>
    <form method="post">
        <div class="container mt-5">
            <?php
            if ($success_msg != "") {
                echo '
                <div class="alert alert-secondary" role="alert">
                    ' . $success_msg . '
                </div>';
                $success_msg = "";
            }
            if ($error_msg != "") {
                echo '
                <div class="alert alert-danger" role="alert">
                    ' . $error_msg . '
                </div>';
                $error_msg = "";
            }
            ?>
            <div class="mb-2 row">
                <label for="employeeId" class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="text" class="form-control" id="employeeId" name="employeeId" value="' . $_COOKIE['employeeId'] . '">';
                    } else {
                        echo '<input type="text" class="form-control" id="employeeId" name="employeeId">';
                    }
                    ?>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="firstname" class="col-sm-2 col-form-label">FirstName</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="text" class="form-control" id="firstname" name="firstname" value="' . $_COOKIE['firstname'] . '">';
                    } else {
                        echo '<input type="text" class="form-control" id="firstname" name="firstname">';
                    }
                    ?>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="Lastname" class="col-sm-2 col-form-label">LastName</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="text" class="form-control" id="lastname" name="lastname" value="' . $_COOKIE['lastname'] . '">';
                    } else {
                        echo '<input type="text" class="form-control" id="lastname" name="lastname">';
                    }
                    ?>
                </div>
            </div>

            <div class="mb-2 row">
                <label for="Address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="text" class="form-control" id="address" name="address" value="' . $_COOKIE['address'] . '">';
                    } else {
                        echo '<input type="text" class="form-control" id="address" name="address">';
                    }
                    ?>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="email" class="form-control" id="email" name="email" value="' . $_COOKIE['email'] . '">';
                    } else {
                        echo '<input type="email" class="form-control" id="email" name="email">';
                    }
                    ?>
                </div>
            </div>
            <div class="mb-2 row">
                <label for="phone_num" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <?php
                    if ($toggle_show_data) {
                        echo '<input type="text" class="form-control" id="phone_num" name="phone_num" value="' . $_COOKIE['phone_num'] . '">';
                    } else {
                        echo '<input type="text" class="form-control" id="phone_num" name="phone_num">';
                    }
                    ?>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit" name="save"><i class="far fa-save"></i> Save</button>
                <button class="btn btn-warning" type="submit" name="show"><i class="far fa-eye"></i> Show</button>
                <button class="btn btn-danger" type="submit" name="clear"><i class="fas fa-trash"></i> Clear</button>
            </div>
        </div>
        <?php
        if ($toggle_show_data) {
            $toggle_show_data = false;
        }
        ?>
    </form>
</body>

</html>
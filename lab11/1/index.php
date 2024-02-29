<?php
session_start();
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
<?php
if (isset($_POST['save'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $employeeId = $_POST['employeeId'];
    $address = $_POST['address'];
    $phone_num = $_POST['phone_num'];
    $email = $_POST['email'];

    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['employeeId'] = $employeeId;
    $_SESSION['address'] = $address;
    $_SESSION['phone_num'] = $phone_num;
    $_SESSION['email'] = $email;

    $_SESSION['success'] = "Save employee account successfully.";
}
if (isset($_POST['show'])) {
    if (count($_SESSION) != 6) {
        $_SESSION['error'] = "Invaild account data";
    } else {
        $_SESSION['show_message'] = true;
        $_SESSION['success'] = "Show Account ID : " . $_SESSION['employeeId'];
    }
}
if (isset($_POST['clear'])) {
    session_destroy();
    $_SESSION['success'] = "Destroy all session data";
}
?>

<body>
    <form method="post">
        <div class="container mt-5">
            <?php
            if (isset($_SESSION['success'])) {
                echo '
                <div class="alert alert-secondary" role="alert">
                    ' . $_SESSION['success'] . '
                </div>';
                unset($_SESSION['success']);
            }
            if (isset($_SESSION['error'])) {
                echo '
                <div class="alert alert-danger" role="alert">
                    ' . $_SESSION['error'] . '
                </div>';
                unset($_SESSION['error']);
            }
            ?>
            <div class="mb-2 row">
                <label for="employeeId" class="col-sm-2 col-form-label">Employee ID</label>
                <div class="col-sm-10">
                    <?php
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="text" class="form-control" id="employeeId" name="employeeId" value="' . $_SESSION['employeeId'] . '">';
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
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="text" class="form-control" id="firstname" name="firstname" value="' . $_SESSION['firstname'] . '">';
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
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="text" class="form-control" id="lastname" name="lastname" value="' . $_SESSION['lastname'] . '">';
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
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="text" class="form-control" id="address" name="address" value="' . $_SESSION['address'] . '">';
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
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="email" class="form-control" id="email" name="email" value="' . $_SESSION['email'] . '">';
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
                    if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
                        echo '<input type="text" class="form-control" id="phone_num" name="phone_num" value="' . $_SESSION['phone_num'] . '">';
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
        if (isset($_SESSION['show_message']) && $_SESSION['show_message']) {
            unset($_SESSION['show_message']);
        }
        ?>
    </form>
</body>

</html>
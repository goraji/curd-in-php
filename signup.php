<?php

session_start();
if (isset($_SESSION['id'])) {
    header('location:addstudent.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'links.php' ?>
    <?php include 'navbar.php' ?>
    <?php include 'dbconn.php' ?>
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>

<body>
    <div class="a">
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" required>
            </div>
            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" id="pwd" name="cpassword" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Signup</button>

        </form>
        <a href='index.php'>
            <button type="submit" class="btn btn-warning btn-block">Already have account</button>
        </a>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    include 'dbconn.php';
    $name = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $querry = "INSERT INTO `admin`(`email`, `password`) VALUES ('$name','$pass')";

        $run = mysqli_query($con, $querry);
        if ($run) {
?>
            <script>
                alert('registered successfully');
            </script>
        <?php
            header('location:index.php');
        } else {
        ?>
            <script>
                alert('email exits!!');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('password not matched');
        </script>
<?php
    }
}
?>
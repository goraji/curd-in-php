<?php
session_start();
if (isset($_SESSION['id'])) {
    header('location:addstudent.php');
    // exit();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'links.php' ?>
    <?php include 'navbar.php' ?>
    <?php include 'dbconn.php' ?>
    <title>Login</title>
</head>

<body>
    <div class="a">
        <form method="post" >
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
        <a href='signup.php'>
            <button type="submit" class="btn btn-warning btn-block">Register new admin</button>
        </a>
    </div>
</body>

</html>

<?php
include('dbconn.php');
if (isset($_POST['submit'])) {
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $querry = "SELECT * FROM `admin` WHERE `email` ='$email'";
    $run = mysqli_query($con, $querry);
    $count = mysqli_num_rows($run);
    if ($count) {
        $data = mysqli_fetch_assoc($run);
        $datapass = $data['password'];
        $vpass = password_verify($password, $datapass);
        if ($vpass) {
?>
            <script>
                alert("login succes");
            </script>
        <?php
            $_SESSION['id'] = $data['email'];
             header('location:addstudent.php');
          
        } else {
        ?>
            <script>
                alert("password not matched");
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("email not exits");
        </script>
<?php
    }
}
?>
<?php

session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
} else {



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include 'links.php' ?>
        <?php include 'dbconn.php' ?>
        <?php include 'navbar.php' ?>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
    </head>

    <body>
        <div class="a">

            <li> <a href='display.php'>
                    <button type="submit" class="btn btn-success mt-1 ">Display Data</button>
                </a>
            </li>
            <li> <a href='addstudent.php'>
                    <button type="submit" class="btn btn-success mt-1 ">add student</button>
                </a>
            </li>
            <!-- <li> <a href='display.php'>
                    <button type="submit" class="btn btn-success mt-1">Display Data</button>
                </a>
            </li> -->

        </div>
    </body>

    </html>
<?php
}
?>
<?php
include 'dbconn.php';

$sid = $_GET['id'];
$querry = "DELETE FROM `register` WHERE `id` = '$sid'";
$run = mysqli_query($con, $querry);
if ($run) {
?>
    <script>
        alert('data deleted successfully');
    </script>
<?php
    header('location:display.php');
} else {
?>
    <script>
        alert('data not deleted');
    </script>
<?php
}
?>
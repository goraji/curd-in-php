<?php

session_start();
if (!isset($_SESSION['id'])) {
  header('location:index.php');
}
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'navbar.php' ?>
  <?php include 'links.php' ?>
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="a">
    <form method="post" autocomplete="on">

      <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name="name">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Branch</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Branch" name="branch">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Year</label>
        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter year" name="year">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Technology</label>
        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter technology" name="technology">
      </div>

      <button type="submit" class="btn btn-primary " name="submit">Submit</button>

    </form>
    <a href='display.php'>
      <button type="submit" class="btn btn-warning btn-block">Display Data</button>
    </a>
  </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  include('dbconn.php');

  $name = $_POST['name'];
  $branch = $_POST['branch'];
  $year = $_POST['year'];
  $technology = $_POST['technology'];

  $querry = "INSERT INTO `register`(`name`, `branch`, `year`, `technology`) VALUES ('$name','$branch','$year','$technology')";

  $run = mysqli_query($con, $querry);

  if ($run) {
?>
    <script>
      alert('data inserted successfully');
    </script>
  <?php
    header('location:display.php');
  } else {
  ?>
    <script>
      alert('data not inserted');
    </script>
<?php
  }
}


?>


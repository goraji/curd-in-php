<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <?php include 'navbar.php' ?>
    <?php include 'dbconn.php' ?>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
  $ids = $_GET['id'];
  echo ($ids);
  $querry = "SELECT * FROM `register` WHERE id = {$ids}";   
  $run = mysqli_query($con,$querry);
  $data = mysqli_fetch_array($run);
?>

<div class="a"> 
<form method = "post" autocomplete="on">

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" name = "name"
    value = <?php echo $data['name']; ?>>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Branch</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Branch" name = "branch"
    value = <?php echo $data['branch']; ?>>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Year</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter year" name = "year"
    value = <?php echo $data['year'] ;?>>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Technology</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter technology" name = "technology"
    value = <?php echo $data['technology']; ?>>
  </div>
  
  <button type="submit" class="btn btn-primary btn-block" name = "submit">Update</button>
  
</form>
<a href='display.php'>
  <button type="submit" class="btn btn-warning btn-block" >Display Data</button>
  </a>
</div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $technology = $_POST['technology'];

    $querry = "UPDATE `register` SET `name`='$name',`branch`='$branch',`year`='$year',`technology`='$technology' WHERE id = {$ids}";

    $run = mysqli_query($con, $querry);

    if ($run == true) {
?>
        <script>
            alert('data updated successfully');
            
        </script>
<?php
header('location:display.php');
    }
}
?>
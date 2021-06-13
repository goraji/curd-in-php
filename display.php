<?php

session_start();
if (!isset($_SESSION['id'])) {
  header('location:index.php');
}



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
  <div class="container">
    <h2>Registered users</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>S.No.</th>
          <th>Name</th>
          <th>Branch</th>
          <th>Year</th>
          <th>Technology</th>
          <th rowspan="2" colspan="2">Operation</th>
        </tr>
      </thead>
      <?php
      $qry = "SELECT * FROM `register`";
      $run = mysqli_query($con, $qry);
      $row = mysqli_num_rows($run);
      if ($row < 1) {
      ?>
        <tbody>
          <tr>
            <td colspan="6">no records found</td>
          </tr>
        </tbody>
        <?php
      } else {
        $count = 0;
        while ($data = mysqli_fetch_assoc($run)) {
          $count++;
        ?>
          <tbody>
            <tr>
              <td><?php echo $count ?></td>
              <td><?php echo $data['name'] ?></td>
              <td><?php echo $data['branch'] ?></td>
              <td><?php echo $data['year'] ?></td>
              <td><?php echo $data['technology'] ?></td>
              <td> <a href="update.php?id=<?php echo $data['id']; ?>">
                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </td>
              </a>
              <td> <a href="delete.php?id=<?php echo $data['id']; ?>">
                  <i class="fa fa-trash-o" aria-hidden="true"></i> </a>
              </td>
            </tr>
          </tbody>
      <?php
        }
      }
      ?>

    </table>
  </div>
</body>

</html>
<?php
?>
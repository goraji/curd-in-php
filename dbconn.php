<?php

$con = mysqli_connect('localhost','root','','dummy');

if($con){
    ?>
    <!-- <script>
        alert('connection is success');
    </script> -->
    <?php
}else{
    ?>
    <script>
        alert('connection failed');
    </script>
    <?php
}


?>
<?php

    $query = "SELECT * FROM clubs";
    $result = mysqli_query($conn,$query);

    if(isset($_REQUEST['cid'])){
      $cid = $_REQUEST['cid'];
      $query = "SELECT * FROM clubs WHERE cid = $cid";
      $result = mysqli_query($conn,$query);
    }

?>


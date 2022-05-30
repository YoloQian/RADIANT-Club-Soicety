<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "UPDATE `students` SET `clubid`=null WHERE sid = $id";

        if($conn->query($sql) === TRUE){
            header("location:cmember.php");
        }else{
            echo "Something Went wrong";
        }
    }else{
        die('Invalid');
    }

?>

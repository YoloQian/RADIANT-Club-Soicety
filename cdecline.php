<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM applyjoinclub WHERE aid = $id";

        if($conn->query($sql) === TRUE){
            header("location:crequest.php");
        }else{
            echo "Something Went wrong";
        }
    }else{
        die('id not provided');
    }

?>
<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM clubs WHERE cid = $id";

        if($conn->query($sql) === TRUE){
            header("location:adclub.php");
        }else{
            echo "Something Went wrong";
        }
    }else{
        die('id not provided');
    }

?>
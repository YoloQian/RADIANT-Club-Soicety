<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $role = $_POST['role'];

        $sql = "UPDATE `students` SET `role`='$role' WHERE sid = $id";

        if($conn->query($sql) === TRUE){
            header("location:cmember.php");
        }else{
            echo "Something Went wrong";
        }

    }else{
        die('Invalid');
    }

?>

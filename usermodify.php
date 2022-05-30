<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $studentid = $_POST['studentid'];
        $intake = $_POST['intake'];
        $mobile_num = $_POST['contact'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $clubid = $_POST['clubid'];

        $sql = "UPDATE `students` SET `email`='$email',`password`='$password',
        `Fname`='$Fname',`Lname`='$Lname',`studentid`='$studentid',`intake`='$intake',`mobile_num`='$mobile_num',
        `gender`='$gender',`role`='$role',
        `clubid`='$clubid' WHERE sid = $id";

        if($conn->query($sql) === TRUE){
            header("location:aduser.php");
        }else{
            echo "Something Went wrong";
        }

    }else{
        die('Invalid');
    }

?>

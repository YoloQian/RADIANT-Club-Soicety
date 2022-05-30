<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $eid = $_POST['idnum'];
        $etitle = $_POST['etitle'];
        $announcement = $_POST['announcement'];
        $description = $_POST['description'];
        $clubid = $_POST['clubid'];
        $cname = $_POST['clubname'];
        $datetime = $_POST['datetime'];

        $sql = "UPDATE `events` SET `eid`='$eid',
        `etitle`='$etitle',`announcement`='$announcement',`description`='$description',`cid`='$clubid',`cname`='$cname',
        `edate_time`='$datetime'
        WHERE eid = $id";

        if($conn->query($sql) === TRUE){
            header("location:organizer.php");
        }else{
            echo "Something Went wrong";
        }

    }else{
        die('Invalid');
    }

?>

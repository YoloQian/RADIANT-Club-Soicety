<?php
    require_once('db.php');

    if(isset($_POST['insert_submit'])){
        $etitle = $_POST['etitle'];
        $eimage = $_POST['eimage'];
        $announcement = $_POST['announcement'];
        $description = $_POST['description'];
        $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $edate_time = $_POST['edate_time'];

        $sql = "INSERT INTO `events`(`eid`,`etitle`, `eimage`, `announcement`, `description`, `cid`, `cname`, `edate_time`) 
        VALUES ('[value-1]','$etitle','$eimage','$announcement','$description','$cid','$cname','$edate_time')";

        if($conn->query($sql) === TRUE){
            header("location:adapproveevent.php");
        }else{
            echo "Something Went wrong";
        }
    }else{
        die('id not provided');
    }

?>
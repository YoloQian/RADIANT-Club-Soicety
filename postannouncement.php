<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $announcement = $_POST['announcement'];


        $sql = "UPDATE `events` SET `announcement`='$announcement'
        WHERE eid = $id";

        if($conn->query($sql) === TRUE){
            echo "<SCRIPT> 
            alert('Announcement Posted')
            </SCRIPT>";
            echo '<script>onclick=history.back()</script>';
        }else{
            echo "Something Went wrong";
        }

    }else{
        die('Invalid');
    }

?>
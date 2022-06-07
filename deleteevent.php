<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM events WHERE eid = $id";

        if($conn->query($sql) === TRUE){
            echo '<script>onclick=history.back()</script>';
        }else{
            echo "Something Went wrong";
        }
    }else{
        die('id not provided');
    }

?>
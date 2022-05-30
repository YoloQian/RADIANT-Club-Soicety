<?php
    require_once('db.php');
    session_start();

    if(isset($_GET['id'])){sdadass
        $id = $_GET['id'];

        $result =mysqli_query($conn,"SELECT * from students");
        $profile =mysqli_query($conn,"SELECT * from students");
        while($row = mysqli_fetch_array($profile))
            {if($row['username'] == $_SESSION['fullname'])
              {while($line = mysqli_fetch_array($result))
                {if($line['clubid'] == $row['15'])
                  {$sql = "UPDATE `students` SET `clubid`= $row[15] WHERE sid = $id";

        if($conn->query($sql) === TRUE){
            header("location:crequest.php");
        }}}}}
    }else{
        die('id not provided');
    }

?>
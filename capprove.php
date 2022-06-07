<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        session_start();

        $result =mysqli_query($conn,"SELECT * from applyjoinclub");
        $profile =mysqli_query($conn,"SELECT * from students");
        while($row = mysqli_fetch_array($profile))
            {if($row['username'] == $_SESSION['fullname'])
              {while($line = mysqli_fetch_array($result)){
                if($line[0] == $id){
                    $id = $line[3];
<<<<<<< HEAD
                   $sql = "UPDATE `students` SET `clubid`= $row[15] WHERE mobile_num = $id";
=======
                   $sql = "UPDATE students SET clubid= $row[15] WHERE mobile_num = $id";
>>>>>>> 075cdcd94284ea0764945cbe92c20fdbad0a42dd

        if($conn->query($sql) === TRUE){
            $remove = "DELETE FROM applyjoinclub WHERE contact_num = $id";
            if($conn->query($remove) === TRUE){
            header("location:crequest.php");
        }}else{
            echo "Something Went Wrong!";
            echo "$id";
        }}}}}
    }else{
        die('id not provided');
    }
    mysqli_close($conn);
?>
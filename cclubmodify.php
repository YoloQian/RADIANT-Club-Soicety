<?php
    require_once('db.php');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $clubname = $_POST['clubname'];
        $clubimage = $_POST['clubimage'];
        $wallpaper = $_POST['wallpaper'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $link = $_POST['link'];
        $email = $_POST['email'];
        $venue = $_POST['venue'];
        $location = $_POST['location'];

        $sql = "UPDATE `clubs` SET `cname`='$clubname',`cimage`='$clubimage',`wallpaper`='$wallpaper',
        `category`='$category',`content`='$content',`link`='$link',`mail`='$email',`venue`='$venue',
        `location`='$location'
        WHERE cid = $id";

        if($conn->query($sql) === TRUE){
            header("location:committee.php");
        }else{
            echo "Something Went wrong";
        }

    }else{
        die('Invalid');
    }

?>

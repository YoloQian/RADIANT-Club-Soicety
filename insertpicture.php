<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";
    //establish connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);


session_start();


if(isset($_POST['insert_submit'])){

    $cname = $_POST['txtcname'];

    $cimage = $_FILES["cimage"]["name"];
    $tempcimage = $_FILES["cimage"]["tmp_name"];
        $cfolder = "clubsimages/" . $cimage;

    $category = $_POST['txtcategory'];
    $content = $_POST['txtcontent'];

    $wallpaper = $_FILES["wallpaper"]["name"];
    $tempwallpaper = $_FILES["wallpaper"]["tmp_name"];
        $wfolder = "clubswallpaper/" . $wallpaper;

    $link = $_POST['txtlink'];
    $mail = $_POST['txtmail'];
    $venue = $_POST['txtvenue'];
    $location = $_POST['txtlocation'];

    $query = "INSERT INTO `clubs`(`cid`, `cname`, `cimage`, `category`, `content`, `wallpaper`, `link`, `mail`, `venue`, `location`) 
    VALUES ('[value-1]','$cname','$cimage','$category','$content','$wallpaper','$link','$mail','$venue','$location')";

    
    mysqli_query($conn, $query);

    if (move_uploaded_file($tempcimage, $cfolder)) {
        $msg = "Club logo uploaded successfully";
    }else {
        $msg = "Failed to uplaod Club logo";
    }

    if (move_uploaded_file($tempwallpaper, $wfolder)) {
        $msg = "Club wallpaper uploaded successfully";
    }else {
        $msg = "Failed to uplaod Club wallpaper";
    }

    mysqli_close($conn);
    
}

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>

<h3>Insert New Club</h3>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    <label>Club Name:</label>
    <input type="text" id="txtcname" name="txtcname" placeholder="Club Name">

    <label>Club Logo:</label>
        <ul><input type="file" id="cimage" name="cimage" required /></ul>

    <label>Category:</label>
    <select id="txtcategory" name="txtcategory">
      <option value="Course-based & Academic">Course-based & Academic</option>
      <option value="General Interest">General Interest</option>
      <option value="Performing & Creative">Performing & Creative</option>
      <option value="Recreation, Sport & Games">Recreation, Sport & Games</option>
      <option value="Community Centric & Voluntary">Community Centric & Voluntary</option>
      <option value="Cultural & Internation Communities">Cultural & Internation Communities</option>
    </select>

    <label>Content:</label>
    <textarea id="txtcontent" name="txtcontent" placeholder="Write content..." style="height:200px"></textarea>

    <label>Club Wallpaper:</label>
        <ul><input type="file" id="wallpaper" name="wallpaper" required /></ul>

    <label>Club Link:</label>
    <textarea id="txtlink" name="txtlink" placeholder="Write Club Link..." style="height:200px"></textarea>

    <label>Club Mail:</label>
    <input type="text" id="txtmail" name="txtmail" placeholder="Club Mail">

    <label>Club Venue:</label>
    <input type="text" id="txtvenue" name="txtvenue" placeholder="Club Venue">

    <label>Club Location:</label>
    <textarea id="txtlocation" name="txtlocation" placeholder="Write Club Location..." style="height:200px"></textarea>

    <input type="submit" name="insert_submit" value="Submit">
  </form>
</div>

</body>
</html>

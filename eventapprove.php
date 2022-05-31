<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";
    //establish connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);

    session_start();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        die('id not provided');
    }

    if(isset($_POST['approve_submit'])){
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
            $remove = "DELETE FROM applyevent WHERE aeid = $id";
            if($conn->query($remove) === TRUE){
            header("location:adapproveevent.php");
        }}else{
            echo "Something Went wrong";
        }
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
    <?php       
        $sql_query = "SELECT * FROM applyevent WHERE aeid = $id";
        $result = mysqli_query($conn, $sql_query);
        while ($row = mysqli_fetch_array($result)) {
    ?>

<h3>Approve New Event</h3>

<div class="container">
  <form action="" method="post" enctype="multipart/form-data">
    <label>Event Title:</label>
    <input type="text" name="etitle" placeholder="Event Title" readonly value="<?= $row["etitle"]?>">

    <label>Event Image:</label>
    <input type="text" name="eimage" placeholder="Event Image" readonly value="<?= $row["eimage"]?>">

    <label>Announcement:</label>
    <input type="text"  name="announcement" placeholder="Announcement" readonly value="<?= $row["announcement"]?>">

    <label>Description:</label>
    <input type="text"  name="description" placeholder="Description" readonly value="<?= $row["description"]?>">

    <label>Club ID</label>
    <input type="text"  name="cid" placeholder="Club ID" readonly value="<?= $row["cid"]?>">

    <label>Club Name</label>
    <input type="text" id="cname" name="cname" placeholder="Club Name" readonly value="<?= $row["cname"]?>">

    <label>Date / Time</label>
    <input type="text" id="edate_time" name="edate_time" placeholder="Date / Time" readonly value="<?= $row["edate_time"]?>">

    <input type="submit" name="approve_submit" value="Approve">
  </form>
</div>
    <?php
        }
    ?>

</body>
</html>
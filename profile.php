<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";
    //establish connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);

    $sql_query = "SELECT * FROM `students` where username = username LIMIT 1";
    $result = mysqli_query($conn, $sql_query);
    while ($row = mysqli_fetch_array($result)) {

    //Change Password
    if(isset($_POST['submit'])){
      $idnum =  $_POST['idnum'];
      $old_password = $_POST['old_password'];
      $txtpassword = $_POST['txtPassword'];
      

      $check_password = mysqli_query($conn, "SELECT password FROM students where sid = '$idnum' and password = '$old_password'");
      if(mysqli_num_rows($check_password) > 0){
        echo "<script type='text/javascript'>alert('Password Updated Successfully!'); window.location.href='profile.php';</script>";
        $query = "UPDATE `students` SET `password`='$txtpassword' WHERE $idnum = sid";
        if(mysqli_query($conn,$query)){
          echo "Password updated successfully!";
        }else{
            echo "Error : " . mysqli_error($conn);
        }
        }else{
          echo "<script type='text/javascript'>alert('The Current Password You Entered Was Incorrect, Please Try Again!'); window.location.href='profile.php';</script>";
          
          
        }
      }  
}
     

    session_start();

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
              if(isset($_SESSION['username'])) {
                  echo $_SESSION['fullname'];
              }else {
                  echo "";
              } 
              ?> - RADIANT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bakbak One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/android-icon-36x36.png">
    <style>
      h1.a {
      font-family: "Capriola", sans-serif;
      color: #e6b800;
      font-size: 25px;
      }

      .content {
      max-width: 1300px;
      margin: auto;
      padding: 10px;
      }
    </style>
</head>
<body>
    <div style="max-width: 1300px; margin: auto; padding: 10px;">
    <!-- Header -->
    <div class="container">
      <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none" width="auto" height="auto">
        <svg class="bi me-2" width="40" height="32"><img onclick="location.href='index.php'" src="images/radiant_bg.png" style="border-radius: 10%;" alt="Logo" width="55" height="80"></svg>
        <h1 class="fs-4; a" onclick="location.href='index.php'"style="margin: 10px;font-weight: bold;">&nbsp;&nbsp;&nbsp;RADIANT<br>&nbsp;Club & Society</h1> 
      </a>
    
    <!-- Menu-->
    <ul class="nav nav-tabs justify-content-end" style="font-family: Bakbak One,san-serif; color: #fd7e14">
        <li class="nav-item">
          <a class="nav-link" style="color:#737373" aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color:#737373" href="about.php">ABOUT US</a>
        </li>
        <div class="dropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" ondblclick="location.href='clubs.php?id='" style="color:#737373" role="button" aria-expanded="false">Club & Society</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=course-based and academic">COURSE-BASED & ACADEMIC</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=general interest">GENERAL INTEREST</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=performing and creative">PERFORMING & CREATIVE</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=recreation, sport and games">RECREATION, SPORTS & GAMES</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=community centric and voluntary">COMMUNITY CENTRIC & VOLUNTARY</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=cultural and international communities">CULTURAL & INTERNATIONAL COMMUNITIES</a></li>
          </ul>
        </li>
        </div>
        <li class="nav-item">
          <a class="nav-link" style="color:#737373" href="events.php">EVENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#737373" href="contact.php">CONTACT US</a>
        </li>
        
        <li class="nav-item ">

          <?php 
              if (isset($_SESSION['username'])) { ?>

              <ul class="nav nav-pills ">
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" style="color:#0d6efd">
              <?php 
              if(isset($_SESSION['username'])) {
                  echo $_SESSION['fullname'];
              }else {
                  echo "";
              } 
              ?>
              </a>
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="profile.php"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;Edit Profile</a></li>
                  <!-- committee only-->
                  <?php
                    $result =mysqli_query($conn,"SELECT * from students");
                    while($row = mysqli_fetch_array($result)){
                    if($row['username'] == $_SESSION['fullname'] && $row['role'] == 'Committee'){
                      echo "<li><a class='dropdown-item' href='committee.php'>
                      <i class='bi bi-card-checklist' aria-hidden='true'></i>&nbsp;Commitee</a></li>";
                    }
                    }
                    ?>
                    <!-- Organizer only-->
                  <?php
                    $result =mysqli_query($conn,"SELECT * from students");
                    while($row = mysqli_fetch_array($result)){
                    if($row['username'] == $_SESSION['fullname'] && $row['role'] == 'Organizer'){
                      echo "<li><a class='dropdown-item' href='organizer.php'>
                      <i class='bi bi-calendar2-event' aria-hidden='true'></i>&nbsp;Organizer</a></li>";
                    }
                    }
                    ?>
                  <!-- admin only see -->
                  <?php
                    if($_SESSION['fullname'] == 'admin'){
                    echo "<li><a class='dropdown-item' href='adashboard.php'><i class='fa fa-cogs' aria-hidden='true'></i>&nbsp;Admin</a></li>";
                    }
                    ?> 
                    <!-- end here-->
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="logout.php" style="color:#dc3545"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;LOG OUT</a></li>
              </ul>
              </li>
          </ul>
          <?php 
              } 
              else { ?>

              <button onclick="location.href='login.php'" type="button" class="btn btn-primary">Login</button>

          <?php 
          } 
          ?>
      </li>
      </ul>
    </div>
    </div>
    
    <!--Profile-->
    <div class="container rounded bg-white mt-5 mb-5 content" style="font-family: Source Sans Pro,san-serif;">
    <div class="row d-flex justify-content-center" style="width: 1300px; ">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img height='120'; width='128' src="images/personal-data.png">

            <span class="font-weight-bold" style="font-size: 1.3rem;">
                <br>
            <?php 
                if(isset($_SESSION['username'])) {
                    echo "Hi, " . $_SESSION['fullname'];
                }else {
                } 
            ?>
            </span>
            <span style="font-size: 1.1rem;"> 
                <?php
                $sql_query = "SELECT * FROM `students` where username ='".$_SESSION['fullname']."' LIMIT 1";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
                echo $row["email"]
                ?>
            </span>
            <span style="font-size: 1.1rem;"> 
                <?php
                $sql_query = "SELECT * FROM `students` where username ='".$_SESSION['fullname']."' LIMIT 1";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
                echo $row["mobile_num"]
                ?>
            </span>
            
            <?php 
                }
             }
            
            ?>
            </div>
            </div>
            <?php   
                $sql_query = "SELECT * FROM `students` where username ='".$_SESSION['fullname']."' LIMIT 1";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
            
            ?>
            
        <div class="col-md-5 border-right"> 
            <div class="p-3 py-5">
            <form action="" method="POST" onSubmit="return validate();">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right" style="font-size:2.5rem"><b>Personal Profile</b></h4>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6">
                      <label class="labels">ID</label>
                      <input type="text" name="idnum" class="form-control" placeholder="" readonly value="<?php echo $row["sid"]?>">
                  </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="" readonly value="<?php echo $row["Fname"]?>">
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="" readonly value="<?php echo $row["Lname"]?>" >
                    </div>

                    <div class="col-md-6">  
                        <label class="labels">Student ID</label>
                        <input type="text" name="studentid" class="form-control" placeholder="" readonly value="<?php echo $row["studentid"]?>" >
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">Intake</label>
                        <input type="text" name="intake" class="form-control" placeholder="" readonly value="<?php echo $row["intake"]?>" >
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">IC / Passport</label>
                        <input type="text" name="ic_passport" class="form-control" placeholder="" readonly value="<?php echo $row["ic_passport"]?>" >
                    </div>

                    <div class="col-md-6">  
                        <label class="labels">Gender</label>
                        <input type="text" name="gender" class="form-control" placeholder="" readonly value="<?php echo $row["gender"]?>" >
                    </div>
                
                    <div class="col-md-6">
                        <label class="labels">Birthday</label>
                        <input type="date" name="birthday" class="form-control" readonly value="<?php echo $row["birth_date"]?>">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Country</label>
                        <input type="text" name="Country" class="form-control" readonly value="<?php echo $row["country"]?>">
                    </div>
                
                    <div class="col-md-6">  
                        <label class="labels">Club</label>
                        <?php 
                        $query = mysqli_query(
                            $conn,"SELECT clubs.cname FROM clubs INNER JOIN students ON clubs.cid = students.clubid");
                        $res = mysqli_fetch_array($query);
                        $clubname = $res['cname'];
                        echo "<input type='text' name='club' class='form-control' placeholder='' readonly value='$clubname' >";

                         ?>
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">Role</label>
                        <input type="text" name="role" class="form-control" placeholder="" readonly value="<?php echo $row["role"]?>" >
                    </div>
                </div>
                <br><hr><br>
                <!-- Change Password -->
                <div class="justify-content-between align-items-center mb-3">
                    <h5 class="text-right"><b>Change Password</b></h5>
                </div>
                <div class="col-md-12">  
                        <label class="labels">Current Password</label>
                        <input type="password" name="old_password" class="form-control" required="" placeholder=" Enter Current Password" value="" >
                        <a href="forgotpassword.php" class="">Forgot Pasword?</a>
                </div>
                <div class="row mt-2">
                <div class="col-md-6">
                    <label class="labels">New Password</label> 
                    <input type="password" name="txtPassword" class="form-control" required=""  id="password" placeholder="Enter New Password" value="" onkeyup='check();'>
                </div>
                <div class="col-md-6"> 
                    <label class="labels">Comfirm Password</label> 
                    <input type="password" name="confirm_password" class="form-control" required="" id="confirm_password" placeholder="Enter Confirm Password" value="" onkeyup='check();'>  
                </div>
                <span class="mt-2 text-center" id='message'> </span>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary profile-button" name="submit" type="submit">Update Password</button>
                </div>
    </div>

                <script>
                    /* Check Password matching and display*/ 
                    var check = function() {
                        if (document.getElementById('password').value ==
                            document.getElementById('confirm_password').value) {
                            document.getElementById('message').style.color = 'green';
                            document.getElementById('message').innerHTML = 'Password Matching!';
                        } else {
                            document.getElementById('message').style.color = 'red';
                            document.getElementById('message').innerHTML = 'Password Not Matching!';
                        }
                        }
                    /* Check Password*/
                    function validate(){
                        var a = document.getElementById("password").value;
                        var b = document.getElementById("confirm_password").value;
                        if (a!=b) {
                        alert("Passwords Do No Match, Please Try Again");
                        return false;
                        }
                    }
                </script>


                <?php
        }
        ?>
            </form>
            </div>
        </div>



    <!--Footer-->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2022 Radiant Club & Society, Inc</p>

        <a class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <img src="images/radiant.png" style="border-radius: 10%;" alt="Logo" width="55" height="55">
        </a>

        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link px-2 text-muted">About Us</a></li>
          <li class="nav-item"><a href="clubs.php?id=" class="nav-link px-2 text-muted">Club & Society</a></li>
          <li class="nav-item"><a href="events.php" class="nav-link px-2 text-muted">Events</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link px-2 text-muted">Contact Us</a></li>
        </ul>
      </footer>
    </div>
</body>
</html>
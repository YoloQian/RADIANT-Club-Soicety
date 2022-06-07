<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbase = "sdp";
//establish connection to mysql server
$conn = mysqli_connect($servername,$user,$password,$dbase);

session_start();
if(!isset($_SESSION['username'])){
    $message = '-- Sorry You Are Not Allowed to Access This Page --\nTo access this page, you must be logged in.\nPlease try again after you LOG IN.';
    echo "<SCRIPT> 
            alert('$message')
            window.location.replace('login.php');
        </SCRIPT>";
        mysql_close();
}

$sql_query = "SELECT * FROM `students` where username ='".$_SESSION['fullname']."' LIMIT 1";
            $result = mysqli_query($conn, $sql_query);
            while ($row = mysqli_fetch_array($result)) {
            $cid = $row["clubid"];
            
            
// Evaluates to true because $var is empty
if (!empty($cid)) {
  $message2 = '-- Sorry You Are Not Allowed to Access This Page --\n It is Because You Already Have a Club \n Please Inform Committee of Your Club, If You Want to Quit Current Club.';
  echo "<SCRIPT> 
          alert('$message2')
          window.location.replace('clubs.php?id=');
      </SCRIPT>";
}
}


//
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobilenum = $_POST['mobile_num'];
  $studentid = $_POST['studentid'];
  $intake = $_POST['intake'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birth_date'];
  $country = $_POST['country'];
  $additionalinfo = $_POST['additionalinfo'];
  $cid = $_POST['cid'];
  $cname = $_POST['cname'];
  $aid = 1;

  
  //create your insert sql
  $query="INSERT INTO `applyjoinclub`(`username`, `email`, `contact_num`, `studentid`, `intake`, `gender`, `birth_date`, 
  `country`, `personal_statement`, `clubid`, `cname`) VALUES ('$username','$email','$mobilenum','$studentid','$intake','$gender','$birthdate','$country','$additionalinfo','$cid','$cname')";
  if(mysqli_query($conn,$query)){
      echo "Record added successfully!";
  }else{
      echo "Error : " . mysqli_error($conn);
  }

  mysqli_close($conn);
  header("location: clubsdetails.php?cid=$cid");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Application - RADIANT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bakbak One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Macondo' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/android-icon-36x36.png">
    <link rel="stylesheet" href="signup.css">
    <style>
      h1.a {
      font-family: "Capriola", sans-serif;
      color: #e6b800;
      font-size: 25px;
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
    
    <body class="bg-light">
    
    <div class="container">
    <main>
    <?php include "logic.php"; ?>
    <form class="needs-validation" novalidate="" action="" id="a" method="post">
    <?php foreach($result as $r){ ?>
        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="<?php echo 'clubsimages/' .$r["cimage"]; ?>" alt="" width="125" height="125">
        <h2>Application Form</h2>
        <p class="lead">Give us your reason or your interest in why would you like to join our club!!!</p>
        </div>

        
        <div class="row g-5">
        <!-- Club Information -->
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="mb-3">Club Information</h4>
            <div class="row g-3">
            <div class="col-sm-12">
            <input type="text" class="form-control" id="cid" name="cid" hidden readonly value="<?php echo $r["cid"]; ?>"  >
                <label for="clubname" class="form-label">Club Name</label>
                <input type="text" class="form-control" id="cname" name="cname" readonly value="<?php echo $r["cname"]; ?>"  >
            </div>

            <div class="col-sm-12">
                <label for="clubtype" class="form-label">Club Type</label>
                <input type="text" class="form-control" id="ctype" name="ctype" readonly value="<?php echo $r["category"]; ?>"  >
            </div>

            <div class="col-sm-12">
                <label for="clubemail" class="form-label">Club Email</label>
                <input type="email" class="form-control" id="cemail" name="cemail" readonly value="<?php echo $r["mail"]; ?>"  >
            </div>

            </div>
        </div>

        <!-- Personal Information -->
        <?php   
            $sql_query = "SELECT * FROM `students` where username ='".$_SESSION['fullname']."' LIMIT 1";
            $result = mysqli_query($conn, $sql_query);
            while ($row = mysqli_fetch_array($result)) {
            ?>
        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Personal Information</h4>
        
            <div class="row g-3">
                <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" id="username" name="username" readonly value="<?php echo $row["username"]?>">
                </div>
                </div>

                <div class="col-sm-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" readonly value="<?php echo $row["email"]?>"  >
                </div>

                <div class="col-sm-6">
                <label for="contactnum" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="mobile_num" name="mobile_num" readonly value="<?php echo $row["mobile_num"]?>"  >
                </div>
                
                <div class="col-sm-6">
                <label for="firstName" class="form-label">First name</label>
                <input type="text" class="form-control" id="firstName" name="Fname" readonly value="<?php echo $row["Fname"]?>" >
                </div>

                <div class="col-sm-6">
                <label for="lastName" class="form-label">Last name</label>
                <input type="text" class="form-control" id="lastName" name="Lname" readonly value="<?php echo $row["Lname"]?>" >
                </div>

                <div class="col-sm-6">
                <label for="lastName" class="form-label">Student ID</label>
                <input type="text" class="form-control" id="studentid" name="studentid" readonly value="<?php echo $row["studentid"]?>" >
                </div>

                <div class="col-sm-6">
                <label for="lastName" class="form-label">Intake</label>
                <input type="text" class="form-control" id="intake" name="intake" readonly value="<?php echo $row["intake"]?>" >
                </div>

                <div class="col-sm-6">
                <label for="lastName" class="form-label">Gender</label>
                <input type="text" class="form-control" id="gender" name="gender" readonly value="<?php echo $row["gender"]?>" >
                </div>

                <div class="col-sm-6">
                <label for="lastName" class="form-label">Birthday</label>
                <input type="text" class="form-control" id="birthday" name="birth_date" readonly value="<?php echo $row["birth_date"]?>">
                </div>

                <div class="col-sm-12">
                <label for="lastName" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" readonly value="<?php echo $row["country"]?>">
                </div>

            <hr class="my-4">
            <!-- Personal Statement -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Personal Statement</span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <textarea id="additionalinfo" name="additionalinfo" class="form-control req" required="required" placeholder="Enter Your Additional Information.." style="height:300px"></textarea>
            </li>
            </ul>
            <button type="submit" name="submit" class="w-100 btn btn-outline-primary btn-lg" style="" onclick="alertmessage()">Submit</button>

            <hr class="my-4">
            </form>
        </div>
        </div>
    <?php 
    } 
    }
    ?>
    </main>

    </div>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>

    <script>
            var form = document.getElementById('a');

            function alertmessage() {
                if (form.checkValidity()) {
                    alert("Application Form Submitted Successfully!");
                }
            }
        </script>

    



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
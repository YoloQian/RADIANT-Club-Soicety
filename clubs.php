<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";
    //establish connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);
    

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RADIANT Club & Soicety</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bakbak One' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/android-icon-36x36.png">
    <style>
      h1.a {
      font-family: "Capriola", sans-serif;
      color: #e6b800;
      font-size: 25px;
      }

      /* Context of club and society */
      h1 {
        color: #e6b800;
        text-align: center;
      }

      h5 {
        color: black;
        text-align: justify;
        text-justify: inter-word;
      }

      /* clubs grid container */
      .grid-container {
        display: grid;
        gap: 10px;
        grid-template-columns: auto auto auto;
        padding: 10px;
      }

      .grid-item {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        font-size: 30px;
        text-align: center;
      }

      /* clubs content box */
      .clubs {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
      }

      .clubs img{
        width: 50%;
        min-height: 120px;
        max-height: 150px;
      }

      .clubs button:hover {
        opacity: 0.7;
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
          <a class="nav-link" style="color:#737373" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color:#737373" href="about.php">ABOUT US</a>
        </li>
        <div class="dropdown">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown" ondblclick="location.href='clubs.php?id='" style="color:#ffd11a" role="button" aria-expanded="false">Club & Society</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=course-based and academic">COURSE-BASED & ACADEMIC</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=general interest">GENERAL INTEREST</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="clubs.php?id=sperforming and creative">SPERFORMING & CREATIVE</a></li>
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

              <ul class="nav nav-pills">
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
    
    <!-- Content here -->

    
    <div class="container py-5">
      <div class="row pt-md-5 pb-lg-5 justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-10 text-center py-xl-3">
          <h1>
            <span class="fw-light">Welcome to <b>Club & Society</b><br></span>
          </h1>
          <h5>
            <span class="fw-light">
              We believe a student's life is made out of 50% study and 50% fun. That's why we offer a host of clubs and societies that you're welcomed to be a part of. Dabble in new experiences, spark creativity and passion, get to know a diverse range of people and have fun - all at the same time! Sounds good already? Scroll down to discover all the clubs and societies available here.
            </span>
          </h5>
        </div>
      </div>
    </div>

    <h1 style="text-decoration: underline;">List of Club & Societies</h1>

    <?php
      $id=$_GET["id"];
      if($id=='course-based and academic'){
        $query = "SELECT * FROM clubs WHERE category='Course-based & Academic' ";
      }else if($id=='general interest'){
        $query = "SELECT * FROM clubs WHERE category='General Interest' ";
      }else if($id=='sperforming and creative'){
        $query = "SELECT * FROM clubs WHERE category='Sperforming & Creative' ";
      }else if($id=='recreation, sport and games'){
        $query = "SELECT * FROM clubs WHERE category='Recreation, Sport & Games' ";
      }else if($id=='community centric and voluntary'){
        $query = "SELECT * FROM clubs WHERE category='Community Centric & Voluntary' ";
      }else if($id=='cultural and international communities'){
        $query = "SELECT * FROM clubs WHERE category='Cultural & International Communities' ";
      }else {
          $query = "SELECT * FROM clubs ";
      }
      ?>


    <div class="grid-container" style='margin: 30px 80px;'>
        <?php 
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($result)){
        ?>
        <div class='grid-item'>
          <div class="clubs">
            <br>
            <h2><?php echo $row["cname"]; ?></h2>
            <img src="<?php echo 'clubsimages/' .$row["cimage"]; ?>">
            <hr>
            <input type="button" class="btn btn-primary" value="Learn More" onClick='window.location.href="<?php echo $row["link"]; ?>"'>
            <hr>
          </div>
        </div>
        <?php
          }
        ?>
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
          <li class="nav-item"><a href="clubs.php" class="nav-link px-2 text-muted">Club & Society</a></li>
          <li class="nav-item"><a href="events.php" class="nav-link px-2 text-muted">Events</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link px-2 text-muted">Contact Us</a></li>
        </ul>
      </footer>
    </div>
</body>
</html>
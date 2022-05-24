<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $dbase = "sdp";
    //establish connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);
    

    session_start();

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
        echo $count;

        if($count == 1){
            // echo "record found";
            $_SESSION['username'] = $row['email'];
            $_SESSION['fullname'] = $row['username'];
            echo $_SESSION['fullname'];
            echo header ("Location: index.php");
        }else {
            echo '<script>alert("-- Username or Password Incorrect -- \nLog In Unsuccessful, Please Try Again.")</script>';
        }
    }
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
    <link href='https://fonts.googleapis.com/css?family=Macondo' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/android-icon-36x36.png">
    <style>
      h1.a {
      font-family: "Capriola", sans-serif;
      color: #e6b800;
      font-size: 25px;
      }
      .signinbox {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        border-style: groove;
        width: 100vh;
      }
      
      .form-signin {
          width: 100%;
          max-width: 500px;
          padding: 15px;
          margin: auto;
      }
      
      .form-signin .checkbox {
          font-weight: 400;
      }
      
      .form-signin .form-control {
          position: relative;
          box-sizing: border-box;
          height: auto;
          padding: 10px;
          font-size: 16px;
      }
      
      .form-signin .form-control:focus {
          z-index: 2;
      }
      
      .form-signin input[type="email"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
      }
      
      .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
      }
      
      .content {
          max-width: 1300px;
          margin: auto;
          padding: 10px;
          
      }
      
      .centerblocktext {
          margin: auto;
          width: 50%;
          padding: 10px;
      }
      
      .img {
          display: block;
          margin-left: auto;
          margin-right: auto;
      }
      
      .button {
          display: flex;
          justify-content: center
      }
      
      .fontsignin {
          font-family: "Lucida Console", "Courier New", monospace;
      }
      
      .right {
          text-align: center;
          width: 35%;
          float: right;
      }
      
      .left {
          text-align: center;
          width: 35%;
          float: left;
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
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" ondblclick="location.href='clubs.php'" style="color:#737373" role="button" aria-expanded="false">Club & Society</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" style="color:#737373" href="#">COURSE-BASED & ACADEMIC</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">GENERAL INTEREST</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">SPERFORMING & CREATIVE</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">RECREATION, SPORTS & GAMES</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">COMMUNITY CENTRIC & VOLUNTARY</a></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">CULTURAL & INTERNATIONAL COMMUNITIES</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" style="color:#737373" href="#">Separated link</a></li>
          </ul>
        </li>
        </div>
        <li class="nav-item">
          <a class="nav-link" style="color:#737373" href="events.php">EVENTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color:#737373" href="contact.php">CONTACT US</a>
        </li>
        
        <li class="nav-item disable">
            <a class="nav-link disabled" aria-current="page">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>
      </ul>
    </div>
    </div>
    
    <br><br>
    <!--Sign In-->
    <div class="content">
    <section class="centerblocktext fontsignin">
        <div class="col-sm-12">
            <form class="form-signin" method="POST" action="">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative mx-auto" style="width:500px">
              <div class="col-auto d-none d-lg-block mx-auto">
                  <img src="images/radiant_whitebg.jpg" width="200" height="200">
              </div>
                <div class="col p-4 d-flex flex-column position-static text-center" style="font-family: Macondo,san-serif;">
                  <h1 class="mb-0" style=" font-size: 2.5rem">RADIANT <br>Club & Society</h1>
                </div>
            </div>

                <br>
                <h1 class="h3 mb-3 font-weight-normal">Sign In:</h1>
                <hr style="height:2px">

                <label for="inputUname" class="sr-only">Username:</label>
                <br>

                <input type="text" id="inputUname" name="username"class="form-control" placeholder="Username" required="" autofocus="">

                <br>
                <label for="inputPassword" class="sr-only">Password:</label>

                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

                <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>

                <div class="col text-center">
                  <br><hr>
                    <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Log in</button>
                    <br><br>
                </div>

                <div class="right">
                    <p>Don't have an account?
                        <a href="signup.php" class="link-primary">SIGN UP</a>
                    </p>
                </div>
                <div class="left">
                    <br>
                    <a href="forgotpassword.php" class="link-primary">Forgot Password?</a>
                </div>
            </form>
        </div>
        <br><br>
    </section>
    </div>
    <br>


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
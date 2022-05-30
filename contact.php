<?php
    $servername = "localhost"; 
    $user = "root";
    $password = "";
    $dbase = "sdp";

    session_start();
    //establish a connection to mysql server
    $conn = mysqli_connect($servername,$user,$password,$dbase);
    if(!$conn){
      // echo "Server Failed : " . mysqli_connect_error();
        die("Server Failed : " . mysqli_connect_error());
    }
    // else{
    //     echo "Connection successful!";
    // }
    

    //let's check if your submit button has been clicked
    if(isset($_POST['submit'])){
        $mname = $_POST['Mname'];
        $memail = $_POST['Memail'];
        $msubject = $_POST['Msubject'];
        $mmessage = $_POST['Mmessage'];
        //create your insert sql
        $query="INSERT INTO `message`(`name`, `email`,`subject`, `message`) VALUES ('$mname','$memail','$msubject','$mmessage')";
        if(mysqli_query($conn,$query)){
            echo "Record added successfully!";
        }else{
            echo "Error : " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("location: contact.php");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - RADIANT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Capriola' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Bakbak One' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Koulen' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="images/android-icon-36x36.png">
    <link rel="stylesheet" href="contact.css">
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
          <a class="nav-link" style="color:#737373" href="index.php">HOME</a>
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
          <a class="nav-link active" style="color:#ffd11a" aria-current="page" href="contact.php">CONTACT US</a>
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
                  <!-- committee only-->
                  <?php
                    $result =mysqli_query($conn,"SELECT * from students");
                    while($row = mysqli_fetch_array($result)){
                    if($row['username'] == $_SESSION['fullname'] && $row['role'] == 'Committee'){
                      echo "<li><a class='dropdown-item' href='committee.php'>
                      <i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp;Commitee</a></li>";
                    }
                    }
                    ?>
                    <!-- Organizer only-->
                  <?php
                    $result =mysqli_query($conn,"SELECT * from students");
                    while($row = mysqli_fetch_array($result)){
                    if($row['username'] == $_SESSION['fullname'] && $row['role'] == 'Organizer'){
                      echo "<li><a class='dropdown-item' href='organizer.php'>
                      <i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp;Organizer</a></li>";
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
    
    <br>
  

    <!--Get In Touch-->
    <br>
        <div class="content messagecontainer" style=" font-family: Koulen,san-serif; font-size:15px; border-style: dashed; border-radius: 4px; ">
        <div class="text-center">
          <br>
          <h1 class="fst-italic mx-auto" style="font-weight: bold;font-size:60px"> Get In Touch</h1>
          <br>
        </div>
            <div class="row text-center">
                <div class="col"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                    <br><br>
                    <a href="tel:+60179546880" style="text-align:center; font-size: 1.1rem; " class="lh-1">+6017-9546880<br></a>
                    <a href="tel:+60351033212" style="text-align:center; font-size: 1.1rem; " class="lh-1"><br>+603-51033212</a>
                </div>

                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                    <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                  </svg>
                    <br><br>
                    <a href='https://www.google.com/maps/place/Asia+Pacific+University+of+Technology+%26+Innovation+(APU)/@3.0517689,101.6922944,16z/data=!4m9!1m2!2m1!1sapu!3m5!1s0x31cc4abb795025d9:0x1c37182a714ba968!8m2!3d3.0554057!4d101.7005614!15sCgNhcHVaBSIDYXB1kgEScHJpdmF0ZV91bml2ZXJzaXR5'
                    style="text-align:center; font-size: 1rem; " target="_blank" class="lh-1">
                        8 Jalan Teknologi 10, <br>Taman Teknologi Malaysia, <br>57000 Kuala Lumpur, <br>Wilayah Persekutuan Kuala Lumpur
                    </a>
                </div>

                <div class="w-100"></div>
                <br>

                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                    <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                  </svg>
                    <br><br>
                    <a href="https://www.facebook.com/Radiant-Club-Soicety-113966541324963" style="text-align:center; font-size: 1.1rem; " class="lh-1">@Radiant Club & Soicety
                    </a>
                    <br><br><br>
                </div>

                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                  </svg>
                    <br><br>
                    <p style="text-align:center; font-size: 1.1rem; " class="lh-1"><a href="mailto:apu.amcs@gmail.com?subject=subject text">customerservice@radiantcs.com.my</a></p>
                    <br><br><br>
                </div>
            </div>
        </div>
        <br>

    <!--Send Us Message-->
    <div class="content" style="border-style: groove;" >
    <div class="messagecontainer">
            <section class="text-center" style="display: flex; font-family: Koulen,san-serif; font-size:20px; ">
            <br>
                <div class="border border-white border-4 rounded mx-auto"style="display: flex;flex-direction: column;">
                    <h1 class="text-uppercase" style="font-size: 3rem; margin: .5rem .5rem;"><b>Send Us A Message</b></h1>
                    <p style="font-size: 2rem;">Anything We Can Help You With? <br> &nbsp;Kindly Enter Your Information and Message Below.&nbsp;</p>
                </div>
            </section>
        <!--Form-->
            <div class="content" style="font-family: Koulen,san-serif; font-size:20px">
                <form action="" id="f" method="post">
                    <div class="row " >
                        <div class="col-25 text-center">
                            <label for="Mname">Name:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="Mname" name="Mname" class="form-control req" required="required" placeholder="Enter Your Name.." style="height:50px;width:400px">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25 text-center" >
                            <label for="Memail">Email:</label>
                        </div>
                        <div class="col-75">
                            <input type="email" id="Memail" name="Memail" class="form-control req" required="required" placeholder="Enter Your Email Address.." style="height:50px;width:400px;">
                        </div>
                    </div>
                    <hr style="background: #999999; border:0; height:5px" />
                    <div class="row">
                        <div class="col-25 text-center">
                            <label for="Msubject">Subject:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="Msubject" name="Msubject" class="form-control req" required="required" placeholder="Enter Subject.." style="width:400px;">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-25 text-center">
                            <label for="Mmessage">Message:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="Mmessage" name="Mmessage" class="form-control req" required="required" placeholder="Write Message.." style="height:200px"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                      <button type="submit" name="submit" class="btn btn-outline-warning mx-auto" style="width:150px" onclick="alertmessage()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>

        <script>
            var form = document.getElementById('f');

            function alertmessage() {
                if (form.checkValidity()) {
                    alert("Message Submitted Successfully!\nWe will respond you through email, it might wil take 1-3 working days.");
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
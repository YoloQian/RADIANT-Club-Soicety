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
      <?php include "logic.php"; ?>
      <?php foreach($result as $r){ ?>
      <title><?php echo $r["cname"]; ?> - RADIANT</title>
      <?php } ?>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

      span {
          color: #e6b800;
      }


      .followus .fa {
          padding: 20px;
          font-size: 30px;
          width: 80px;
          text-align: center;
          text-decoration: none;
          margin: 5px 2px;
      }

      .fa-facebook {
          background: #3B5998;
          color: white;
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
        max-width: 400px;
        
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
            <a class="nav-link" style="color:#737373" href="about.php">ABOUT US</a>
          </li>
          <div class="dropdown">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active"  aria-current="page" data-bs-toggle="dropdown" ondblclick="location.href='clubs.php?id='" style="color:#ffd11a" role="button" aria-expanded="false">Club & Society</a>
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
      
      <!-- Show club information -->
      
      <?php include "logic.php"; ?>

      <?php foreach($result as $r){ ?>
        <form method="GET">
          <section class="bg-accent bg-position-center bg-size-cover py-3 py-sm-5" style="background-image: url(<?php echo 'clubswallpaper/' .$r["wallpaper"]; ?>); max-height: 100%">
            <div class="container py-5">
              <div class="row pt-md-5 pb-lg-5 justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10 text-center py-xl-3 rounded-top" style="background-color: #333333;">
                  <h1 class="text-light pb-sm-3">
                    <span class="fw-light" style="font-size: 3rem; ">Welcome to <b><?php echo $r["cname"]; ?></b><br></span>
                  </h1>
                    <span class="d-inline-block h5 text-light fw-light mx-2 opacity-70" style="text-align: justify; text-justify: inter-word; ">
                      <?php echo $r['content']; ?>
                    </span>
                  <input type="button" class="btn btn-warning btn-lg" value="JOIN US"  style="margin-top:25px; font-weight: bold;"
                   onClick='window.location.href="joinclub.php?cid=<?php echo $r["cid"];?>"'>
                </div>
              </div>
            </div>
          </section>
        </form>
      <?php
        }
      ?>
      
    <!-- Show club events -->
    <?php

        $query = "SELECT * FROM events INNER JOIN clubs ON events.cid = clubs.cid WHERE events.cid = clubs.cid ORDER BY events.eid desc limit 6 ";
        $result = mysqli_query($conn,$query);

        if(isset($_REQUEST['cid'])){
          $cid = $_REQUEST['cid'];
          $query = "SELECT * FROM events INNER JOIN clubs ON events.cid = clubs.cid WHERE events.cid = $cid ORDER BY events.eid desc limit 6 ";
          $result = mysqli_query($conn,$query);
        }

    ?>
    <br>
    <h1 class="text-center">Events</h1>
    <div class="grid-container" style='margin: 30px 80px;'>
    
        <?php 
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_array($result)){
        ?>
        <?php foreach($result as $r){ ?>
        <div class='grid-item'>
          <div class="clubs">
            <h2><br><?php echo $r["etitle"]; ?></h2>
            <img src="<?php echo 'eventsimages/' .$r["eimage"]; ?>"><br>
            <h6 class="card-subtitle mt-2 text-muted">Posted on - 
                    <?php 
                          echo $r["edate_time"];
                      ?>
                    </h6>
            <hr>
            <input type="button" class="btn btn-primary" value="Learn More" onClick='window.location.href="eventsdetails.php?eid=<?php echo $r["eid"];?>"'>
            <hr>
          </div>
        </div>
        <?php
          }
        }
        ?>
    </div>
    <br>
     
    <!-- Show club contact -->
    <div class="container px-4 py-5" id="icon-grid">
      <h2 class="pb-2 border-bottom">Contact Us</h2>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <div class="col d-flex align-items-start">
          <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#bootstrap"></use></svg>
          <div class="followus">
            <h4 class="fw-bold mb-0">Website:</h4>
            <a style="font-size:1.7rem" href=" <?php echo 'http://www.' .$r["link"]; ?>" class="fa fa-link" target="_blank">&nbsp;Check&nbsp;Out</a>
          </div>
        </div>
        <div class="col d-flex align-items-start">
          <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cpu-fill"></use></svg>
          <div>
            <h4 class="fw-bold mb-0">E-mail:</h4><br />
            <p style="font-size:1.3rem"><a href="mailto:<?php echo $r["mail"]; ?>?subject=subject text"><?php echo $r["mail"]; ?></a></p>
          </div>
        </div>
        
        <div class="col d-flex align-items-start">
          <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar3"></use></svg>
          <div>
            <h4 class="fw-bold mb-0">Venue:</h4><br />
            <p style="font-size:1.2rem"><?php echo $r["venue"]; ?></p>
            <br />
            <h4 class="fw-bold mb-0">Location:</h4><br />
            <p style="font-size:1.2rem"><?php echo $r["location"]; ?></p>
          </div>
        </div> 
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
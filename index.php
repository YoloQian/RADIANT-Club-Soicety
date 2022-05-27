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
    <link href='https://fonts.googleapis.com/css?family=Koulen' rel='stylesheet'>
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
      .bgcontainer {
      position: relative;
      text-align: center;
      }
      /* Centered text */
      .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      }
      
      .containerbackground {
            margin: 3rem;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: -1;
            transform: rotate(300deg);
            -webkit-transform: rotate(300deg);
            color: #c6afaf;
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
          <a class="nav-link active" style="color:#ffd11a" aria-current="page" href="index.php">HOME</a>
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
 <!--admin button -->
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
                    <!-- admin only see -->
                    <?php
                    if($_SESSION['fullname'] == 'admin'){
                    echo "<li><a class='dropdown-item' href='adashboard.php'><i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp;Admin</a></li>";
                    }
                    ?> <!-- end here-->
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
    
    <!-- Explore Club -->
    <div style="background-color: #FFFFED;">
      <div class="p-4 p-md-5 mb-4 rounded text-center content" style="background:url('images/clubs-and-socities-page-banner.png') no-repeat; background-size:contain;background-size: 100% 60%;">
          <h1 class="display-3 fst-italic" style="font-family: Koulen,san-serif; margin-top:300px;  text-shadow: 5px 5px 5px #4DC7C7;">
          Wider Range of Social, <br>Cultural and Education Activities<br>To choose from</h1>
          <button onclick="location.href='#Clubs-Category'" type="button" class="btn btn-warning btn-lg " style="border-radius: 10%; margin-top:25px; font-weight: bold;">
          Explore &nbsp;<img src="images/right-arrow.png" ></button>
      </div>
    </div>

    <!--Introduce Radiant-->
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative mx-auto content" style="background-color: #ffff99">
        <div class="col p-4 d-flex flex-column position-static text-center" style="font-family: Koulen,san-serif;">
          <h1 class="mb-0" style=" font-size: 6rem">RADIANT Club & Society</h1>
          <br>
          <p class="card-text mb-auto" style="font-size: 1rem">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <br>
          <button onclick="location.href='about.php'" type="button" class="btn btn-outline-warning mx-auto" style="font-weight: bold; width:200px;">Learn More</button>
        </div>
        <div class="col-auto d-none d-lg-block">
          <img src="images/radiant_whitebg.jpg" width="400" height="400">
      </div>
    </div>

    <!--Category-->
    <section id="Clubs-Category" class="content border border-4 rounded-3">
    <br>
    <div class="card mx-auto" style="width: 60%">
      <img src="images/Clubs-Societies_banner.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title text-center">Clubs & Society provide students with many positive experiences that help them to become well-rounded individuals who are ready for world. 
          <br>Joining a club can be one of the best decisions that a student ever made.</h5>
          <br>
          <p class="card-text text-end " style="font-weight: bold;">Check Our Clubs Now</p>
        <a href="clubs.php?id=" class="btn btn-primary float-end" style="width:100px;font-weight: bold;">Go </a>
      </div>
    </div>
    <br><br>

      <!-- Three columns of text below the carousel -->
      <div class="row">
        
        <div class="col-lg-4 text-center">
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/academic.png" class="img-thumbnail" alt="...">
          <h4>COURSE-BASED & ACADEMIC</h4>
          <p>These clubs provide a platform for junior and senior students to know each other better and establish a strong bond in developing useful peer support in overcoming challenges faced during their studies.</p><br>
          <p><a class="btn btn-secondary" href="clubs.php?id=course-based and academic">View details »</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 text-center">
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/interest.png" class="img-thumbnail" alt="...">
          <h4>GENERAL INTEREST</h4>
          <p>General Interest clubs give students with a shared interest the opportunity to engage with one another. Students with similar interests in a particular area to collectively and informally pursue that interest.</p><br>
          <p><a class="btn btn-secondary" href="clubs.php?id=general interest">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        
        <div class="col-lg-4 text-center">
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/performing.png" class="img-thumbnail" alt="...">
          <h4>PERFORMING & CREATIVE</h4>
          <p>Students encounter the creative and performing arts through broads disciplines: Music, Dance, Visual Art, Drama etc. Each contributes to their holistic development, including the participation of the mind, body and spirit, along with the use of the mind. </p>
          <p><a class="btn btn-secondary" href="clubs.php?id=performing and creative">View details »</a></p>
        </div><!-- /.col-lg-4 -->
          
        <div class="col-lg-4 text-center">
          <br>
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/recreation.png" class="img-thumbnail" alt="...">
          <h4>RECREATION, SPORTS & GAMES</h4>
          <br>
          <p>Provides a platform for students to lead a balanced lifestyle, gain new experiences, competition using video games, 
            friendships through various Recreation clubs, Sporting clubs, Games clubs and activities. </p><br><br>
          <p><a class="btn btn-secondary" href="clubs.php?id=recreation, sport and games">View details »</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 text-center">
        <br>
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/voluntary.png" class="img-thumbnail" alt="...">
          <h4>COMMUNITY CENTRIC & VOLUNTARY</h4>
          <p>A platform to enable student volunteers to give back to society through service encompassing education, empowerment and healthcare.Through these clubs, 
            students have the opportunity to work together to extend a helping hand to those in need and improve the quality of lives of the less fortunate.</p>
          <p><a class="btn btn-secondary" href="clubs.php?id=community centric and voluntary">View details »</a></p>
        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4 text-center">
        <br>
        <img class="bd-placeholder-img rounded" width="140" height="140" src="images/international.png" class="img-thumbnail" alt="...">
          <h4>CULTURAL & INTERNATIONAL COMMUNITIES</h4>
          <p>These clubs dedicated to spreading awareness, sharing, understanding culture relationships around the world, its people, diversity, values. Activities 
            and events to explore international, cultural, historical, and socio-economic affairs and bring together people of all backgrounds and nationalities.
          </p>
          <p><a class="btn btn-secondary" href="clubs.php?id=cultural and international communities">View details »</a></p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

    </div>
    </section>
    <br><br>


    <!-- Recent Event -->
    <div id="carouselExampleDark" class="carousel carousel-dark slide mx-auto content" style="font-family: Koulen,san-serif;" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="events/event-banner.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block card">
          <h3>First slide label</h3>
          <p>Some representative placeholder content for the first slide.</p>
          <a href="#" class="btn btn-primary stretched-link">Details</a>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="events/event-banner.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block card">
          <h3>Second slide label</h3>
          <p>Some representative placeholder content for the second slide.</p>
          <a href="#" class="btn btn-primary stretched-link">Details</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="events/event-banner.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block card">
          <h3>Third slide label</h3>
          <p>Some representative placeholder content for the third slide.</p>
          <a href="#" class="btn btn-primary stretched-link">Details</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="events/event-banner.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block card">
          <h3>More Events!</h3>
          <a href="events.php" class="btn btn-primary stretched-link">View More</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Help -->
  <br><br>
  <div class="card mx-auto content" style="width:50%; font-family: Koulen,san-serif;">
  <br>
  <img src="images/helpdesk.webp" class="card-img-top mx-auto" alt="...">
  <div class="card-body mx-auto text-center">
    <h1 class="card-title">Need Any Help?</h1>
    <br>
    <a href="contact.php" class="btn btn-primary btn-lg">Contact Us Now!</a>
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
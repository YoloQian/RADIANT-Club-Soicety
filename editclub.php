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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Club - RADIANT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
      label{
        font-weight: bold;
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
    </div>
    </div>
    
    <!--Profile-->
    <?php   
                $sql_query = "SELECT * FROM clubs WHERE cid = $id";
                $result = mysqli_query($conn, $sql_query);
                while ($row = mysqli_fetch_array($result)) {
            
            ?>
    <div class="container rounded bg-white mt-5 mb-5 content" style="font-family: Source Sans Pro,san-serif;">
    <div class="row d-flex justify-content-center" style="width: 1300px; ">
        <div class="col-md-3 border-right">
            <div class="align-items-center text-center p-3 py-2">            
            <span class="font-weight-bold" style="font-size: 1.3rem;">
                <img class="d-block mx-auto mb-4" src="<?php echo 'clubsimages/' .$row["cimage"]; ?>" alt="" width="130" height="130">

            </span>
            </div>
            </div>
            

    
        <div class="col-md-9 border-right"> 
            <div class="p-3 py-5">
            <form action="./clubmodify.php?id=<?= $id ?>" method="POST" onSubmit="return validate();">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right" style="font-size:2.5rem"><b>Club Profile</b></h4>
                </div>
                <div class="row mt-2">
                <img class="d-block mx-auto mb-4" src="<?php echo 'clubswallpaper/' .$row["wallpaper"]; ?>" alt="" width="500" height="300">
                  <div class="col-md-6">
                      <label class="labels">ID</label>
                      <input type="text" name="idnum" class="form-control" placeholder="" readonly value="<?= $row["cid"]?>">
                  </div>
                  <div class="col-md-6">  
                        <label class="labels">Club Name</label>
                        <input type="text" name="clubname" class="form-control"  placeholder="" value="<?= $row["cname"]?>" >
                    </div>
                </div>
                <div class="row mt-2">
                    
                    <div class="col-md-6">  
                        <label class="labels">Category</label>
                        <select id="category" name="category" class="form-control" value="<?= $row["category"]?>">
                            <option value="Course-based & Academic">Course-based & Academic</option>
                            <option value="General Interest">General Interest</option>
                            <option value="Performing & Creative">Performing & Creative</option>
                            <option value="Recreation, Sport & Games">Recreation, Sport & Games</option>
                            <option value="Community Centric & Voluntary">Community Centric & Voluntary</option>
                            <option value="Cultural & Internation Communities">Cultural & Internation Communities</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Content</label>
                        <textarea type="text" name="content" class="form-control" placeholder="" style="height:500px" value=""><?= $row["content"]?></textarea>
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">Link</label>
                        <input type="text" name="link" class="form-control" placeholder="" value="<?= $row["link"]?>" >
                    </div>

                    <div class="col-md-6">  
                        <label class="labels">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="" value="<?= $row["mail"]?>" >
                    </div>
                    <div class="col-md-6">  
                        <label class="labels">Venue</label>
                        <input type="text" name="venue" class="form-control" placeholder="" value="<?= $row["venue"]?>" >
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Location</label>
                        <input type="text" name="location" class="form-control" value="<?= $row["location"]?>">
                    </div>
                    <div class="col-md-2">
                    <br>
                    <input type="submit" class="btn btn-warning" value="Submit"></button>
                    </div>
                    <div class="col-md-2">
                    <br>
                    <button type="submit" class="btn btn-info" form='' onclick="location.href='adclub.php'" id= "$row['sid']"  value="Submit">Back</button>
                    </div>
                </div>
                </div>
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
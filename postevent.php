<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbase = "sdp";
//establish connection to mysql server
$conn = mysqli_connect($servername,$user,$password,$dbase);

session_start();



//
    if(isset($_POST['submit'])){
    $etitle = $_POST['etitle'];

    $eimage = $_FILES["eimage"]["name"];
        $tempeimage = $_FILES["eimage"]["tmp_name"];
            $efolder = "eventsimages/" . $eimage;

    $edescription = $_POST['edescription'];
    $eannouncement = $_POST['eannouncement'];
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    //create your insert sql
    $query="INSERT INTO `events`(`eid`, `etitle`, `eimage`, `announcement`, `description`, `cid`, `cname`) VALUES ('[value-1]','$etitle','$eimage','$eannouncement','$edescription','$cid','$cname')";
    mysqli_query($conn, $query);
    if (move_uploaded_file($tempeimage, $efolder)) {
        $msg = "Event logo uploaded successfully";
    }else {
        $msg = "Failed to uplaod Event logo";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Event - RADIANT</title>
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
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">RADIANT Club & Society</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php">Log out</a>
        </div>
    </div>
    </header>
    
    
    <body class="bg-light">
        
    
    <div class="container">
    <main>


        <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="images/post_event.jpg" alt="" width="450px" height="350px">
        <h2>Post Event</h2>
        <p class="lead">Fill Up the Form Below. To Post Your Event.</p>
        </div>

        <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Tips</span>
            </h4>
            <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Next Line</h6>
                <small class="text-muted">󠀩<i class="bi bi-chevron-left"></i>br<i class="bi bi-chevron-right"></i></small>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Put Emoji</h6>
                <a href="https://getemoji.com" target="_blank"><small class="text-muted">Copy and Paste From Here</small></a>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Bold</h6>
                <small class="text-muted">󠀩Between <i class="bi bi-chevron-left"></i>b<i class="bi bi-chevron-right"></i> and <i class="bi bi-chevron-left"></i>/b<i class="bi bi-chevron-right"></i> </small>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                <h6 class="my-0">Link</h6>
                <small class="text-muted">󠀩<i class="bi bi-chevron-left"></i>a href="(Your link)"<i class="bi bi-chevron-right"></i> (Your Link) <i class="bi bi-chevron-left"></i>/a<i class="bi bi-chevron-right"></i> </small>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                <h6 class="my-0">Learn More</h6>
                <a href="https://www.w3schools.com/html/html_formatting.asp target="_blank"><small>Click Here</small></a>
                </div>
            </li>
            </ul>
            <input type="button" class="btn btn-info" value="Go back" onclick="history.back()">
        </div>
        <div class="col-md-7 col-lg-8">
            <!--Form -->
            <h4 class="mb-3">Event Details</h4>
            <form class="needs-validation" novalidate="" id="a" method="post" enctype="multipart/form-data">
            <div class="row g-3">

                <div class="col-12">
                <label class="form-label">Event Title</label>
                <div class="input-group has-validation">
                    <span class="input-group-text"><i class="fa fa-hashtag" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" id="etitle" name="etitle" placeholder="Title.." required>
                <div class="invalid-feedback">
                    Event Title is required.
                    </div>
                </div>
                </div>

                <div class="col-12">
                <label class="form-label">Event Image</label>
                <input class="form-control" type="file" id="eimage" name="eimage" required />
                <div class="invalid-feedback">
                    Please upload a image for your Event.
                </div>
                </div>

                <div class="col-12">
                <label for="address" class="form-label">Event Description</label>
                <textarea class="form-control" id="edescription" name="edescription" placeholder="Description.." rows="10" required></textarea>
                <div class="invalid-feedback">
                    Please enter your Event Description.
                </div>
                </div>

                <div class="col-12">
                <label for="address2" class="form-label">Announcement <span class="text-muted">(Optional)</span></label>
                <textarea type="text" class="form-control" id="eannouncement" name="eannouncement" placeholder="Any Announcement..?" rows="5"></textarea>
                </div>

                <!-- Club Details -->
                <?php       
                $result =mysqli_query($conn,"SELECT * from clubs");
                $profile =mysqli_query($conn,"SELECT * from students");

                    while($row = mysqli_fetch_array($profile))
                    {if($row['username'] == $_SESSION['fullname'])
                    {while($line = mysqli_fetch_array($result))
                        {if($line['cid'] == $row['15'])
                        {
                            ?>
                       
                
                <br>
                <h4 class="mb-1">Club Information</h4>
                <div class="row gy-2">
                    <div class="col-md-4">
                    <label for="cid" class="form-label">Club ID</label>
                    <input type="text" class="form-control" id="cid" name="cid" value="<?php echo $line['cid']?>" readonly required="">
                    </div>

                    <div class="col-md-4">
                    <label for="cname" class="form-label">Club Name</label>
                    <input type="text" class="form-control" id="cname" name="cname" value="<?php echo $line['cname']?>" readonly required="">
                    </div>
                </div>
                <?php  }
                }
                }}
                ?>

            <hr class="my-4">

            <button type="submit" name="submit" class="w-100 btn btn-outline-primary btn-lg" style="" onclick="alertmessage()">Post Event</button>
            </form>
        </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1"></p>
        <ul class="list-inline">
        </ul>
    </footer>
    </div>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  

</body>


    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>

    <script>
            var form = document.getElementById('a');

            function alertmessage() {
                if (form.checkValidity()) {
                    alert("Event Posted Successfully!");
                }
            }
        </script>

    


</body>
</html>
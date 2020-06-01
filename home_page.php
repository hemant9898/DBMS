<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>LetMeHelp</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" />
  <link rel="stylesheet" href="css/style2.css">
</head>
<body>

<?php
session_start();
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){


$user_name= $_SESSION['USER_ID'];
include("config.php");
$query= "SELECT cust_name from customer where user_name= '$user_name' ";
 $result=mysqli_query($mysqli,$query);

 while($row= mysqli_fetch_array($result,MYSQLI_ASSOC))
   {
     $name=$row['cust_name'];
   }
 ?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="home_page.html" class="navbar-brand">Let Me Help</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="main_page.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">About Us</a>
          </li>


          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
          <li class="nav-item">
            <a href="cust_profile.php" class="nav-link"> <?php echo $name; ;?> </a>
          </li>
          <li class="nav-item">
            <a href="user_logout.php" class="nav-link">LOG OUT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php }
else{

?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
      <a href="home_page.html" class="navbar-brand">Let Me Help</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a href="main_page.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">About Us</a>
          </li>
          <li class="nav-item">
            <a href="newlogin.php" class="nav-link">Sign In</a>
          </li>
          <li class="nav-item">
            <a href="worker_reg.php" class="nav-link">Start Working</a>
          </li>
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php } ?>


  <!-- SHOWCASE SLIDER -->
  <section id="showcase">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item carousel-image-1 active">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
              <h1 class="display-3">Register Now</h1>
              <p class="lead">We are here to make your work easy,registered yourself and book worker any time, anywhere..</p>
              <a href="customer_signup.php" class="btn btn-danger btn-lg">Sign Up</a>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-2">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block mb-5">
              <h1 class="display-3">We are Here to Help</h1>
              <p class="lead"> We take 0% commission.No its not a joke see how??</p>
              <a href="#" class="btn btn-primary btn-lg">Learn More</a>
            </div>
          </div>
        </div>

        <div class="carousel-item carousel-image-3">
          <div class="container">
            <div class="carousel-caption d-none d-sm-block text-right mb-5">
              <h1 class="display-3">Start Working</h1>
              <p class="lead">If you are life saver electrician, plumber, mechanic and find difficulties in
                 finding job and want to work part or full time. Then you are at correct Place  </p>
              <a href="worker_reg.php" class="btn btn-success btn-lg">Start Working</a>
            </div>
          </div>
        </div>
      </div>

      <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
        <span class="carousel-control-prev-icon"></span>
      </a>

      <a href="#myCarousel" data-slide="next" class="carousel-control-next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </section>

  <!-- HOME ICON SECTION -->
  <section id="home-icons" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4 text-center">
          <i class="fa fa-address-card mb-2"></i>
          <h3>Account Privacy</h3>
          <p>We keep your detail private</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fa fa-inr mb-2"></i>
          <h3>Start Earning</h3>
          <p>Start Working be a Freelancer</p>
        </div>
        <div class="col-md-4 mb-4 text-center">
          <i class="fa fa-cart-plus mb-2"></i>
          <h3>Making Money</h3>
          <p>We take 0% commission </p>
        </div>
      </div>
    </div>
  </section>

  <!-- HOME HEADING SECTION -->
  <section id="home-heading" class="p-5">
    <div class="dark-overlay">
      <div class="row">
        <div class="col">
          <div class="container pt-5">
            <h1>Are You Ready To Get Started?</h1>
            <p class="d-none d-md-block">Trouble finding worker who can fix your
             stuffs, we are here to help register now and book your worker now
           </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INFO SECTION -->
  <section id="info" class="py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <h3>OUR POLICY</h3>
          <p>100% Qualified & Trusted Workers.</p>
          <p>Cancellation of Order at anytime.</p>
          <p>0% commission</p>
          <p></p>
          <a href="#" class="btn btn-outline-danger btn-lg">Learn More</a>
        </div>
        <div class="col-md-6" style="opacity:0.9;">
          <img src="img/laptop.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </section>





  <footer id="main-footer" class="text-center p-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>Copyright 2019 &copy; LetMeHelp</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- VIDEO MODAL -->
  <div class="modal fade" id="videoModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
          <iframe src="" height="350" width="100%" frameborder="0" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script src="js/main.js"></script>
</body>
</html>

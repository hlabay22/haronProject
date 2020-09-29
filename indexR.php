<?php session_start();


if (isset($_SESSION['user_log'])) {
  
} else { 
  header("Location: Login.php");
}
if(true){
  $name=($_SESSION['user_name']);
  $gender=($_SESSION['user_gender']);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Welcome To Xaron</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
</head>
<body>





</div>

    <!-- NavBar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Xaron</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="indexR.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="findGuide.php">Find a Local Guide</a>
            </li> -->
            <form action="indexR.php" method="post"> 
        <button type="submit" class="btn btn-secondary" name="findGuide" href="findGuide.php"  style="background-color: #00008B; border: none;">Find a Local Guide</button>
        </form>
            <li class="nav-item">
              <a class="nav-link" href="aboutR.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" style="color:white; margin-left: 25em;"><b>Hello <?php echo $name; ?>! </b> </a>
            </li>

        <form action="indexR.php" method="post"> 
        <button type="submit" class="btn btn-danger" name="logOutSubmit" style="margin-left: 32em;" >Log Out</button>
        </form>

        </div>
        
      </nav>

      <!-- PHP --> 

<div>
<?php 
if(isset($_POST['findGuide'])){    
  // $message = "You Are Now Logged Out";
  // echo "<script type='text/javascript'>alert('$message');</script>";
  // sleep(5);
  // header('Location: index.php'); exit();
  echo "<script>
  window.location.href='findGuide.php';
  </script>";
  
}
if(isset($_POST['logOutSubmit'])){
  // $message = "You Are Now Logged Out";
  // echo "<script type='text/javascript'>alert('$message');</script>";
  // sleep(5);
  // header('Location: index.php'); exit();
  echo "<script>
  alert('You Have Logged Out - Redirect to HomePage');
  window.location.href='index.php';
  </script>";
  session_destroy();
  
}


?>

    <!-- Image Carousel-->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="indexCaruselImages/1.jpg" height="600" width="400" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Xaron Brings Travellers And Local Guides Together</h5>
                <p>Makes Travelling A Lot Much Experienceful & Interactive</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="indexCaruselImages/2.jpg" height="600" width="400" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>World Wide Range Of Travel Prefrences & Styles</h5>
                <p>Everybody Can Find A Perfect Travel Match</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="indexCaruselImages/3.jpg" height="600" width="400" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Save Money On Expensive Organized Group Trips</h5>
                <p>Customize Your Travel With Your Own Local Guide</p>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    
</body>
</html>
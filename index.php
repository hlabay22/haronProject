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

    <!-- NavBar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Xaron</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Find a Local Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>

          </form>

        
        <a href="Login.php"> <button type="submit" class="btn btn-danger" style="margin-left: 68em;" >Login</button></a>
        </div>
      </nav>

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
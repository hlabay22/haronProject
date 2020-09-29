<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Login</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
</head>
<body>

<div>

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
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Find a Local Guide</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>

          </ul>


        </div>
      </nav>



</div>

    <!-- Image -->
      <div class="text-center">
        <img src="openingPageImage/x.png" class="rounded" alt="x logo" height="100" width="150">  
      </div>
      <h2 align="center">Login</h2><br />

      
                  <!-- PHP --> 

   
                  <div>
    <?php session_start();
 
  
    $db_user = "root";
    $db_pass = "";
    $db_name = "useraccounts";
    $db_port = 3308;
    $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

    if ($mysqli->connect_error) {
      die('Connect Error (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
    }

    

    // Traveller Login


    if(isset($_POST['submitTraveller'])){
        $email = $_POST['emailTraveller'];
        $password = $_POST['passwordTraveller'];
  



        $result = $mysqli->query("SELECT * FROM travellerusers WHERE email = '$email'");
        $arr = $result->fetch_assoc();
        define("EMAIL",$arr["email"]);
        define("PASS",$arr["password"]);
        define("NAME",$arr["firstName"]);
        define("LASTNAME",$arr["lastName"]);
        define("GENDER",$arr["gender"]);
        define("CITY",$arr["city"]);
        define("COUNTRY",$arr["country"]);
        define("LANG1",$arr["lang1"]);
        define("LANG2",$arr["lang2"]);
        define("LANG3",$arr["lang3"]);
        define("TRAVELSTYLE1",$arr["travelStyle1"]);
        define("TRAVELSTYLE2",$arr["travelStyle2"]);
        define("TRAVELSTYLE3",$arr["travelStyle3"]);
        define("TRANSPORT",$arr["transportationType"]);


        if($email==EMAIL && $password==PASS)
        {
          $_SESSION['user_log'] = EMAIL;
          $_SESSION['user_name']= NAME;
          $_SESSION['user_lastName']= LASTNAME;
          $_SESSION['user_gender']=GENDER;
          $_SESSION['user_lang1']=LANG1;
          $_SESSION['user_lang2']=LANG2;
          $_SESSION['user_lang3']=LANG3;
          $_SESSION['user_travelStyle1']=TRAVELSTYLE1;
          $_SESSION['user_travelStyle2']=TRAVELSTYLE2;
          $_SESSION['user_travelStyle3']=TRAVELSTYLE3;
          $_SESSION['user_transport']=TRANSPORT;
          $name=$_SESSION['user_name'];

          echo "<script>
          alert('Hello ".$name."! You Are Now Logged In!');
          window.location.href='indexR.php';
          </script>;"
          ;
        }
        else{
          print ("Email or Password Not Valid! - Please Try Again.");
        }
      }

       // LocalGuide Login

       if(isset($_POST['submitLocalGuide'])){
        $email = $_POST['emailLocalGuide'];
        $password = $_POST['passwordLocalGuide'];
  
        $result = $mysqli->query("SELECT * FROM localguideusers WHERE email = '$email'");
        $arr = $result->fetch_assoc();


        
        define("EMAIL",$arr["email"]);
        define("PASS",$arr["password"]);
        define("NAME",$arr["firstName"]);
        define("LASTNAME",$arr["lastName"]);
        define("GENDER",$arr["gender"]);
        define("CITY",$arr["city"]);
        define("COUNTRY",$arr["country"]);
        define("LANG1",$arr["lang1"]);
        define("LANG2",$arr["lang2"]);
        define("LANG3",$arr["lang3"]);
        define("TRAVELSTYLE1",$arr["travelStyle1"]);
        define("TRAVELSTYLE2",$arr["travelStyle2"]);
        define("TRAVELSTYLE3",$arr["travelStyle3"]);
        define("TRANSPORT",$arr["transportationType"]);

        if($email==EMAIL && $password==PASS)
        {
          $_SESSION['user_log'] = EMAIL;
          $_SESSION['user_name']= NAME;
          $_SESSION['user_lastName']= LASTNAME;
          $_SESSION['user_gender']=GENDER;
          $_SESSION['user_lang1']=LANG1;
          $_SESSION['user_lang2']=LANG2;
          $_SESSION['user_lang3']=LANG3;
          $_SESSION['user_travelStyle1']=TRAVELSTYLE1;
          $_SESSION['user_travelStyle2']=TRAVELSTYLE2;
          $_SESSION['user_travelStyle3']=TRAVELSTYLE3;
          $_SESSION['user_transport']=TRANSPORT;
          $name=$_SESSION['user_name'];
          echo "<script>
          alert('Hello ".$name."! You Are Now Logged In!');
          window.location.href='indexR.php';
          </script>;"
    
          ;
        }
        else{
          header('Location: loginAfterError.php'); exit;

          //print ("Email or Password Not Valid! - Please Try Again.");
        }
      }


        ?>

      <!-- Container-->

      <div class="jumbotron">
        <p class="lead">Hello , You can login as a Traveller or as a Local Travel Guide</p>
        
        <!-- Login Opts Tab Selector -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Traveller Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#profile">Local Guide Login</a>
            </li>

          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="home">
              <!-- Traveller Login Form (1) -->
              <br>
                    <div class="col-md-6 login-form-1">
                        <h3>Traveller Login</h3>
                        <form action="Login.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="emailTraveller" placeholder="Your Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordTraveller" placeholder="Your Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submitTraveller" class="btnSubmit" value="Login" />
                            </div>
                            <div class="form-group">
                                <a href="#" class="ForgetPwd">Forget Password?</a>
                            </div>
                            <br>
                            <div class="form-group">
                                <a href="registerTraveller.php">Register as a Traveller</a>
                            </div>
                        </form>
                    </div>

            </div>
            <div class="tab-pane fade" id="profile">


              <!-- Travel Local Guide Login Form (2) -->
              <br>
              <div class="col-md-6 login-form-2">
                <h3>Local Guide Login</h3>
                <form action="Login.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="emailLocalGuide" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passwordLocalGuide" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submitLocalGuide" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                    <br>
                    <div class="form-group">
                        <a href="registerLocalGuide.php">Register as a Local Travel Guide</a>
                    </div>
                </form>
            </div>
            </div>
          </div>


      </div>


    
</body>
</html>
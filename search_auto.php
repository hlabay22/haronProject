<?php 
session_start();

$lang1= $_SESSION['user_lang1'];
$lang2= $_SESSION['user_lang2'];
$lang3= $_SESSION['user_lang3'];
$travelStyle1=$_SESSION['user_travelStyle1'];
$travelStyle2=$_SESSION['user_travelStyle2'];
$travelStyle2=$_SESSION['user_travelStyle3'];
$gender= $_SESSION['user_gender'];
$lang1= $_SESSION['user_lang1'];

$transport=$_SESSION['user_transport'];




$db_user = "root";
$db_pass = "";
$db_name = "useraccounts";
$db_port = 3308;
$mysqli2 = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

if ($mysqli2->connect_error) {
  die('Connect Error (' . $mysqli2->connect_errno . ') '
      . $mysqli2->connect_error);
}
    $country=$_POST['countryTraveller'];
    $city = $_POST['place'];
    $date=$_POST['date'];


    $result = $mysqli2->query("SELECT * FROM localguideusers
    WHERE city = '$city'
    AND country = '$country'
    AND lang1 = '$lang1'
    AND travelStyle1 = '$travelStyle1'
    AND transportationType = '$transport'
    ");
    $arr = $result->fetch_assoc();

    if(mysqli_num_rows($result) > 0)
    {
// if (true){
    define("NAME",$arr["firstName"]);
    define("LASTNAME",$arr["lastName"]);  
    define("PHONE",$arr["phone"]); 
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
    define("DATE",$arr["dob"]);
    define("ABOUT",$arr["aboutMe"]);
    define("IMAGE",$arr["userImage"]);

    

    $_SESSION['guide_firtsName']= NAME;
    $_SESSION['guide_lastName']= LASTNAME;
    $_SESSION['guide_phone']= PHONE;
    $_SESSION['guide_gender']=GENDER;
    $_SESSION['guide_lang1']=LANG1;
    $_SESSION['guide_lang2']=LANG2;
    $_SESSION['guide_lang3']=LANG3;
    $_SESSION['guide_travelStyle1']=TRAVELSTYLE1;
    $_SESSION['guide_travelStyle2']=TRAVELSTYLE2;
    $_SESSION['guide_travelStyle3']=TRAVELSTYLE3;
    $_SESSION['guide_transport']=TRANSPORT;
    $_SESSION['guide_date']=DATE;
    $_SESSION['guide_about']=ABOUT;
    $_SESSION['guide_image']=IMAGE;
    

    }
    else{
       echo "<script>
    alert('Relevent Guide Not Found, Please Try Again. ');
    window.location.href='findGuide.php';
    </script>;";
    }



if(true){
$city=$_POST['place'];
$userTime=$_POST['date'];
$guideName=($_SESSION['guide_firtsName']);
$guideLastName=($_SESSION['guide_lastName']);
$guidePhone=($_SESSION['guide_phone']);
$guideLang1=($_SESSION['guide_lang1']);
$guideLang2=($_SESSION['guide_lang2']);
$guideLang3=($_SESSION['guide_lang3']);
$guideTravelStyle1=($_SESSION['guide_travelStyle1']);
$guideTravelStyle2=($_SESSION['guide_travelStyle2']);
$guideTravelStyle3=($_SESSION['guide_travelStyle3']);
$guideTrans=($_SESSION['guide_transport']);
$guideDate=($_SESSION['guide_date']);
$guideAbout=($_SESSION['guide_about']);
$guideGender=($_SESSION['guide_gender']);
$guideTransport=($_SESSION['guide_transport']);
$guideImage=($_SESSION['guide_image']);


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
    <title>Find a Local Guide</title>
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
              <a class="nav-link" href="findGuide.php">Find a Local Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>

          </ul>
          <form action="findGuide.php" method="post"> 
            <button type="submit" class="btn btn-danger" name="back" style="margin-left: 0em; background-color: red; 
            border: none;" href="findGuide.php" >Back</button>
            </form>

        </div>
      </nav>
  <br><br><br>    
 <div class="card text-white bg-primary mb-3" style="max-width: 20rem; margin-left: 35em">
  <div class="card-header">The Best Match Based On Your Travel Preferences</div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $guideName."\n"; echo $guideLastName."\n"; ?></h4>
    <br>
    <img src="localGuideImages/<?php echo $guideImage;?>" alt=" " height="75" width="75">

    <p class="card-text">You Can Contact Him at: <?php echo $guidePhone."\n"; ?> </p>


<!------popup window--------->
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  color: Black;

  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>



<!-- Trigger/Open The Modal -->
<button id="myBtn">More Details</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <span class="close">&times;</span>
    <p>
    <b>Name: </b> <?php echo  $guideName." ".$guideLastName ?><br>
    <b>Phone: </b> <?php echo  $guidePhone ?><br>
    <b>City: </b> <?php echo $city .", ".$country ?><br>
    <b>Language(s): </b> <?php echo $guideLang1 .", ".$guideLang2.", ".$guideLang3 ?><br>
    <b>Travel Styles:</b> <?php echo $guideTravelStyle1 .", ".$guideTravelStyle2.", ".$guideTravelStyle3 ?><br>
    <b>Date Of Birth: </b><?php echo  $guideDate ?><br>
    <b>Gender: </b> <?php echo  $guideGender ?><br>
    <b>Transportation Type: </b> <?php echo  $guideTransport ?><br>
    <b>About : </b> <?php echo  $guideAbout ?><br>
    <b>Image :</b> 
    
    <img src="localGuideImages/<?php echo $guideImage;?>" alt=" " height="75" width="75">
    </p>
  </div>
  <?php echo $guideImage;?>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>

  </div>
</div>
</div>

</div>
<?php



// $db_user = "root";
//     $db_pass = "";
//     $db_name = "guide";
//     $db_port = 3308;
//     $connect = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
    // $output = '';
//     if(true))
// {
//     $query = "
//      SELECT * FROM localguideusers 
//       WHERE gender LIKE '%".$gender."%' 
//       AND  lang1 LIKE '%".$lang1."%' 
//       AND  lang2 LIKE '%".$lang2."%' 
//       AND  travelStyle1 LIKE '%".$travelStyle1."%' 
//       AND  transport  LIKE '%".$transport."%' 
//       AND  city LIKE '%".$city."%'
//           ";
//   }
//    else
//   {
//   $query = "
//    SELECT * FROM localguideusers ORDER BY country
//     ";
//   }
//     $result = mysqli_query($connect, $query);
//     if(mysqli_num_rows($result) > 0)
//     {
//      $output .= '
//       <div class="table-responsive">
//        <table class="table table bordered">
//         <tr>
//          <th>First Name</th>
//          <th>Last Name</th>
//          <th>City</th>
//          <th>Country</th>
//          <th>Phone Number</th>
//         </tr>
//      ';
//      while($row = mysqli_fetch_array($result))
//      {
//       $output .= '
//        <tr>
//         <td>'.$row["firstName"].'</td>
//         <td>'.$row["lastName"].'</td>
//         <td>'.$row["city"].'</td>
//         <td>'.$row["country"].'</td>
//         <td>'.$row["phone"].'</td>
//        </tr>
//       ';
//      }
//      echo $output;
//     }
//     else
//     {
//      echo 'Data Not Found';
//     }
    // if ($connect->connect_error) {
    //   die('Connect Error (' . $connect->connect_errno . ') '
    //       . $connect->connect_error);
    // }
    // if(true){
    // $result = $connect->query("SELECT * FROM localguideusers WHERE gender = '$gender' AND lang1 = '$lang1' AND lang2 = '$lang2' AND travelStyle1 = '$travelStyle1' AND transport = '$transport' AND city='$city'");
    // $array = $result->fetch_assoc();
    
    // }
        



   

// session_start();

// if (isset($_SESSION['user_place'])) {

// }else{
//   echo 'error';
// } 
// if(true){ 
// }
// // if(true){
// //   echo '
// //   <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
// //   <div class="card-header">We found a guide spciali for your Preferences</div>
// //   <div class="card-body">
// //     <h4 class="card-title">guide details</h4>
// //     <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
// //   </div>
// // </div>';
// // }


// if(isset($_POST['Back'])){
//   // $message = "You Are Now Logged Out";
//   // echo "<script type='text/javascript'>alert('$message');</script>";
//   // sleep(5);
//   // header('Location: index.php'); exit();
//   echo "<script>
//   window.location.href='findGuide.php';
//   </script>";
//   session_destroy();
  
// }
?> 
     


    
</body>
</html>
<?php
 
 $db_user = "root";
 $db_pass = "";
 $db_name = "useraccounts";
 $db_port = 3308;
 $connect = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
//$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM localguideusers 
  WHERE firstName LIKE '%".$search."%'
  OR lastName LIKE '%".$search."%' 
  OR City LIKE '%".$search."%' 
  OR country LIKE '%".$search."%' 
  
 ";
}
else
{
 $query = "
  SELECT * FROM localguideusers ORDER BY country
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>City</th>
     <th>Country</th>
     <th>Phone Number</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["firstName"].'</td>
    <td>'.$row["lastName"].'</td>
    <td>'.$row["city"].'</td>
    <td>'.$row["country"].'</td>
    <td>'.$row["phone"].'</td>
    

    
   </tr>
  '; 

$city=$row["city"];
$guideName=$row["firstName"];
$guideLastName=$row["lastName"];
$guidePhone=$row["phone"];
$guideLang1=$row["lang1"];
$guideLang2=$row["lang2"];
$guideLang3=$row["lang3"];
$guideTravelStyle1=$row["travelStyle1"];
$guideTravelStyle2=$row["travelStyle2"];
$guideTravelStyle3=$row["travelStyle3"];
$guideAbout=$row["aboutMe"];
$guideGender=$row["gender"];
$guideTransport=$row["transportationType"];
$guideImage=$row["userImage"];
$guideDate=$row["dob"];
$country=$row["country"];

 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}



?>

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
    <br>
    <b>Image :</b> 
    <img src="data:image/jpeg;base64,<?php echo base64_encode( $guideImage) ?>" width=200 height=200/>
    </p>
  </div>
  
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
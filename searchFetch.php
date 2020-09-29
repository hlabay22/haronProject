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
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="datepicker.js"></script>
    <title>Traveller Registertion</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
</head>
<body>

<!-- NavBar -->
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
              <a class="nav-link" style="color : black;" href="Login.php">Find a Local Guide</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>

          </ul>

        </div>
      </nav>

    <!-- Image -->
      <div class="text-center">
        <img src="openingPageImage/x.png" class="rounded" alt="x logo" height="100" width="150">  
      </div>

       <!-- PHP --> 

   
       <div>
    <?php 

    $db_user = "root";
    $db_pass = "";
    $db_name = "useraccounts";
    $db_port = 3308;
    $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

    if ($mysqli->connect_error) {
      die('Connect Error (' . $mysqli->connect_errno . ') '
          . $mysqli->connect_error);
    }



    if(isset($_POST['submitTraveller'])){
        $email = $_POST['emailTraveller'];
        $password = $_POST['passwordTraveller'];
        $firstName = $_POST['firsNameTraveller'];
        $lastName = $_POST['lastNameTraveller'];
        $dob = $_POST['dobTraveller'];
        $gender = $_POST['genderTraveller'];
        $city = $_POST['cityTraveller'];
        $country = $_POST['countryTraveller'];
        $lang1 = $_POST['lang1Traveller'];
        $lang2 = $_POST['lang2Traveller'];
        $lang3 = $_POST['lang3Traveller'];
        $phoneNumber = $_POST['phoneTraveller'];
        $travelSytle1 = $_POST['travelStyle1Traveller'];
        $travelSytle2 = $_POST['travelStyle2Traveller'];
        $travelSytle3 = $_POST['travelStyle3Traveller'];
        $transportation = $_POST['optionTransport'];
        $aboutMeText = $_POST['aboutMeTraveller'];
        $notifacations = $_POST['optionsNotsTraveller'];



        $result = $mysqli->query("SELECT * FROM travellerusers WHERE email = '$email'");
        $arr = $result->fetch_assoc();
        define("EMAIL",$arr["email"]);
        


        if($email==EMAIL || empty($phoneNumber) || empty($firstName) || empty($city)|| empty($email))
        {
          if (empty($email)){echo " Email is NULL". "<br>";}
          elseif($email==EMAIL){echo "Email: '$email' already exists !!!" . "<br>";}
          if(empty($phoneNumber)){echo "Phone Number is NULL". "<br>";}
          if(empty($firstName)){echo " First Name is NULL". "<br>";}
          if (empty($city)){echo " City is NULL". "<br>";}
        }

        else
        {
          $sql = "INSERT INTO travellerusers (email,password,firstName,lastName,dob,gender,city,country,lang1,lang2,lang3,phone,travelStyle1,travelStyle2,travelStyle3,transportationType,aboutMe,emailNots)
                   VALUES ('$email','$password','$firstName','$lastName','$dob','$gender','$city','$country','$lang1','$lang2','$lang3','$phoneNumber','$travelSytle1','$travelSytle2','$travelSytle3','$transportation','$aboutMeText','$notifacations')";
          if ($mysqli->query($sql) === TRUE) {
            echo "'$email': New user created successfully";

            //header('Location: registerSucces.php'); exit;
            echo "<script>
            alert('Hello ".$firstName."! Registration is successful, Please login! ');
            window.location.href='login.php';
            </script>;";

          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }


      }




        ?>
    </div>

      <!-- Container-->
      <div class="jumbotron">
      <!-- Registertion form-->
      <form action="registerTraveller.php" method="post">
        <fieldset>
          <legend>Travellar Registration</legend>
          
          <!-- Email input-->
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="emailTraveller" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>

          <!-- Password-->
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="passwordTraveller" id="exampleInputPassword1" placeholder="Password">
          </div>
          <!-- First Name -->
          <div class="form-group">
            <label for="firstNameInput">First Name</label>
            <input type="text" class="form-control" name="firsNameTraveller" id="firstNameInput" rows="1" pattern="^[a-zA-Z]+$"></input>
          </div>

          <!-- Last Name -->
          <div class="form-group">
            <label for="lastNameInput">Last Name</label>
            <input type="text" class="form-control" name="lastNameTraveller" id="lastNameInput" rows="1" pattern="^[a-zA-Z]+$"></input>
          </div>

        <!-- Date of Birth-->
          <div class="form-group row">
           <label for="example-date-input" class="col-2 col-form-label">Date Of Birth</label><br>
            <div class="col-10">
              <input class="form-control" type="date" value="2011-08-19" name="dobTraveller" id="example-date-input">
            </div>
          </div>  

          <!-- Selcet Gender-->
          <div class="form-group">
            <label for="genderSelect">Gender</label>
            <select class="form-control" name="genderTraveller" id="genderSelect">
                <option value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
          </div>
          <!-- Select City-->
          <div class="form-group">
            <label for="cityTextarea">City</label>
            <textarea class="form-control" name="cityTraveller" id="cityTextarea" rows="1"></textarea>
          </div>
          <!-- Selcet Country-->
          <div class="form-group">
            <label for="countrySelect">Country</label>
            <select class="form-control" name="countryTraveller" id="countrySelect">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
          </div>
                  <!-- Selcet Language 1 -->

          <div class="form-group">
            <label for="languageSelect">Select Language 1 (Required)</label>
            <select class="form-control" name="lang1Traveller" id="languageSelect1">
                <option value="Afrikaans">Afrikaans</option>
                <option value="Albanian">Albanian</option>
                <option value="Arabic">Arabic</option>
                <option value="Armenian">Armenian</option>
                <option value="Basque">Basque</option>
                <option value="Bengali">Bengali</option>
                <option value="Bulgarian">Bulgarian</option>
                <option value="Catalan">Catalan</option>
                <option value="Cambodian">Cambodian</option>
                <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                <option value="Croatian">Croatian</option>
                <option value="Czech">Czech</option>
                <option value="Danish">Danish</option>
                <option value="Dutch">Dutch</option>
                <option value="English">English</option>
                <option value="Estonian">Estonian</option>
                <option value="Fiji">Fiji</option>
                <option value="Finnish">Finnish</option>
                <option value="French">French</option>
                <option value="Georgian">Georgian</option>
                <option value="German">German</option>
                <option value="Greek">Greek</option>
                <option value="Gujarati">Gujarati</option>
                <option value="Hebrew">Hebrew</option>
                <option value="Hindi">Hindi</option>
                <option value="Hungarian">Hungarian</option>
                <option value="Icelandic">Icelandic</option>
                <option value="Indonesian">Indonesian</option>
                <option value="Irish">Irish</option>
                <option value="Italian">Italian</option>
                <option value="Japanese">Japanese</option>
                <option value="Javanese">Javanese</option>
                <option value="Korean">Korean</option>
                <option value="Latin">Latin</option>
                <option value="Latvian">Latvian</option>
                <option value="Lithuanian">Lithuanian</option>
                <option value="Macedonian">Macedonian</option>
                <option value="Malay">Malay</option>
                <option value="Malayalam">Malayalam</option>
                <option value="Maltese">Maltese</option>
                <option value="Maori">Maori</option>
                <option value="Marathi">Marathi</option>
                <option value="Mongolian">Mongolian</option>
                <option value="Nepali">Nepali</option>
                <option value="Norwegian">Norwegian</option>
                <option value="Persian">Persian</option>
                <option value="Polish">Polish</option>
                <option value="Portuguese">Portuguese</option>
                <option value="Punjabi">Punjabi</option>
                <option value="Quechua">Quechua</option>
                <option value="Romanian">Romanian</option>
                <option value="Russian">Russian</option>
                <option value="Samoan">Samoan</option>
                <option value="Serbian">Serbian</option>
                <option value="Slovak">Slovak</option>
                <option value="Slovenian">Slovenian</option>
                <option value="Spanish">Spanish</option>
                <option value="Swahili">Swahili</option>
                <option value="Swedish">Swedish </option>
                <option value="Tamil">Tamil</option>
                <option value="Tatar">Tatar</option>
                <option value="Telugu">Telugu</option>
                <option value="Thai">Thai</option>
                <option value="Tibetan">Tibetan</option>
                <option value="Tonga">Tonga</option>
                <option value="Turkish">Turkish</option>
                <option value="Ukrainian">Ukrainian</option>
                <option value="Urdu">Urdu</option>
                <option value="Uzbek">Uzbek</option>
                <option value="Vietnamese">Vietnamese</option>
                <option value="Welsh">Welsh</option>
                <option value="Xhosa">Xhosa</option>
            </select>
          </div>

                    <!-- Selcet Language 2 -->

                    <div class="form-group">
            <label for="languageSelect2">Select Language 2 (Optional)</label>
            <select class="form-control" name="lang2Traveller" id="languageSelect2">
                <option value="">None</option>
                <option value="Afrikaans">Afrikaans</option>
                <option value="Albanian">Albanian</option>
                <option value="Arabic">Arabic</option>
                <option value="Armenian">Armenian</option>
                <option value="Basque">Basque</option>
                <option value="Bengali">Bengali</option>
                <option value="Bulgarian">Bulgarian</option>
                <option value="Catalan">Catalan</option>
                <option value="Cambodian">Cambodian</option>
                <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                <option value="Croatian">Croatian</option>
                <option value="Czech">Czech</option>
                <option value="Danish">Danish</option>
                <option value="Dutch">Dutch</option>
                <option value="English">English</option>
                <option value="Estonian">Estonian</option>
                <option value="Fiji">Fiji</option>
                <option value="Finnish">Finnish</option>
                <option value="French">French</option>
                <option value="Georgian">Georgian</option>
                <option value="German">German</option>
                <option value="Greek">Greek</option>
                <option value="Gujarati">Gujarati</option>
                <option value="Hebrew">Hebrew</option>
                <option value="Hindi">Hindi</option>
                <option value="Hungarian">Hungarian</option>
                <option value="Icelandic">Icelandic</option>
                <option value="Indonesian">Indonesian</option>
                <option value="Irish">Irish</option>
                <option value="Italian">Italian</option>
                <option value="Japanese">Japanese</option>
                <option value="Javanese">Javanese</option>
                <option value="Korean">Korean</option>
                <option value="Latin">Latin</option>
                <option value="Latvian">Latvian</option>
                <option value="Lithuanian">Lithuanian</option>
                <option value="Macedonian">Macedonian</option>
                <option value="Malay">Malay</option>
                <option value="Malayalam">Malayalam</option>
                <option value="Maltese">Maltese</option>
                <option value="Maori">Maori</option>
                <option value="Marathi">Marathi</option>
                <option value="Mongolian">Mongolian</option>
                <option value="Nepali">Nepali</option>
                <option value="Norwegian">Norwegian</option>
                <option value="Persian">Persian</option>
                <option value="Polish">Polish</option>
                <option value="Portuguese">Portuguese</option>
                <option value="Punjabi">Punjabi</option>
                <option value="Quechua">Quechua</option>
                <option value="Romanian">Romanian</option>
                <option value="Russian">Russian</option>
                <option value="Samoan">Samoan</option>
                <option value="Serbian">Serbian</option>
                <option value="Slovak">Slovak</option>
                <option value="Slovenian">Slovenian</option>
                <option value="Spanish">Spanish</option>
                <option value="Swahili">Swahili</option>
                <option value="Swedish">Swedish </option>
                <option value="Tamil">Tamil</option>
                <option value="Tatar">Tatar</option>
                <option value="Telugu">Telugu</option>
                <option value="Thai">Thai</option>
                <option value="Tibetan">Tibetan</option>
                <option value="Tonga">Tonga</option>
                <option value="Turkish">Turkish</option>
                <option value="Ukrainian">Ukrainian</option>
                <option value="Urdu">Urdu</option>
                <option value="Uzbek">Uzbek</option>
                <option value="Vietnamese">Vietnamese</option>
                <option value="Welsh">Welsh</option>
                <option value="Xhosa">Xhosa</option>
            </select>
          </div>

                    <!-- Selcet Language 3 -->

                    <div class="form-group">
            <label for="languageSelect3">Select Language 3 (optional)</label>
            <select class="form-control" name="lang3Traveller" id="languageSelect3">
                <option value="">None</option>
                <option value="Afrikaans">Afrikaans</option>
                <option value="Albanian">Albanian</option>
                <option value="Arabic">Arabic</option>
                <option value="Armenian">Armenian</option>
                <option value="Basque">Basque</option>
                <option value="Bengali">Bengali</option>
                <option value="Bulgarian">Bulgarian</option>
                <option value="Catalan">Catalan</option>
                <option value="Cambodian">Cambodian</option>
                <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                <option value="Croatian">Croatian</option>
                <option value="Czech">Czech</option>
                <option value="Danish">Danish</option>
                <option value="Dutch">Dutch</option>
                <option value="English">English</option>
                <option value="Estonian">Estonian</option>
                <option value="Fiji">Fiji</option>
                <option value="Finnish">Finnish</option>
                <option value="French">French</option>
                <option value="Georgian">Georgian</option>
                <option value="German">German</option>
                <option value="Greek">Greek</option>
                <option value="Gujarati">Gujarati</option>
                <option value="Hebrew">Hebrew</option>
                <option value="Hindi">Hindi</option>
                <option value="Hungarian">Hungarian</option>
                <option value="Icelandic">Icelandic</option>
                <option value="Indonesian">Indonesian</option>
                <option value="Irish">Irish</option>
                <option value="Italian">Italian</option>
                <option value="Japanese">Japanese</option>
                <option value="Javanese">Javanese</option>
                <option value="Korean">Korean</option>
                <option value="Latin">Latin</option>
                <option value="Latvian">Latvian</option>
                <option value="Lithuanian">Lithuanian</option>
                <option value="Macedonian">Macedonian</option>
                <option value="Malay">Malay</option>
                <option value="Malayalam">Malayalam</option>
                <option value="Maltese">Maltese</option>
                <option value="Maori">Maori</option>
                <option value="Marathi">Marathi</option>
                <option value="Mongolian">Mongolian</option>
                <option value="Nepali">Nepali</option>
                <option value="Norwegian">Norwegian</option>
                <option value="Persian">Persian</option>
                <option value="Polish">Polish</option>
                <option value="Portuguese">Portuguese</option>
                <option value="Punjabi">Punjabi</option>
                <option value="Quechua">Quechua</option>
                <option value="Romanian">Romanian</option>
                <option value="Russian">Russian</option>
                <option value="Samoan">Samoan</option>
                <option value="Serbian">Serbian</option>
                <option value="Slovak">Slovak</option>
                <option value="Slovenian">Slovenian</option>
                <option value="Spanish">Spanish</option>
                <option value="Swahili">Swahili</option>
                <option value="Swedish">Swedish </option>
                <option value="Tamil">Tamil</option>
                <option value="Tatar">Tatar</option>
                <option value="Telugu">Telugu</option>
                <option value="Thai">Thai</option>
                <option value="Tibetan">Tibetan</option>
                <option value="Tonga">Tonga</option>
                <option value="Turkish">Turkish</option>
                <option value="Ukrainian">Ukrainian</option>
                <option value="Urdu">Urdu</option>
                <option value="Uzbek">Uzbek</option>
                <option value="Vietnamese">Vietnamese</option>
                <option value="Welsh">Welsh</option>
                <option value="Xhosa">Xhosa</option>
            </select>
          </div>

          <br>
          <hr>

          <!-- Input Phone Number -->
          <div class="form-group">
            <label for="inputPhoneNumber">Phone Number</label>
            <input type="number"  class="form-control" name="phoneTraveller" oninput="validity.valid||(value='');">
          </div>

          <hr>

          <!-- Travel Prefrences-->

          <b>Select Travel Style(s)</b>

          <br>

          <!-- Travel Style 1--> 

            <div class="form-group">
              <label for="travelPrefSelect1">Select Travel Style 1 (Required)</label>
              <select class="form-control" name="travelStyle1Traveller" id="travelPrefSelect1">
                  <option value="Adventure">Adventure</option>
                  <option value="Architecture">Architecture</option>
                  <option value="Art">Art</option>
                  <option value="City Sights">City Sights</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Hiking">Hiking</option>
                  <option value="Local Culture">Local Culture</option>
                  <option value="Music">Music</option>
                  <option value="National">National Parks</option>
                  <option value="Nature">Nature</option>
                  <option value="Sport">Sport</option>
                  <option value="Team Sport">Team Sport</option>
                  <option value="Wagon Driving ">Wagon Driving </option>

              </select>
            </div>

          <!-- Travel Style 2--> 


            <div class="form-group">
              <label for="travelPrefSelect2">Select Travel Style 2 (Optional)</label>
              <select class="form-control" name="travelStyle2Traveller" id="travelPrefSelect2">
                  <option value="">None</option>
                  <option value="Adventure">Adventure</option>
                  <option value="Architecture">Architecture</option>
                  <option value="Art">Art</option>
                  <option value="City Sights">City Sights</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Hiking">Hiking</option>
                  <option value="Local Culture">Local Culture</option>
                  <option value="Music">Music</option>
                  <option value="National">National Parks</option>
                  <option value="Nature">Nature</option>
                  <option value="Sport">Sport</option>
                  <option value="Team Sport">Team Sport</option>
                  <option value="Wagon Driving ">Wagon Driving </option>

              </select>
            </div>

            <!-- Travel Style 3--> 

            <div class="form-group">
              <label for="travelPrefSelect3">Select Travel Style 3 (Optional)</label>
              <select class="form-control" name="travelStyle3Traveller" id="travelPrefSelect3">
                  <option value="">None</option>
                  <option value="Adventure">Adventure</option>
                  <option value="Architecture">Architecture</option>
                  <option value="Art">Art</option>
                  <option value="City Sights">City Sights</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Hiking">Hiking</option>
                  <option value="Local Culture">Local Culture</option>
                  <option value="Music">Music</option>
                  <option value="National">National Parks</option>
                  <option value="Nature">Nature</option>
                  <option value="Sport">Sport</option>
                  <option value="Team Sport">Team Sport</option>
                  <option value="Wagon Driving ">Wagon Driving </option>

              </select>
            </div>

            <hr>

          <!-- Transportation Type  -->

                    <fieldset class="form-group">
            <legend>Transportation Type</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionTransport" id="optionsRadios1" value="privateVehicle" checked="">
                Private Vehicle
              </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionTransport" id="optionsRadios2" value="publicTransportation">
                Public Transportation
              </label>
            </div>
            <br>  

          <!-- About Me TextArea-->

          <div class="form-group">
            <label for="aboutTextarea">About Me (Optional)</label>
            <textarea class="form-control" name="aboutMeTraveller" id="aboutTextarea" rows="3"></textarea>
          </div>





          <!-- Get Email Notifacations ?  -->

          <fieldset class="form-group">
            <legend>Email Notifacations</legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsNotsTraveller" id="optionsRadios1" value="option1" checked="">
                I Want to get Email notifacations of things of intrest and travel Offers from Xaron.
              </label>
            </div>
            <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optionsNotsTraveller" id="optionsRadios2" value="option2">
                No Email notifacations please.
              </label>
            </div>

            <br><br>

<!-- Submit Button -->
          <button type="submit" name="submitTraveller" class="btn btn-primary">Submit</button>
        </fieldset>
      </form>
      </div>


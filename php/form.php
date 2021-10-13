<html>

<head>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/validate.js"></script>
</head>

<body>
  <!-- main form -->
  <form class="regform" method="POST" action="./submit.php" name="StudentRegistration" enctype="multipart/form-data" onsubmit="return(validate());">
    <!-- table inside from -->
    <table>
      <colgroup>
        <col class="twenty" />
        <col class="fourty" />
      </colgroup>
      <!-- main heading -->
      <tr>
        <td colspan=2>
          <center>
            <font size=4><b>Registration Form</b></font>
          </center>
        </td>
      </tr>
      <!-- name row -->
      <tr>
        <td>Name</td>
        <td>
          <input type=text class="textFeild" name=name id="textname" size="30">
        </td>
      </tr>
      <!-- name error message -->
      <tr>
        <td></td>
        <td>
          <div class="error">
            <p class="nameError">name is requirend</p>
          </div>
        </td>
      </tr>
      <!-- father name  -->
      <tr>
        <td>Father Name</td>
        <td><input type="text" class="textFeild" name="fname" id="fathername" size="30"></td>
      </tr>
      <!-- father name error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="fnameError">father name is required</p>
          </span></td>
      </tr>
      <!-- postal adress -->
      <tr>
        <td>Postal Address</td>
        <td><input type="text" class="textFeild" name="paddress" id="paddress" size="30"></td>
      </tr>
      <!-- postal address error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="paddressError">adress is required</p>
          </span></td>
      </tr>
      <!-- gender  -->
      <tr>
        <td>Sex</td>
        <td><input type="radio" name="sex" value="male" size="10">Male
          <input type="radio" name="sex" value="Female" size="10">Female
        </td>
      </tr>
      <!-- gender error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="sexError">gender is required</p>
          </span></td>
      </tr>
      <!-- city -->
      <tr>
        <td>City</td>
        <td><select name="City" onchange="validateCity(this.name)">

            <option value="-1" selected>select..</option>
            <option value="New Delhi">NEW DELHI</option>
            <option value="Mumbai">MUMBAI</option>
            <option value="Goa">GOA</option>
            <option value="Patna">PATNA</option>
          </select></td>
      </tr>
      <!-- city error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="CityError">select a city</p>
          </span></td>
      </tr>
      <!-- state feild -->
      <tr>
        <td>State</td>
        <td><select Name="State" onchange="validateCity(this.name)">
            <option value="-1" selected>select..</option>
            <option value="New Delhi">NEW DELHI</option>
            <option value="Mumbai">MUMBAI</option>
            <option value="Goa">GOA</option>
            <option value="Bihar">BIHAR</option>
          </select></td>
      </tr>
      <!-- state error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="StateError">select a state</p>
          </span></td>
      </tr>
      <!-- email id feild -->
      <tr>
        <td>EmailId</td>
        <td><input type="text" class="textFeild" name="email" id="emailid" size="30"></td>
      </tr>
      <!-- email id error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="emailError">provide a correct email</p>
          </span></td>
      </tr>
      <!-- mobile no feild -->
      <tr>
        <td>MobileNo</td>
        <td><input type="text" class="textFeild" name="mobile" id="mobileno" size="30"></td>
      </tr>
      <!-- mobile number error -->
      <tr>
        <td></td>
        <td> <span class="error">
            <p class="mobileError">provide a valid mobile number</p>
          </span></td>
      </tr>
      <!-- profile picture image section -->
      <tr>
        <td>Profile Picture</td>
        <td>
          <div class="profile">
            <img id="profileid" src="" alt="Upload an image">
          </div>
        </td>
      </tr>
      <!-- progile image selection section -->
      <tr>
        <td></td>
        <td><input type="file" name="photo" id="fileSelect" onchange="imageFeildChange();"></td>
      </tr>
      <!-- submit button -->
      <tr>
        <td></td>
        <td colspan="2"><input class="_button" type="submit" name="submit" value="Submit Form" /></td>
      </tr>
    </table>
  </form>
</body>

</html>
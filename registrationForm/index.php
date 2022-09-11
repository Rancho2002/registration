<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include "../parts/_dbconnect.php";
  $gender = $_POST['gender'];
  $roll =  $_POST['roll'];
  $name =  $_POST['name'];
  $gender =  $_POST['gender'];
  $dept =  $_POST['dept'];
  $fname = $_POST['fname'];
  $mname =  $_POST['mname'];
  $acat =  $_POST['acat'];
  $ocat = $_POST['ocat'];
  $dob = $_POST['dob'];
  $alotrank = $_POST['alotrank'];
  $gmr = $_POST['gmr'];
  // $doa = $_POST['doa'];
  $mob = $_POST['mob'];
  $gmob = $_POST['gmob'];
  $address = $_POST['address'];
  $aadhar = $_POST['aadhar'];
  $mail = $_POST['mail'];
  $fsbi = $_POST['fsbi'];
  $fcbi = $_POST['fcbi'];

  $date=date('Y-m-d H:i:s');

  $newRoll = '350/' . date("Y") . '/' . $dept . '/' . $roll;
  $sql = "INSERT INTO `registration` (`roll`, `name`,`gender`, `dept`, `fname`, `mname`, `acat`, `ocat`, `dob`, `alotrank`, `gmr`, `doa`, `mob`, `gmob`, `address`, `aadhar`, `mail`, `fsbi`, `fcbi`) VALUES ( '$newRoll', '$name', '$gender','$dept', '$fname', '$mname', '$acat', '$ocat', '$dob', '$alotrank', '$gmr', '$date', '$mob', '$gmob', '$address', '$aadhar', '$mail', '$fsbi', '$fcbi')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    // header("location: /registration/registrationForm/");
    echo '<h1 class="text-white">Data Inserted Successfully! <a href="/registration/reports.php/" class="btn btn-primary ml-1">Go To Reports</a></h1>';
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="style.css"> -->

  <title>Student Registration- RKMGEC</title>
</head>

<body class="bg-secondary">
  <?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

  echo '
  <form id="regForm" action="/registration/registrationForm/index.php/" method="POST" class="bg-dark text-white container my-3">

    <h1 class="text-center">Student Registration</h1>

    <!-- One "tab" for each step in the form: -->
    <div class="form-group">
      <div class="tab">

        <label for="name">Name</label>
        <input class="form-control my-1" placeholder="Name" name="name">
        <label for="Provisional Roll No" class="my-1">Provisional Roll No</label>
        <input class="form-control my-1" type="number" name="roll" placeholder="Provisional Roll No">



        <label for="department" class="my-1">Gender</label>
        <select class="custom-select form-control my-1" id="gender" name="gender" required>
          <option selected disabled>Choose...</option>
          <option value="M">M</option>
          <option value="F">F</option>
        </select>

        <label for="department" class="my-1">Department</label>
        <select class="custom-select form-control my-1" id="dept" name="dept" required>
          <option selected disabled>Choose...</option>
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="ME">ME</option>
          <option value="EE">EE</option>
          <option value="CE">CE</option>
        </select>

        <label for="father name" class="my-1">Father\'s Name</label>
        <input class="form-control my-1" placeholder="Father\'s Name" name="fname">

        <label for="mother name" class="my-1">Mother\'s Name</label>
        <input class="form-control my-1" placeholder="Mother\'s Name" name="mname">

        <label for="date of birth" class="my-1">Date of Birth</label>
        <input class="form-control my-1" type="date" placeholder="Date of birth" name="dob">



      </div>

      <div class="tab">
        <label for="alloted category" class="my-1">Alloted Category</label>
        <select class="custom-select form-control my-1" id="acat" name="acat">
          <option selected disabled>Choose...</option>
          <option value="GEN">GEN</option>
          <option value="SC">SC</option>
          <option value="ST">ST</option>
          <option value="OBC-A">OBC-A</option>
          <option value="OBC-B">OBC-B</option>
          <option value="TFW">TFW</option>
          <option value="ARMY">ARMY</option>
        </select>

        <label for="original category" class="my-1">Original Category</label>
        <select class="custom-select form-control my-1" id="ocat" name="ocat">
          <option selected disabled>Choose...</option>
          <option value="GEN">GEN</option>
          <option value="SC">SC</option>
          <option value="ST">ST</option>
          <option value="OBC-A">OBC-A</option>
          <option value="OBC-B">OBC-B</option>
        </select>
        <label for="alloted rank" class="my-1">Alloted Rank</label>
        <input class="form-control my-1" type="number" placeholder="Alloted Rank" name="alotrank">
        <label for="gmr" class="my-1">General Merit Rank</label>
        <input class="form-control my-1" type="number" placeholder="General Merit Rank" name="gmr">
        <!-- <label for="date of admission" class="my-1">Date of Admission</label> -->
      </div>

      <div class="tab">
        <label for="contact info" class="my-2">Contact Info:</label>
        <input class="form-control my-3" type="email" placeholder="Email" name="mail">
        <input class="form-control my-3" placeholder="phone" type="number" name="mob">
        <input class="form-control my-3" placeholder="Guardian Phone" type="number" name="gmob">
        <input class="form-control my-3" placeholder="Address" name="address">
        <input class="form-control my-3" placeholder="Aadhar" type="number" minlength="12" name="aadhar">
        <label for="exampleInputEmail1" class="my-2">Admission Fees:</label>
        <input class="form-control my-3" type="number" placeholder="SBI" name="fsbi">
        <input class="form-control my-3" type="number" placeholder="CBI" name="fcbi">
      </div>



      <!-- <div class="tab">
        <label for="exampleInputEmail1" class="my-2">Admission Fees:</label>
        <input class="form-control my-3" type="number" placeholder="SBI">
        <input class="form-control my-3" type="number" placeholder="CBI">
        <label for="exampleInputEmail1" class="my-2">Semester Fees:</label>
        <input class="form-control my-3" type="number" placeholder="1st sem">
        <input class="form-control my-3" type="number" placeholder="2nd sem">
        <input class="form-control my-3" type="number" placeholder="3rd sem">
        <input class="form-control my-3" type="number" placeholder="4th sem">
        <input class="form-control my-3" type="number" placeholder="5th sem">
      </div>
      <div class="tab">
        <input class="form-control my-3" type="number" placeholder="6th sem">
        <input class="form-control my-3" type="number" placeholder="7th sem">
        <input class="form-control my-3" type="number" placeholder="8th sem">
      </div> -->
      <div style="overflow:auto;">
        <div style="float:right;">
          <!--<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary mt-2 mr-2 px-3">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary mt-2 px-3">Next</button>-->
          <button type="Submit" class="btn btn-primary my-2 px-3">Submit</button>
        </div>
      </div>

      <!-- Circles which indicates the steps of the form: -->
      <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <!-- <span class="step"></span> -->
      </div>

  </form>
  </div>';
}
else{
  header("location: /registration/teacher.php/?status=notlogin");
}
?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <!-- <script src="script.js"></script> -->
</body>

</html>
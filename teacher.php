<?php
include "parts/_dbconnect.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Registration RKMGEC- HOME</title>
  <link rel="stylesheet" href="/registration/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
 
  <section class="header">
    <nav>
      <div class="nav-links">
        <ul>
          <li>
            <a href="/registration/"><img src="/registration/logo.png" alt="" width="80" style="position: absolute; left:6px; top:6px"></a>
          </li>
          <li>
            <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
              echo '<p class="text-white mr-2" style="font-size:40px">Welcome ' . strtoupper($_SESSION['username']) . '</p>
              <a href="/registration/change.php/?user='.$_SESSION["username"].'" class="btn btn-primary mt-3">Change Password</a>
              <a href="/registration/reports.php" class="btn btn-primary mt-3">Generate Report</a>
              <a href="/registration/parts/_logout.php" class="btn btn-primary mt-3">Logout</a>
              ';
              
            } 
           
            
            else {
              echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Log in</button>';
            }
            ?>

          </li>
        </ul>
      </div>
    </nav>
    <?php
if(isset($_GET['pass'])){
  $status=$_GET['pass'];
  if($status=='changed'){
    echo '<div class="alert alert-success alert-dismissible" role="alert">
    Password Changed Successfully.
  </div>';
  }
}
if(isset($_GET['login'])){
  $status=$_GET['login'];
  if($status=='true'){
    echo '<div class="alert alert-success alert-dismissible" role="alert">
    Logged in successfully.
  </div>';
  }
  else if($status=='wrong'){
    echo '<div class="alert alert-warning alert-dismissible" role="alert">
    Invalid Credentials!!
  </div>';
  }
}
  ?>
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginLabel">Login to Continue</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/registration/parts/_handlelogin.php" method="POST">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <button type="submit" class="btn btn-primary w-25 mb-2">Login</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
  echo '<div class="alert alert-danger" role="alert font-weight-bolder" id="intro">
  It is recommended to change password at least once. <span style="font-weight:700;">Ignore if already changed.</span>
</div>';
}
?>

    <div class="text-box">
      <h1 class="text-warning" style="font-size: 45px;">RAMKRISHNA MAHATO GOVERNMENT ENGINEERING COLLEGE</h1>
      <h3 class="my-5">
        <em>
        The fresh application of 2022 has started! Click below to get the form.
        </em>
      </h3>

      <div class="card text-center my-5">
        <div class="card-body">
          <h5 class="card-title display-4 p-3">Student Registration 2022</h5>
          <marquee class="w-50 d-block m-auto my-3">
            <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<h6 class="card-text">
            For Registration 2022, click the <span class="text-primary"> Insert Data</span> button below<span class="badge bg-danger text-white mx-2">New</span></h6>';
          } else {
            echo '<h6 class="card-text">
            For Registration 2022, you have to <span class="text-primary">Login</span> first<span class="badge bg-danger text-white mx-2">important</span></h6>';
          }
          ?>
          

          </marquee>
          <?php
          if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<a href="/registration/registrationForm/" class="btn btn-primary p-3 fw-bold">Insert Data</a>';
          } else {
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Login First</button>';
          }
          ?>

        </div>

      </div>
    </div>
  

  </section>
          <script>
            setTimeout(() => {
    document.getElementById("intro").style.display = "none";
  }, 5000);
          </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
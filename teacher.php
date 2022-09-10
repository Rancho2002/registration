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
              echo '<p class="text-white mr-2" style="font-size:50px">Welcome ' . strtoupper($_SESSION['username']) . '</p>
              <a href="/registration/change.php/?user='.$_SESSION["username"].'" class="btn btn-primary mt-3">Change Password</a>
              <a href="/registration/reports.php" class="btn btn-primary mt-3">Generate Report</a>
              <a href="/registration/parts/_logout.php" class="btn btn-primary mt-3">Logout</a>
              ';
            } else {
              echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Log in</button>';
            }
            ?>

          </li>
        </ul>
      </div>
    </nav>

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


    <div class="text-box">
      <h1>RAMKRISHNA MAHATO GOVERNMENT ENGINEERING COLLEGE</h1>
      <p class="my-5">
        <em>
          Inaugurated in the year of 2016, Ramkrishna Mahato Government
          Engineering College (Formerly known as Purulia Government Engineering
          College) is fully funded by the Government of West Bengal and is
          approved by AICTE. Affiliated to MAKAUT (formerly known as WBUT), the
          college at its nascent stage comprises five academic departments like
          Electronics & Communication Engineering, Computer Science &
          Engineering, Electrical Engineering, Civil Engineering, and Mechanical
          Engineering, and is well equipped with state of arts laboratories and
          workshops. Situated at Agharpur, 20 km away from Purulia town.
        </em>
      </p>

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    label{
      font-weight: 500;
    }
    @media (max-width:800px) {
      .custom{
        flex-direction: column;
      }
      .select{
        width: 100% !important;
      }
    }
  </style>
  <body>
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
      echo '
      <h1 class="text-center font-weight-bold" style="font-family:\'Franklin Gothic Medium\', \'Arial Narrow\', Arial, sans-serif ; font-size:50px;">Generate Reports </h1>
      <div class="container my-5">
        <p class="p-2 border border-primary w-100 d-flex justify-content-between font-weight-bold text-success" style="font-size: 20px;">>> Generate reports of all students:<a href="/registration/pdf/" class="btn btn-primary">Preview Report</a></p>
      </div>
      <div class="form-group container">
        <form action="/registration/pdf/" method="POST" class="border border-primary p-2" >
          <p class="w-100 d-flex justify-content-between font-weight-bold text-success" style="font-size: 20px;">>> Generate reports by specific fields:</p>
          <div class="d-flex justify-content-between align-items-center custom">
        <label for="" class="mr-1">Department</label>
        <select class="select form-control w-25 d-inline" name="dept" id="dept">
          <option value="CSE">CSE</option>
          <option value="ECE">ECE</option>
          <option value="ME">ME</option>
          <option value="EE">EE</option>
          <option value="CE">CE</option>
        </select>
        <label for="" class="ml-2 mr-1">Gender</label>
        <select class="select form-control w-25 d-inline" name="gender" id="gender">
          <option value="all">All</option>
          <option value="M">M</option>
          <option value="F">F</option>
        </select>
        <label for="" class="ml-2 mr-1">Category(Original)</label>
        <select class="select form-control d-inline" style="width: 24%;" name="ocat" id="ocat">
          <option value="all">All</option>
          <option value="GEN">GEN</option>
          <option value="SC">SC</option>
          <option value="ST">ST</option>
          <option value="OBC-A">OBC-A</option>
          <option value="OBC-B">OBC-B</option>
        </select>
        </div>
        <div class="text-center mt-4">
        <button type="submit" class="my-2 btn btn-primary btn-lg">Preview</button>
        </div>
      </form>
    </div>
    // ';
    }
    else{
      header("location: /registration/teacher.php/?status=notlogin");
    }
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php

?>

<!doctype html>
<html lang="en">

<head>
  <title>Verify OTP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
  input[type="text"]::placeholder {
    text-align: center;
  }

  input[type="text"] {
    font-size: 20px;
  }
</style>

<body class="bg-secondary">

  <div class="container bg-dark w-100 p-2 pb-5 mt-5">
    <div class="p-2">
      <h3 class="text-center text-white display-4">Verify OTP</h3>
      <form class="text-white">
        <div class="form-group text-center">
          <!-- <label for="exampleInputEmail1">Email address</label> -->

          <input type="text" class="form-control p-4 my-4 w-50 d-block mx-auto text-center" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter OTP">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-lg w-50 mx-auto font-weight-bold">Verify</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
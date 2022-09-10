<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
  @media (max-width:900px) {
    .wid{
        width: 100% !important;
        margin-bottom: 20px;
    }
    .wid:nth-child(2){
        margin-top: 20px;
    }
    .fix{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;

    }
  }
  </style>
  <body>
      <div class="container-fluid text-center"><img src="logo.png" alt=""></div>
        <div class="p-4 bg-dark"></div>
        <div class="p-4 d-flex justify-content-around fix">
      <div class="media border border-primary w-25 p-2 wid">
  <img src="teacher-icon.png" width="60" class="mr-3 border border-dark" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Teacher/ Evaluator</h5>
    <small class="text-primary font-weight-bolder" style="cursor:pointer;"><a href="/registration/teacher.php/">Click Here to Login</a></small>
  </div>
  </div>
      <div class="media border border-primary w-25 p-2 wid">
  <img src="read-icon.png" width="50" class="mr-3 border border-dark" alt="...">
  <div class="media-body">
    <h5 class="mt-0">Student</h5>
    <small class="text-primary font-weight-bolder" style="cursor:pointer;">Click Here to Login</small>
  </div>
  </div>
</div>

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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
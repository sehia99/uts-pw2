<?php
session_start();

// jika sudah login, alihkan ke halaman dasbor
if (isset($_SESSION['username'])) {
  header('Location: ../dasbor');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../jquery/jquery-3.2.1.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
<div class="container">
  <div class="row" style="margin-top: 75px">
    <div class="col-md-4 col-md-offset-4">
      <div class="well">
        <form class="form-signin" method="post" action="proses_login.php">
          <h2 class="form-signin-heading text-center">
            <strong>Pendataan Warga</strong>
          </h2>

          <h4 class="form-signin-heading text-center">Silakan login</h4>

          <input type="text" name="username" class="form-control" placeholder="Username" autofocus required>

          <input type="password" name="password" class="form-control" placeholder="Password" required>

          <button class="btn btn-lg btn-primary btn-block" type="submit">
            <i class="glyphicon glyphicon-log-in"></i> Log in
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
  </body>
</html>

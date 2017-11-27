<?php
session_start();
if (!isset($_SESSION['username'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>


    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../jquery/jquery-3.2.1.min.js"></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<style>
  .row.content {height: 1500px}

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
    }

  </style>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="../dasbor">Aplikasi Pendaftran</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text">Hai, <?php echo $_SESSION['username']['nama'] ?></p><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </nav>
      <div class="col-sm-3 sidenav">
            <h4>Tugas UTS</h4>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="../dasbor">Home</a></li>
				<li>Pendaftaran</li>
                <li><a href="../regis/tambah_ktp.php">Pendaftaran Pembuatan KTP</a></li>
                <li><a href="../regis/tambah_kark.php">Pendaftaran Pembuatan KK</a></li>
                <li><a href="../regis/tambah_akta.php">Pendaftaran Pembuatan Akta</a></li>
				<li class="active"><a href="../regis/tambah_akun.php">Pendaftaran Akun</a></li>
        <li>Lihat Data</li>
        <li><a href="../list/list_ktp.php">Lihat KTP</a></li>
        <li><a href="../list/list_kk.php">Lihat KK</a></li>
        <li><a href="../list/list_akta.php">Lihat Akta</a></li>
              </ul><br>
          </div>
        <div class="col-sm-9">
          <h1 class="page-header">Pendaftaran Admin</h1>
          <form class="form-group" action="" method="post">
            <label for="na">Nama Admin</label>
			<div class="form-group">
            <input type="text" class="form-control" name="nama" id="na">
            </div>
			<label for="user">Username : </label>
              <div class="form-group">
				<input type="text" class="form-control" name="username" id="user" required>
			  </div>
			<label for="pass">password : </label>
			<div class="form-group">
				<input type="password" class="form-control" name="password" required>
			</div>
			<label for="email">email : </label>
			<div class="form-group">
				<input type="text" class="form-control" name="email" required>
			</div>
			<input type="submit" value="Daftar" class="btn btn-primary" name="simpan">
          </form>
        </div>
		<?php
			include('../../config.php');
			if(isset($_POST) && !empty($_POST))
    {
      $nama=$_POST['nama'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $email=$_POST['email'];
      $simpan = "insert into admin (`nama`, `username`, `password`, `email`) VALUES('$nama','$username','$password','$email')";
  		$hasil = $mysqli->query($simpan);
	  	if (!$hasil) die("Salah SQL $simpan");
	  	echo"<script>alert('Data baru telah tersimpan');
		  			window.location = '../dasbor'; exit();</script>";
    }
		?>
        </div>
  </body>
</html>

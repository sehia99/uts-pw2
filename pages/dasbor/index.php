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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register KK</title>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../jquery/jquery.min.js"></script>
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
    <?php include('../../config.php');
    $query_ktp = "SELECT COUNT(*) AS total FROM ktp";
    $hasil_ktp = mysqli_query($mysqli, $query_ktp);
    $jumlah_ktp = mysqli_fetch_assoc($hasil_ktp);

    $query_kk = "SELECT COUNT(*) AS total FROM kartu_k";
    $hasil_kk = mysqli_query($mysqli, $query_kk);
    $jumlah_kk = mysqli_fetch_assoc($hasil_kk);

    $query_nktp = "SELECT COUNT(*) AS total FROM nktp";
    $hasil_nktp = mysqli_query($mysqli, $query_nktp);
    $jumlah_nktp = mysqli_fetch_assoc($hasil_nktp);
    ?>
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
            <li class="active"><a href="../dasbor">Home</a></li>
			  <li>Pendaftaran</li>
              <li><a href="../regis/tambah_ktp.php">Pendaftaran Pembuatan KTP</a></li>
              <li><a href="../regis/tambah_kark.php">Pendaftaran Pembuatan KK</a></li>
              <li><a href="../regis/tambah_akta.php">Pendaftaran Pembuatan Akta</a></li>
			  <li><a href="../regis/tambah_akun.php">Pendaftaran Akun</a></li>
        <li>Lihat Data</li>
        <li><a href="../list/list_ktp.php">Lihat KTP</a></li>
        <li><a href="../list/list_kk.php">Lihat KK</a></li>
        <li><a href="../list/list_akta.php">Lihat Akta</a></li>
          </ul><br>
      </div>
      <div class="col-sm-9 text-center">
        <h2>SELAMAT DATANG</h2>
        <div class="row">
          <div class="col-sm-4 col-md-4">
            <div class="panel panel-primary">
              <div class="panel-body">
                <h3>Data KTP</h3>
                <p>
                  Total ada <?php echo $jumlah_nktp['total'] ?> data KTP.
                </p>
              </div>
            </div>
          </div>
  <div class="col-sm-4 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Data Akta</h3>
        <p>
          Total ada <?php echo $jumlah_ktp['total'] ?> data Akta.
        </p>
      </div>
    </div>
  </div>
  <div class="col-sm-4 col-md-4">
    <div class="panel panel-primary">
      <div class="panel-body">
        <h3>Data KK</h3>
        <p>
          Total ada <?php echo $jumlah_kk['total'] ?> data Kartu Keluarga.
        </p>
      </div>
    </div>
  </div>
      </div>
  </div>
</body>
</html>

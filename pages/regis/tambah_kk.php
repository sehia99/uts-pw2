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
    <?php include('select_warga.php');?>
<div class="container">
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../dasbor">Aplikasi Pendaftran</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  <div class="col-sm-3 sidenav">
        <h4>Tugas UTS</h4>
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="../dasbor">Home</a></li>
            <li><a href="../regis/tambah_ktp.php">Pendaftaran Pembuatan KTP</a></li>
            <li><a href="../regis/tambah_kk.php">Pendaftaran Pembuatan KK</a></li>
            <li><a href="../regis/tambah_akta.php">Pendaftaran Pembuatan Akta</a></li>
          </ul><br>
      </div>
  <div class="col-sm-9">
    <h1 class="page-header">Register KK</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="nk">Nik :</label>
        <select class="form-control selectlive" name="nik" required>
        <option value="" selected disabled>- pilih -</option>
        <?php foreach ($data_warga as $warga) : ?>
        <option value="<?php echo $warga['nik'] ?>">
          <?php echo $warga['nama'] ?> (NIK: <?php echo $warga['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>

    </div>
    <div class="form-group">
      <label for="pd">Pendidikan :</label>
      <input type="text" name="pendidikan" id="pd" class="form-control">
  </div>
  <div class="form-group">
    <label for="nk">Status di Keluarga :</label>
    <select class="form-control" name="statuskel" id="nk">
      <option value="Kepala Keluarga">Kepala Keluarga</option>
      <option value="Istri">Istri</option>
      <option value="Anak">Anak</option>
    </select>
</div>
<div class="form-group">
  <label for="ayh">Ayah :</label>
  <input type="text" name="ayah" id="ayh" class="form-control">
</div>
<div class="form-group">
  <label for="ib">Ibu :</label>
  <input type="text" name="ibu" id="ib" class="form-control">
</div>
<div class="form-group">
  <input type="submit" name="simpan" value="Register" class="btn btn-default">
</div>
    </form>
  </div>
  <?php
    if(isset($_POST) && !empty($_POST))
    {
      $idkk=$_POST['idkk'];
      $nik=$_POST['nik'];
      $pendidikan=$_POST['pendidikan'];
      $statuskel=$_POST['statuskel'];
      $ayah=$_POST['ayah'];
      $ibu=$_POST['ibu'];
      $simpan = "insert into kk (`idkk`,`nik`, `pendidikan`, `statuskel`, `ayah`,`ibu`) VALUES('$idkk','$nik','$pendidikan','$statuskel','$ayah','$ibu')";
  		$hasil = $mysqli->query($simpan);
	  	if (!$hasil) die("Salah SQL $simpan");
	  	echo"<script>alert('Data baru telah tersimpan');
		  			window.location = './list_ktp.php'; exit();</script>";
    }

  ?>
</div>
  </body>
</html>

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
  <?php include('../regis/select_warga.php') ?>
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
				<li class="active">Pendaftaran</li>
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
		<div class="col-sm-9">
			<h1 class="page-header">Pendaftaran KK</h1>
			<form action="" method="post">
        <?php

        $xid_kk = $_GET['id_kk'];

	$edit = "select * from kartu_k where id_kk = '$xid_kk'";
	$hasil1 = $mysqli->query($edit);
	while ($data = $hasil1 ->fetch_array())
	{
    $xno_kk =$data[1];
    $xnik_kepala =$data[2];
    $xalamat =$data[3];
    $xrtrw =$data[4];
    $xkelu =$data[5];
    $xkeca =$data[6];
    $xkabu =$data[7];
	}

         ?>
			<label for="nokk">No KK : </label>
			<div class="form-group">
				<input type="text" value="<?php echo $xno_kk; ?>" class="form-control" name="no_kk" id="nokk" disabled>
			</div>
			<div class="form-group">
        <label for="nk">Nik Kepala Keluarga :</label>
        <select class="form-control selectlive" name="nik_kepala" disabled>
        <option value="<?php echo $xnik_kepala; ?>" selected disabled><?php echo $xnik_kepala; ?></option>
        <?php foreach ($data_warga as $warga) : ?>
        <option value="<?php echo $warga['nik'] ?>">
          <?php echo $warga['nama'] ?> (NIK: <?php echo $warga['nik'] ?>)
        </option>
        <?php endforeach ?>
      </select>

    </div>
	<label for="alm">Alamat :</label>
        <div class="form-group">
          <textarea rows="5" type="text"  class="form-control" name="alamat" id="alm" required><?php echo $xalamat; ?></textarea>
        </div>
      <label for="tw">RT/RW :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xrtrw; ?>" name="rtrw" id="tw" required>
        </div>
      <label for="kel">Kelurahan/Desa :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xkelu; ?>" name="kelu" id="kel" required>
        </div>
      <label for="kcmt">Kecamatan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="keca" value="<?php echo $xkeca; ?>" id="kcmt" required>
        </div>
		<label for="kabu">Kabupaten : </label>
		<div class="form-group">
			<input type="text" class="form-control" name="kabu" id="kabu" value="<?php echo $xkabu; ?>" required>
		</div>
		<div class="form-group">
			<input type="submit" value="simpan" name="simpan" class="btn btn-primary">
		</div>
			</form>
			<?php
    if(isset($_POST) && !empty($_POST))
    {
      $id_kk=$_POST['id_kk'];
	  $no_kk=$_POST['no_kk'];
      $nik_kepala=$_POST['nik_kepala'];
      $alamat=$_POST['alamat'];
      $rtrw=$_POST['rtrw'];
      $kelu=$_POST['kelu'];
      $keca=$_POST['keca'];
	  $kabu=$_POST['kabu'];
      $simpan_edit="update kartu_k set alamat='$alamat',rtrw='$rtrw',kelu='$kelu',keca='$keca',kabu='$kabu' where id_kk='$xid_kk'";
  		$hasil = $mysqli->query($simpan_edit);
	  	if (!$hasil) die("Salah SQL $simpan");
	  	echo"<script>alert('Data baru telah tersimpan');
		  			window.location = '../list/list_kk.php'; exit();</script>";
    }

  ?>
		</div>
  </body>
</html>

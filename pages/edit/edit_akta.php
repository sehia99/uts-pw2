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
  <title>Edit Akta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
              <li ><a href="../dasbor">Home</a></li>
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
    <div class="col-sm-9">
<h1 class="page-header">Pendaftaran Akta</h1>
  <form action="" method="post">
    <?php
          include('../../config.php');
          $xnik = $_GET['nik'];

	$edit = "select * from ktp where nik = '$xnik'";
	$hasil1 = $mysqli->query($edit);
	while ($data = $hasil1 ->fetch_array())
	{
    $xnama =$data[1];
  	$xtempatL =$data[2];
  	$xtanggalL =$data[3];
  	$xgender =$data[4];
    $xgoldar =$data[5];
    $xalamat =$data[6];
    $xrtrw =$data[7];
    $xdesa =$data[8];
    $xkec =$data[9];
    $xagama =$data[10];
    $xstatus =$data[11];
    $xpekerjaan =$data[12];
    $xnama_ayah =$data[13];
    $xnama_ibu =$data[14];
    $xpendidikan =$data[15];
	}
     ?>
      <label for="nm">Nama :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xnama ;?>" name="nama" id="nm" required>
        </div>
      <label for="tl">Tempat Lahir : </label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xtempatL; ?>" name="tempatL" id="tl" required>
        </div>
      <label for="tgl">Tanggal : </label>
        <div class="form-group">
          <input type="date" class="form-control"name="tanggalL" value="<?php echo $xtanggalL; ?>" id="tgl" required>
        </div>
      <label for="jk">Jenis Kelamin :</label>
        <div class="form-group">
          <select class="form-control" name="gender" id="jk" required>
            <option value="" selected disabled></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      <label for="gd">Golongan Darah :</label>
        <div class="form-group">
          <select class="form-control" name="goldarah" id="gd" required>
            <option value=""></option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
            <option value="-">-</option>
          </select>
        </div>
      <label for="alm">Alamat :</label>
        <div class="form-group">
          <textarea rows="5" type="text" class="form-control" name="alamat" id="alm" required><?php echo $xalamat; ?></textarea>
        </div>
      <label for="tw">RT/RW :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xrtrw; ?>" name="rtrw" id="tw" required>
        </div>
      <label for="kel">Kelurahan/Desa :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="desa" id="kel" value="<?php echo $xdesa; ?>" required>
        </div>
      <label for="kcmt">Kecamatan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="kec" value="<?php echo $xkec; ?>" id="kcmt" required>
        </div>
      <label for="ag">Agama :</label>
        <div class="form-group">
        <select class="form-control" name="agama" id="ag" required>
          <option value=""></option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Budha">Budha</option>
          <option value="Hindu">Hindu</option>
          <option value="Konghucu">Konghucu</option>
          <option value="Katolik">Katolik</option>
        </select>
      </div>
      <label for="stp">Status Perkaiwnan :</label>
        <div class="form-group">
        <select class="form-control" name="status" id="stp" required>
          <option value=""></option>
          <option value="Belum Kawin">Belum Kawin</option>
          <option value="Sudah Kawin">Sudah Kawin</option>
        </select>
      </div>
      <label for="pk">Pekerjaan :</label>
        <div class="form-group">
          <input type="text" class="form-control" value="<?php echo $xpekerjaan; ?>" name="pekerjaan" id="pk" required>
        </div>
		<label for="ayah">Ayah :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama_ayah" value="<?php echo $xnama_ayah; ?>" id="ayah" required>
        </div>
		<label for="ibu">ibu :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="nama_ibu" id="ibu" value="<?php echo $xnama_ibu; ?>" required>
        </div>
		<label for="pendidikan">Pendidikan :</label>
        <div class="form-group">
          <input type="text" class="form-control" name="pendidikan" id="pendidikan" value="<?php echo $xpendidikan; ?>" required>
        </div>
      <TR><TD align="center" colspan="2" height="10%"><input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
<br>
    </TABLE>

  </form>

</div>
  <?php

    if(isset($_POST) && !empty($_POST))
    {
      $nik=$_POST['nik'];
      $nama=$_POST['nama'];
      $tempatL=$_POST['tempatL'];
      $tanggalL=$_POST['tanggalL'];
      $gender=$_POST['gender'];
      $goldarah=$_POST['goldarah'];
      $alamat=$_POST['alamat'];
      $rtrw=$_POST['rtrw'];
      $desa=$_POST['desa'];
      $kec=$_POST['kec'];
      $agama=$_POST['agama'];
      $status=$_POST['status'];
      $pekerjaan=$_POST['pekerjaan'];
	  $nama_ayah=$_POST['nama_ayah'];
	  $nama_ibu=$_POST['nama_ibu'];
	  $pendidikan=$_POST['pendidikan'];
      $simpan_edit="update ktp set nama='$nama',tempatL='$tempatL',tanggalL='$tanggalL',gender='$gender',goldarah='$goldarah',
      alamat='$alamat',rtrw='$rtrw',desa='$desa',kec='$kec',agama='$agama',status='$status',pekerjaan='$pekerjaan',nama_ayah='$nama_ayah',
      nama_ibu='$nama_ibu',pendidikan='$pendidikan' where nik='$xnik'";
  		$hasil = $mysqli->query($simpan_edit);
	  	if (!$hasil) die("Salah SQL $simpan");
	  	echo"<script>alert('Data baru telah tersimpan');
		  			window.location = '../list/list_akta.php'; exit();</script>";
    }

  ?>
</div>
<html>

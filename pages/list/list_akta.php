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
			  <li><a href="../regis/tambah_akun.php">Pendaftaran Akun</a></li>
        <li>Lihat Data</li>
        <li><a href="../list/list_ktp.php">Lihat KTP</a></li>
        <li><a href="../list/list_kk.php">Lihat KK</a></li>
        <li class="active"><a href="../list/list_akta.php">Lihat Akta</a></li>
          </ul><br>
      </div>
	  <div class="col-sm-9">
      <h1 class="page-header">List Akta</h1>
	  <div class="table-responsive">
	  <table class="table">
	  <tr>
	  <th>Nik</th>
	  <th>Nama</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Gender</th>
    <th>Golongan Darah</th>
    <th>Alamat</th>
    <th>Rt/Rw</th>
    <th>Kelurahan</th>
    <th>Kecamatan</th>
    <th>Agama</th>
    <th>Status</th>
    <th>Pekerjaan</th>
    <th>Ayah</th>
    <th>Ibu</th>
    <th>Pendidikan</th>
    <th>Aksi</th>
	  </tr>
    <?php
include ('../../config.php');

	$data = "select * from ktp";
	$hasil = $mysqli->query($data);

	if (!$hasil) die("Salah SQL $data");
	$nomor = 0;

	while ($baris = $hasil->fetch_array())
	{

	$nik =$baris[0];
	$nama =$baris[1];
	$tempatL =$baris[2];
	$tanggalL =$baris[3];
	$gender =$baris[4];
  $goldar =$baris[5];
  $alamat =$baris[6];
  $rtrw =$baris[7];
  $desa =$baris[8];
  $kec =$baris[9];
  $agama =$baris[10];
  $status =$baris[11];
  $pekerjaan =$baris[12];
  $nama_ayah =$baris[13];
  $nama_ibu =$baris[14];
  $pendidikan =$baris[15];
  $edit= "<a href='../edit/edit_akta.php?nik=$nik'>Edit</a>";
  $hapus="<a href='../hapus/hapus_akta.php?nik=$nik'>Hapus</a>";


	echo "<TR><TD>".$nik."</TD><TD>".$nama."</TD><TD>".$tempatL."</TD><TD>".$tanggalL."</TD><TD>".$gender."</TD><TD>".$goldar."</TD><TD>".$alamat."</TD><TD>".$rtrw."</TD><TD>".$desa."</TD><TD>".$kec."</TD><TD>".$agama."</TD><TD>".$status."</TD><TD>".$pekerjaan."</TD>
  <TD>".$nama_ayah."</TD><TD>".$nama_ibu."</TD><TD>".$pendidikan."</TD><TD>".$edit."-".$hapus."</TD><TR>";

	}
?>
	  </table>
	  </div>
	  </div>
</div>
</body>
</html>

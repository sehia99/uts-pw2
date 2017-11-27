<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include('../../config.php');
    $nik = $_GET['nik'];  // dapatkan ID yang akan dicari

		$hapus = "delete from nktp where nik = '$nik'";

	$hasil = $mysqli->query($hapus);

	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Terhapus');
				window.location = '../list/list_ktp.php'; exit();</script>";


     ?>
  </body>
</html>

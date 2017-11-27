<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    include('../../config.php');
    $id_kk = $_GET['id_kk'];  // dapatkan ID yang akan dicari

		$hapus = "delete from kartu_k where id_kk = '$id_kk'";

	$hasil = $mysqli->query($hapus);

	if (!$hasil) die("Salah SQL $hapus");

	echo"<script>alert('Data Telah Terhapus');
				window.location = '../list/list_kk.php'; exit();</script>";


     ?>
  </body>
</html>

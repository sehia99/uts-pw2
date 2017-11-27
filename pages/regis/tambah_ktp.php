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
    <?php include('select_warga.php') ?>
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
              <li class="active"><a href="../regis/tambah_ktp.php">Pendaftaran Pembuatan KTP</a></li>
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
        <h1 class="page-header">Pendaftaran KTP</h1>
        <form action="" enctype="multipart/form-data" method="post">
          <fieldset class="form-group">
            <select class="form-control selective" name="nik">
              <option value="" selected disabled>- pilih -</option>
              <?php foreach ($data_warga as $warga) : ?>
              <option value="<?php echo $warga['nik'] ?>">
                <?php echo $warga['nama'] ?> (NIK: <?php echo $warga['nik'] ?>)
              </option>
              <?php endforeach ?>
            </select>
          </fieldset>
          <fieldset class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" class="form-control-file" name="file" id="exampleInputFile">
            </fieldset>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if(isset($_POST) && !empty($_POST))
      {
        $nik=$_POST['nik'];
        $selec="select * from ktp where nik='$nik'";
        $hasil1=$mysqli->query($selec);
        while ($hmm=$hasil1->fetch_array()) {
          $lahir=new DateTime($hmm['tanggalL']);
          $today=new DateTime();
          $umur=$today->diff($lahir);
          $umur17=($umur->y);
        }


        $ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
      if ($umur17<17) {
        echo"<script>alert('Gagal, Umur Kurang Dari 17 Tahun');
          window.location = '../regis/tambah_ktp.php'; exit();</script>";
      }
      else{
					move_uploaded_file($file_tmp, 'file/'.$nama);
          $simpan = "insert into nktp (`nik`, `nama_gambar`) VALUES('$nik','$nama')";
          $hasil = $mysqli->query($simpan);
          if (!$hasil) die("Salah SQL $simpan");
          echo"<script>alert('Data baru telah tersimpan');
                window.location = '../dasbor'; exit();</script>";

				}
			}
         ?>
		  </div>
  </body>
</html>

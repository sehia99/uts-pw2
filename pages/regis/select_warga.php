<?php
include('../../config.php');

// ambil dari database
$query = "SELECT * FROM ktp";

$hasil = mysqli_query($mysqli, $query);

$data_warga = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_warga[] = $row;
}

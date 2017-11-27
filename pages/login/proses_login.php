<?php
session_start();
include('../../config.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username = '$username' and password = '$password'";
$hasil = mysqli_query($mysqli, $query);
$data_user = mysqli_fetch_assoc($hasil);


if ($data_user != null) {
  $_SESSION['username'] = $data_user;
  header('Location: ../dasbor');
} else {
  echo "<script>window.alert('Username atau password salah'); window.location.href='../login'</script>";
}

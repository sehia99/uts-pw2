<html>
  <head>
    <title>PROJECT UTS</title>
  </head>
  <body>
    <?php
    include ('select_warga.php');

    $lahir=new DateTime($data_warga['tanggalL']);
    $today=new DateTime();
    $umur=$today->diff($lahir);
    $umur17=($umur->y);
    echo $umur17;
     ?>

  </body>
<html>

<?php

define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","uts");

$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);

if ($mysqli->connect_error)
{ trigger_error('Gagal :' .$mysqli->connect_error, E_USER_ERROR); }

?>

<?php
$con = new mysqli("localhost","root","","thesis");
session_start();

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

?>
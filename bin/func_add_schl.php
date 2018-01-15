<?php
include "dbconn.php";
$sn=$_POST["sn"];
$eml=$_POST["eml"];
$pri=$_POST["pri"];
$adr=$_POST["adr"];
$t=$_POST["t"];
$phn=$_POST["phn"];

$qry="INSERT INTO `school`(`name`, `address`, `town`, `phn`, `email`, `principle`)
VALUES ('$sn','$adr','$t','$phn','$eml','$pri')";
$conn->query($qry);

echo "success";
 ?>

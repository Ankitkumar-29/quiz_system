<?php
$server="localhost";
$dbusername="root";
$dbuserpass="";
$dbname="quiz_system";

$conn=new mysqli($server,$dbusername,$dbuserpass,$dbname);
if($conn->errno)
{
  echo 'Something went wrong';
}
 ?>

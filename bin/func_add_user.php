<?php
include "dbconn.php";
$fname=$_POST["fname"];
$email=$_POST["email"];
$pk=$_POST["pk"];
$s_id=$_POST["s_id"];
$cr=$_POST["cr"];
$cls=$_POST["cls"];
$cell_no=$_POST["cell_no"];

$qry="INSERT INTO `user`(`name`, `school_id`, `phone_no`, `email`, `course`, `class`)
VALUES ('$fname','$s_id','$cell_no','$email','$cr','$cls')";
$conn->query($qry);
setcookie("pk",$pk,time()+86400*30,"/");
setcookie("fname",$fname,time()+86400*30,"/");
setcookie("email",$email,time()+86400*30,"/");
echo "success";
 ?>

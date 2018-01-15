<?php
if($_POST["qj"]!=""&&$_POST["pk"]!=""&&$_POST["pm"]!=""&&$_POST["nm"]!="")
{
include "dbconn.php";
$qj=$_POST["qj"];
$pk=$_POST["pk"];
$pm=$_POST["pm"];
$nm=$_POST["nm"];
$noq=0;
$qry="CREATE TABLE `$pk` (
       q_id  Varchar(11),
       PRIMARY KEY (q_id)
     )";
$conn->query($qry);

foreach ($qj as $key => $value) {
  if($value[2]==1)
  {
      $qry="INSERT INTO `$pk`(`q_id`)
            VALUES ('$value[0]')";
      $conn->query($qry);
      $noq++;
  }
}
$qry="INSERT INTO `quiz`(`passkey`, `noq`, `p_marks`, `n_marks`) VALUES ('$pk','$noq','$pm',$nm)";
$conn->query($qry);
echo "success";
}

 ?>

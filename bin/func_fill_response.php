<?php
include "dbconn.php";
$name=$_POST["user"];
$w=$_POST["w"];
$pk=$_POST["pk"];
$c=$_POST["c"];
$q_id="";
$u_id="";
$resu="Fail";
$qry="SELECT * FROM `quiz` where `passkey`='$pk'";
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_array())
   {
     $q_id=$r[0];
     $p_m=$r[3];
     $n_m=$r[4];
   }
}
$qry="SELECT * FROM `user` where `name`='$name'";
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_array())
   {
     $u_id=$r[0];
   }
}
$qry="SELECT * FROM `user` where `name`='$name'";
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_array())
   {
     $u_id=$r[0];
   }
}
if(($n_m*$c)>=$p_m){
  $resu="Pass";
}

$qry="INSERT INTO `user_response`(`user_id`, `quiz_id`, `correct`, `wrong`, `result`)
      VALUES ('$u_id','$q_id','$c','$w','$resu')";
$conn->query($qry);
echo "success";
 ?>

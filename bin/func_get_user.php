<?php
include "dbconn.php";
header("content-type:text/javascript");
$id=$_POST["u"];
$qry="SELECT * FROM `user` where `id` ='$id'";
//echo $qry;
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_assoc())
   {
     $s_list[$r["id"]]=$r;
   }
}
echo json_encode($s_list);
?>

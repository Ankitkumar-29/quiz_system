<?php
include "dbconn.php";
header("content-type:text/javascript");
$qry="SELECT * FROM `user_response` ORDER BY `user_id` ASC";
//echo $qry;
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_assoc())
   {
     $r_list[$r["user_id"]]=$r;
   }
}
echo json_encode($r_list);
?>

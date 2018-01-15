<?php
include "dbconn.php";
header("content-type:text/javascript");
$qry="SELECT * FROM `qb` ORDER BY `q_id` ASC";
//echo $qry;
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_assoc())
   {
     $q_list[$r["q_id"]]=$r;
   }
}
echo json_encode($q_list);
?>

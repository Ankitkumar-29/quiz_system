<?php
include "dbconn.php";
header("content-type:text/javascript");
$qry="SELECT * FROM `school` ORDER BY `id` ASC";
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

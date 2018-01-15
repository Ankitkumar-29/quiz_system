<?php
include "dbconn.php";
header("content-type:text/javascript");
$pk=$_POST["pk"];
$qry="SELECT * FROM `$pk`";
$q_list = array();
$i=0;
//echo $qry;
$rs=$conn->query($qry);
if(mysqli_num_rows($rs)>0){
   while($r=$rs->fetch_array())
   {
     $qry="SELECT * FROM `qb` WHERE `q_id`='$r[0]'";
     $res=$conn->query($qry);
     if(mysqli_num_rows($res)>0){
        while($row=$res->fetch_assoc())
        {
          $q_list[$i]=$row;
          $i++;
        }
      }
   }
}
echo json_encode($q_list);
?>

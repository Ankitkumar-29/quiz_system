<?php
if($_POST["ques"]!=""&&$_POST["o1"]!=""&&$_POST["o2"]!=""&&$_POST["o3"]!=""&&$_POST["o4"]!=""&&$_POST["o3"]!=""&&$_POST["ans"]!="")
{
include "dbconn.php";
$ques=$_POST["ques"];
$o1=$_POST["o1"];
$o2=$_POST["o2"];
$o3=$_POST["o3"];
$o4=$_POST["o4"];
$ans=$_POST["ans"];

$qry="INSERT INTO `qb`(`ques`, `o1`, `o2`, `o3`, `o4`, `ans`)
      VALUES ('$ques','$o1','$o2','$o3','$o4','$ans')";

$conn->query($qry);
echo "success";
}
else{
echo "failed";
}

 ?>

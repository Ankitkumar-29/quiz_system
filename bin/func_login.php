<?php
if(isset($_POST["id"])&&isset($_POST["pass"])&&$_POST["id"]!=""&&$_POST["pass"]!="")
{
  include "dbconn.php";
  $id=$_POST["id"];
  $pass=$_POST["pass"];

  $qry="SELECT * FROM `admin` WHERE `id`='$id' and `pass`='$pass'";
    $rs=$conn->query($qry);
  if(mysqli_num_rows($rs)>0)
  {
    session_start();
    setcookie("PHPSESSID",session_id(),time()+86400*30,"/");
    session_destroy();
    setcookie("id",$id,time()+86400*30,"/");
    
    echo "success";
  }
  else
  {
    echo "invalid";
  }


}
else {
 echo "failed";
}

 ?>

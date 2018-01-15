<?php
include 'dbconn.php';

if(isset($_COOKIE["id"])){
    setcookie("PHPSESSID","",time()-3600);
    setcookie("id","",time()-3600);
    echo 1;
}
else {
  echo 0;
}

 ?>

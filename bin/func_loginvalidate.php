<?php
function validate()
{
if(isset($_COOKIE["PHPSESSID"])&&isset($_COOKIE["id"]))
{
  return 1;
}
else {
  return 0;
}

}

 ?>

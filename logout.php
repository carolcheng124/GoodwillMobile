<?php
session_start();
if(isset($_SESSION)){
  session_destroy();
echo "<script>alert('You have logged out');location.href='index.html';</script>";
}


?>

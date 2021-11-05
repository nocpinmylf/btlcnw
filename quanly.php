<?php 
  include(__DIR__."\connect.php");

  if(!isset($_COOKIE['user']) && !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }
?>
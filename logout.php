<?php
  if(!isset($_COOKIE['user']) && !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }
  unset($_COOKIE['user']);
  unset($_COOKIE['isLogin']);
  setcookie('user', "", time()-3600, null);
  setcookie('isLogin', "", time()-3600, null);
  header("location: login.php");
?>
<?php
  function connect() {
    $database = 'btl';
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $link = mysqli_connect($host, $username, $password);
    
    if(!$link) die('<br/>Khong ket noi duoc: ' . mysqli_connect_error());

    mysqli_select_db($link, $database) or die('Could not select database.');
    mysqli_query($link, "SET NAMES 'utf8'");

    return $link;
  }
  
  function close($link) {	
    mysqli_close($link);
  }
  
  function select_one($sql) {
    $data = exec_select($sql);
    if(!$data) return null;
    return $data[0];
  }

  function select_list($sql) {
    $data = exec_select($sql);
    if(!$data) return null;
    return $data;
  }
?>
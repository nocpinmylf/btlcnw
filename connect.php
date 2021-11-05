<?php
  //--------------------------------
  //--- Get Connection
  //--------------------------------
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

  //--------------------------------
  //--- Multi Select
  //--------------------------------
  function exec_select($sql) {
    $link = connect();
    $res = mysqli_query($link, $sql) ;
    $row = array();
    $err = mysqli_error($link); //Lay loi sau khi thuc hien truy van
    
    if($err) {  //kiem tra
      print("Khong the select duoc");
      logDebug("Khong the select duoc, ERROR=[" . $err . "]");
      logDebug("COUNT=[0]");
      return null;
    }
    
    if($res) {  // Neu Khong co loi
      while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) $ret[] = $row;
      mysqli_free_result($res);
    }

    close($link);
    return $ret;
  }

  //--------------------------------
  //--- Select Once
  //--------------------------------
  function select_once($sql) {
    $link = connect();
    $res = mysqli_query($link, $sql) ;
    $err = mysqli_error($link); //Lay loi sau khi thuc hien truy van
    
    if($err) {  //kiem tra
      print("Khong the select duoc");
      logDebug("Khong the select duoc, ERROR=[" . $err . "]");
      logDebug("COUNT=[0]");
      return null;
    }
    
    if($res) {  // Neu Khong co loi
      $ret = mysqli_fetch_array($res, MYSQLI_ASSOC);
      mysqli_free_result($res);
    }

    close($link);
    return $ret;
  }
  
  //--------------------------------
  //--- Non-return Execute
  //--------------------------------
  function exec_update($sql) {
    $link = connect();
    // $res = mysqli_query($link, $sql) ;
    // $row = array();
    $err = mysqli_error($link); //Lay loi sau khi thuc hien truy van
    
    if($err) {  //kiem tra
      print("Khong the update duoc, ERROR=[" . $err . "]" );
      print("COUNT=[0]");
      return -1;
    }
    $ret = mysqli_affected_rows($link);
    close($link);
    return $ret;
  }
?>
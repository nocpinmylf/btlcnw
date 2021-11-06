<?php 
  include_once(__DIR__."\connect.php");
  include_once(__DIR__."\manage-item.php");

  if(!isset($_COOKIE['user']) && !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }
  $sql = "SELECT * FROM `product`";
  // $all = exec_select($sql);

  //$pid = isset($_REQUEST["pid"]) ? $_REQUEST["pid"] : 0;
  if(isset($_POST["pid"])) {
    DeleteItem($_POST["pid"]);
    unset($_POST);
  }

  //$sqlSearch = "SELECT * FROM `product`";
  if(isset($_REQUEST["timkiem"])) {
    $condition = "WHERE `name` LIKE '%".$_REQUEST["timkiem"]."%' LIMIT 10";
    $sql .= $condition;
    unset($_REQUEST["timkiem"]);
  }
  $all = exec_select($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_COOKIE['user']; ?> - Quản Lý</title>
  <link rel="stylesheet" href="css/quanly.css">
  <script defer src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script defer src="js/font-awesome.js" crossorigin="anonymous"></script>
  <script defer src="js/manage.js" crossorigin="anonymous"></script>
</head>
<body id="quanly" class="quanly">
  <header class="quanly-header">
    <div class="wrap">
      <div class="quanly-header-button wrap">
        <span>Xin Chào <?php echo $_COOKIE['user']; ?></span>
        <a href="logout.php">Đăng Xuất</a>
      </div>
    </div>
  </header>

  <main class="quanly-body">
    <span><?php echo $sql; ?></span>
    <div class="wrap">
      <div class="quanly-body-chucnang">
        <button class="quanly-body-chucnang-btn">Thêm Sản Phẩm</button>
        <button class="quanly-body-chucnang-btn">Thêm Loại</button>
        <form class="quanly-body-chucnang-btn" id="timkiemForm" method="get">
          <input type="text" name="timkiem" id="timkiem" placeholder="Tên sản phẩm">
          <button type="submit">Tìm</button>
        </form>
      </div>
      <div id="danhsach" class="quanly-body-dulieu">
        <?php
          foreach ($all as $data) {
            ManageItem($data["imgpath"], $data["name"], $data["price"], $data["id"], $data["cid"]);
          }
        ?>
      </div>
  </main>

  <footer class="quanly-footer"><p class="copyright wrap">© 2021 Copyright</p></footer>
  
</body>
</html>
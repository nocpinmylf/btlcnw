<?php 
  include_once(__DIR__."\connect.php");
  include_once(__DIR__."\manage-item.php");

  // Check Login
  if(!isset($_COOKIE['user']) || !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }
  $updateSQL ="";
  // Update Product
  if(isset($_REQUEST["uid"])) {
    $updateSQL = "UPDATE `product` SET `cid` = '".$_REQUEST["category"]."', `name` = '".$_REQUEST["tensp"]."', `description` = '".$_REQUEST["description"]."', `price` = '".$_REQUEST["price"]."', `imgpath` = '".$_REQUEST["imgpath"]."',  `rate` = '".$_REQUEST["rate"]."' WHERE `product`.`id` = '".$_REQUEST["uid"]."'";
    
    try {
      exec_update($updateSQL);
    } catch (\Throwable $th) {
      throw $th;
    } finally {
      unset($_REQUEST["category"]);
      unset($_REQUEST["tensp"]);
      unset($_REQUEST["description"]);
      unset($_REQUEST["price"]);
      unset($_REQUEST["imgpath"]);
      unset($_REQUEST["uid"]);
      unset($_REQUEST["rate"]);

      header("location: quanly.php");
    }
  }

  // Insert Product
  if( isset($_REQUEST["insert"])&&
      isset($_REQUEST["category"])&&
      isset($_REQUEST["tensp"])&&
      isset($_REQUEST["description"])&&
      isset($_REQUEST["price"])) {   
        $insertSQL = "INSERT INTO `product` (`cid`, `name`, `description`, `price`, `imgpath`)
                      VALUES ('".$_REQUEST["category"]."', '".$_REQUEST["tensp"]."', '".$_REQUEST["description"]."', '".$_REQUEST["price"]."', '".$_REQUEST["imgpath"]."');";
        try {
          exec_update($insertSQL);
        } catch (\Throwable $th) {
          throw $th;
        } finally {
          unset($_REQUEST["category"]);
          unset($_REQUEST["tensp"]);
          unset($_REQUEST["description"]);
          unset($_REQUEST["price"]);
          unset($_REQUEST["imgpath"]);

          header("location: quanly.php");
        }
      }
  
  // Insert Category
  if(isset($_REQUEST["tenhangmoi"])) {   
    $insertSQL = "INSERT INTO `category` (`name`) VALUES ('".$_REQUEST["tenhangmoi"]."')";
    try {
      exec_update($insertSQL);
    } catch (\Throwable $th) {
      throw $th;
    } finally {
      unset($_REQUEST["tenhangmoi"]);
      header("location: quanly.php");
    }
  }

  $sql = "SELECT * FROM `product`";
  // $all = exec_select($sql);

  //$pid = isset($_REQUEST["pid"]) ? $_REQUEST["pid"] : 0;
  if(isset($_POST["pid"])) {
    DeleteItem($_POST["pid"]);
    unset($_POST);
  }

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
    <div class="wrap">
      <div class="quanly-body-chucnang">
        <a href="updatesp.php" class="quanly-body-chucnang-btn">Thêm Sản Phẩm</a>
        <a href="updateloai.php" class="quanly-body-chucnang-btn">Thêm Loại</a>
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
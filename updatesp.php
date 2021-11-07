<?php 
  include_once(__DIR__."\connect.php");
  include_once(__DIR__."\manage-item.php");

  if(!isset($_COOKIE['user']) && !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }

  if(isset($_REQUEST["uid"])) {
    $sql = "SELECT * FROM `product` WHERE `id` = '".$_REQUEST["uid"]."';";
    $all = select_once($sql);

    $cid = $all['cid'];
    $name = $all['name'];
    $description = $all['description'];
    $price = $all['price'];
    $url = $all['imgpath'];
  }
  else {
    $sql = "SELECT * FROM `product`";
    $all = exec_select($sql);

    $cid = "";
    $name = "";
    $description = "";
    $price = "";
    $url = "";
  }

  $sql = "SELECT * FROM `category`";
  $category = exec_select($sql);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_COOKIE['user']; ?> - Update</title>
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
      <form action="quanly.php" method="post">
        <h1>Cập Nhật Sản Phẩm</h1>
        <table class="updatesp">
          <tr>
            <td>Tiêu Đề</td>
            <td>Giá Trị</td>
          </tr>
          <tr>
            <td>Loại Hàng</td>
            <td>
              <select name="category" id="category">
                <?php
                  foreach($category as $data) {
                ?>
                <option value="<?php echo $data["id"]; ?>" <?php if($cid == $data["id"]) echo "selected"; ?>><?php echo $data["name"]; ?></option>
                
                <?php
                  }
                ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Tên</td>
            <td><input type="text" name="tensp" id="tensp" value="<?php echo $name; ?>" required></td>
          </tr>
          <tr>
            <td>Mô Tả</td>
            <td><input type="text" name="description" id="description" value="<?php echo $description; ?>" required></td>
          </tr>
          <tr>
            <td>Giá</td>
            <td><input type="number" name="price" id="price" value="<?php echo $price; ?>" min="1" required></td>
          </tr>
          <tr>
            <td>Link Ảnh</td>
            <td><input type="url" name="imgpath" id="imgpath" value="<?php echo $url; ?>"></td>
          </tr>

          <?php 
            if(isset($_REQUEST["uid"])) {
              $star = $all['rate'];
          ?>
            <tr>
              <td>Xếp Hạng</td>
              <td><input type="number" name="rate" id="rate" min="0" max="5" value="<?php echo $star; ?>"></td>
            </tr>
          <?php } ?>
        </table>
        <div class="update-group">
        <?php 
          if(isset($_REQUEST["uid"])) {
        ?>
          <button type="submit" name="uid" value="<?php echo $_REQUEST["uid"]; ?>">Cập Nhật</button>
        <?php } else { ?>
          <button type="submit" name="insert" value="1">Thêm</button>
        <?php } ?>
        <a href="quanly.php">Quay Lại</a>
        </div>
      </form>
    </div>
  </main>

  <footer class="quanly-footer"><p class="copyright wrap">© 2021 Copyright</p></footer>
  
</body>
</html>
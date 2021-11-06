<?php 
  include_once(__DIR__."\connect.php");
  include_once(__DIR__."\manage-item.php");

  if(!isset($_COOKIE['user']) && !isset($_COOKIE['isLogin'])) {
    header("location: login.php");
  }
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
        <h1>Cập Nhật Loại Hàng</h1>
        <table class="updatesp">
          <tr>
            <td>Tiêu Đề</td>
            <td>Giá Trị</td>
          </tr>
          <tr>
            <td>Tên Loại Hàng Mới</td>
            <td><input type="text" name="tenhangmoi" id="tenhangmoi" required></td>
          </tr>
        </table>
        <div class="update-group">
          <button type="submit">Thêm</button>
          <a href="quanly.php">Quay Lại</a>
        </div>
        
      </form>
    </div>
  </main>

  <footer class="quanly-footer"><p class="copyright wrap">© 2021 Copyright</p></footer>
  
</body>
</html>
<?php 
  include(__DIR__."\connect.php");

  if(isset($_COOKIE['user']) && isset($_COOKIE['isLogin'])) {
    header("location: quanly.php");
  }

  $username = isset($_POST["username"]) ? $_POST["username"] : "";
  $password = isset($_POST["password"]) ? $_POST["password"] : "";
  $remember = isset($_POST["remember-me"]) ? $_POST["remember-me"] : null;
  $sql = "SELECT COUNT(*) FROM user WHERE '".$username."' = username AND '".$password."' = password;";
  $valid = select_once($sql); 
  if(reset($valid) == 1) {
    $time = (is_null($remember)) ? time() + 3600 : time() + 9999999999;
    setcookie('user', $_POST["username"], $time);
    setcookie('isLogin', reset($valid), $time);
    header("location: quanly.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once("head.php"); ?>
  <title>Đăng Nhập</title>
</head>

<body class="login-body">
  <div id="login">
    <h3 class="text-center text-white pt-5">Đăng Nhập Để Tiếp Tục</h3>
    <div class="container">
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="" method="post">
              <h3 class="text-center text">Đăng Nhập</h3>
              <div class="form-group">
                <label for="username" class="text">Tên Đăng Nhập:</label><br>
                <input type="text" name="username" id="username" maxlength="20" class="form-control">
              </div>
              <div class="form-group">
                <label for="password" class="text">Mật Khẩu:</label><br>
                <input type="password" name="password" id="password" maxlength="20" class="form-control">
              </div>
              <div class="form-group button-group">
                <div class="remember">
                <label for="remember-me" class="text"><span>Ghi Nhớ</span></label>
                 <input id="remember-me" name="remember-me" type="checkbox">
                </div>
                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
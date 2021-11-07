<?php 
  include(__DIR__."\product-item.php");
  include(__DIR__."\connect.php");

  $sql = "SELECT * FROM `product` WHERE rate = 5 LIMIT 10";
  $hotdeal = exec_select($sql);

  $sql = "SELECT * FROM `product` WHERE (cid > 1 AND cid < 10) LIMIT 10";
  $gamingGear = exec_select($sql);

  $sql = "SELECT * FROM `product` WHERE cid = 10 LIMIT 10";
  $otherThings = exec_select($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("head.php"); ?>
  <title>PC Accessories</title>
</head>
<body>
    <!-- header -->
  <header id="header">
    <?php include_once("header.php"); ?>
    <?php include_once("banner.php"); ?>
  </header>
    <!-- main --> 
  <main id="main">
      <!-- news section -->
      <div class="section wrap">
        <div class="section-head">
          <span class="section-head-title">News</span>
        </div>
        <div class="section-news wrap">
          <?php 
            require_once("news-slide.php");
            require_once("news-box.php");
          ?>
        </div>
      </div>
      <!-- hot deal -->
    <div class="section wrap">
      <div class="section-head">
        <span class="section-head-title">Hot Deal</span>
        <a href="" class="section-head-more">Xem Thêm >></a>
      </div>
      
      <div class="section-main items-slide">
        <?php
          foreach($hotdeal as $data) {
            ProductItem($data["imgpath"], $data["name"], $data["description"], $data["rate"], $data["price"], $data["id"]);
          }
        ?>
      </div>
    </div>

      <!-- Gaming gear -->
    <div class="section wrap">
      <div class="section-head">
        <span class="section-head-title">Gaming Gear</span>
        <a href="" class="section-head-more">Xem Thêm >></a>
      </div>
      <div class="section-main items-slide">
        <?php
          foreach($gamingGear as $data) {
            ProductItem($data["imgpath"], $data["name"], $data["description"], $data["rate"], $data["price"], $data["id"]);
          }
        ?>
      </div>
    </div>

      <!-- Phụ Kiện Khác -->
    <div class="section wrap">
      <div class="section-head">
        <span class="section-head-title">Phụ Kiện Khác</span>
        <a href="" class="section-head-more">Xem Thêm >></a>
      </div>
      <div class="section-main  items-slide">
        <?php
          foreach($otherThings as $data) {
            ProductItem($data["imgpath"], $data["name"], $data["description"], $data["rate"], $data["price"], $data["id"]);
          }
        ?>
      </div>
    </div>

      <!-- hãng -->
    <div class="section wrap vendor">
      <div class="section-head">
        <span class="section-head-title">Nhà Cung Cấp</span>
      </div>
      <div class="section-main">
        <ul>
          <div>
            <li><a href="https://www.nvidia.com/vi-vn/geforce/geforce-experience/"><img src="res/img/hang1.jpg" alt=""></a></li>
            <li><a href="https://vn.msi.com/"><img src="res/img/hang2.png" alt=""></a></li>
            <li><a href="https://www.logitech.com/vi-vn"><img src="res/img/hang3.jpg" alt=""></a></li>
          </div>
          <div>
            <li><a href="http://www.kingmax.com.tw/en-global/home/index"><img src="res/img/hang4.jpg" alt=""></a></li>
            <li><a href="https://www.kingston.com/vn"><img src="res/img/hang5.jpg" alt=""></a></li>
            <li><a href="https://www.intel.vn/content/www/vn/vi/homepage.html"><img src="res/img/hang6.jpg" alt=""></a></li>
          </div>
        </ul>
      </div>
    </div>
  </main>

    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>





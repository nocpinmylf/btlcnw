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
  <title>Grocery Online</title>
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
          <span class="section-head-title">Tin tức</span>
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

      <!-- Bán chạy -->
    <div class="section wrap">
      <div class="section-head">
        <span class="section-head-title">Bán chạy</span>
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
        <span class="section-head-title">Khác</span>
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
            <li><a href="#"><img src="res/img/hang1.png" alt=""></a></li>
            <li><a href="#"><img src="res/img/hang2.png" alt=""></a></li>
            <li><a href="#"><img src="res/img/hang3.png" alt=""></a></li>
          </div>
          <div>
            <li><a href="#"><img src="res/img/hang4.png" alt=""></a></li>
            <li><a href="#"><img src="res/img/hang5.png" alt=""></a></li>
            <li><a href="#"><img src="res/img/hang6.png" alt=""></a></li>
          </div>
        </ul>
      </div>
    </div>
  </main>

    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>





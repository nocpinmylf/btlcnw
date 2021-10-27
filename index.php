<?php 
  include(__DIR__."\product-item.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once("head.php"); ?>
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
          ProductItem('item1.jpg', 'Bộ Vi Xử Lý Core i5', 'Core i5 9400 / 9M / 2.9GHz upto 4.1GHz / 6 nhân 6 luồng', 5, 139, 0);
          ProductItem('item2.jpg', 'Bộ Vi Xử Lý AMD', 'AMD Athlon™ 200GE 3.2GHz / 2 nhân 4 luồng / Radeon™ Vega 3 Graphics', 4, 99, 0);
          ProductItem('item3.jpg', 'Bộ Vi Xử Lý AMD Ryzen 3', 'AMD Ryzen 3 3200G /6MB /3.6GHz /4 nhân 4 luồng', 5, 159, 0);
          ProductItem('item4.jpg', 'Bộ Vi Xử Lý Core AMD Ryzen 9', 'AMD Ryzen 9 3900x /70MB /3.8GHz /12 nhân 24 luồng', 5, 519, 0);
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
          ProductItem('Gaming1.png', 'Sony Playstation 4 Pro 1TB Party Bundle', 'PlayStation 4 Pro (Jet Black) with 1TB HDD x 1 (CUH-7218BB01), DUALSHOCK 4 wireless controller (Jet Black) x 2', 5, 499, 0);
          ProductItem('Gaming2.png', 'Tai nghe SteelSeries Arctis Pro Wireless', 'Độ nhạy: 102 dBSPL, Micro : -38 dBV/Pa', 4, 389, 0);
          ProductItem('Gaming3.jpg', 'Chuột Razer Basilisk Ultimate', '20000DPI', 4, 239, 0);
          ProductItem('Gaming4.png', 'Ghế Noble Chair Hero Series Real Leather', 'Chất liệu: Da thật', 5, 1259, 0);
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
          ProductItem('other1.png', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – Blue', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – Blue', 4, 169, 0);
          ProductItem('other2.png', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – White', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – White', 4, 169, 0);
          ProductItem('other3.jpg', 'Balo RAZER ROUGE BACKPACK (15.6 Inch)', 'Balo RAZER ROUGE BACKPACK (15.6 Inch)', 5, 189, 0);
          ProductItem('other4.jpg', 'Bao Silicon cho Tai nghe Sony WF-1000XM3', 'Bao Silicon cho Tai nghe Sony WF-1000XM3', 5, 9.99, 0);
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
          <li><a href=""><img src="res/img/hang1.jpg" alt=""></a></li>
          <li><a href=""><img src="res/img/hang2.png" alt=""></a></li>
          <li><a href=""><img src="res/img/hang3.jpg" alt=""></a></li>
          <li><a href=""><img src="res/img/hang4.jpg" alt=""></a></li>
          <li><a href=""><img src="res/img/hang5.jpg" alt=""></a></li>
          <li><a href=""><img src="res/img/hang6.jpg" alt=""></a></li>
        </ul>
      </div>
    </div>
  </main>

    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>





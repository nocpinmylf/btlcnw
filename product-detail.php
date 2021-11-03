<?php 
  include(__DIR__."\product-item.php");
  include(__DIR__."\connect.php");
  
  $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
  if($id < 1) return;

  $sql = "SELECT * FROM product WHERE id = $id";
  $item = exec_select($sql)[0];
?>

<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>
  <?php require_once("head.php"); ?>
</head>
<body>
    <!-- header -->
  <?php include_once("header.php"); ?>

    <!-- main --> 
  <main id="product-info" class="wrap">
    <span class="space"></span>
    <span class="product-title"><?php echo $item['name']; ?></span>
    <div id="product-detail" class="product-detail">
      <!-- body -->
      <div class="product-detail-body">
        <div class="detail-slide">
          <div id="big-img" class="detail-slide-img">
          <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
          </div>
          <div id="small-slide" class="detail-slide-small">
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
            <div class="slBox"><img src="<?php echo $item['imgpath']; ?>" alt=""></div>
          </div>
        </div>
        <div class="detail-description">
          <span class="detail-description-price">$<?php echo $item['price']; ?></span>
          <div class="detail-description-button">
            <div class="quantity">
              <label for="quantity-input">Số Lượng</label>
              <div id="quantity-input" class="quantity-input">
                <button id="quantity-sub" disabled>-</button>
                <input type="text" name="quantity" id="quantity" value="1">
                <button id="quantity-add">+</button>
              </div>
            </div>
            <button type="button" class="top">Thêm Vào Giỏ</button>
            <div class="bottom">
              <button>Đặt Hàng</button>
              <button>Trả Góp</button>
            </div>
          </div>
        </div>
      </div>

      <!-- privacy -->
      <div class="product-detail-privacy">
        <div class="privacy-gift"></div>
        <div class="privacy-description"></div>
      </div>
    </div>

    <div class="more-items items-slide">
      <?php
        // ProductItem('item1.jpg', 'Bộ Vi Xử Lý Core i5', 'Core i5 9400 / 9M / 2.9GHz upto 4.1GHz / 6 nhân 6 luồng', 5, 139, 0);
        // ProductItem('item2.jpg', 'Bộ Vi Xử Lý AMD', 'AMD Athlon™ 200GE 3.2GHz / 2 nhân 4 luồng / Radeon™ Vega 3 Graphics', 4, 99, 0);
        // ProductItem('item3.jpg', 'Bộ Vi Xử Lý AMD Ryzen 3', 'AMD Ryzen 3 3200G /6MB /3.6GHz /4 nhân 4 luồng', 5, 159, 0);
        // ProductItem('item4.jpg', 'Bộ Vi Xử Lý Core AMD Ryzen 9', 'AMD Ryzen 9 3900x /70MB /3.8GHz /12 nhân 24 luồng', 5, 519, 0);

        // ProductItem('Gaming1.png', 'Sony Playstation 4 Pro 1TB Party Bundle', 'PlayStation 4 Pro (Jet Black) with 1TB HDD x 1 (CUH-7218BB01), DUALSHOCK 4 wireless controller (Jet Black) x 2', 5, 499, 0);
        // ProductItem('Gaming2.png', 'Tai nghe SteelSeries Arctis Pro Wireless', 'Độ nhạy: 102 dBSPL, Micro : -38 dBV/Pa', 4, 389, 0);
        // ProductItem('Gaming3.jpg', 'Chuột Razer Basilisk Ultimate', '20000DPI', 4, 239, 0);
        // ProductItem('Gaming4.png', 'Ghế Noble Chair Hero Series Real Leather', 'Chất liệu: Da thật', 5, 1259, 0);

        // ProductItem('other1.png', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – Blue', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – Blue', 4, 169, 0);
        // ProductItem('other2.png', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – White', 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – White', 4, 169, 0);
        // ProductItem('other3.jpg', 'Balo RAZER ROUGE BACKPACK (15.6 Inch)', 'Balo RAZER ROUGE BACKPACK (15.6 Inch)', 5, 189, 0);
        // ProductItem('other4.jpg', 'Bao Silicon cho Tai nghe Sony WF-1000XM3', 'Bao Silicon cho Tai nghe Sony WF-1000XM3', 5, 9.99, 0);
      ?>
    </div>
  </main>
  
    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>
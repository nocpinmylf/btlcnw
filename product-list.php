<?php 
  include(__DIR__."\product-item.php");
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
  <main id="product-list" class="wrap product-list">
      <?php require_once('search-form.php'); ?>
      <div class="product-list-title">
        <h3>Bộ Lọc</h3>
        <nav class="selector">
          <!-- price-range-slider -->
          <div class="price-range-slider">
            <div id="slider-range" class="range-bar" min ="0" max="500"></div>
            <p class="range-value">
              <input type="number" id="amountMin" placeholder="Tối thiểu" min="0" value="0">
              <span>-</span>
              <input type="number" id="amountMax" placeholder="Tối đa" min="1" value="500">
            </p>
          </div>
          <!-- catergory -->
          <select name="catergory" id="catergory">
            <option value="all">Tất Cả</option>
          </select>
          <!-- sort -->
          <select name="sort" id="sort">
            <option value="priceUp">Giá: Tăng Dần</option>
            <option value="priceDown">Giá: Giảm Dần</option>
            <option value="nameUp">Tên: A - Z</option>
            <option value="nameDown">Tên: Z - A</option>
          </select>
        </nav>
      </div>
      <div class="product-list-body">
        <?php
          ProductItem('item1.jpg', 'Bộ Vi Xử Lý Core i5', 'Core i5 9400 / 9M / 2.9GHz upto 4.1GHz / 6 nhân 6 luồng', 5, 139, 0);
          ProductItem('item2.jpg', 'Bộ Vi Xử Lý AMD', 'AMD Athlon™ 200GE 3.2GHz / 2 nhân 4 luồng / Radeon™ Vega 3 Graphics', 4, 99, 0);
          ProductItem('item3.jpg', 'Bộ Vi Xử Lý AMD Ryzen 3', 'AMD Ryzen 3 3200G /6MB /3.6GHz /4 nhân 4 luồng', 5, 159, 0);
          ProductItem('item4.jpg', 'Bộ Vi Xử Lý Core AMD Ryzen 9', 'AMD Ryzen 9 3900x /70MB /3.8GHz /12 nhân 24 luồng', 5, 519, 0);

          ProductItem('item1.jpg', 'Bộ Vi Xử Lý Core i5', 'Core i5 9400 / 9M / 2.9GHz upto 4.1GHz / 6 nhân 6 luồng', 5, 139, 0);
          ProductItem('item2.jpg', 'Bộ Vi Xử Lý AMD', 'AMD Athlon™ 200GE 3.2GHz / 2 nhân 4 luồng / Radeon™ Vega 3 Graphics', 4, 99, 0);
          ProductItem('item3.jpg', 'Bộ Vi Xử Lý AMD Ryzen 3', 'AMD Ryzen 3 3200G /6MB /3.6GHz /4 nhân 4 luồng', 5, 159, 0);
          ProductItem('item4.jpg', 'Bộ Vi Xử Lý Core AMD Ryzen 9', 'AMD Ryzen 9 3900x /70MB /3.8GHz /12 nhân 24 luồng', 5, 519, 0);
        ?>
      </div>
      <div class="pagination"></div>
  </main>
  
    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>
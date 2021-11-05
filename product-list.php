<?php 
  include(__DIR__."\product-item.php");
  include(__DIR__."\connect.php");

  $sql = "SELECT * FROM product";
  $all = exec_select($sql);
?>

<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>
  <?php require_once("head.php"); ?>
  <script defer src="js/pagination.js"></script>
  <title>Sản Phẩm</title>
</head>
<body>
    <!-- header -->
  <?php include_once("header.php"); ?>

    <!-- main --> 
  <main id="product-list" class="wrap product-list">
      <h1>Các Sản Phẩm Hiện Đang Bán</h1>
      
      <div class="product-list-title">
        <h3>Bộ Lọc</h3>
        <nav class="selector">
          <!-- price-range-slider -->
          <div class="price-range-slider">
            <div id="slider-range" class="range-bar"></div>
            <p class="range-value">
              <input type="number" id="amountMin" placeholder="Tối thiểu" min="0" value="0">
              <span>-</span>
              <input type="number" id="amountMax" placeholder="Tối đa" min="1" value="5000">
            </p>
          </div>
          <!-- catergory -->
          <div class="selector-part">
            <span>Danh Mục</span>
            <select name="catergory" id="catergory">
              <option value="all">Tất Cả</option>
            </select>
          </div>
          
          <!-- sort -->
          <div class="selector-part">
            <span>Sắp Xếp</span>
            <select name="sort" id="sort">
              <option value="priceUp">Giá: Tăng Dần</option>
              <option value="priceDown">Giá: Giảm Dần</option>
              <option value="nameUp">Tên: A - Z</option>
              <option value="nameDown">Tên: Z - A</option>
            </select>
          </div>
          
        </nav>
      </div>
      <div class="product-list-body">
        <?php
          foreach($all as $data) {
            ProductItem($data["imgpath"], $data["name"], $data["description"], $data["rate"], $data["price"], $data["id"]);
          }
        ?>
      </div>
      <div id="pagination"></div>
  </main>
  
    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>
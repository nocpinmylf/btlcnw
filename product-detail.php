<?php 
  include(__DIR__."\product-item.php");
  include(__DIR__."\connect.php");
  
  $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
  if($id < 1) return;

  $sql = "SELECT * FROM product WHERE id = $id";
  $item = select_once($sql);
  $info = explode('/', $item['description']);

  // Chọn ngẫu nhiên 5 product trong database
  $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 5";
  $other = exec_select($sql);
?>

<!DOCTYPE html>
<html lang="en">
<!-- head -->
<head>
  <?php require_once("head.php"); ?>
  <title><?php echo $item['name']; ?></title>
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

          <p class="rate">Đánh Giá: <?php echo GetStar($item["rate"]); ?></p>
          <!-- Mo ta -->
          <div class="detail-description-text">
            <span class="detail-description-text-title">Mô Tả</span>
            <ul>
              <?php foreach($info as $i) { ?>
              <li><i class="fas fa-check"></i> <?php echo $i ?></li>
              <?php } ?>
            </ul>
          </div>

          <!-- quantity -->
          <div class="quantity">
            <label for="quantity-input">Số Lượng</label>
            <div id="quantity-input" class="quantity-input">
              <button id="quantity-sub" disabled>-</button>
              <input type="text" name="quantity" id="quantity" value="1">
              <button id="quantity-add">+</button>
            </div>
          </div>

          <!-- Button group -->
          <div class="detail-description-button">
            <button type="button" class="top">Thêm Vào Giỏ</button>
            <div class="bottom">
              <button>Đặt Hàng Ngay</button>
              <button>Trả Góp 0%</button>
            </div>
          </div>
        </div>
      </div>

      <!-- privacy -->
      <div class="product-detail-privacy">
        <div class="privacy-gift">
          <p class="privacy-gift-title"><i class="fas fa-gift"></i> Khuyến Mãi</p>
          <ul class="privacy-gift-list">
            <li class="privacy-gift-list-item"><i class="fas fa-gift"></i> Miễn Phí Vận Chuyển</li>
            <li class="privacy-gift-list-item"><i class="fas fa-gift"></i> Giảm Ngay 5% Cho Hóa Đơn Trên 1 Triệu Đồng</li>
            <li class="privacy-gift-list-item"><i class="fas fa-gift"></i> Trợ Giá 100.000đ Khi Mua Kèm Tai Nghe</li>
          </ul>
        </div>
        <div class="privacy-description">
          <p class="privacy-description-title"><i class="fas fa-award"></i> Chính Sách</p>
          <ul class="privacy-description-list">
            <li class="privacy-description-list-item"><i class="fas fa-award"></i> Cam kết bán hàng mới/chính hãng 100%</li>
            <li class="privacy-description-list-item"><i class="fas fa-award"></i> Hỗ Trợ Tư Vấn 24/7</li>
            <li class="privacy-description-list-item"><i class="fas fa-award"></i> Bảo hành chính hãng 12 tháng tại trung tâm bảo hành ủy quyền, 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ NSX. Gia hạn bảo hành thời gian giãn cách</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="more-items items-slide">
      <?php
        foreach($other as $data) {
          ProductItem($data["imgpath"], $data["name"], $data["description"], $data["rate"], $data["price"], $data["id"]);
        }
      ?>
    </div>
  </main>
  
    <!-- footer -->
  <?php include_once("footer.php"); ?>

</body>
</html>
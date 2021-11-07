<?php
  function ProductItem($imgpath, $title, $des, $rate, $price, $id=0) {
    $star = GetStar($rate);
    $html = '
    <div class="item">
      <a href="product-detail.php?id='.$id.'">
        <img class="item-img" src="'.$imgpath.'" alt="Item Image">
        <span>
          <h4>'.$title.'</h4>
          <p>Mô tả ngắn: '.$des.'</p>
          <p class="rate">'.$star.'</p>
          <button>Thêm vào giỏ</button>
        </span>
        <p class="price">Giá: '.$price.'$</p>
      </a>
    </div>';
    echo $html;
  }

  function GetStar($rate = 5) {
    $starChecked = "fas ";
    $unstar = "far ";
    $star = "";
    for ($i = 0; $i < $rate; $i++) $star .= '<i class="' . $starChecked . 'fa-star"></i>';
    
    if($rate < 5) {
      for ($i = 0; $i < 5 - $rate; $i++) $star .= '<i class="' . $unstar . 'fa-star"></i>';
    }
    return($star);
  }
?>


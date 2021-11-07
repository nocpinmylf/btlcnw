<?php
  include_once(__DIR__."\connect.php");

  function ManageItem($imgpath, $title, $price, $id, $cid) {
    $category = GetCategory($cid);
    $html = '
    <div class="item">
      <div class="item-img">
        <img src="'.$imgpath.'" alt="Item Image">
      </div>
      <div class="item-title">
        <div><span class="item-title-id">#'.$id.'</span><span class="item-title-categ">'.reset($category).'</span></div>
        <p>'.$title.'</p>
        <p>$'.$price.'</p>
      </div>
      <div class="item-group">
        <form class="formsua" method="POST" action="updatesp.php"><button class="item-group-btn sua" type="submit" name="uid" value="'.$id.'"><i class="fas fa-edit"></i></button></form>
        <form class="formxoa" method="POST" action="quanly.php"><button class="item-group-btn xoa" type="submit" id="'.$id.'"><i class="fas fa-trash-alt"></i></button></form>
      </div>
    </div>';
    echo $html;
  }

  function GetCategory($cid) {
    $sql = "SELECT `name` FROM `category` WHERE `id` = $cid";
    return select_once($sql);
  }

  function DeleteItem($id) {
    if($id == null) return;
    $sql = "DELETE FROM `product` WHERE `id` = $id";

    try {
      exec_update($sql);
    } catch (Exception $e) {
        
    } finally {
      header("location: quanly.php");
    }
  }
?>

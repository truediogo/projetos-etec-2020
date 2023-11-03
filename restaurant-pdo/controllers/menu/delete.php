<?php
require_once '../../config.php';

if ($session) {

  define('usingModels', true);
  require_once '../../models/menu.php';
  $menu = new Menu();

  if (isset($_REQUEST['item_id']) && !empty($_REQUEST['item_id'])) {

    $id = $_REQUEST['item_id'];

    $oldImg = $menu->getImage($id);
    $imgpath = '../../uploads/' . $oldImg;
    if ($oldImg != "placeholder.jfif") {
      unlink($imgpath);
    }

    $menu->deleteItem($id);

    header("Location: ../../dashboard.php");
  } else {
    header('Location: ../../index.php');
  }
} else {
  header('Location: ../../index.php');
}
<?php

require_once '../../config.php';

if ($session) {

  define('usingModels', true);
  require_once '../../models/menu.php';
  $menu = new Menu();

  if (
    isset($_POST['title']) && !empty($_POST['title']) &&
    isset($_POST['desc']) && !empty($_POST['desc']) &&
    isset($_POST['price']) && !empty($_POST['price']) &&
    isset($_FILES['image']) && !empty($_FILES['image'])
  ) {

    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = floatval($_POST['price']);
    $image = $_FILES['image'];

    require '../misc/img-upload.php';
    $imgupload = new Imgupload();
    $upload_name = $imgupload->newImg($image);

    if ($newItem = $menu->addItem($title, $desc, $price, $upload_name)) {
      header("Location:../../dashboard.php");
    }
  } else {
    header('Location: ../../index.php');
  }
} else {
  header('Location: ../../index.php');
}
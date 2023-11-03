<?php

class Menu
{

  public function addItem($title, $desc, $price, $image)
  {
    global $db;

    $titleSave = $title;
    $descSave = $desc;
    $priceSave = $price;
    $imageSave = $image;

    $sql = $db->prepare("INSERT INTO `menu` VALUES (null,?,?,?,?)");
    return $sql->execute(array($titleSave, $descSave, $priceSave, $imageSave));
  }

  public function listItem($id)
  {
    global $db;

    $sql = $db->prepare('SELECT * FROM `menu` WHERE id =:id');
    $sql->bindParam(':id', $id);
    $sql->execute();
    $client = $sql->fetch(PDO::FETCH_ASSOC);

    return $client;
  }


  public function listItems()
  {
    global $db;

    $array = array();

    $sql = "SELECT * FROM menu";
    $sql = $db->prepare($sql);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function updateItem($id, $title, $desc, $price, $image)
  {
    global $db;

    $sql = $db->prepare('UPDATE `menu` SET title=:title, description=:desc, price=:price, img=:image WHERE id=:id');
    $sql->bindParam('id', $id);
    $sql->bindParam('title', $title);
    $sql->bindParam('desc', $desc);
    $sql->bindParam('price', $price);
    $sql->bindParam('image', $image);
    return $sql->execute();
  }

  public function deleteItem($id)
  {
    global $db;

    $delete_item = $db->prepare('DELETE FROM `menu` WHERE id =:id');
    $delete_item->bindParam(':id', $id);
    return $delete_item->execute();
  }

  public function getImage($id)
  {
    global $db;

    $grabItem = $db->prepare('SELECT * FROM `menu` WHERE id =:id');
    $grabItem->bindParam(':id', $id);
    $grabItem->execute();
    $item = $grabItem->fetch(PDO::FETCH_ASSOC);

    return $item['img'];
  }
}

if (!defined('usingModels')) {
  header('Location: ../index.php');
  die();
}
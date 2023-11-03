<?php

class ImgUpload
{

  public function newImg($image)
  {
    if ($image['name'] != '' && $image['size'] != 0) {
      $temp_name = $image['tmp_name'];
      $image_extension  = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
      $upload_status = 0;

      if ($temp_name !== false) {
        $upload_status = 1;

        if (
          $image_extension != "jpg" &&
          $image_extension != "png" &&
          $image_extension != "jpeg" &&
          $image_extension != "gif" &&
          $image_extension != "webp" &&
          $image_extension != "jfif"
        ) {
          $upload_status = 0;
        }

        if ($image["size"] > 5242880) {
          $upload_status = 0;
        }
      } else {
        $upload_status = 0;
      }

      if ($upload_status == 0) {
        $upload_name = "placeholder.jfif";
        return $upload_name;
      } else {
        $randon_name = uniqid() . "-" . time();
        $upload_name   = $randon_name . '.' . $image_extension;
        $upload_dir = "../../uploads/{$upload_name}";
        move_uploaded_file($temp_name, $upload_dir);
        return $upload_name;
      }
    } else {
      $upload_name = "placeholder.jfif";
      return $upload_name;
    }
  }

  public function updateImg($id, $image)
  {
    define('usingModels', true);
    require_once '../../models/menu.php';
    $menu = new Menu();

    if ($image['name'] != '' && $image['size'] != 0) {
      $temp_name = $image['tmp_name'];
      $image_extension  = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
      $upload_status = 0;

      if ($temp_name !== false) {
        $upload_status = 1;

        if (
          $image_extension != "jpg" &&
          $image_extension != "png" &&
          $image_extension != "jpeg" &&
          $image_extension != "gif" &&
          $image_extension != "webp" &&
          $image_extension != "jfif"
        ) {
          $upload_status = 0;
        }

        if ($image["size"] > 5242880) {
          $upload_status = 0;
        }
      } else {
        $upload_status = 0;
      }

      if ($upload_status == 0) {
        $upload_name = $menu->getImage($id);
        return $upload_name;
      } else {
        $oldImg = $menu->getImage($id);
        $imgpath = '../../uploads/' . $oldImg;
        if ($oldImg != "placeholder.jfif") {
          unlink($imgpath);
        }

        $randon_name = uniqid() . "-" . time();
        $upload_name   = $randon_name . '.' . $image_extension;
        $upload_dir = "../../uploads/{$upload_name}";
        move_uploaded_file($temp_name, $upload_dir);
        return $upload_name;
      }
    } else {
      $upload_name = $menu->getImage($id);
      return $upload_name;
    }
  }
}
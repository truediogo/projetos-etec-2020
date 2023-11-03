<?php

class User
{
  public function login($username, $passphrase)
  {
    global $db;

    $sql = "SELECT * FROM users WHERE username = :username AND passphrase = :passphrase";
    $sql = $db->prepare($sql);
    $sql->bindValue("username", $username);
    $sql->bindValue("passphrase", md5($passphrase));
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $data = $sql->fetch();

      $_SESSION['id_session'] = $data['id'];

      return true;
    } else {
      return false;
    }
  }
}

if (!defined('usingModels')) {
  header('Location: ../index.php');
  die();
}
<?php

if (
  isset($_POST['username']) && !empty($_POST['username']) &&
  isset($_POST['password']) && !empty($_POST['password'])
) {

  require_once '../../config.php';
  define('usingModels', true);
  require_once '../../models/user.php';

  $user = new User();

  $username = addslashes($_POST['username']);
  $passphrase = addslashes($_POST['password']);

  if ($user->login($username, $passphrase)) {
    if (isset($_SESSION['id_session'])) {
      header("Location: ../../dashboard.php");
    } else {
      header("Location: ../../login.php");
    }
  } else {
    header("Location: ../../login.php");
  };
} else {
  header("Location: ../../login.php");
}
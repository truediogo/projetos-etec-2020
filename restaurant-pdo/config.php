<?php

session_start();

$server = "localhost";
$user = "root";
$password = "";
$database = "restaurant";

try {
  $db = new PDO("mysql:host={$server};dbname={$database}", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $session = isset($_SESSION['id_session']) && !empty($_SESSION['id_session']);
} catch (PDOEXCEPTION $e) {
  $e->getMessage();
}
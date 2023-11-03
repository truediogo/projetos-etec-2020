<?php
require 'config.php';

define('usingModels', true);
require 'models/menu.php';

$menu = new Menu();
$menuitems = $menu->listItems();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Restaurant!</title>
  <link rel="stylesheet" href="static/style.css" />
</head>

<body>
  <header>
    <div class="container">
      <div class="logo" onclick="window.location='index.php'"></div>
      <div class="navigation">
        <ul class="navigation-container">
          <li class="navigation-item"><a href="index.php">Início</a></li>
          <?php
          if ($session) {
            echo '<li class="navigation-item"><a href="dashboard.php">Painel</a></li>';
          } else {
            echo '<li class="navigation-item"><a href="login.php">Login</a></li>';
          }
          ?>

        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </header>

  <main>
    <div class="container">
      <section class="menu">
        <h1 class="menu-title">Conheça nossos Pratos</h1>
        <div class="menu-options">
          <?php
          foreach ($menuitems as $item) {
            $price = str_replace('.', ',', sprintf('R$' . '%01.2f', $item['price']));
            echo "<div class='menu-card'>
            <div class='option-img' style='background-image: url(uploads/{$item['img']});'></div>
            <div class='option-name'>
              <h2 class='option-title'>{$item['title']}</h2>
              <p class='option-desc'>
              {$item['description']}
              </p>
            </div>
            <span class='option-price'>" . $price . "</span>
          </div>";
          };

          ?>
        </div>
      </section>
    </div>
  </main>
</body>

</html>
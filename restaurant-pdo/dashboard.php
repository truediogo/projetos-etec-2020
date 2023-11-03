<?php

require 'config.php';

if ($session) :

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
    <script defer src="static/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js"></script>
  </head>

  <body>
    <header>
      <div class="container">
        <div class="logo" onclick="window.location='index.php'"></div>
        <div class="navigation">
          <ul class="navigation-container">
            <li class="navigation-item"><a href="index.php">Início</a></li>
            <li class="navigation-item"><a href="controllers/user/logout.php">Sair</a></li>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </header>

    <main>
      <div class="container">
        <section class="dashboard">
          <h1 class="dashboard-title">Administração</h1>
          <div class="dashboard-controls">
            <a href="add-item.php" class="button"><i class="fas fa-plus"></i> Cadastrar novo item</a>
          </div>

          <div class="dashboard-table">
            <table>
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Valor</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($menuitems as $item) {
                  $price = str_replace('.', ',', sprintf('R$' . '%01.2f', $item['price']));
                  echo "<tr>
                <td><div class='dashboard-image' style='background-image: url(" . 'uploads/' . $item['img'] . ")'></div><span class='title'>{$item['title']}</span></td>
                <td><span>$price</span></td>
                <td><a href='edit-item.php?item_id={$item['id']}'><i class='fas fa-edit'></i> Editar</a><a class='removeItem' href='controllers/menu/delete.php?item_id={$item['id']}'><i class='fas fa-trash'></i> Remover</a></td>
                </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </section>
      </div>
    </main>
  </body>

  </html>

<?php else : header("Location: index.php");
endif; ?>
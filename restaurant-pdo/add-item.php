<?php

require 'config.php';


if ($session) :

  define('usingModels', true);
  require 'models/menu.php';
  $menu = new Menu();

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
            <li class="navigation-item"><a href="dashboard.php">Painel</a></li>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </header>

    <main>
      <div class="container">
        <section class="dashboard">
          <h1 class="dashboard-title"><i class="fas fa-plus"></i> Adicionar item</h1>

          <div class="restaurant-form">
            <form action="controllers/menu/add.php" enctype="multipart/form-data" method="POST">
              <input type="text" name="title" maxlength="32" placeholder="Título" required />
              <textarea name="desc" maxlength="256" placeholder="Descricao" required></textarea>
              <input type="number" name="price" step="0.01" placeholder="Valor" required />
              <div>
                <input type="file" name="image" id="fileUpload" accept=".png, .jpg, .jpeg, .jfif, .webp">
                <a id="customButton"><i class="fas fa-images"></i> Selecionar imagem</a>
                <span id="fileName">Imagem Padrão</span>
                <p class="site-info info-img">São suportadas imagens no formato jpg, png, jfif e webp com tamanho máximo
                  de
                  5MB.
                </p>
              </div>
              <button class="button" type="submit"><i class="fas fa-check"></i> Concluir</button>
            </form>
          </div>
          <div class="restaurant-banner" id="restaurant-banner"></div>
        </section>
      </div>
    </main>
  </body>

  </html>
<?php else : header("Location: index.php");
endif; ?>
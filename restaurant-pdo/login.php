<?php
require 'config.php';

if ($session) {
  header("Location: dashboard.php");
}
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
          <li class="navigation-item">Início</li>
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  </header>

  <main>
    <div class="container">
      <section class="dashboard">
        <h1 class="dashboard-title">Login</h1>

        <div class="restaurant-form">
          <form action="controllers/user/access.php" method="POST">
            <input type="text" name="username" id="" placeholder="Usuário" />
            <input type="password" name="password" id="" placeholder="Senha" />
            <button class="button">Fazer Login</button>
          </form>
          <div class="site-info">
            <p class="info-title">
              Informacoes de Acesso</p>
            <p class="info-content"><strong>Usuário :</strong> restaurant<br><strong>Senha :</strong> acessorestaurant
            </p>
          </div>
        </div>

        <div class="restaurant-banner"></div>
      </section>
    </div>
  </main>
</body>

</html>
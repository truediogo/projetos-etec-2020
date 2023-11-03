<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Clientes</title>
    <link rel="stylesheet" href="includes/styles/main.css">
</head>

<body>
    <header>
        <div class="container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li class="active">Clientes</li>
                <li><a href="add.php">Adicionar</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="dashboard list">
                <div class="dash-header">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nascimento</th>
                            <th>Acao</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                    require_once "config.php";

                    
                    $sql=$db->prepare("SELECT * FROM clients");	//sql select query
                    $sql->execute();
                    while($clients=$sql->fetch(PDO::FETCH_ASSOC))
                    {
                        $serverdate = $clients['birthdate'];
                        $date = date("d/m/Y", strtotime($serverdate));
                    ?>

                        <tr>
                            <td><?php echo $clients['name']; ?></td>
                            <td><?php echo $clients['email']; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><a href="edit.php?update_id=<?php echo $clients['id']; ?>" class="btn">Editar</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>
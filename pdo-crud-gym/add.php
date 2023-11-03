<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    <link rel="stylesheet" href="includes/styles/main.css">
</head>

<body>
    <header>
        <div class="container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li><a href="list.php">Clientes</a></li>
                <li class="active">Adicionar</li>
            </ul>
        </div>
    </header>

    <?php 
        require_once "config.php";

        if(isset($_POST['cadastro'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $sex = $_POST['sex'];

            $sql = $db->prepare("INSERT INTO `clients` VALUES (null,?,?,?,?)");
            $sql->execute(array($name, $email, $sex, $birthday ));

            header("Location:list.php");

        }
    ?>

    <main>
        <div class="container">
            <div class="dashboard">
                <div class="about"
                    style="background: url(includes/images/add.jfif);background-size: cover;background-position: center;">
                    <div class="title">
                        <div class="wrapper">
                            <h1>Cadastrar novo cliente</h1>
                            <p>Insira os dados para cadastrar um novo cliente</p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <form action="add.php" method="POST">
                        <div class="field">
                            <div class="title">Nome</div>
                            <input type="text" name="name" required>
                        </div>
                        <div class="field">
                            <div class="title">Email</div>
                            <input type="email" name="email" required>
                        </div>
                        <div class="field">
                            <div class="title">Data de Nascimento</div>
                            <input type="date" name="birthday" required>
                        </div>
                        <div class="field">
                            <div class="title">Sexo</div>
                            <select name="sex">
                                <option value="1">Masculino</option>
                                <option value="0">Feminino</option>
                            </select>
                        </div>
                        <button type="submit" name="cadastro">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
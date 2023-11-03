<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="includes/styles/main.css">
</head>

<body>
    <header>
        <div class="container">
            <ul>
                <li><a href="index.php">Início</a></li>
                <li class="active"><a href="list.php">Clientes</a></li>
                <li><a href="add.php">Adicionar</a></li>
            </ul>
        </div>
    </header>

    <?php 
        require_once "config.php";

        if((!isset($_REQUEST['update_id'])) && (!isset($_REQUEST['delete_id']))) {
            header("Location:list.php");
        }

        if(isset($_REQUEST['update_id']))
        {
            try
            {
                $id = $_REQUEST['update_id'];

                if ($id == null) {
                    header("Location:list.php");
                }

                $sql = $db->prepare('SELECT * FROM `clients` WHERE id =:id');
                $sql->bindParam(':id',$id);
                $sql->execute(); 
                $client = $sql->fetch(PDO::FETCH_ASSOC);
                extract($client);

                
            }
            catch(PDOException $e)
            {
                $e->getMessage();
            }
        }

        if(isset($_REQUEST['delete_id']))
        {
            $id=$_REQUEST['delete_id'];

            if ($id == null) {
                header("Location:list.php");
            }

            $delete_client = $db->prepare('DELETE FROM `clients` WHERE id =:id');
            $delete_client->bindParam(':id',$id);
            $delete_client->execute();

            if($delete_client->execute())
            {
                header("Location:list.php");
            }
                
            
        }

        if(isset($_POST['edit']))
        {
            $new_Name_up = $_REQUEST['name'];
            $new_Email_up = $_REQUEST['email'];
            $new_birthdate_up = $_REQUEST['birthday'];
            $new_sex_up = $_REQUEST['sex'];
                
            try
            {
                    $sql=$db->prepare('UPDATE clients SET name=:new_Name, email=:new_Email, birthdate=:new_bDate, sex=:new_Sex WHERE id=:id');
                    $sql->bindParam(':new_Name',$new_Name_up);
                    $sql->bindParam(':new_Email',$new_Email_up);
                    $sql->bindParam(':new_bDate',$new_birthdate_up);
                    $sql->bindParam(':new_Sex',$new_sex_up);
                    $sql->bindParam(':id',$id);

                    if($sql->execute())
                    {
                        header("Location:list.php");
                    }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }	
        }
    ?>

    <main>
        <div class="container">
            <div class="dashboard">
                <div class="about"
                    style="background: url(includes/images/edit.jfif);background-size: cover;background-position: center;">
                    <div class="title">
                        <div class="wrapper">
                            <h1>Editar cliente</h1>
                            <p>Insira os novos dados para atualizar o cadastro</p>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <form method="POST">
                        <div class="field">
                            <div class="title">Nome</div>
                            <input type="text" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="field">
                            <div class="title">Email</div>
                            <input type="email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="field">
                            <div class="title">Data de Nascimento</div>
                            <input type="date" name="birthday" value="<?php echo $birthdate; ?>" required>
                        </div>
                        <div class="field">
                            <div class="title">Sexo</div>
                            <select name="sex">
                                <?php if($sex == 0) {
                                    echo '<option value="1">Masculino</option><option value="0" selected>Feminino</option>';
                                } else {echo '<option value="1" selected>Masculino</option><option value="0">Feminino</option>';}
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="edit">Editar</button>
                    </form>
                    <a href="?delete_id=<?php echo $id?>" class="btn_delete">Excluir Cliente</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
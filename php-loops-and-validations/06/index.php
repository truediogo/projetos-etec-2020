<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="min.css">
    <title>Qual é o mês?</title>
</head>

<body>
    <div class="main">
        <h1>Qual é o mês?</h1>
        <p>Digite um número de 1 a 12 para verificar o mês</p>

        <form action="index.php" method="POST">
            <input type="number" name="number" placeholder="Digite um numero">
            <button type="submit">Verificar</button>
        </form>

        <?php
        if (!empty($_POST)) {

            $number = $_POST["number"];

            if ($number == "") {
                echo "Campo em branco!";
                return;
            };

            switch ($number) {
                case 1:
                    echo "Janeiro";
                    break;
                case 2:
                    echo "Fevereiro";
                    break;
                case 3:
                    echo "Março";
                    break;
                case 4:
                    echo "Abril";
                    break;
                case 5:
                    echo "Maio";
                    break;
                case 6:
                    echo "Junho";
                    break;
                case 7:
                    echo "Julho";
                    break;
                case 8:
                    echo "Agosto";
                    break;
                case 9:
                    echo "Setembro";
                    break;
                case 10:
                    echo "Outubro";
                    break;
                case 11:
                    echo "Novembro";
                    break;
                case 12:
                    echo "Dezembro";
                    break;
                default:
                    echo "Não existe um mês com esse número";
                    break;
            }
        }
        ?>
    </div>
</body>

</html>
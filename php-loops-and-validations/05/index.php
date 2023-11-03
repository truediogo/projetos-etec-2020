<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="min.css">
    <title>Positivo, negativo ou zero?</title>
</head>

<body>
    <div class="main">
        <h1>Positivo, negativo ou zero?</h1>

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

            if ($number == 0) echo "Igual a Zero";
            if ($number > 0) echo "Valor Positivo";
            if ($number < 0) echo "Valor Negativo";
        }
        ?>
    </div>
</body>

</html>
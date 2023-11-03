<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="min.css">
    <title>Tabuada</title>
</head>

<body>
    <div class="main">
        <h1>Tabuada</h1>

        <form action="index.php" method="POST">
            <input type="number" name="number" placeholder="Digite um numero">
            <button type="submit">Calcular</button>
        </form>

        <?php
        if (!empty($_POST)) {

            $number = $_POST["number"];

            if ($number == "") {
                echo "Campo em branco!";
                return;
            };

            echo "<table><tbody>";

            for ($i = 0; $i <= 10; $i++) {
                $total = $number * $i;

                echo "<tr><td>{$number}</td>";
                echo "<td>*</td>";
                echo "<td>{$i}</td>";
                echo "<td>=</td>";
                echo "<td>{$total}</td></tr>";
            }

            echo "</tbody></table>";
        }
        ?>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="it">

<head>
    <title>Tabella pitagorica</title>
</head>

<body>

    <h1>Tabella pitagorica</h1>

    <?php
        echo "<table border='1'>";

        for ($i = 1; $i <= 10; $i++) {

            echo "<tr>";

            for ($j = 1; $j <= 10; $j++) {
                echo "<td>" . ($i * $j) . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
    ?>

</body>

</html>

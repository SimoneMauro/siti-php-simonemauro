
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Tabella pitagorica</title>
</head>
<body>
    <h1>Tabella pitagorica</h1>
    <?php
        echo "<table border='1'>"; // crea la tabella con il bordo visibile

        for ($riga = 1; $riga <= 10; $riga++) { // il ciclo esterno crea le 10 righe della tabella

            echo "<tr>"; //crea una nuova riga

            for ($colonna = 1; $colonna <= 10; $colonna++) { // il ciclo interno crea 10 celle per ogni riga
                echo "<td>" . ($riga * $colonna) . "</td>"; // moltiplica il numero della riga per quello della colonna e inserisce il risultato nella cella della tabella
            }
            echo "</tr>"; //chiude la riga
        }
        echo "</table>"; //chiude la tabella
    ?>
</body>
</html>

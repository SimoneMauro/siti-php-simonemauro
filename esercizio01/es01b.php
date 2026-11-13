<!DOCTYPE html>
<html lang="it">
<head>
    <title>Esercizio PHP</title>
</head>
<body>

<?php
    $nome = "Paolo"; // Salvo il nome in una variabile

    $oggi = new DateTime("now", new DateTimeZone("Europe/Rome"));
    $ora = $oggi->format("G"); // Prendo l'ora attuale italiana

    // Scelgo il saluto in base all'ora
    if ($ora >= 8 && $ora < 12) {
        $saluto = "Buongiorno";
    } elseif ($ora >= 12 && $ora < 20) {
        $saluto = "Buonasera";
    } else {
        $saluto = "Buonanotte";
    }

    echo "$saluto $nome, benvenuto nella mia prima pagina PHP"; // Stampo il messaggio

    $browser = $_SERVER['HTTP_USER_AGENT']; // Rilevo il browser utilizzato

    echo "<p>Stai usando il browser: $browser</p>"; // Concludo la pagina con il browser
?>

</body>
</html>


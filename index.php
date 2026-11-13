<?php
$percorsoBase = __DIR__;
$elementi = scandir($percorsoBase);
$numeroEsercizi = 0;
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Il mio portfolio informatico</title>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #0f172a;
    color: #f8fafc;
}

header {
    padding: 55px 20px;
    text-align: center;
    background: linear-gradient(135deg, #1d4ed8, #7c3aed);
}

header h1 {
    margin: 0 0 12px;
    font-size: 38px;
}

header p {
    margin: 0;
    color: #e0e7ff;
    font-size: 17px;
}

main {
    max-width: 1100px;
    margin: 35px auto;
    padding: 0 20px;
}

.introduzione {
    margin-bottom: 28px;
    color: #cbd5e1;
    line-height: 1.7;
}

.griglia {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 22px;
}

.card {
    padding: 24px;
    background: #1e293b;
    border: 1px solid #334155;
    border-radius: 16px;
    transition: transform 0.2s, border-color 0.2s;
}

.card:hover {
    transform: translateY(-4px);
    border-color: #60a5fa;
}

.card h2 {
    margin-top: 0;
    color: #93c5fd;
    overflow-wrap: anywhere;
}

.card p {
    color: #cbd5e1;
}

ul {
    padding-left: 20px;
}

li {
    margin: 13px 0;
    overflow-wrap: anywhere;
}

a {
    color: #bfdbfe;
    text-decoration: none;
}

a:hover {
    color: white;
    text-decoration: underline;
}

.vuoto {
    padding: 22px;
    background: #1e293b;
    border-radius: 12px;
    color: #cbd5e1;
}

footer {
    padding: 25px;
    text-align: center;
    color: #94a3b8;
    border-top: 1px solid #334155;
    margin-top: 50px;
}
</style>
</head>

<body>

<header>
    <h1>Il mio portfolio informatico</h1>
    <p>Benvenuto nel mio archivio di esercizi</p>
</header>

<main>
    <section class="introduzione">
        <h2>I miei lavori</h2>
        <p>
            Qui trovi gli esercizi svolti durante il percorso di informatica.
            Seleziona un file per aprirlo.
        </p>
    </section>

    <section class="griglia">

    <?php
    foreach ($elementi as $cartella) {

        if ($cartella == "." || $cartella == "..") {
            continue;
        }

        $percorsoCartella = $percorsoBase . "/" . $cartella;

        if (
            is_dir($percorsoCartella) &&
            strpos(strtolower($cartella), "esercizio") === 0
        ) {
            $file = scandir($percorsoCartella);
            $fileValidi = [];

            foreach ($file as $nomeFile) {
                $percorsoFile = $percorsoCartella . "/" . $nomeFile;
                $estensione = strtolower(pathinfo($nomeFile, PATHINFO_EXTENSION));

                if (
                    is_file($percorsoFile) &&
                    in_array($estensione, [
                        "html", "htm", "php", "js", "css",
                        "pdf", "txt", "json", "xml", "jpg",
                        "jpeg", "png", "gif", "svg"
                    ])
                ) {
                    $fileValidi[] = $nomeFile;
                }
            }

            echo '<article class="card">';
            echo '<h2>📁 ' . htmlspecialchars($cartella) . '</h2>';

            if (count($fileValidi) > 0) {
                echo '<p>' . count($fileValidi) . ' file disponibili</p>';
                echo '<ul>';

                foreach ($fileValidi as $nomeFile) {
                    $url = rawurlencode($cartella) . "/" .
                           implode("/", array_map(
                               "rawurlencode",
                               explode("/", $nomeFile)
                           ));

                    echo '<li><a href="' .
                         htmlspecialchars($url, ENT_QUOTES, "UTF-8") .
                         '" target="_blank">' .
                         htmlspecialchars($nomeFile) .
                         '</a></li>';
                }

                echo '</ul>';
            } else {
                echo '<p>La cartella non contiene file supportati.</p>';
            }

            echo '</article>';
            $numeroEsercizi++;
        }
    }

    if ($numeroEsercizi == 0) {
        echo '<p class="vuoto">Non sono state trovate cartelle di esercizi. Controlla che siano nella stessa cartella di index.php.</p>';
    }
    ?>

    </section>
</main>

<footer>
    Portfolio di informatica · I miei esercizi
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Motocykle</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <img src="motor.png" alt="motocykl">
        
        <header>
            <h1>Motocykle - moja pasja</h1>
        </header>

        <main>
            <h2>Gdzie pojechać?</h2>
            <?php
            $conn = new mysqli( 'localhost','root', '','motory');
                // Skrypt #1
                $sql = "SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki JOIN zdjecia ON zdjecia_id = zdjecia.id;";
                $result = $conn->query($sql);
                while($row = $result -> fetch_array()) {
                    #tu jest echo<<<PANI- tego nie wida
                    echo<<<PANI
                    <div class='terminy'>
                    $row[0], rozpoczyna się w $row[2], <a href='$row[3].jpg'>zobacz zdjęcie</a>;
                    </div>
                    <div class='opis'>
                    $row[1]
                    </div>
                    PANI;
                }
            ?>
        </main>
    <aside>           
        <article id="prawy1">
            <h2>Co kupić?</h2>
            <ol>
                <li>Honda CBR125R</li>
                <li>Yamaha YBR125</li>
                <li>Honda VFR800i</li>
                <li>Honda CBR1100XX</li>
                <li>BMW R1200GS LC</li>
            </ol>
            </article>

        <article id="prawy2">
            <h2>Statystyki</h2>
            <?php
                // Skrypt #2
                $sql = "SELECT COUNT(*) FROM wycieczki;";
                $result = $conn->query($sql);
                while($row = $result -> fetch_array()) {
                    $liczba = $row[0];
                }
                echo "<p>Wpisanych wycieczek: $liczba</p>";
            ?>
            <p>Użytkowników forum: 200</p>
            <p>Przesłanych zdjęć: 1300</p>
            </article>
            </aside>   
        <footer>
            <p>Stronę wykonał: Pesel</p>
        </footer>

    </body>
</html>

<?php
    $conn -> close();
?>

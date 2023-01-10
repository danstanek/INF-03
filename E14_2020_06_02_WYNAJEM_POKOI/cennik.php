<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokoje</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section id="menuOne">
            <a href="./index.html">POKOJE</a>
        </section>
        <section id="menuTwo">
            <a href="./cennik.php">CENNIK</a>
        </section>
        <section id="menuThree">
            <a href="./kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <section id="banerTwo"></section>
    <main>
        <section id="panelLewy">
        </section>
        <section id="panelSrodkowy">
            <h1>Cennik</h1>
            <table>
                <?php
                $conn = mysqli_connect('localhost', 'root', '', 'wynajem');
                $q = "SELECT * FROM pokoje";
                $res = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                        </tr>";
                }
                mysqli_close($conn);
                ?>
            </table>
        </section>
        <section id="panelPrawy">
        </section>
    </main>
    <footer>
        <p>Stronę opracował: PESEL</p>
    </footer>
</body>

</html>

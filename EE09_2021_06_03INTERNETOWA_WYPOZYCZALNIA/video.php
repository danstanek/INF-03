<?php
#tu otwiera się baza mysqli_connect("localhost", "root","","dane3")
$conn=new mysqli("localhost", "root","","dane3");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <div id="baner1"><h1>Internetowa wypożyczalnia filmów</h1></div>
        <div id="baner2"><table><tr><td>Kryminał</td>
        <td>Horror</td>
        <td>Przygodowy</td></tr>
        <tr><td>20</td>
        <td>30</td>
        <td>20</td></tr></table></div>
    </header>
    <main>
        <div id="polecamy">

            <h3>Polecamy</h3>
            <?php
            //skrypt2
            $sql="SELECT id,nazwa,opis, zdjecie FROm produkty WHERE id In(18,22,23,25);";
            $result=$conn->query($sql);
            while ($row=$result->fetch_array()) {
                echo "<div class='flam'>";
                echo "<h4>$row[0]. $row[1]</h4>";
                echo"<img src='$row[3]' alt='film'>";
                echo "<p>$row[2]</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div id="film">
            <h3> Filmy fantastyczne</h3>
            <?php
            //skrypt3
            $sql="SELECT id,nazwa,opis,zdjecie FROM produkty Where Rodzaje_id=12;";
            $result=$conn->query($sql);
            while ($row=$result->fetch_array()) {
                echo "<div class='flam'>";
                echo "<h4>$row[0]. $row[1]</h4>";
                echo"<img src='$row[3]' alt='film'>";
                echo "<p>$row[2]</p>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
    <footer>
        <form action="video.php" method="post">
            <label for="nr">Usuń film nr.</label>
            <input type="number" name="nr" id="nr">
            <button>Usuń film</button>

        </form>
        <?php
        #skrypt1
        if(!empty($_POST['nr'])){
            $film=$_POST["nr"];
            $SQL="DELETE FROM produkty WHERE id=$film;";
            $result=$conn->query($SQL);
            //mysqli_query($SQL)
        }
        ?>
        Stronę wykonał: <a href="mailto:jan@poczta.com">PESEL</a>
    </footer>
</body>
</html>
<?php
#tu zamyka się baza mysqli_close($conn)
$conn->close();
?>
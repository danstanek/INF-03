<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" href="styl.css">
    </head>

    <body>
        <div class="baner">
            <h2>Swiatowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">

        </div>

        <section class="mecze">
    
            <?php
            $connect=mysqli_connect("localhost", "root", "", "egzamin");

            $zapytanie = "SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG';";
            $ex=mysqli_query($connect, $zapytanie);
            while($linia=mysqli_fetch_row($ex)){
                echo <<<FRIEND
                <div class='roz'>
                  <h3>$linia[0]-$linia[1]</h3>
                <h4>$linia[2]</h4>
                  w dniu: $linia[3]
                 </div>
              FRIEND;
        }


            mysqli_close($connect);
            ?>
       
    </section>
        

        <div class="glowny">
            <h2>Reprezentacja</h2>

        </div>

        <div class="lewy">
                <p>Podaj pozycje zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form name="formularz" method="POST" action="futbol.php">
                    <input type="number" name="numerek">
                    <input type="submit" value="Sprawdź">
                    </form>
                    <ul>
                    <?php
                    if(isset($_POST["num"]) && empty($_POST["num"]) !=TRUE){
                        $zapytanie2= 'SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id = 3;';
                        $exe = mysqli_query($connect, $zapytanie2);
                        while($linia=mysqli_fetch_row($exe)){
                            echo '<li>'.$linia[0].' '.$linia[1].'</li>';
                        }
                    }
?>
                    </ul>
               

        </div>

        <div class="prawy">
            <img src="zad1.png" alt="piłkarz">
            <p>Autor: 02213106230</p>
        </div>
    </body>
</html>
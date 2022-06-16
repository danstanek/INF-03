<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <div id="baner">
        <h3>Portal społecznościowy - Panel administratora</h3>
    </div>
    <div id="lewy">
        <h3>Użytkownicy</h3>
        <?php
            $polaczenie=mysqli_connect('localhost','root','','bazaaa');
            $zapytanie="SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30";
            $rezultat=mysqli_query($polaczenie,$zapytanie);
            while($wynik=mysqli_fetch_array($rezultat)){
                $wiek= 2022 - $wynik['rok_urodzenia']; //zależy od interpretacji 
                echo "".$wynik['id'].". ".$wynik['imie']." ".$wynik['nazwisko'].", ".$wiek."lat<br>";
            }
        ?>
        <a href="settings.html">Inne opcje</a>  <!--settings.html zawiera tylko tekst o treści "strona w budowie" -->
    </div>
    <div id="prawy">
        <h3>Informacje o użytkownikach</h3>
        <form action="users.php" method="POST">
                <input type="number" name="liczba_id">
                <input type="submit" value="ZOBACZ">
        </form>
        <hr>
        <?php
            if(isset($_POST['liczba_id']))
            {
                $liczba_id=$_POST['liczba_id'];
                $zapytanie_dwa="SELECT osoby.id, imie, nazwisko, zdjecie, opis, nazwa, rok_urodzenia FROM osoby INNER JOIN hobby ON osoby.hobby_id = hobby.id WHERE osoby.id=$liczba_id";
                $rezultat_dwa=mysqli_query($polaczenie,$zapytanie_dwa);
                $wynik_dwa=mysqli_fetch_array($rezultat_dwa);
                echo "<h3>".$liczba_id.". ".$wynik_dwa['imie']." ".$wynik_dwa['nazwisko']."</h3>";
                echo "<img src='".$wynik_dwa['zdjecie']."' alt='".$liczba_id."'>";
                echo "<p>rok: ".$wynik_dwa['rok_urodzenia']."</p>";
                echo "<p>opis".$wynik_dwa['opis']."</p>";
                echo "<p>hobby".$wynik_dwa['nazwa']."</p>";
            }
            mysqli_close($polaczenie);
        ?>
    </div>
    <div id="stopka">
        Stronę wykonał: pesel
    </div>
</body>
</html>

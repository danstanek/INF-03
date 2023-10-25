<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekretariat</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <div id="lewy">
<h1>AKTA PRACOWNICZE</h1>
<?php
$conn=mysqli_connect('127.0.0.1','root','','firma');
$q="SELECT id,imie,nazwisko,adres,miasto,czyRODO,czyBadania FROM pracownicy WHERE id=4;";
$res=mysqli_query($conn,$q);
while ($row=mysqli_fetch_array($res)){
     if($row[5]==0){$rodo="niepodpisane";}else $rodo= 'podpisane';
     if($row[6]==1){$badania="aktualne";}else $badania= 'niaktualne';

    echo "<h3>Dane</h3>
    <p>$row[1] $row[2]</p>
    <hr>

    <h3> Adres</h3>
    <p>$row[3]</p>
    <p>$row[4]</p>
    <hr>
    <p>RODO: $rodo</p>
    <p>Badania: $badania</p>

    ";
}
?>
<form><fieldset><legend>Tu możesz zobaczyć CV pracownika</legend>
<a href="cv.txt" target="_blank" rel="noopener noreferrer"></a>
</fieldset>
<input type="text" name="" id="" maxlength="4">
</form>
<h1>Liczba zatrudnionych pracowników</h1>
<?php
$q="SELECT COUNT(*) FROM pracownicy;";
$res=mysqli_query($conn,$q);
$row=mysqli_fetch_array($res);
echo "<p>$row[0]</p>"
?>

    </div>
    <div id="prawy">
        <?php
$q="SELECT id,imie,nazwisko FROM pracownicy WHERE id=4;";
$res=mysqli_query($conn,$q);
while ($row=mysqli_fetch_array($res)){
    echo"<img src=$row[0].jpg alt='pracownik'><h2>$row[2]</h2><h3>$row[1]</h3>";
}
$q="SELECT pracownicy.id, stanowiska.nazwa, stanowiska.opis FROM
pracownicy, stanowiska WHERE 
pracownicy.stanowiska_id = stanowiska.id AND pracownicy.id = 4;";
$res=mysqli_query($conn,$q);
while ($row=mysqli_fetch_array($res)){
    echo"<h4>$row[1]</h4><h3>$row[2]</h3>";
}



        mysqli_close($conn);
        ?>
    </div>
    <div id="stopka">Autorem strony jest:000000000 <p>&copy 2023</p></div>
</body>
</html>
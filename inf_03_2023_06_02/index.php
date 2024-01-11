<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtownia Szkolna</title>
    <link rel="stylesheet" href="styl.css">
</head>


<body>

<header>
<h1>Hurtownia z najlepszymi cenami</h1>
</header>

<div class="lewy">

<h2>Nasze ceny</h2>

<table>
 
<?php

$conn = mysqli_connect("localhost", "root", "", "sklep");
$query = "SELECT nazwa, cena FROM towary LIMIT 4;";

$result = mysqli_query($conn, $query);


// Create table
while($row = mysqli_fetch_array($result)) {
  echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
}

mysqli_close($conn);




?>


</table>

</div>
<div class="srodkowy">

<h2>Koszt zakupów</h2>

<form method="post">
<label for="towary">wybierz towar:</label>
<select id="towary" name="towary">
  <option value="Zeszyt 60 kartek">Zeszyt 60 kartek</option>
  <option value="Zeszyt 32 kartki">Zeszyt 32 kartki</option>
  <option value="Cyrkiel">Cyrkiel</option>
  <option value="Linijka 30 cm">Linijka 30 cm</option>
</select>
<br>
<label for="towary">liczba sztuk:</label>
<input type="number" name="number" id="">
<button type="submit">OBLICZ</button>
<br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $towar = $_POST['towary'];
    $numer = $_POST['number'];

    
    $conn = mysqli_connect("localhost", "root", "", "sklep");
    $result = mysqli_query($conn, "SELECT cena FROM towary WHERE nazwa = '".$towar."';");

    $result = mysqli_fetch_array($result)[0] * $numer;

    
    echo "wartość zakupów: ".$result;

    }

?>



</form>

</div>
<div class="prawy">

<h2>Kontakt</h2>
<img src="zakupy.png" alt="hurtownia">
<p><a href="hurt@poczta2.pl">hurt@poczta2.pl</a></p>

</div>



<footer>
<h4>Witryne wykonał: Jan Paweł 2137</h4>
</footer>


</body>
</html>
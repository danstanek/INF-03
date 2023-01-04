<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista przyjaciół</title>
    <link rel=stylesheet href=styl.css>
</head>
<body>
  <div id=baner>
  <h1>Portal Społecznościowy - moje konto</h1>
  </div>
  <div id=glowny>
  <h2> Moje zainteresowania</h2>
<ul>
<li>muzyka</li>
<li>film</li>
<li>komputery</li>
</ul>
<h2> Moi znajomi</h2>
<?php
$conn=mysqli_connect("127.0.0.1","root","","dane");
$sql="SELECT imie,nazwisko,opis,zdjecie FROM osoby WHERE Hobby_id=1 OR Hobby_id=2 OR Hobby_id=6;";
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_row($result)){
echo<<<FFF
<div id="img">
<img src="$row[3]" alt="przyjaciel">
</div>
<div id="opis">
<h3>$row[0]$row[1]</h3>
<p> ostatni wpis $row[2]</p>
</div>
<div id="linia"><hr></div>
FFF

}




mysqli_close($conn);
?>
  </div> 
  <footer>
  <div id=stopka1>
  Stronę wykonał:000000000
  </div>
  <div id=stopka2>
  <a href="mailto:jan@portal.pl">Napisz do mnie</a>
  </div>
  </footer>
</body>
</html>
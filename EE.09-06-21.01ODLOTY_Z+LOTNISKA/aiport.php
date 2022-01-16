<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Odloty samolotów</title>
	<link rel="stylesheet" href="style6.css"> 
</head>

<body>
	<div class="s1">
		<h2>Odloty z lotniska</h2>
	</div>
	<div class="s2"><img src="logo.png" alt="logotyp"></div>
	<div class="main">
		<table>
			<tr>
				<th>LP.</th>
				<th>NUMER REJSU</th>
				<th>CZAS</th>
				<th>KIERUNEK</th>
				<th>STATUS</th>
			</tr>
			<?php
			$connect=mysqli_connect("localhost", "root", "", "egzamin");
            $zapytanie = 'SELECT id, nr_rejsu, czas, kierunek, status_lotu from odloty ORDER BY czas desc';
            $ex=mysqli_query($connect, $zapytanie);
			
			while ($linia = mysqli_fetch_row($ex)) {
				echo "<tr>";
					echo "<td>".$linia[0]."</td>";
                    echo "<td>".$linia[1]."</td>";
					echo "<td>".$linia[2]."</td>";
                    echo "<td>".$linia[3]."</td>";
                    echo "<td>".$linia[4]."</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
	<div class="pobierz">
		<a href="kw1.jpg">Pobierz obraz</a>
	</div>
	<div id="cookie">
		<p>
        <?php
			if (isset($_COOKIE["ciasteczko"])) 
			
			{
				echo "<b>Miło nam, że nas znowu odwiedziłeś</b>";
			} else {
				setcookie("ciasteczko", 1, time()+3600);
				echo "<p style='font-style: italic;'>Sprawdź regulamin naszej strony!</p>";
			}
 ?>
		</p>
	</div>
	<footer>Autor: DS13245</footer>
</body>

</html>

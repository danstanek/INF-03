<?php
	$conn=mysqli_connect("localhost", "root", "", "wedkowanie");
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$tekst=$_POST['tekst'];
	$zapytanie="INSERT INTO `karty_wedkarskie` (`imie`, `nazwisko`, `adres`, `data_zezwolenia`, `punkty`) VALUES ('$imie', '$nazwisko', '$tekst', NULL, NULL)";
	$wynik=mysqli_query($conn, $zapytanie);
	mysqli_close($ee09);
?>

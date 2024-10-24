<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header>
        <section id="baner_1"><h1>Organizer: SIERPIEŃ”</h1></section>
        <section id="baner_2">
<form action="organizer.php" method="POST">
<label>Zapisz zdarzenie:</label>
    <input type="text" name="wpis">
    <button name="submit">OK</button>
</form>
<?php
//połączenie z bazą
$con=mysqli_connect('localhost','root','','kalendarz');
if (isset($_POST['submit'])){
    $w=$_POST['wpis'];
    $q="UPDATE zadania SET wpis='$w' WHERE dataZadania='2020-08-09';";
    mysqli_query($con,$q);
}

?>


        </section>
        <section id="baner_3">
            <img src="./logo2.png" alt="sierpień">
        </section>
    </header>
    <main></main>
    <footer></footer>
    
</body>
</html>
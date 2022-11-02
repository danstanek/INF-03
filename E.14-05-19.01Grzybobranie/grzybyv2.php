<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grzybobranie</title>
  <link rel="stylesheet" href="styl5.css">
</head>
<body>
  <div id="mini">
    <a href="borowik.jpg"><img src="borowik-miniatura.jpg" alt="Grzybobranie"></a>
  </div>
  <div id="tytul">
    <h1>Idziemy na grzyby!</h1>
  </div>
  <div id="lewy">
    <!-- skrypt 1 -->
    <?php
      $conn = new mysqli("localhost", "root", "", "dane2");
      $qr = "SELECT nazwa_pliku, potoczna FROM grzyby";
      $result = $conn->query($qr);
      while($r = $result->fetch_array())
      {
        echo '<img src="' . $r[0] . '" title="' . $r[1] . '">';
      }
    ?>
  </div>

  <div id="prawy">
    <h2>Grzyby jadalne</h2>
    <!-- skrypt 2 -->
    <?php
      $qr = "SELECT nazwa, potoczna FROM `grzyby` WHERE jadalny=1";
      $result = $conn->query($qr);
      while($r = $result->fetch_array())
      {
        echo "<p>" . $r[0] . "(" . $r[1] . ")</p>";
      }
    ?>
    <h2>Polecamy do sosów</h2>
    <!-- skrypt 3 -->
    <?php
      $qr = "SELECT grzyby.nazwa, grzyby.potoczna, rodzina.nazwa FROM `grzyby` INNER JOIN rodzina ON grzyby.rodzina_id=rodzina.id WHERE grzyby.potrawy_id=1";
      $result = $conn->query($qr);
      echo "<ol>";
      while($r = $result->fetch_array())
      {
        echo "<li>" . $r[0] . "(" . $r[1] . "), rodzina " . $r[2] . "</li>";
      }
      echo "</ol>";
      $conn->close();
    ?>
  </div>
  <div id="stopka">
    <p>Autor: 0132456789</p>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Forum o psach</title>
</head>
<body>
    <header id="baner"><h1>Forum miłośników psów</h1></header>
    <main>
        <section id="lewy">
            <img src="Avatar.jpg" alt="Użytkownik forum">
            <?php 
                $connect = mysqli_connect("localhost", "root", "", "forumpsy");

                $query = mysqli_query($connect, "SELECT nick, postow, pytanie FROM konta JOIN pytania ON konta.id = pytania.konta_id WHERE pytania.id = 1");
                while($rows = mysqli_fetch_array($query, MYSQLI_ASSOC))
                {
                echo "
                    <h4>Użytownik $rows[nick]</h4>
                    <p>$rows[postow] postów na forum</p>
                    <p>$rows[pytanie]</p>
                ";
                }
            ?>
            <video src="video.mp4" controls loop></video>
        </section>
        <section id="prawy">
            <form method="post">
                <textarea name="textarea" cols="40" rows="4"></textarea>
                <br>
                <input type="submit" id="odp" value="Dodaj odpowiedź">
            </form>
            <?php 
                if(!empty($_POST['textarea'])){
                    $textarea = $_POST['textarea'];
                    mysqli_query($connect, "INSERT INTO Odpowiedzi VALUES (NULL, 1, 5, '$textarea')");
                }
            ?>
            <h2>Odpowiedzi na pytanie</h2>
            <ol>
                <?php 
                $query = mysqli_query($connect, "SELECT Odpowiedzi.id, odpowiedz, nick FROM Odpowiedzi JOIN konta ON konta.id = Odpowiedzi.konta_id WHERE Pytania_id = 1");
                while($rows = mysqli_fetch_array($query, MYSQLI_ASSOC))
                {
                echo "
                    <li>
                    $rows[odpowiedz]
                    <em>$rows[nick]</em>
                    </li>
                    <hr>
                ";
                }
                mysqli_close($connect);
                ?>
            </ol>
        </section>
    </main>
    <footer id="stopka">
        Autor: PESEL
        <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>
    </footer>
</body>
</html>

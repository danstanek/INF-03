<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styl4.css">
    <title>Forum o psach</title>
</head>

<body>
    <div class="baner">
        <h1>Forum wielbicieli psów</h1>
    </div>
    <div class="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </div>
    <div class="prawy">
        <h2>Zapisz się</h2>
        <form method="POST">
            login<input type="text" name="login"><br>
            hasło<input type="password" name="haslo"><br>
            powtórz hasło<input type="password" name="powhaslo"><br>
            <input type="submit" value="Zapisz">
        </form>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'psy');

        $qrr = "SELECT login FROM uzytkownicy";

        $res = mysqli_query($conn, $qrr);

        $handler = 0;

        $handler_exist = "Login występuje w bazie danych, konto nie zostało dodane!";
        $handler_pswd = "Hasła nie są takie same, konto nie zostało stworzone!";
        $handler_sucs = "Konto zostało dodane";
        $handler_fill = "Wypełnij wszystkie pola!";

        if (!empty($_POST['login']) && !empty($_POST['haslo']) && !empty($_POST['powhaslo'])) {

            $login = $_POST['login'];
            $passwd = $_POST['haslo'];
            $passwd_r = $_POST['powhaslo'];

            while ($arr = mysqli_fetch_array($res)) {
                if ($_POST['login'] == $arr[0]) {
                    echo "<p>$handler_exist</p>" . $conn->error;
                    $handler = 1;
                    break;
                }
            }

            if ($passwd != $passwd_r) {
                echo "<p>$handler_pswd</p>" . $conn->error;
                $handler = 1;
            }

            if ($handler == 0) {
                $hash = password_hash($passwd, PASSWORD_DEFAULT);
                $result = mysqli_query($conn, "INSERT INTO `uzytkownicy`(`id`, `login`, `haslo`) VALUES ('', '$login', '$hash')");
                echo "<p>$handler_sucs</p>";
            }
        } else {
            echo "<p>$handler_fill</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
    <div class="wrapper">
        <div class="dol">
            <h2>Zapraszamy wszystkich</h2>
            <ol>
                <li>włascicieli psów</li>
                <li>weterynarzy</li>
                <li>tych co chcą kupić</li>
                <li>tych, co lubią psy</li>
            </ol>
            <a href="regulamin.html">Przeczytaj regulamin forum</a>
        </div>
    </div>
    <div class="footer">
        Stronę wykonał: Jan Kupczyk
    </div>
</body>

</html>


<!-- Jan Kupczyk -->
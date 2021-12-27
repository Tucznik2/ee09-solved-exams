<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header class="baner">
        <h3>Portal Społecznościowy - panel administratora</h3>
    </header>
    <aside class="lewy">
        <h4>Użytkownicy</h4>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "dane4");
            if($conn){
                $sql = "SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_assoc($query)){
                    $rok = intval($result['rok_urodzenia']);
                    $wiek = intval(date('Y'))-$rok;
                    echo $result['id'].". ".$result['imie']." ".$result['nazwisko']." ".$wiek."<br>";
                }
            }
            else{
                echo "Problem z połączeniem";
            }
            mysqli_close($conn);
        ?>
        <a href="settings.html">Inne ustawienia</a>
    </aside>
    <main class="prawy">
        <h4>Podaj id użytkownika</h4>
        <form method="post">
            <input type="number" name="user" id="user">
            <input type="submit" value="ZOBACZ">
        </form>
        <?php
            $conn = mysqli_connect("localhost", "root", "", "dane4");
            if(isset($_POST)){
                $user = $_POST['user'];
                $sql2 = "SELECT imie, nazwisko, rok_urodzenia, opis, zdjecie, nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id=hobby.id WHERE osoby.id = $user;";
                $query = mysqli_query($conn, $sql2);
                $result = mysqli_fetch_assoc($query);
                print_r($result);
                echo "<h2>".$user.". ".$result['imie']." ".$result['nazwisko']."</h2>";
                echo "<img src='".$result['zdjecie']."' id='".$user."'>";
                echo "<p>Rok urodzenia: ".$result['rok_urodzenia']."</p>";
                echo "<p>Opis: ".$result['opis']."</p>";
                echo "<p>Hobby: ".$result['nazwa']."</p>";
            }
            mysqli_close($conn);
        ?>
    </main>
    <footer class="stopka">Strone wykonał: 00000000000</footer>
</body>
</html>
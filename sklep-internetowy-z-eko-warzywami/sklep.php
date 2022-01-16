<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <div class="lewy">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </div>
        <div class="prawy">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="http://terapiasokami.pl">soki</a></li>
            </ol>
        </div>
    </header>
    <main>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane2');
            if($conn){
                $sql = "SELECT `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie` FROM `produkty` WHERE `Rodzaje_id` = 1 OR `Rodzaje_id` = 2;";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){
                    echo "<div class='produkt'>";
                    echo "<img src='".$result['zdjecie']."' alt='warzywniak'>";
                    echo "<h5>".$result['nazwa']."</h5>";
                    echo "<p>opis: ".$result['opis']."</p>";
                    echo "<p>na stanie: ".$result['ilosc']."</p>";
                    echo "<h2>".$result['cena']." zł</h2>";
                    echo "</div>";
                }
            }
            mysqli_close($conn);
        ?>
    </main>
    <footer>
        <form method="post">
            <label for="nazwa">Nazwa:</label>
            <input type="text" name="nazwa" id="nazwa">
            <label for="cena">Cena:</label>
            <input type="number" name="cena" id="cena">
            <input type="submit" value="Dodaj produkt">
        </form>
        Stronę wykonał: 00000000000
    </footer>
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'dane2');
        if($conn){
            if(!empty($_POST['nazwa']) && !empty($_POST['cena'])){
                $nazwa = $_POST['nazwa'];
                $cena = $_POST['cena'];
                $sql = "INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL, '1', '4', '".$nazwa."', '10', '', '".$cena."', 'owoce.jpg')";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
            }
        }
    ?>
</body>
</html>
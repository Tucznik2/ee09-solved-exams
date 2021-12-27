<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="styl3.css">
<body>
    <header class="banner">
        <div class="lewy">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div class="prawy">
            <table>
                <tr>
                    <td>Kryminał</td>
                    <td>Horror</td>
                    <td>Przygodowy</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>30</td>
                    <td>20</td>
                </tr>
            </table>
        </div>
    </header>
    <div class="polecamy">
        <h3>Polecamy</h3>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane');
            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id = 18 OR id = 22 OR id = 23 OR id = 25;";
            $query = mysqli_query($conn, $sql);
            while($wynik = mysqli_fetch_assoc($query)){
                echo "<div class='film-blok'>
                    <h4>".$wynik['id'].". ".$wynik['nazwa']."</h4>
                    <img src='".$wynik['zdjecie']."' alt='film'>
                    <p>".$wynik['opis']."</p>
                </div>";
            }
            mysqli_close($conn);
        ?>
    </div>
    <div class="filmy-fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane');
            $sql = "SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;";
            $query = mysqli_query($conn, $sql);
            while($wynik = mysqli_fetch_assoc($query)){
                echo "<div class='film-blok'>
                    <h4>".$wynik['id'].". ".$wynik['nazwa']."</h4>
                    <img src='".$wynik['zdjecie']."' alt='film'>
                    <p>".$wynik['opis']."</p>
                </div>";
            }
            mysqli_close($conn);
        ?>
    </div>
    <footer class="stopka">
        <form method="post">
            <label for="film">Usuń film nr.:</label>
            <input type="number" name="film" id="film">
            <input type="submit" value="Usuń film">
        </form>
        <?php
            if(isset($_POST)){
                if($_POST['film']!=null){
                    @$film = $_POST['film'];
                    $conn = mysqli_connect('localhost', 'root', '', 'dane');
                    $sql = "DELETE FROM produkty WHERE id = $film;";
                    $query = mysqli_query($conn, $sql);
                    mysqli_close($conn);
                }
            }
        ?>
        Strone wykonał:<a href="mailto:ja@poczta.com">00000000000</a>
    </footer>
</body>
</html>
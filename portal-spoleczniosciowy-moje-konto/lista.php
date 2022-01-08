<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="banner">
        <h1>Portal społecznościowy - moje konto</h1>
    </header>
    <main class="glowny">
        <h2>Moje zainteresowania</h2>
        <ul>
            <li>Muzyka</li>
            <li>Film</li>
            <li>Komputery</li>
        </ul>
        <h2>Moi znajomi</h2>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'dane-portal-konto');
            if($conn){
                $sql = "SELECT imie, nazwisko, opis, zdjecie FROM osoby WHERE Hobby_id = 1 OR Hobby_id = 2 OR Hobby_id = 6;";
                $query = mysqli_query($conn, $sql);
                while($result = mysqli_fetch_array($query)){
                    echo 
                    "<div class='zdjecie'><img src='".$result['zdjecie']."' alt='przyjaciel'></div>
                    <div class='opis'>
                        <h3>".$result['imie']." ".$result['nazwisko']."</h3>
                        <p>".$result['opis']."</p>
                    </div>
                    <hr>";
                }
                mysqli_close($conn);
            }
            else{
                echo "Problem z połączeniem!";
            }
        ?>
    </main>
    <footer class="stopka">
        <div class="lewy-stopka">
            Strone wykonał: 00000000000
        </div>
        <div class="prawy-stopka">
            <a href="mailto:ja@portal.pl">Napisz do mnie</a>
        </div>
    </footer>
</body>
</html>
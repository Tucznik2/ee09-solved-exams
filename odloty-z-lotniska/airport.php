<?php
    setcookie('Wizyta', 'Uzytkownik_juz_odwiedzil_ta_witryne', time()+3600);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header class="banner">
        <div class="tekst">
            <h2>Odloty z lotniska</h2>
        </div>
        <div class="logo">
            <img src="zad6.png" alt="logotyp">
        </div>
    </header>
    <main class="main">
        <h4>Tabela odlotów</h4>
        <table>
            <thead>
                <tr>
                    <th>Lp.</th>
                    <th>Numer rejsu</th>
                    <th>czas</th>
                    <th>kierunek</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'egzamin2');
                    $sql1 = "SELECT `id`, `nr_rejsu`, `czas`, `kierunek`, `status_lotu` FROM `odloty` ORDER BY `czas` DESC;";
                    $query = mysqli_query($conn, $sql1);
                    $wynik = mysqli_fetch_array($query);
                    if($query->num_rows>0){
                        while($row = $query->fetch_array()){
                            echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['nr_rejsu']."</td>
                                <td>".$row['czas']."</td>
                                <td>".$row['kierunek']."</td>
                                <td>".$row['status_lotu']."</td>
                            </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
        <div class="stopka1"><a href="kw1.jpg"  target="_blank">Pobierz</a></div>
        <div class="stopka2">
            <?php
                if(isset($_COOKIE['Wizyta'])){
                    echo "<p>Miło nam, że nas znowu odziedziłeś</p>";
                }
                else{
                    echo "<p>Dzień dobry! Sprawdź regulamin naszej strony</p>";
                }
            ?>
        </div>
        <div class="stopka3"><p>Autor: 00000000000</p></div>
    </footer>
</body>
</html>
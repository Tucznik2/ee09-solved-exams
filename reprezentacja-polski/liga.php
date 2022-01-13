<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>piłka nożna</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header class="banner">
        <h3>Reprezentacja polski w piłce nożnej</h3>
        <img src="obraz1.jpg" alt="reprezentacja">
    </header>
    <section class="lewy">
        <form method="post" action="liga.php">
            <select name="pozycja">
                <option value="1">Bramkarze</option>
                <option value="2">Obrońcy</option>
                <option value="3">Pomocnicy</option>
                <option value="4">Napastnicy</option>
            </select>
            <input type="submit" name="submit" value="Zobacz">
        </form>
        <img src="zad2.png" alt="piłka">
        <p>Autor: 0000000000</p>
    </section>
    <section class="prawy">
        <ol>
            <?php
                if(isset($_POST['pozycja'])){
                    $idPozycja = $_POST['pozycja'];
                    $conn = mysqli_connect("localhost", "root", "", "egzamin");
                    $sql1 = "SELECT `imie`, `nazwisko` FROM `zawodnik` WHERE  pozycja_id='2';";
                    $query = mysqli_query($conn, $sql1);
                    if($query->num_rows > 0){
                        while($wynik = $query->fetch_assoc()){
                            echo "<li>".$wynik['imie']." ".$wynik['nazwisko']."</li>";
                        }
                    }
                    mysqli_close($conn);
                }
                
            ?>
        </ol>
    </section>
    <main class="main">
        <h3>Liga mistrzów</h3>
    </main>
    <div class="liga">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "egzamin");
            $sql2 = "SELECT `zespol`, `punkty`, `grupa` FROM `liga`;";
            $query = mysqli_query($conn, $sql2);
            if($query->num_rows > 0){
                while($wynik = $query->fetch_assoc()){
                    echo "<div class='info'><h2>".$wynik['zespol']."</h2><h1>".$wynik['punkty']."</h1><p>Grupa: ".$wynik['grupa']."</p></div>";
                }
            }
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>
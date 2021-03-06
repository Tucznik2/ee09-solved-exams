<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokoje</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header class="baner1">
        <h2>WYNAJEM POKOI</h2>
    </header>
    <nav>
        <section class="menu1">
            <a href="index.html">POKOJE</a>
        </section>
        <section class="menu2">
            <a href="cennik.php">CENNIK</a>
        </section>
        <section class="menu3">
            <a href="kalkulator.html">KALKULATOR</a>
        </section>
    </nav>
    <section class="baner2"></section>
    <main>
        <section class="lewy"></section>
        <section class="srodek">
            <h1>Cennik</h1>
            <table>
                <tbody>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '','wynajem');
                        $sql = "SELECT * FROM `pokoje`;";
                        $query = mysqli_query($conn, $sql);
                        while($wynik = mysqli_fetch_array($query)){
                            echo "<tr>
                                    <td>".$wynik['id']."</td>
                                    <td>".$wynik['nazwa']."</td>
                                    <td>".$wynik['cena']."</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </section>
        <section class="prawy"></section>
    </main>
    <footer class="stopka">
        <p>Stronę opracował: 00000000000</p>
    </footer>
</body>
</html>
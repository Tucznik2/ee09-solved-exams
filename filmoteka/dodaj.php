<?php
    if($_POST){
        $conn = mysqli_connect('localhost', 'root', '', 'filmoteka');
        $gatunek = $_POST['gatunek'];
        $tytul = $_POST['tytul'];
        $rok = $_POST['rok'];
        $ocena = $_POST['ocena'];
        if($conn){
            $sql = "INSERT INTO filmy (gatunki_id, tytul, rok, ocena) VALUES ('$gatunek', '$tytul', '$rok', '$ocena');";
            if(mysqli_query($conn, $sql)){
                echo "Film ".$tytul." został dodany do bazy.";
            }
            else{
                echo mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
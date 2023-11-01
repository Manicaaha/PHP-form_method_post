<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odżywianie zwierząt</title>
    <link href="styl4.css" rel="stylesheet">
</head>
<body>
    <div class="baner"><h2>DRAPIEŻNIKI I INNE</h2></div>
    <div class="formularz">
        <h3>Wybierz styl życia</h3>
        <form action="index.php" method="post">
            <select name="rodz">
                <option value="1">Drapieżnik</option>
                <option value="2">Roślinożerne</option>
                <option value="3">Padlinożerne</option>
                <option value="4">Wszystkożerne</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
    </div>
    <div class="lewy">
        <h3>Lista zwierząt</h3>
        <?php
        $lacz = mysqli_connect('localhost','root','','baza');
        $pyt = "SELECT zwierzeta.gatunek, odzywianie.`rodzaj` FROM `zwierzeta` join odzywianie on zwierzeta.id=odzywianie.id;";
        $wyn = mysqli_query($lacz, $pyt);
        echo "<ol>";
        while($row= mysqli_fetch_array($wyn)){
            echo "<li>".$row[0].", ".$row[1]."</li>";
        }
        echo "</ol>";
        mysqli_close($lacz);
        ?>
    </div>
    <div class="srodkowy">
        <?php
        $lacz = mysqli_connect('localhost','root','','baza');
        if(!empty ($_POST['rodz'])){
            $wartosc = $_POST['rodz'];

            $pytanie = "SELECT `id`,`gatunek`,`wystepowanie` FROM `zwierzeta` WHERE `Odzywianie_id`= $wartosc";
            $wynik = mysqli_query($lacz,$pytanie);
            if($wartosc == 1){
                echo "<h3>Drapieżnik</h3>";
            }
            if($wartosc == 2){
                echo "<h3>Roślinożerne</h3>";
            }
            if($wartosc == 3){
                echo "<h3>Padlinożerne</h3>";
            }
            if($wartosc == 4){
                echo "<h3>Wszystkożerne</h3>";
            }
            while($wiersz = mysqli_fetch_array($wynik)){
                echo $wiersz[0].". ".$wiersz[1].", ".$wiersz[2]."<br>";

            }
        }
        mysqli_close($lacz)
        ?>
    </div>
    <div class="prawy">
        <img src="drapieznik.jpg" alt="wilki">
    </div>
    <div class="stopka">
        <a href="pl.wikipedia.org">Poczytaj o zwierzętach na wikipedii</a>
        Autor strony: Martyna Borowska
    </div>
</body>
</html>
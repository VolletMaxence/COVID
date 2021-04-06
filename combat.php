<?php
    require ("Objet/arme.php");
    require ("Objet/personnage.php");
    require ("Objet/mage.php");
    require ("Objet/Guerrier.php");
    require ("Objet/User.php");
?>

<?php
    try{
        $bdd = new PDO('mysql:host=mysql-xencev.alwaysdata.net;dbname=xencev_virus', 'xencev_root', '2001root2001');
        
    } catch(\Throwable $th) {
        $bdd = null;
    }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php objet</title>
</head>

<body>

<?php
    if(!is_null($bdd)){
        ?>

        <h1>COMBAT MORTEL WISH</h1>

        <?php

        $Mage = new Mage($bdd);
        $Guerrier = new Guerrier($bdd);

        $Guerrier->setGuerrier(1);
        $Mage->setMage(1);

        echo "<h2> Présentation des persos : </h2>";
        echo "<p>";
        echo "Je suis le ".$Mage->classe()." nommé ".$Mage->getNom().", j'ai ".$Mage->getAP()." point de dégats magique et j'ai ".$Mage->getVie()." PV";
        echo "</p>";


        echo "<p>";
        echo "Je suis le ".$Guerrier->classe()." nommé ".$Guerrier->getNom().", j'ai ".$Guerrier->getBrut()." point de dégats Brut et j'ai ".$Guerrier->getVie()." PV";
        echo "</p>";


        echo "<h2> Les persos s'attaquent entre eux : </h2>";
        echo "<p>";
        $Mage->attaqueMagique($Guerrier);
        echo "</p> <p>";
        $Guerrier->attaqueBrut($Mage);
        echo "</p>";

        echo "<h2> Présentation des persos après s'être attaquer : </h2>";
        echo "<p>";
        echo "Je suis le ".$Mage->classe()." nommé ".$Mage->getNom()." et j'ai ".$Mage->getVie()." PV";
        echo "</p> <p>";
        echo "Je suis le ".$Guerrier->classe()." nommé ".$Guerrier->getNom()." et j'ai ".$Guerrier->getVie()." PV";
        echo "</p>";



    } else{
        echo 'Base non connectée';
    }
?>

</body>

</html>
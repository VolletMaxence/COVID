<?php
require ("Objet/personnage.php");
require ("Objet/mage.php");
require ("Objet/User.php");
require ("Objet/Guerrier.php");

try{
    $BDD = new PDO('mysql:host=mysql-xencev.alwaysdata.net;dbname=xencev_virus', 'xencev_root', '2001root2001');
    
} catch(\Throwable $th) {
    $BDD = null;
}  

$Mage = new Mage($BDD);

$Guerrier = new Guerrier($BDD);

$Guerrier->setGuerrier(1);

$Mage->setMage(1);

$Mage->attaqueMagique($Guerrier);

echo "<p>";
echo "Je suis le ".$Mage->classe()." nommé ".$Mage->getNom($Mage);
echo "</p>";


echo "<p>";
echo "Je suis le ".$Guerrier->classe()." nommé ".$Guerrier->getNom($Mage);
echo "</p>";



?>
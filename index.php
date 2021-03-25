<?php
    session_start();
    include "fonction.php";
?>

<html>
    <head>
    </head>
    <body>

        <?php
        if($access)
        {

            echo "<h1> Bienvenue ".$User->getPrenom()." ".$User->getNom()."</h1>";
            ?>

            <img src="Titan_Charette.png">
            <?php

            $Perso = new Personnage($BDD);
            $Perso->getPerso();
            if(!$Perso->getID()==0)
            {
                $User->setPerso($Perso);
            }

            echo '<a href="combat.php"> Tu combattras avec '.$Perso->getNom().'</a>';

        } else 
        {
            echo "access n'est pas correcte";
            echo $errorMessage;

        }
        

        
        ?>
    </body>
</html>
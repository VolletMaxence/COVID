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

            echo "<h1> Bienvenue ".$User->getPrenom()."".$User->getNom()."</h1>";
            ?>

            <img src="Titan_Charette.png">
            <?php

            $User = new Personnage($BDD);
            $User->getPerso();
            if(!$Perso->getID()==0)
            {
                echo "test";
                $Perso->setPerso($Perso);
            }

            echo '<a href="combat.php"> Combat avec '.$Perso->getNom().'</a>';

        } else 
        {
            echo "access n'est pas correcte";
            echo $errorMessage;

        }
        

        
        ?>
    </body>
</html>
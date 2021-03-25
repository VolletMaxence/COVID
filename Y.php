<?php
        //Instancie 2 perso
            $Perso1 = new Personnage(1,$bdd);
            $Perso2 = new Personnage(2,$bdd);
            $Perso3 = new Personnage(3,$bdd);

            $Arme1 = new Arme(5, $bdd);
        ?>
        
        <!-- Affiche 2 persos-->
        <p>Combattant 1 : <?php echo $Perso1->getNom() ?>
        <p>Ses armes sont : <?php echo $Perso1->getStrListArme() ?>

        <p>Combattant 2 : <?php echo $Perso2->getNom() ?>
        <p>Ses armes sont : <?php echo $Perso2->getStrListArme() ?>

        <p>Combattant 3 : <?php echo $Perso3->getNom() ?>
        <p>Ses armes sont : <?php echo $Perso3->getStrListArme() ?>


        <?php
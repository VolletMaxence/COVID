<html>
    <head>
    </head>
    <body>

        <?php
            session_start();

            try
            {
                $BDD = new PDO("mysql:host=mysql-xencev.alwaysdata.net; dbname=xencev_virus; charset=utf8", "xencev_root", "2001root2001");
            } catch(\Throwable $th) {
                $BDD = null;
            } 
        
        if($_SESSION && $_SESSION['Connect'] == 1)
        {
            //echo "Tu es connecté";
            ?>

            <img src="Titan_Charette.png">
            
            <form method=POST>
                <input type=submit name=deco value=Déconnection>
            </form>
            <?php
            if(ISSET($_POST['deco']))
            {
                //echo "tu essaye d ete deco";
                session_destroy();

                header("Refresh:0");
            }

        } else 
        {
        ?>
            <form method=POST>
                <label> Nom : </label>
                <input type=text name=Nom required>
                <label> Prénom : </label>
                <input type=text name=Prenom required>
                <label> Mot de Passe : </label>
                <input type=text name=password required>

                <input type = submit name=submit  value=Connecte-Toi>
            </form>
        <?php
            if(ISSET($_POST['submit']))
                {
                    $req = $BDD->prepare('SELECT * FROM `User` WHERE `Nom`= ? AND `Prenom`= ? AND `Mot_de_Passe`= ?');
                    $req->execute(array($_POST['Nom'],$_POST['Prenom'], $_POST['password']));
                    $resultat = $req->fetch();

                    if(!$resultat)
                    {
                        echo "mauvais mot de passe ou non d'utilisateur";
                    } else 
                    {
                        // echo "ca marche";

                        $_SESSION['Connect'] = 1;
                        header("Refresh:0");
                    }
                }
        }
        ?>




        <?php

        ?>
    </body>
</html
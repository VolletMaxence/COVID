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
            ?>
            <img src="Titan_Charette.png">
            <?php
        } else 
        {
            echo "access n'est pas correcte";
            echo $errorMessage;
        }
        

        
        ?>
    </body>
</html>
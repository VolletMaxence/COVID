<?php
    require ("Objet/arme.php");
    require ("Objet/personnage.php");
    require ("Objet/User")
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
    } else{
        echo 'Base non connectée';
    }
?>

</body>

</html>
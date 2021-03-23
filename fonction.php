<?php
$BDD=null;

    try
        {
            $BDD = new PDO("mysql:host=mysql-xencev.alwaysdata.net; dbname=xencev_virus; charset=utf8", "xencev_root", "2001root2001");
        } catch(Exeption $e) {
            echo $e->getMessage();
        } 
?>
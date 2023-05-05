<?php
    $servname = 'localhost';
    $dbname = 'projetGestionEtablissement';
    $user = 'root';
    $pass = '78122781Mad.';
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
?>
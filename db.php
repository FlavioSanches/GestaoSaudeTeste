<?php

$db_name = "gestao_saude4";
$db_host = "localhost";
$db_user = "root";
$db_pass = "BANCO475547as";

$conn = new PDO("mysql:dbname=".$db_name .";host=". $db_host, $db_user,$db_pass);

//Habiliatr erros PDO
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
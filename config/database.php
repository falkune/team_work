<?php
define("HOST", 'localhost');
define("PORT", 3306);
define("DBNAME", 'team_work');
define("LOGIN", 'admin'); // metez root pour vous
define("PASSWORD", 'admin'); // metez root ou rien pour vous
define("CHARSET", 'utf8');

function dbConnect(){
    try{
        $connexion = new PDO("mysql:host=".HOST.";port=".PORT.";dbname=".DBNAME.";charset=".CHARSET, LOGIN, PASSWORD);

        return $connexion;

    }catch(PDOException $e){
        
        echo $e->getMessage();
    }
}




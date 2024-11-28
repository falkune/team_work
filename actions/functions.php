<?php
$path = $_SERVER["DOCUMENT_ROOT"].'/team_work/config/database.php';
require_once $path;
// fonction qui retourne la liste des utilisateurs
function getUsers(){
    // etablir la connexion avec la bd
    $connexion = dbConnect();
    // preparer la requete pour avoir la liste des users
    $request = $connexion->prepare("SELECT * FROM users");
    try{
        $request->execute();
        // recuperer le resultat dans un tableau
        $users = $request->fetchAll();
        return $users;
    }catch(PDOException $e){
        $e->getMessage();
    }
}

// fonction qui retourn la liste des equipes
function getTeams(){
    // etablir la connexion avec la bd
    $connexion = dbConnect();
    // preparer la requete pour avoir la liste des users
    $request = $connexion->prepare("SELECT * FROM teams");
    try{
        $request->execute();
        // recuperer le resultat dans un tableau
        $teams = $request->fetchAll();
        return $teams;
    }catch(PDOException $e){
        $e->getMessage();
    }
}
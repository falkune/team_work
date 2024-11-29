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

// fonction pour recuperer les tache liees a un utilisateur
function getUserTask($userId){
    // etablir la connexion avec la base de donnees
    $connexion = dbConnect();
    // preparer la requete pour recuperer toutes les taches d'un utilisateur
    $request = $connexion->prepare(
        "SELECT tasks.id_task, tasks.taskname, tasks.start_date, tasks.end_date FROM tasks
        JOIN users ON users.id_user = tasks.user_id
        WHERE users.id_user = :id_user");
    // executer la requete
    try{
        $request->bindParam(':id_user', $userId);
        $request->execute();
        // recuperer le resultat dans un tableau
        $tasks = $request->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
    return $tasks;
}

// fonction pour recuperer l'id de la team d'un utilisateur
function getUserTeamId($userId){
    // etablir la connexion avec la base de donnees
    $connexion = dbConnect();
    // preaparer la requete
    $request = $connexion->prepare(
        "SELECT users_teams.team_id FROM users_teams 
        JOIN users ON users_teams.user_id = users.id_user
        WHERE users.id_user = :id_user AND users_teams.end_date >= NOW()");
        $request->bindParam(':id_user', $userId);
        try{
            $request->execute();
            $teamId = $request->fetch();
        }catch(PDOException $e){
            $e->getMessage();
        }
        return $teamId['team_id'];
}

// function pour recuperer les taches de l'equipe d'utilisateur
function getUserTeamTasks($userId){
    $idTeam = getUserTeamId($userId);
    // etablir la connexion avec la base de donnees
    $connexion = dbConnect();
    // preaparer la requete
    $request = $connexion->prepare(
        "SELECT tasks.id_task, tasks.taskname, tasks.start_date, tasks.end_date FROM tasks
        JOIN teams ON teams.id_team = tasks.team_id
        WHERE teams.id_team = :id_team");
    $request->bindParam(':id_team', $idTeam);
    try{
        $request->execute();
        $tasks = $request->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
    return $tasks;
}


// fonction pour recuperer les utilisateur d'une equipe
function getUserTeam($teamId){
    // etablir la connexion avec la base de donnees
    $connexion = dbConnect();
    // preaparer la requete
    $request = $connexion("SELECT users.id_user, users.lastname FROM users 
    JOIN users_teams ON users_teams.user_id = users.id_user
    WHERE users_teams.team_id = :team_id");
    $request->bindParam('team_id', $teamId);
    try{
        $request->execute();
        $users = $request->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
    return "bonjour";
}
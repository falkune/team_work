<?php
require_once "../config/database.php";
define("BASE_URL", "http://localhost/team_work/?url=");

if(isset($_POST['create_team'])){
    if(
        isset($_POST['team_name']) && !empty($_POST['team_name']) &&
        isset($_POST['description']) && !empty($_POST['description'])
    ){
        $date = date("Y-m-d");
        // etablir la connexion avec la bd
        $connexion = dbConnect();
        // preparer la requete pour sauvegarder une equipe
        $request = $connexion->prepare("INSERT INTO teams (team_name, description, create_date) VALUES(:name, :description, :date)");
        $request->bindParam(':name', $_POST['team_name']);
        $request->bindParam(':description', $_POST['description']);
        $request->bindParam(':date', $date);
        // executer la requete
        try{
            $request->execute();
            header("Location: http://localhost/team_work/?url=dashboard");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}else if(isset($_POST['valider'])){ // pour constituer une equipe
    if(
        isset($_POST['team']) && !empty($_POST['team']) && 
        isset($_POST['user']) && !empty($_POST['user']) && 
        isset($_POST['users']) && !empty($_POST['users']) &&
        isset($_POST['start_date']) && !empty($_POST['start_date']) &&
        isset($_POST['end_date']) && !empty($_POST['end_date'])
    ){
        // convertir la liste des users selectiones en tableau
        $users = explode(',', $_POST['user']);
        // etablir la connexion avec la bd
        $connexion = dbConnect();
        // preparer la requete
        $request = $connexion->prepare("INSERT INTO users_teams (team_id, user_id, start_date, end_date) VALUES(:team, :user, :start_date, :end_date)");
        foreach($users as $user){
            //  binder les parametres
            $request->bindParam(':team', $_POST['team']);
            $request->bindParam(':user', $user);
            $request->bindParam(':start_date', $_POST['start_date']);
            $request->bindParam(':end_date', $_POST['end_date']);
            // executer la requete
            try{
                $request->execute();
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
        header("Location: http://localhost/team_work/?url=constitution_equipe");
    }
}else{
    header("Location: http://localhost/team_work/?url=creer_equipe");
}
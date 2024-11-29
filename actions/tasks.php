<?php
// inclure le fichier database.php
require_once "../config/database.php";
define("BASE_URL", "http://localhost/team_work/?url=");

if(isset($_POST['add_task'])){ // ajout de tache
    if(
        isset($_POST['task_name']) && !empty($_POST['task_name']) &&
        isset($_POST['user']) && !empty($_POST['user']) &&
        isset($_POST['team']) && !empty($_POST['team']) &&
        isset($_POST['description']) && !empty($_POST['description']) &&
        isset($_POST['start_date']) && !empty($_POST['start_date']) &&
        isset($_POST['end_date']) && !empty($_POST['end_date'])
    ){
        $create_date = date("Y-m-d");
        // etablir la connexion avec la bd
        $connexion = dbConnect();
        // preparer la requete pour ajouter une tache 
        $request = $connexion->prepare("INSERT INTO tasks (taskname, start_date, end_date, user_id, team_id, description, create_date) VALUES (:name, :start_date, :end_date, :user_id, :team_id, :description, :create_date)");
        // lier les parametres
        $request->bindParam(':name', $_POST['task_name']);
        $request->bindParam(':start_date', $_POST['start_date']);
        $request->bindParam(':end_date', $_POST['end_date']);
        $request->bindParam(':user_id', $_POST['user']);
        $request->bindParam(':team_id', $_POST['team']);
        $request->bindParam(':description', $_POST['description']);
        $request->bindParam(':create_date', $create_date);
        // executer la requete
        try{
            $request->execute();
            header("Location: ".BASE_URL."attribution_tache");
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
}else if(isset($_GET['id'])){ // terminer une tache
    // etablir la connexion avec la base
    $end_date = date("Y-m-d");
    $connexion = dbConnect();
    // preparer la requete pour terminer la tache
    $request = $connexion->prepare("UPDATE tasks SET end_date = :end_date");
    $request->bindParam(':end_date', $end_date);
    try{
        $request->execute();
        header("Location: ".BASE_URL."tache_user");
    }catch(PDOException $e){
        echo $e->getMessage();
    }

}
<?php
require_once "../config/database.php";

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

}else{
    header("Location: ?url=creer_equipe");
}
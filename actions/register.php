<?php
require_once "../config/database.php";
if(isset($_POST['inscription'])){ // verifier si le user a cliquer sur le bouton
    if(
        isset($_POST['lastname']) && !empty($_POST['lastname']) &&
        isset($_POST['firstname']) && !empty($_POST['firstname']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ){
        $role = "user";
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $date = date("Y-m-d");
        // etablir la connection avec la base de donnees
        $connexion = dbConnect();
        // preparer la requete
        $request = $connexion->prepare("INSERT INTO users (lastname, firstname, email, password, role, create_date) VALUES (:lastname, :firstname, :email, :password, :role, :date)");

        $request->bindParam(':lastname', $_POST['lastname']);
        $request->bindParam(':firstname', $_POST['firstname']);
        $request->bindParam(':email', $_POST['email']);
        $request->bindParam(':password', $password);
        $request->bindParam(':role', $role);
        $request->bindParam(':date', $date);
        // executer la requete
        try{
            $request->execute();
            // rediriger vers connexion
            header("Location: http://localhost/team_work/?url=connexion");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
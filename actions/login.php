<?php
session_start();
require_once "../config/database.php";

// verifier si il a cliquer su le bouton connexion
if(isset($_POST['connexion'])){
    if(
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['password']) && !empty($_POST['password'])
    ){
        // etablir la connexion avec la bd
        $connexion = dbConnect();
        // preparer la requette pour verifier si l'email existe dans la table users
        $request = $connexion->prepare("SELECT * FROM users WHERE email = :email");
        $request->bindParam(':email', $_POST['email']);
        // executer la requete
        try{
            $request->execute();
            $user = $request->fetch();
            if(empty($user)){
                $_SESSION['login_error'] = "login ou mot de passe incorrect";
                header("Location: http://localhost/team_work/?url=connexion");
            }else{
                // verifier le mot de passe
                if(password_verify($_POST['password'], $user['password'])){
                    // on connecte l'utilisateur en creant des variables de session
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
                    // rediriger vers le dashboard
                    unset($_SESSION['login_error']);
                    header("Location: http://localhost/team_work/?url=dashboard");
                }else{
                    $_SESSION['login_error'] = "login ou mot de passe incorrect";
                    header("Location: http://localhost/team_work/?url=connexion");
                }
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    else{   
        echo "il faut remplir tous les champs";
    }
}else{
    echo "il faut cliquer sur le bouton";
}
<?php
$url = isset($_GET['url']) ? $_GET['url'] : '404';
// define("STYLE", $_SERVER['DOCUMENT_ROOT'].'/team_work/assets/css/style.css');
// if(isset($_GET['url'])){
//     $url = $_GET['url'];
// }else{
//     $url = "404";
// }

switch($url){
    case "inscription": // affiche la page inscription
        require_once 'views/inscription.php';
        break;
    case "connexion":
        require_once "views/connexion.php";
        break;
    case "dashboard":
        require_once "views/dashboard.php";
        break;
    case "creer_equipe":
        require_once "views/creer_equipe.php";
        break;
    case "constitution_equipe":
        require_once "views/constitution_equipe.php";
        break;
    default:
        require_once "views/404.php";
}


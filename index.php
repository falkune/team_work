<?php
$url = isset($_GET['url']) ? $_GET['url'] : '404';
// define("STYLE", $_SERVER['DOCUMENT_ROOT'].'/team_work/assets/css/style.css');
// if(isset($_GET['url'])){
//     $url = $_GET['url'];
// }else{
//     $url = "404";
// }

define("BASE_URL", "http://localhost/team_work/?url=");

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
    case "attribution_tache":
        require_once "views/attribution_tache.php";
        break;
    case "tache_user":
        require_once "views/tache_user.php";
        break;
    case "tache_team":
        require_once "views/tache_team.php";
        break;
    case "userTeam":
        require_once "actions/functions.php";
        echo json_encode([
            "message"   =>  "voici le liste des users",
            "data"      =>  getUserTeam($_GET['id'])
        ]);
        break;
    default:
        require_once "views/404.php";
}

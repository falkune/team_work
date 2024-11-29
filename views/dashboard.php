<?php 
require_once "templates/header.php";

if(!isset($_SESSION['id'])){
    header("Location: http://localhost/team_work/?url=connexion");
}
?>

    <div class="container">
        <?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
            <!-- affichage du dashboard pour l'admin -->
            <div class="d-flex">
                <a href="?url=creer_equipe" class="btn btn-warning bouton d-flex">
                    Creer une équipe
                </a>


                <a href="?url=liste_utilisateur" class="btn btn-success bouton d-flex">
                    Liste des utilisateurs
                </a>

                <a href="?url=liste_utilisateur" class="btn btn-primary bouton d-flex">
                    Liste des équipes
                </a>

                <a href="?url=constitution_equipe" class="btn btn-info bouton d-flex">
                    Constituer une équipe
                </a>

                <a href="?url=attribution_tache" class="btn btn-danger bouton d-flex">
                    Attribution de Tâches
                </a>

                <a href="?url=tache_user" class="btn btn-warning bouton d-flex">
                    Mes tâches
                </a>

                <a href="?url=tache_team" class="btn btn-success bouton d-flex">
                    Tâches de mon équipe
                </a>
            </div>

        <?php else : ?>
            <!-- affichage du dashboard de l'utilisateur simple -->
            <div class="d-flex">
                <a href="?url=tache_user" class="btn btn-warning bouton d-flex">
                    Mes tâches
                </a>

                <a href="?url=tache_team" class="btn btn-success bouton d-flex">
                    Tâches de mon équipe
                </a>
            </div>

        <?php endif ?>
    </div>

<?php require_once "templates/footer.php"; ?>
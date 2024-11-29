<?php 
require_once "templates/header.php";

if(!isset($_SESSION['id'])){
    header("Location: http://localhost/team_work/?url=connexion");
}
require_once "actions/functions.php";
$users = getUsers();
$teams = getTeams();

?>

<div class="container">
    <div class="form">
        <form action="actions/tasks.php" method="post">
            <div class="m-3">
                <label for="">Nom de la tâche</label>
                <input type="text" name="task_name" class="form-control">
            </div>

            <div class="m-3">
                <label for="">Description</label>
                <textarea name="description" row="2" class="form-control"></textarea>
            </div>

            <div class="m-3">
                <label for="">date debut</label>
                <input type="date" name="start_date" class="form-control">
            </div>

            <div class="m-3">
                <label for="">date fin</label>
                <input type="date" name="end_date" class="form-control">
            </div>

            <div class="m-3 d-flex justify-content-between">
                <select class="form-select" name="team" id="team">
                    <option>Selectionnez une equipe</option>
                    <?php foreach ($teams as $team) : ?>
                        <option value="<?= $team['id_team']; ?>">
                            <?= $team['team_name']; ?>
                        </option>
                    <?php endforeach ?>
                </select>
           
                <select name="user" class="form-select" id="users">
                    <option value="">Selectionez l'utilisateur</option>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id_user']; ?>">
                            <?= $user['firstname']; ?> <?= $user['lastname']; ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="m-3">
                <button class="btn btn-primary" name="add_task">valider</button>
            </div>
        </form>
    </div>
</div>

<?php require_once "templates/footer.php"; ?>
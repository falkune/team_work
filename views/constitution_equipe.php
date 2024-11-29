<?php 
require_once "templates/header.php"; 
require_once "actions/functions.php";
$users = getUsers();
$teams = getTeams();
?>

    <div class="container">
        <div class="form">
            <form action="actions/teams.php" method="post">
                <div class="d-flex justify-content-between">
                    <select class="form-select" name="team">
                        <option>Selectionnez une equipe</option>
                        <?php foreach ($teams as $team) : ?>
                            <option value="<?= $team['id_team']; ?>">
                                <?= $team['team_name']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                    <select class="form-select" id="user" name="user">
                        <option value=""> Ajouter un utilisateur</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id_user']; ?>">
                                <?= $user['firstname']; ?> <?= $user['lastname']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mt-3 mb-3">
                    <input type="text" id="users" name="users" class="form-control">
                </div>
                
                <div class="mt-3 mb-3">
                    <label for="">Date de début</label>
                    <input type="date" name="start_date" class="form-control">
                </div>

                <div class="mt-3 mb-3">
                    <label for="">Date de fin</label>
                    <input type="date" name="end_date" class="form-control">
                </div>

                <button name="valider" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>


<?php require_once "templates/footer.php"; ?>
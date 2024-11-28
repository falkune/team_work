<?php 
require_once "templates/header.php"; 
require_once "actions/functions.php";
$users = getUsers();
$teams = getTeams();
?>

    <div class="container">
        <div class="form">
            <form action="">
                <div class="d-flex justify-content-between">
                    <select class="form-select">
                        <option>Selectionnez une equipe</option>
                        <?php foreach ($teams as $team) : ?>
                            <option value="<?= $team['id_team']; ?>">
                                <?= $team['team_name']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>

                    <select class="form-select" id="user">
                        <option> Ajouter un utilisateur</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user['id_user']; ?>">
                                <?= $user['firstname']; ?> <?= $user['lastname']; ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>


                <div class="mb-3">
                    <input type="text" id="users" name="users">
                </div>

                <button name="valider" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>


<?php require_once "templates/footer.php"; ?>
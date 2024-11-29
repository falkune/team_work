<?php 
require_once "templates/header.php";

if(!isset($_SESSION['id'])){
    header("Location: http://localhost/team_work/?url=connexion");
}
require_once "actions/functions.php";
$tasks = getUserTeamTasks($_SESSION['id']);
?>

<div class="container">
    <div class="workspace">
        <h2>Vos Tâches</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom de la tache</th>
                    <th>Date Debut</th>
                    <th>Date Fin</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($tasks as $task) : ?>
                    <tr>
                        <td><?= $task['taskname']; ?></td>
                        <td><?= $task['start_date']; ?></td>
                        <td><?= $task['end_date']; ?></td>
                        <td>
                            <a href="actions/tasks.php/?id=<?= $task['id_task']; ?>" class="btn btn-warning">
                                Terminer la tâche
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once "templates/footer.php"; ?>
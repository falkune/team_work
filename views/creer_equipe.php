<?php require_once "templates/header.php"; ?>

    <div class="container">
        <div class="form">
            <form action="actions/teams.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nom Equipe</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="team_name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea name="description" id="exampleInputPassword1" class="form-control" row="2"></textarea>
                </div>
                
                <button type="submit" name="create_team" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </div>

<?php require_once "templates/footer.php"; ?>
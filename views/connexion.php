<?php require_once "templates/header.php"; ?>


<div class="container">
    <div class="form">
        <form action="actions/login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <!-- affichage du message d'erreur au cas ou le login ou le mot de passe n'est pas correct -->
            <div>
                <p class="text-danger">
                    <?php if(isset($_SESSION['login_error'])) : ?>
                        <?= $_SESSION['login_error']; ?>
                    <?php endif ; ?>
                </p>
            </div>
            
            <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        </form>
    </div>
</div>


<?php require_once "templates/footer.php"; ?>
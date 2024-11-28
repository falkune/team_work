<?php require_once "templates/header.php"; ?>


<div class="container">
    <div class="form">
        <form action="actions/register.php" method="post">
            <div class="mb-3">
                <label for="examplelastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="examplelastname" name="lastname">
            </div>
            <div class="mb-3">
                <label for="examplefirstname" class="form-label">firstname</label>
                <input type="text" class="form-control" id="examplefirstname" name="firstname">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            
            <button type="submit" name="inscription" class="btn btn-primary">Inscription</button>
        </form>
    </div>
</div>


<?php require_once "templates/footer.php"; ?>
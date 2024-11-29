<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- lien bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- lien du fichier style local -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- lier le javascript -->
    <script src="assets/js/index.js" defer></script>
    <title>Document</title>
</head>
<body>
    
<!-- menu de navigation -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>dashboard">Dashboard</a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>connexion">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>inscription">Inscription</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
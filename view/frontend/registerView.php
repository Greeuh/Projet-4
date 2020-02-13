<?php $title = 'Inscription' ?>

<?php ob_start(); ?>

<body class="greybg">

    <a href="index.php">
        <div class="text-center pt-5">
            <img src="http://antoineparriaud.fr/images/reindeer.png" alt="Logo renne" class="my-3">
            <h1 class="h2 font-weight-normal text-muted">Billet simple pour l'Alaska</h1>
        </div>
    </a>

    <div class="w-75 mx-auto h-auto p-5 mt-5 bg_shadow">
        <form action="index.php?action=createUser" method="post" class="form-signin w-75 m-auto">
            <div class="form-label-group mb-4">
                <label for="pseudo">Pseudonyme :</label>
                <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Pseudonyme" required autofocus>
            </div>

            <div class="form-label-group mb-4">
                <label for="password">Mot de passe :</label>
                <input type="password" minlength="6" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>

            <div class="form-label-group mb-4">
                <label for="verifpassword">Répéter le mot de passe :</label>
                <input type="password" minlength="6" id="verifpassword" name="verifpassword" class="form-control" placeholder="Répéter le mot de passe" required>
            </div>

            <div class="form-label-group mb-4">
                <label for="email">E-mail :</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required>
            </div>

            <button class="btn btn-lg btn-secondary btn-block" type="submit">S'inscrire</button>
        </form>
    </div>
    <p class="mt-5 mb-3 text-center font-weight-light"><a href="index.php?action=login" class="text-muted">Vous avez déjà un compte ?</a></p>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
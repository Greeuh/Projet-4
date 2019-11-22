<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
</head>

<body>
    <?php if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) {
        echo 'Bonjour ' . $_SESSION['pseudo'];
        echo '<br><a href="index.php?action=disconnect">Se déconnecter</a>';
    } else { ?>
        <p><a href="index.php?action=login">Se connecter</a></p>
        <p><a href="index.php?action=register">S'enregistrer</a></p>
    <?php } ?>
    <?= $content ?>
    <h4>
        <?php if ($_SESSION != NULL && $_SESSION['admin'] == 1) { ?>
        <p><a href="admin.php">Accéder au panneau d'administration</a></p>
        <?php } ?>
    </h4>
</body>

</html>
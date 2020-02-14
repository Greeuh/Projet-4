<div id="header">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4">
                <?php
                if (isset($_GET['action'])) { ?>
                    <a href="index.php" class="<? echo 'hidden' ?>"><i class="fas fa-chevron-left"></i></a>
                <?php }
                ?>
            </div>
            <div class="col-4 text-center pt-1">
                <a href="index.php">
                    <div class="row flew-nowrap justify-content-center align-items-center">
                        <img src="http://antoineparriaud.fr/images/reindeer.png" alt="Logo renne" id="logo">
                        <h1 class="h5 title_color">Billet simple pour l'Alaska</h1>
                    </div>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                        if ($_SESSION != NULL && $_SESSION['admin'] == 1) { ?>
                            <a class="dropdown-item" href="admin.php"><i class="fas fa-cog"></i> Administration</a>
                        <?php }
                        if (isset($_SESSION['id']) and isset($_SESSION['pseudo'])) { ?>
                            <a class="dropdown-item" href="index.php?action=profil&amp;user=<?= $_SESSION['pseudo'] ?>">Voir mon profil</a>
                            <a class="dropdown-item" href="index.php?action=disconnect"><b>Se déconnecter</b></a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="index.php?action=login">Se connecter</a>
                            <a class="dropdown-item" href="index.php?action=register">Créer un compte</a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
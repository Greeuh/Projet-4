<?php $title = 'Erreur' ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>

    <div class="content">

        <div class="text-center my-5">
            <h2 class="h1">Une erreur est arrivée !</h2>
            <h4 class="my-5 mx-3">Pas de panique, vous pouvez retrouver les informations à propos de cette dernière juste en dessous :</h4>
            <h5 class="py-5 border-top border-bottom border-dark mx-5"><?= 'Erreur : ' . $error ?></h5>
            <div class="user_avatar_profile">
                <img src="https://www.antoineparriaud.fr/images/errorsign.webp" alt="Cercle rouge avec une croix à l'intérieur" class="w-50">
            </div>
            <h4 class="mx-3">En attendant vous pouvez retrouver les deux derniers articles publiés :</h4>
        </div>

        <section class="container my-4">
            <div class="row">
                <?php
                while ($data = $posts->fetch()) {
                ?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 my-2 mx-auto">
                        <div class="card">
                            <img class="card-img" src="https://i.pinimg.com/originals/99/66/11/996611498ee534b67c325c3d116b5f6f.jpg" alt="Livre ouvert">

                            <div class="card-body">
                                <h4 class="card-title"><?= strip_tags($data['title']) ?></h4>
                                <?php
                                if ($data['modify_date_fr'] != NULL) {
                                    echo '
                            <small class="text-muted cat">
                                <i class="far fa-clock text-info"></i> Mis à jour le : <em>' . $data['modify_date_fr'] . '</em>';
                                };
                                ?>
                                </small>
                                <p class="card-text"><?= truncate(strip_tags($data['content'])) ?></p>
                                <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"><button class="btn btn-primary">Voir l'intégralité</button></a>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                                <div><?= $data['creation_date_fr']; ?>
                                </div>
                                <div>
                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>#comments" class="text-muted"><i class="far fa-comment"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php
                }
                $posts->closeCursor();
                ?>
            </div>
        </section>


    </div>
    <footer class="page-footer sticky-footer" >
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>


    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
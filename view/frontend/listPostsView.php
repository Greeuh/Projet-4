<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<body class="greybg">

    <?php require('header.php'); ?>

    <div class="content">

        <main class="container my-4">
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
        </main>


    </div>
    <footer class="page-footer sticky-footer" >
        <h2 class="h6 text-muted footer-copyright font-weight-light text-center p-2 m-1 border-top">
            <strong>&copy; Billet simple pour l'Alaska</strong>
        </h2>
    </footer>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
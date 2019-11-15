<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin : <?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/blzor0lwa8o4kef7k5vpel5yhvnxix3hjm3uxmk4chv3569q/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content'
        });
    </script>
</head>

<body>
    <?= $content ?>
    <br>
    <h4>
        <p><a href="index.php">Accéder au site côté utilisateur</a></p>
    </h4>
</body>

</html>
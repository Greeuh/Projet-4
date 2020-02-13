<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.antoineparriaud.fr/images/reindeer.ico">
    <title>Admin : <?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/85e796141c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/blzor0lwa8o4kef7k5vpel5yhvnxix3hjm3uxmk4chv3569q/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#content',
            height: 500
        });
    </script>
</head>

    <?= $content ?>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
<?php session_start(); ?>
<?php require_once __DIR__ . '\..\login\isConnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Fafafood/View/Pages/contact/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Site de Recettes - Contact</title>
</head>
<?php require_once __DIR__ . '\..\..\header\header_template.php'; ?>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <h1>Contactez-nous</h1>
        <form action="submit_contact.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" placeholder="Votre email" class="form-control" id="email" name="email" aria-describedby="email-help">
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
            </div>
            <div class="mb-3">
                <label for="message_sujet" class="form-label"><i class="fas fa-tag"></i> Sujet</label>
                <input type="text" class="form-control" id="message_sujet" name="message_sujet" placeholder="Sujet de votre message">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label"><i class="fas fa-comment"></i> Votre message</label>
                <textarea class="form-control" placeholder="Votre message" id="message" name="message"></textarea>
            </div>
            <div class="mb-3">
                <label for="screenshot" class="form-label"><i class="fas fa-camera"></i> Capture d'écran</label>
                <input placeholder="jpg,jpeg,png,gif uniquement et maximum 2Mo" type="file" class="form-control" id="screenshot" name="screenshot">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php require_once '..\..\footer\footer_template.php'; ?>
</body>

</html>

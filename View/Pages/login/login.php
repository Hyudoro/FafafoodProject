<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>

<?php session_start(); ?>
<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <form action="submit_login.php" method="POST">
        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                aria-describedby="email-help" placeholder="votre email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input aria-describedby="password-help" placeholder="**********" type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
        <button type="button" class="btn btn-danger" onclick="window.location.href='/../../../Fafafood/View/Pages/Acceuil/index.php';">Retour</button>
    </form>
<?php else : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $_SESSION['LOGGED_USER']['email']; ?>, et bienvenue sur le site !
    </div>
<?php endif; ?>

</body>
</html>


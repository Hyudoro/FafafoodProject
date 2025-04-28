<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../Model/databaseconnect.php';
require_once __DIR__ . '/../../../Model/variables.php';
require_once __DIR__ . '/../../../Control/functions.php';

if (isset($_COOKIE['user_data'])) {
    $data = explode(";", trim($_COOKIE['user_data']));
    if ($data[5] != "/View/Pages/Profil/Personnalisation/Photo_de_profil/") {
        $profileImagePath = htmlspecialchars($data[5]);
    }elseif($data[5] === "/View/Pages/Profil/Personnalisation/Photo_de_profil/"){
    $profileImagePath = htmlspecialchars($data[5] . "default_image.jpg");
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/View/Pages/Profil/profil.css" rel="stylesheet">
    <title>Profil</title>
</head>
<body>
    <div class="info-container">
        <h3> Nom complet :
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <?php $email = $_SESSION['LOGGED_USER']['email']; ?>
                <?php echo displayUserfullname($email, $users); ?>
            <?php endif; ?>
        </h3><br>
        <h3> Age :
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <?php $email = $_SESSION['LOGGED_USER']['email']; ?>
                <?php echo displayUserage($email, $users); ?>
            <?php endif; ?> ans
        </h3><br>
        <h3> Email :
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <?php $email = $_SESSION['LOGGED_USER']['email']; ?>
                <?php echo $email; ?>
            <?php endif; ?>
        </h3><br>
        <h3> Nombre de recettes ajoutées :
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <?php $email = $_SESSION['LOGGED_USER']['email']; ?>
                <?php $count = 0; ?>
                <?php foreach($recipes as $recipe): ?>
                    <?php if($recipe['author'] === $email): ?>
                        <?php $count++; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php echo $count; ?>
            <?php endif; ?>
        </h3><br>
        <?php if (isset($_COOKIE['user_data'])): ?>
                <h3> Sexe : <?php echo htmlspecialchars($data[0]); ?></h3><br>
                <h3> Niveau d'expérience en cuisine : <?php echo htmlspecialchars($data[1]); ?></h3><br>
                <h3> Métier : <?php echo htmlspecialchars($data[2]); ?></h3><br>
                <h3> Description personnelle : <?php echo htmlspecialchars($data[3]); ?></h3><br>
                <h3> Passions : <?php echo htmlspecialchars($data[4]); ?></h3><br>
                <h3> Origines : <?php echo htmlspecialchars($data[6]); ?></h3><br>
                <h3>Photo de profil  </h3> <img src="<?php echo $profileImagePath; ?>" alt="Profile">
        <?php else: ?>
            <h3>Photo de profil  </h3> <img src="/View/Pages/Profil/Personnalisation/Photo_de_profil/default_image.jpg" alt="Profile">
        <?php endif; ?>

        <div class="button-container">
            <button class="buttone" type="button" onclick="if(checkAndActivateCookies()){ window.location.href = '/View/Pages/Profil/Personnalisation/personnalisation.php'; }">Personnaliser</button>
        </div>
        <div class="button_retour">
            <button class="button_back" type="button" onclick="window.location.href = '/View/Pages/Acceuil/index.php';">Retour</button>
    </div>
    <button class="delete-button" type="button" onclick="deleteCookies();">Supprimer les cookies</button>
    <script src="/View/Pages/Profil/profil.js"></script>
    <script src="/Control/cookies.js"></script>
</body>
</html>

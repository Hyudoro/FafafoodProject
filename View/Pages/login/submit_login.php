<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once __DIR__ . '/../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../Model/databaseconnect.php';
require_once __DIR__ . '/../../../Model/variables.php';
require_once __DIR__ . '/../../../Control/functions.php';

// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Il faut un email valide pour soumettre le formulaire.';
        redirectToUrl('/View/Pages/login/login.php');
    } else {
        // Préparation et exécution de la requête pour chercher l'utilisateur par email
        $userStatement = $mysqlClient->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $userStatement->execute([':email' => $email]);
        $user = $userStatement->fetch();

        // Vérification si l'utilisateur existe et si le mot de passe correspond
        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['LOGGED_USER'] = [
                'email' => $user['email'],
                'user_id' => $user['user_id'],
            ];
            redirectToUrl('/View/Pages/Acceuil/index.php');
        } else {
            // Message d'erreur si l'authentification échoue
            $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Les informations envoyées ne permettent pas de vous identifier.';
            redirectToUrl('/View/Pages/login/login.php');
        }
    }
} else {
    // Message d'erreur si les champs requis ne sont pas remplis
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Les données requises sont manquantes.';
    redirectToUrl('/View/Pages/login/login.php');
}

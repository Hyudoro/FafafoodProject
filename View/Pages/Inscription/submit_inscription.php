<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

require_once '../../../Model/config/mysql.php';
require_once '../../../Model/databaseconnect.php';
require_once '../../../Control/functions.php';

const VERIF = 0;

// Récupération sécurisée des données POST
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$nom = $_POST['nom'] ?? '';
$prenom = $_POST['prenom'] ?? '';
$age = $_POST['age'] ?? '';

// Vérifications
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['inscription_error'] = "L'adresse email est invalide.";
    header("Location: /View/Pages/Inscription/refus_inscription.php");
    exit();
}

if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z\d]).{10,}$/', $password)) {
    $_SESSION['inscription_error'] = "Le mot de passe doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule, un caractère spécial et avoir une longueur d'au moins 10 caractères.";
    header("Location: /View/Pages/Inscription/refus_inscription.php");
    exit();
}

if (!preg_match('/^[a-zA-Z-]+$/', $nom) || !preg_match('/^[a-zA-Z-]+$/', $prenom)) {
    $_SESSION['inscription_error'] = "Le nom et le prénom doivent contenir uniquement des lettres et des traits d'union.";
    header("Location: /View/Pages/Inscription/refus_inscription.php");
    exit();
}

if (!filter_var($age, FILTER_VALIDATE_INT)) {
    $_SESSION['inscription_error'] = "L'âge doit être un nombre.";
    header("Location: /View/Pages/Inscription/refus_inscription.php");
    exit();
}

// Si tout est valide, traitement d'inscription
$fullname = $prenom . " " . $nom;

if (addUser($mysqlClient, $fullname, $email, $password, $age)) {
    redirectToUrl('/View/Pages/Acceuil/index.php');
} else {
    // Inscription échouée pour d'autres raisons (ex: email déjà utilisé)
    $_SESSION['inscription_error'] = "Erreur lors de l'ajout de l'utilisateur. Veuillez réessayer.";
    header("Location: /View/Pages/Inscription/refus_inscription.php");
    exit();
}


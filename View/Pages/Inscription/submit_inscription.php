<?php session_start();
require_once '../../../Model/config/mysql.php';
require_once '../../../Model/databaseconnect.php';
require_once '../../../Control/functions.php';
?>
<?php
const VERIF = 0;
$email = $_POST['email'];
$password = $_POST['password'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('L\'adresse email est invalide.');
}

if (!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^a-zA-Z\d]).{10,}$/', $password)) {
    die('Le mot de passe doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule, un caractère spécial et avoir une longueur d\'au moins 10 caractères.');
}

if (!preg_match('/^[a-zA-Z-]+$/', $nom) || !preg_match('/^[a-zA-Z-]+$/', $prenom)) {
    die('Le nom et le prénom doivent contenir uniquement des lettres et des traits d\'union.');
}


if (!filter_var($age, FILTER_VALIDATE_INT)) {
    die('L\'âge doit être un nombre.');
}
$fullname = $prenom . " " . $nom;
if(addUser($mysqlClient,$fullname,$email,$password,$age)){
    redirectToUrl('/Fafafood/View/Pages/Acceuil/index.php');
}
else{
    redirectToUrl('/Fafafood/View/Pages/Inscription/inscription.php');
}



// Ici, insérez votre logique pour enregistrer les données de l'utilisateur ou effectuer d'autres actions nécessaires.





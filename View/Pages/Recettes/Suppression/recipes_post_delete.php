<?php

session_start();

require_once __DIR__ . '/../../../../View/Pages/login/isConnect.php';
require_once __DIR__ . '/../../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../../Model/databaseconnect.php';
require_once __DIR__ . '/../../../../Control/functions.php';

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if (!isset($postData['id']) || !is_numeric($postData['id'])) {
    echo 'Il faut un identifiant valide pour supprimer une recette.';
    return;
}

$deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
$deleteRecipeStatement->execute([
    'id' => (int)$postData['id'],
]);

redirectToUrl('/View/Pages/Acceuil/index.php');

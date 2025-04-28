<?php
session_start();

require_once __DIR__ . '/../../login/isConnect.php';
require_once __DIR__ . '/../../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../../Model/databaseconnect.php';

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

// Vérification du formulaire soumis
if (
    empty($postData['title'])
    || empty($postData['recipe'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
) {
    echo 'Il faut un titre et une recette pour soumettre le formulaire.';
    return;
}

$title = trim(strip_tags($postData['title']));
$recipe = trim(strip_tags($postData['recipe']));

// Faire l'insertion en base
$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title, recipe, author, is_enabled)
    VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    'author' => $_SESSION['LOGGED_USER']['email'],
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Pages/Recettes/Ajout/recipes_post_create.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Site de Recettes - Création de recette</title>
</head>
<?php require_once __DIR__ . '/../../../header/header_template.php'; ?>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- MESSAGE DE SUCCES -->
        <h1>Recette ajoutée avec succès !</h1>
        <div id="countdown">Redirection dans 5 secondes...</div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $title ; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $recipe; ?></p>
            </div>
        </div>
    </div>
    <script src="/View/Pages/compte_a_rebours.js"></script>
</body>
<?php require_once '../../../footer/footer_template.php'; ?>
</html>

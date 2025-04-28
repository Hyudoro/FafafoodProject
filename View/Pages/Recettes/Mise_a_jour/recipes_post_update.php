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

if (
    !isset($postData['id'])
    || !is_numeric($postData['id'])
    || empty($postData['title'])
    || empty($postData['recipe'])
    || trim(strip_tags($postData['title'])) === ''
    || trim(strip_tags($postData['recipe'])) === ''
) {
    echo 'Il manque des informations pour permettre l\'édition du formulaire.';
    return;
}

$id = (int)$postData['id'];
$title = trim(strip_tags($postData['title']));
$recipe = trim(strip_tags($postData['recipe']));

$insertRecipeStatement = $mysqlClient->prepare('UPDATE recipes SET
        title = :title, recipe = :recipe WHERE recipe_id = :id');

$insertRecipeStatement->execute([
    'title' => $title,
    'recipe' => $recipe,
    'id' => $id,
]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Pages/Recettes/Mise_a_jour/recipes_post_update.css">
    <title>Site de Recettes - Création de recette</title>
</head>
<?php require_once __DIR__ . '/../../../header/header_template.php'; ?>
<script>
    setTiemout(function(){
        window.location.href = "/View/Pages/Acceuil/index.php";
    }, 2000);

</script>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <h1>Recette modifiée avec succès !</h1>
        <div id="countdown">Redirection dans 5 secondes...</div>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title"><?php echo $title; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $_SESSION['LOGGED_USER']['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $recipe; ?></p>
            </div>
        </div>
    </div>
    <script src="/View/Pages/compte_a_rebours.js"></script>
</body>
<?php require_once '../../../footer/footer_template.php'; ?>
</html>

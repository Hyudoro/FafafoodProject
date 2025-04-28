<?php
session_start();

require_once __DIR__ . '/../../login/isConnect.php';
require_once __DIR__ . '/../../../..//Model/config/mysql.php';
require_once __DIR__ . '/../../../../Model/databaseconnect.php';

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo 'Il faut un identifiant de recette pour la modifier.';
    return;
}

$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'],
]);
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

// si la recette n'est pas trouvée, renvoyer un message d'erreur
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Pages/Recettes/Mise_a_jour/recipes_update.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <title>Site de Recettes - Edition de recette</title>
</head>
<?php require_once __DIR__ . '/../../../../View/header/header_template.php'; ?>
<body>
   <div class="content-container">
        <h1>Mettre à jour <?php echo $recipe['title'] ; ?></h1>
        <form action="recipes_post_update.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help"
                    value="<?php echo $recipe['title'] ; ?>">
                <div id="title-help" class="form-text">Choisissez un titre encore meilleur !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits."
                          id="recipe" name="recipe">
                <?php echo $recipe['recipe']; ?>
                </textarea>
                <div id="title-help" class="form-text">Choisissez une description encore meilleure !</div>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>
</body>
<?php require_once '../../../../View/footer/footer_template.php'; ?>
</html>

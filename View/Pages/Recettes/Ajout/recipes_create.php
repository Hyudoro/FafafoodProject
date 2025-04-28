<?php
session_start();

require_once __DIR__ . '/../../login/isConnect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Pages/Recettes/Ajout/recipes_create.css">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <title>Site de Recettes - Ajout de recette</title>
</head>
<?php require_once __DIR__ . '/../../../header/header_template.php'; ?>
<body>
    <div class="container">
        <h1>Ajouter une recette</h1>
        <form action="recipes_post_create.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input placeholder="Votre recette" type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label"> <br>Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits."
                          id="recipe" name="recipe"></textarea>
                <div id="title-help" class="form-text">Une bonne description est une invitation !</div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</body>
</html>



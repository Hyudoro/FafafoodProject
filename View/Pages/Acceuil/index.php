<?php
session_start();
require_once __DIR__ . '/../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../Model/databaseconnect.php';
require_once __DIR__ . '/../../../Model/variables.php';
require_once __DIR__ . '/../../../Control/functions.php';

// Inclure le fichier contenant la fonction filterRecipesByTitle


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/View/Pages/Acceuil/index.css">
    <title>FafafoodProject</title>
</head>
<?php require_once __DIR__ . '/../../header/header_template.php'; ?>
<body class="corps <?php echo isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark' ? 'dark-mode' : ''; ?>">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <div class="slider-container left-slider">
            <?php include_once __DIR__ . '/../../Pages/Acceuil/slider_publicitaire/slider_plats/slider.php'; ?>
        </div>
        <div class="slider-container right-slider">
            <?php include_once __DIR__ . '/../../Pages/Acceuil/slider_publicitaire/slider_boissons/slider.php'; ?>
        </div>
    </div>
    <h1 class="bvn">Bienvenue sur Fafafood</h1>
    <div>
        <div class="search-container">
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Titre de la recette">
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        <h1 class="recipes">Recette(s)</h1>
        <?php
        // Vérifiez si une recherche a été effectuée
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            // Appel de la fonction filterRecipesByTitle
            $filteredRecipes = filterRecipesByTitle($recipes, $search);
            foreach ($filteredRecipes as $recipe) :
        ?>
            <article>
                <h3>
                    <a href="/View/Pages/Recettes/Lecture/recipes_read.php?id=<?php echo $recipe['recipe_id']; ?>">
                        <h2>
                            <?php echo $recipe['title']; ?>
                        </h2>
                    </a>
                </h3>
                <div class="description"><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']):?>
                    <div class="button-group">
                        <a class="btn-edite" href="/View/Pages/Recettes/Mise_a_jour/recipes_update.php?id=<?php echo $recipe['recipe_id']; ?>">Editer</a>
                        <a class="btn-deletee" href="/View/Pages/Recettes/Suppression/recipes_delete.php?id=<?php echo $recipe['recipe_id']; ?>">Supprimer</a>
                    </div>
                <?php endif; ?>
            </article>
        <?php
            endforeach;
        } else {
            // Si aucune recherche n'a été effectuée, affichez toutes les recettes
            foreach ($recipes as $recipe) :
        ?>
            <article>
                <h3>
                    <a href="/View/Pages/Recettes/Lecture/recipes_read.php?id=<?php echo $recipe['recipe_id']; ?>">
                        <h2>
                            <?php echo $recipe['title']; ?>
                        </h2>
                    </a>
                </h3>
                <div class="description"><?php echo $recipe['recipe']; ?></div>
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']):?>
                    <div class="button-group">
                        <a class="btn-edite" href="/View/Pages/Recettes/Mise_a_jour/recipes_update.php?id=<?php echo $recipe['recipe_id']; ?>">Editer</a>
                        <a class="btn-deletee" href="/View/Pages/Recettes/Suppression/recipes_delete.php?id=<?php echo $recipe['recipe_id']; ?>">Supprimer</a>
                    </div>
                <?php endif; ?>
            </article>
        <?php
            endforeach;
        }
        ?>
    </div>
    <script src="/View/Pages/Acceuil/index.js"></script>
</body>
<?php require_once '../../footer/footer_template.php'; ?>
</html>

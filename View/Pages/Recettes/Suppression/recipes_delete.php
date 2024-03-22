<?php
session_start();

require_once __DIR__ . '/../../login/isConnect.php';

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$getData = $_GET;

if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo 'Il faut un identifiant pour supprimer la recette.';
    return;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Fafafood/View/Pages/Recettes/Suppression/recipes_delete.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Suppression recette</title>

</head>
<?php require_once __DIR__ . '/../../../header/header_template.php'; ?>
<body class="d-flex flex-column min-vh-100">
<div class="container delete-container">
    <h1 class="delete-heading">Suppresion définitive !! ?</h1>
    <form action="recipes_post_delete.php" method="POST">
        <div class="mb-3 visually-hidden">
            <label for="id" class="form-label">Identifiant de la recette</label>
            <input class="form-control" id="id" name="id" value="<?php echo $getData['id']; ?>">
        </div>

        <button type="submit" class="button"><h5 class="h5-1">Supprimer</h5></button>
    </form>
    <br />
    <script src="/Fafafood/View/Pages/Recettes/Suppression/recipes_delete.js"></script>
</div>
</body>
<?php require_once '../../../footer/footer_template.php'; ?>
</html>

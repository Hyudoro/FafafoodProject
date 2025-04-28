<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre de votre site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="/View/header/menu_hamburger/menu.css">
    <link rel="stylesheet" href="/View/header/header.css">
    <!-- Ajout de la police Google pour un style plus professionnel -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
</head>
<body class="d-flex flex-column min-vh-100">
    <?php require_once __DIR__ . '/header.php'; ?> <!-- Correction du chemin pour inclure menu.php -->
    <script src="/View/header/menu_hamburger/menu.js"></script>
    <script src="/View/header/header.js"></script>
</body>
</html>

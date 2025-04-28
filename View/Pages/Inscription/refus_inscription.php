<?php
session_start();

// Vérification et récupération du message d'erreur
$error_message = isset($_SESSION['inscription_error']) ? $_SESSION['inscription_error'] : "Une erreur inconnue est survenue.";

// Nettoyage pour éviter de réafficher à chaque fois
unset($_SESSION['inscription_error']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur d'inscription</title>
    <link rel="stylesheet" href="/View/Pages/Inscription/refus_inscription.css">
</head>
<body>
    <div class="error-container">
        <h1>Erreur lors de l'inscription</h1>
        <p class="error-message"><?php echo htmlspecialchars($error_message); ?></p>
        <p id="countdown3">Redirection vers l'inscription dans 4 secondes...</p>
    </div>
    <script src="/View/Pages/Inscription/refus_inscription.js"></script>
</body>
</html>

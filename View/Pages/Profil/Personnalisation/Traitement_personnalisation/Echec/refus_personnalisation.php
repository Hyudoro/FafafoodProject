<?php
session_start();

// Récupérer toutes les erreurs
$error_messages = isset($_SESSION['error_messages']) ? $_SESSION['error_messages'] : ["Une erreur inconnue est survenue."];

// Supprimer les erreurs de la session après récupération
unset($_SESSION['error_messages']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur de personnalisation</title>
    <link rel="stylesheet" href="/View/Pages/Profil/Personnalisation/Traitement_personnalisation/Echec/refus_personnalisation.css">
</head>
<body>
    <div class="error-container">
        <h1>Erreur lors de la personnalisation</h1>
        <div id="countdown2">Redirection dans 10 secondes...</div>
        
        <!-- Boucle sur chaque message d'erreur -->
        <ul>
            <?php foreach ($error_messages as $error): ?>
                <?php if (is_string($error)): ?>
                    <li><?php echo htmlspecialchars($error); ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <p>Vous allez être redirigé automatiquement vers la page de personnalisation...</p>
    </div>

    <script src="/View/Pages/Profil/Personnalisation/Traitement_personnalisation/Echec/refus_personnalisation.js"></script>
</body>
</html>

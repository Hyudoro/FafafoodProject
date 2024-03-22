<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\Fafafood\View\Pages\Inscription\inscription.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Inscription</title>
</head>
<body>
    <div class="inscription-container">
        <h2>Veuillez vous inscrire</h2>
        <form id="inscriptionForm" action="submit_inscription.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom    <i class="fas fa-user"></i></label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom<i class="fas fa-user-friends"></i></label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="age">Age<i class="fas fa-birthday-cake"></i></label>
                <input type="text" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="email">Email<i class="fas fa-envelope"></i></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe<i class="fas fa-lock"></i></label>
                <input type="password" placeholder="*********" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">S'inscrire<i class="fas fa-paper-plane"></i></button>
            </div>
        </form>
    </div>
</body>
</html>

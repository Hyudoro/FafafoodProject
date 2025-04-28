<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/View/Pages/Profil/Personnalisation/personnalisation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    <title>Personnalisation du Profil</title>
</head>
<body>
    <h1>Personnalisation</h1>

    <div class="form-container">
     <form id="profile-customization-form" method="post" action="/View/Pages/Profil/Personnalisation/Traitement_personnalisation/traitement-personnalisation.php" enctype="multipart/form-data">
            <label for="profile-pic">Photo de profil :</label>
              <input type="file" id="profile-pic" name="profile-pic">
            <label for="gender">Sexe :</label>
            <select name="gender" id="gender">
                <option value="male">Homme</option>
                <option value="female">Femme</option>
                <option value="other">Autre..</option>
            </select>

            <label for="experience">Niveau d'expérience en cuisine :</label>
            <select name="experience" id="experience">
                <option value="Débutant">Débutant</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value ="Avancé">Avancé</option>
                <option value="Expert">Expert</option>
            </select>

            <label for="job">Métier :</label>
            <input type="text" id="job" name="job">

            <label for="description">Description personnelle :</label>
            <textarea id="description" name="description"></textarea>

            <label for="passions">Passions :</label>
            <input type="text" id="passions" name="passions">
            
            <label for="origins">Origines(choix multiple) :</label>
            <select id="origins" name="origins[]" multiple="multiple" style="width: 400px;">
                <h1>deuxième origines ou plus :</h1>
                <!-- Les options seront générées par JavaScript -->
            </select>

            <input type="submit" value="Sauvegarder">
            <button class="retour" type="button"  onclick="window.location.href = '/View/Pages/Profil/profil.php';">Retour</button>
        </form>
    </div>
    <div class="avertissement">
        <h6 >Votre personnalisation sera stockée par les cookies,</h6>
        <h6 >vous pouvez à tout moment les effacer en retournant,</h6>
        <h6 >sur votre profil en bas à droite de la page.</h6>
    </div>
 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="/View/Pages/Profil/Personnalisation/personnalisation.js"></script>
    <script src="/Control/cookies.js"></script>
</body>
<?php require_once '../../../footer/footer_template.php'; ?>
</html>

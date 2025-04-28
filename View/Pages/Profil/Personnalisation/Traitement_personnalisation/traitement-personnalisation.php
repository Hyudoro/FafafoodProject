<?php
session_start(); // Important pour utiliser $_SESSION

require_once __DIR__ . '/../../../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../../../Model/variables.php';
require_once __DIR__ . '/../../../../../Control/functions.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $isValid = true; // On suppose tout est valide au départ
    $error_messages = []; // Pour stocker plusieurs erreurs

    // Traiter les autres champs du formulaire s'ils sont remplis
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $experience = isset($_POST['experience']) ? $_POST['experience'] : "";
    $job = isset($_POST['job']) ? $_POST['job'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $passions = isset($_POST['passions']) ? $_POST['passions'] : "";
    $origines = isset($_POST["origins"]) ? $_POST["origins"] : array();
    $originesString = implode(",", $origines);

    // Vérifications des champs obligatoires
    if (empty($gender)) {
        $isValid = false;
        $error_messages[] = "Le champ Sexe est obligatoire.";
    }
    if (empty($experience)) {
        $isValid = false;
        $error_messages[] = "Le champ Niveau d'expérience est obligatoire.";
    }
    if (empty($job)) {
        $isValid = false;
        $error_messages[] = "Le champ Métier est obligatoire.";
    }
    if (empty($description)) {
        $isValid = false;
        $error_messages[] = "La description personnelle est obligatoire.";
    }
    if (empty($passions)) {
        $isValid = false;
        $error_messages[] = "Le champ Passions est obligatoire.";
    }
    if (empty($origines)) {
        $isValid = false;
        $error_messages[] = "Vous devez choisir au moins une origine.";
    }

    // Vérification du téléchargement de la photo de profil
    if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['profile-pic']['name'];
        $file_tmp = $_FILES['profile-pic']['tmp_name'];
        $file_size = $_FILES['profile-pic']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_extensions = array('gif', 'jpeg', 'jpg', 'png');
        if (!in_array($file_ext, $allowed_extensions)) {
            $isValid = false;
            $error_messages[] = "Erreur : Seuls les fichiers GIF, JPEG, PNG et JPG sont autorisés.";
        }

        if ($file_size > 1048576) { // 1 Mo
            $isValid = false;
            $error_messages[] = "Erreur : La taille maximale du fichier est de 1 Mo.";
        }

        $image_info = getimagesize($file_tmp);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        if ($image_width > 300 || $image_height > 300) {
            $isValid = false;
            $error_messages[] = "Erreur : Les dimensions maximales de l'image sont de 300x300 pixels.";
        }

        if ($isValid) {
            $destinationPath = "../../Personnalisation/Photo_de_profil/" . $file_name;
            move_uploaded_file($file_tmp, $destinationPath);
        }
    } else {
        if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] !== UPLOAD_ERR_NO_FILE) {
            $isValid = false;
            $error_messages[] = "Une erreur s'est produite lors du téléchargement de la photo de profil.";
        }
    }

    // Si erreurs, enregistrer dans $_SESSION et rediriger vers refus_personnalisation
    if (!$isValid) {
        $_SESSION['error_messages'] = $error_messages;
        header("Location: /View/Pages/Profil/Personnalisation/Traitement_personnalisation/Echec/refus_personnalisation.php");
        exit();
    }

    // Si tout est bon, créer le cookie
    $data = $gender . ";" . $experience . ";" . $job . ";" . $description . ";" . $passions . ";" . "/View/Pages/Profil/Personnalisation/Photo_de_profil/" . $_FILES['profile-pic']['name'] . ";" . $originesString;
    setCookie("user_data", $data, time() + 365 * 24 * 3600, "/");

    // Rediriger vers profil.php
    header("Location: /View/Pages/Profil/profil.php");
    exit();
}
?>

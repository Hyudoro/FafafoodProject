<?php
require_once __DIR__ . '/../../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../../Model\variables.php';
require_once __DIR__ . '/../../../../Control/functions.php';
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Traiter les autres champs du formulaire s'ils sont remplis
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $experience = isset($_POST['experience']) ? $_POST['experience'] : "";
    $job = isset($_POST['job']) ? $_POST['job'] : "";
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $passions = isset($_POST['passions']) ? $_POST['passions'] : "";
    $origines = isset($_POST["origins"]) ? $_POST["origins"] : array(); // Assurez-vous que $origines est un tableau
    $originesString = implode(",", $origines);
    // Ajoutez le traitement pour les autres champs ici

    $data = $gender . ";" . $experience . ";" . $job . ";" . $description . ";" . $passions . ";" . "/Fafafood/View/Pages/Profil/Personnalisation/Photo_de_profil/" . $_FILES['profile-pic']['name'] . ";" . $originesString;
    setCookie("user_data", $data, time() + 365 * 24 * 3600, "/");
    // sauvegarde des informations dans les cookies, pour une durée de 1 an.





    // Traitement du téléchargement de la photo de profil si un fichier est sélectionné
    if(isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['profile-pic']['name'];
        $file_tmp = $_FILES['profile-pic']['tmp_name'];
        $file_size = $_FILES['profile-pic']['size'];
        $file_type = $_FILES['profile-pic']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Vérifier le type de fichier
        $allowed_extensions = array('gif', 'jpeg', 'jpg', 'png');
        if(!in_array($file_ext, $allowed_extensions)) {
            echo "Erreur : Seuls les fichiers GIF, JPEG, PNG et JPG sont autorisés.";
            exit();
        }

        // Vérifier la taille du fichier
        if($file_size > 1048576) { // 1 Mo en octets
            echo "Erreur : La taille maximale du fichier est de 1 Mo.";
            exit();
        }

        // Vérifier les dimensions de l'image
        $image_info = getimagesize($file_tmp);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        if($image_width > 300 || $image_height > 300) {
            echo "Erreur : Les dimensions maximales de l'image sont de 300x300 pixels.";
            exit();
        }

        // Déplacer le fichier téléchargé vers le dossier "Photo_de_profil"
        $destinationPath = "../Personnalisation/Photo_de_profil/" . $file_name;
        move_uploaded_file($file_tmp, $destinationPath);
        
        // Afficher un message de succès
        echo "Photo de profil téléchargée avec succès.";
        redirectToUrl("/Fafafood/View/Pages/Profil/profil.php");
        // Vous pouvez enregistrer le chemin de la photo dans la base de données ou dans une variable de session
    } elseif(isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Afficher un message d'erreur si une erreur s'est produite lors du téléchargement de la photo de profil
        echo "Une erreur s'est produite lors du téléchargement de la photo de profil.";
    }
}



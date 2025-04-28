<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../../../Model/config/mysql.php';
require_once __DIR__ . '/../../../Model/databaseconnect.php';
require_once __DIR__ . '/../../../Model/variables.php';
require_once __DIR__ . '/../../../Control/functions.php';
require_once __DIR__ . '/../../../vendor/autoload.php';


$postData = $_POST;
if (
    !isset($postData['email'])
    || !filter_var($postData['email'], FILTER_VALIDATE_EMAIL)
    || empty($postData['message'])
    || empty($postData['message_sujet'])
    || trim($postData['message_sujet']) === ''
    || trim($postData['message']) === ''
) {
    echo "L'envoi n'a pas pu être effectué, il manque des informations pour permettre l'envoi du formulaire." ;
    return;
}

$isFileLoaded = false;
// Testons si le fichier a bien été envoyé et s'il n'y a pas des erreurs
if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {
    // Testons, si le fichier est trop volumineux
    if ($_FILES['screenshot']['size'] > 2000000) {
        echo "L'envoi n'a pas pu être effectué, erreur ou image trop volumineuse";
        return;
    }

    // Testons, si l'extension n'est pas autorisée
    $fileInfo = pathinfo($_FILES['screenshot']['name']);
    $extension = $fileInfo['extension'];
    $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
    if (!in_array($extension, $allowedExtensions)) {
        echo "L'envoi n'a pas pu être effectué, l'extension {$extension} n'est pas autorisée, seulement les images jpg, jpeg, gif et png sont autorisées.";
        return;
    }

    // Testons, si le dossier uploads est manquant
    $path = __DIR__ . '/../../../uploads/';
    if (!is_dir($path)) {
        echo "L'envoi n'a pas pu être effectué, le dossier uploads est manquant";
        return;
    }

    // On peut valider le fichier et le stocker définitivement
    move_uploaded_file($_FILES['screenshot']['tmp_name'], $path . basename($_FILES['screenshot']['name']));
    $isFileLoaded = true;
    $uploadedFilePath = $path . basename($_FILES['screenshot']['name']);
}



// on peut maintenant envoyer le mail avec les bonnes informations

$mail = new PHPMailer(true);

try{
    $mail->isSMTP();                                    //(config PHPMailer)
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'testtesttestcultugym@gmail.com';
    $mail->Password = 'ezwq ykss slmr vyjf';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    
                                                            
    $mail->setFrom('testtesttestcultugym@gmail.com', getUserFullName($users) );
    $mail->addAddress('fafafoodproject@gmail.com','FRN admin');

    if($isFileLoaded){
        $mail->addAttachment($uploadedFilePath);
    }

    $mail->isHTML(true);
    $mail->Subject = $postData['message_sujet'];
    $mail->Body =  "Bonjour Thomas boue, <br> Vous avez reçu un message de la part de " .
                   $postData['email'] . " : <br>" . $postData['message_sujet'];

    $mail->AltBody = "Bonjour M.JS, Vous avez reçu un message de la part de " .
                      $postData['email'] . " : " . $postData['message_sujet'];
    $mail->send();
} catch(Exception $e){
    echo "Message non envoyé. Erreur de PHPMailer : {$mail->ErrorInfo}";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Fafafood/View/Pages/contact/submit_contact.css">
    <title>Envoie confirmé</title>
</head>
<?php require_once __DIR__ . '/../../header/header_template.php'; ?>
<body>
    <div class="container">
        <h1>Message bien envoyé!</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre mail</h5>
                <p class="card-text"><b>Email</b> : <?php echo $postData['email']; ?></p>
                <p class="card-text"><b>Message</b> : <?php echo strip_tags($postData['message']); ?></p>
                <?php if ($isFileLoaded) : ?>
                    <div class="alert alert-success" role="alert">
                        Envoie confirmé !
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
<?php require_once '../../footer/footer_template.php'; ?>
</html>

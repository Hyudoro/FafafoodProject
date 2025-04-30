<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>

<?php require_once __DIR__ . '/../../Model/config/mysql.php'; ?>
<?php require_once __DIR__ . '/../../Model/databaseconnect.php'; ?>
<?php require_once __DIR__ . '/../../Model/variables.php'; ?>
<?php require_once __DIR__ . '/../../Control/functions.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/View/Pages/Acceuil/index.php">Recettes</a>
        <!-- Bouton du menu hamburger retiré ainsi que le code associé à son comportement -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <?php $email = $_SESSION['LOGGED_USER']['email']; ?>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/Recettes/Ajout/recipes_create.php">Ajoutez une recette !</a></li>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/login/logout.php">Déconnexion</a></li>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/contact/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/Profil/profil.php"><?php echo displayUserfullname($email, $users); ?></a></li>
                
                
                <?php if (isset($_COOKIE['user_data'])):
                        $data = explode(";", trim($_COOKIE['user_data']));
                        if (empty(trim($data[6]))) {
                            $origines = "";?>
                            <li class="nav-origins"><?php echo htmlspecialchars($origines) ?></li>
                 <?php } else {
                            $origines = "(" . $data[6] . ")"; ?>
                            <li class="nav-origins"><?php echo htmlspecialchars($origines) ?></li>
                <?php } ?>
                <?php else: ?>
                        <li class="nav-origins"><?php echo htmlspecialchars("") ?></li>
                        <?php endif; ?>
                <?php if(!isset($_COOKIE["user_data"])): ?>
                        <li class="nav-origins"><?php echo htmlspecialchars("") ?></li>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php if(isset($_POST['theme'])){
                        setcookie('theme', $_POST['theme'], time() + 365*24*3600, '', '', false, true);
                } ?>
                <label class="switch">
                    <input type="checkbox" id="theme-switch">
                <span class="slider round"></span>
                </label>

               <?php if(!isset($_SESSION["LOGGED_USER"])): ?>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/login/login.php">Connexion</a></li>
                <li class="nav-item"><a class="nav-link active" href="/View/Pages/Acceuil/index.php">Acceuil</a></li>
                <li class="nav-item"><a class="nav-link" href="/View/Pages/Inscription/inscription.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<?php require_once __DIR__ . '/../header/menu_hamburger/menu.php'; ?>

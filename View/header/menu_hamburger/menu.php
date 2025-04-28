<!-- menu.php -->
<header>
    <button class="hamburger-menu" onclick="toggleMenu()">☰</button>
    <nav id="navbar" class="nav-hidden">
        <ul>
            <?php if (isset($_SESSION['LOGGED_USER'])): ?>
                <li><a href="/View/Pages/Profil/profil.php"><i class="fa fa-user"></i> <?php echo displayUserfullname($email, $users); ?></a></li>
                <li><a href="/View/Pages/Recettes/Ajout/recipes_create.php"><i class="fa fa-plus"></i> Ajouter recette</a></li>
                <li><a href="/View/Pages/Acceuil/index.php"><i class="fa fa-home"></i> Accueil</a></li>
                <li><a href="/View/Pages/contact/contact.php"><i class="fa fa-envelope"></i> Contact</a></li>
                <li><a href="/View/Pages/login/logout.php"><i class="fa fa-sign-out-alt"></i> Déconnexion</a></li>
            <?php else: ?>
                <li><a href="/View/Pages/Acceuil/index.php"><i class="fa fa-home"></i> Accueil</a></li>
                <li><a href="/View/Pages/inscription/inscription.php"><i class="fa fa-user"></i> Inscription</a></li>
                <li><a href="/View/Pages/login/login.php"><i class="fa fa-sign-in-alt"></i> Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

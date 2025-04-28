<?php


// Charger automatiquement les variables d'environnement
if (file_exists(__DIR__ . '/../../.env')) { // adapter le chemin si besoin
    $env = parse_ini_file(__DIR__ . '/../../.env');
} else {
    die('Erreur : fichier .env introuvable.');
}

// Définir les constantes une fois pour tout le projet
define('MYSQL_HOST', $env['MYSQL_HOST']);
define('MYSQL_PORT', $env['MYSQL_PORT']);
define('MYSQL_NAME', $env['MYSQL_NAME']);
define('MYSQL_USER', $env['MYSQL_USER']);
define('MYSQL_PASSWORD', $env['MYSQL_PASSWORD']);

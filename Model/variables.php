
<?php
$mysqlClient = new PDO(
    sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
    MYSQL_USER,
    MYSQL_PASSWORD
);
// Récupération des variables à l'aide du client MySQL
$usersStatement = $mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users = $usersStatement->fetchAll();

$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();


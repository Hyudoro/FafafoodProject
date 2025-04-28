<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../Model/variables.php';

function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Auteur inconnu';
}

function displayUserfullname(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'];
        }
    }

    return 'Auteur inconnu';
}
function displayUserage(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['age'];
        }
    }

    return 'Auteur inconnu';
}




function isValidRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function getRecipes(array $recipes): array
{
    $valid_recipes = [];

    foreach ($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $valid_recipes[] = $recipe;
        }
    }

    return $valid_recipes;
}

function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}

function getUserFullName(array $users): string
{
    foreach ($users as $user) {
        if ($user['email'] === $_SESSION['LOGGED_USER']['email']) {
            return $user['full_name'];
        }
    }

    return 'Auteur inconnu';
}

function addUser($mysqlClient, $fullName, $email, $password, $age) {
    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Préparation de la requête SQL pour insérer le nouvel utilisateur
    $query = "INSERT INTO users (full_name, email, password, age) VALUES (:full_name, :email, :password, :age)";
    
    try {
        $statement = $mysqlClient->prepare($query);
        
        // Liaison des paramètres
        $statement->bindParam(':full_name', $fullName, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $statement->bindParam(':age', $age, PDO::PARAM_INT);
        
        // Exécution de la requête
        $statement->execute();
        
        // Retourne true pour indiquer que l'ajout a réussi
        return true;
    } catch (Exception $e) {
        // En cas d'erreur, retourne false
        return false;
    }
}


function filterRecipesByTitle($recipes, $search) {
    $filteredRecipes = [];
    foreach ($recipes as $recipe) {
        // Utilisez stripos pour une recherche insensible à la casse
        if (stripos($recipe['title'], $search) !== false) {
            $filteredRecipes[] = $recipe;
        }
    }
    return $filteredRecipes;
}




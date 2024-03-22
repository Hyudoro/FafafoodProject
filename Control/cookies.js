// Remove this unused import of 'RedirectHandler'.

function checkAndActivateCookies() {
    if (document.cookie.split('; ').find(row => row.startsWith('acceptCookies='))) {
      // Le cookie existe, permettre l'accès librement.
      return true;
    } else if (navigator.cookieEnabled) {
        if (confirm("Acceptez-vous les cookies pour la personnalisation de votre profil ?")) {
            // L'utilisateur accepte, créer le cookie d'acceptation.
            document.cookie = "acceptCookies=true; path=/; max-age=" + (60*60*24*365);
            return true;
        } else {
            // L'utilisateur refuse, ne rien faire et retourner false.
            return false;
        }
    } else {
        // Les cookies sont désactivés, afficher une alerte.
        alert("Les cookies semblent être désactivés. Veuillez les activer pour continuer.");
        return false;
    }
}


function deleteCookies() {
    // Effacer le cookie en définissant la date d'expiration dans le passé
    document.cookie = "acceptCookies=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "user_data=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    alert("Vos cookies ont bien été supprimés.");
    
}



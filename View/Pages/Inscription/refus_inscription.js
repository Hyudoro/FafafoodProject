document.addEventListener('DOMContentLoaded', function() {
    let countdown = 4;
    const countdownElement = document.getElementById('countdown3');

    const interval = setInterval(() => {
        countdown--;
        if (countdown > 0) {
            countdownElement.textContent = `Redirection vers l'inscription dans ${countdown} secondes...`;
        } else {
            clearInterval(interval);
            window.location.href = "/View/Pages/Inscription/inscription.php";
        }
    }, 1000);
});

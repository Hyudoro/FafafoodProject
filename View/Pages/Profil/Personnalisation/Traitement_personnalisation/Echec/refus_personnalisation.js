document.addEventListener('DOMContentLoaded', function () {
    let seconds = 10;
    const countdownElement = document.getElementById('countdown2');

    if (countdownElement) {
        const countdownInterval = setInterval(function() {
            seconds--;
            if (seconds > 0) {
                countdownElement.textContent = `Redirection dans ${seconds} seconde${seconds > 1 ? 's' : ''}...`;
            } else {
                clearInterval(countdownInterval);
                window.location.href = '/View/Pages/Profil/profil.php';
            }
        }, 1000);
    }
});

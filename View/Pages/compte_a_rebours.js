document.addEventListener('DOMContentLoaded', function () {
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');

    if (countdownElement) {
        const countdownInterval = setInterval(function() {
            seconds--;
            if (seconds > 0) {
                countdownElement.textContent = `Redirection dans ${seconds} seconde${seconds > 1 ? 's' : ''}...`;
            } else {
                clearInterval(countdownInterval);
                window.location.href = '/View/Pages/Acceuil/index.php';
            }
        }, 1000);
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form'); // Sélectionne ton formulaire
    if (form) {
        form.addEventListener('submit', function(event) {
            const commentInput = document.querySelector('textarea[name="comment"]');
            const reviewInput = document.querySelector('input[name="review"]');

            const comment = commentInput ? commentInput.value.trim() : '';
            const review = reviewInput ? parseInt(reviewInput.value) : NaN;

            let errors = [];

            if (comment === '') {
                errors.push('Le commentaire ne peut pas être vide.');
            }

            if (isNaN(review) || review < 1 || review > 5) {
                errors.push('La note doit être un nombre entre 1 et 5.');
            }

            if (errors.length > 0) {
                event.preventDefault(); // Bloque l'envoi du formulaire
                alert(errors.join("\n")); // Affiche les erreurs
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', (event) => {
    const deleteButton = document.querySelector('.button');
    
    deleteButton.addEventListener('mouseover', () => {
        deleteButton.style.backgroundColor = '#c0392b'; // Rouge plus foncé au survol
    });

    deleteButton.addEventListener('mouseout', () => {
        deleteButton.style.backgroundColor = '#e74c3c'; // Revenir à la couleur originale
    });

    deleteButton.addEventListener('mousedown', () => {
        deleteButton.style.transform = 'scale(0.98)'; // Effet de pression lors du clic
    });

    deleteButton.addEventListener('mouseup', () => {
        deleteButton.style.transform = 'scale(1)'; // Retour à la taille normale
    });
});

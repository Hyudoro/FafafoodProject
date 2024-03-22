console.log("Script loaded!");
document.querySelectorAll('.btn-edit, .btn-delete').forEach(button => {
    button.addEventListener('mousedown', () => {
        button.style.transform = 'scale(0.95)';
    });

    button.addEventListener('mouseup', () => {
        button.style.transform = 'scale(1)';
    });

    button.addEventListener('mouseleave', () => {
        button.style.transform = 'scale(0)';
    });
});

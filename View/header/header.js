document.addEventListener('DOMContentLoaded', function() {
  // Animation pour les liens de la navbar
  document.querySelectorAll('.nav-link').forEach(button => {
      button.addEventListener('click', e => {
          e.target.style.transform = 'scale(0.95)'; // Réduction légère pour l'effet de pression
          setTimeout(() => {
              e.target.style.transform = 'scale(1)';
            }, 150);
          });
      });
  
      // Gestion du basculement du thème sombre/clair
      const themeSwitch = document.getElementById('theme-switch');
      themeSwitch.addEventListener('change', function() {
          if (this.checked) {
              document.body.classList.add('dark-mode'); // Active le mode sombre
              document.cookie = "theme=dark; path=/; max-age=" + 60 * 60 * 24 * 30; // Stocke le choix dans un cookie pour 30 jours
          } else {
              document.body.classList.remove('dark-mode'); // Désactive le mode sombre
              document.cookie = "theme=light; path=/; max-age=" + 60 * 60 * 24 * 30; // Met à jour le cookie
          }
      });
  
      // Vérification initiale du cookie pour définir le thème au chargement de la page
      const currentTheme = document.cookie.split('; ').find(row => row.startsWith('theme='));
      if (currentTheme && currentTheme.split('=')[1] === 'dark') {
          themeSwitch.checked = true;
          document.body.classList.add('dark-mode');
      }
  });

$(document).ready(function() {
    $('#origins').select2({
        data: [
            { id: 'France', text: 'France', flag: 'fr' },
    { id: 'Espagne', text: 'Espagne', flag: 'es' },
    { id: 'Portugal', text: 'Portugal', flag: 'pt' },
    { id: 'Belgique', text: 'Belgique', flag: 'be' },
    { id: 'Suisse', text: 'Suisse', flag: 'ch' },
    { id: 'Luxembourg', text: 'Luxembourg', flag: 'lu' },
    { id: 'Monaco', text: 'Monaco', flag: 'mc' },
    { id: 'Andorre', text: 'Andorre', flag: 'ad' },
    { id: 'Italie', text: 'Italie', flag: 'it' },
    { id: 'Allemagne', text: 'Allemagne', flag: 'de' },
    { id: 'Royaume-Uni', text: 'Royaume-Uni', flag: 'gb' },
    { id: 'Pays-Bas', text: 'Pays-Bas', flag: 'nl' },
    { id: 'Irlande', text: 'Irlande', flag: 'ie' },
    { id: 'Danemark', text: 'Danemark', flag: 'dk' },
    { id: 'Autriche', text: 'Autriche', flag: 'at' },
    { id: 'Suède', text: 'Suède', flag: 'se' },
    { id: 'Norvège', text: 'Norvège', flag: 'no' },
    { id: 'Finlande', text: 'Finlande', flag: 'fi' },
    { id: 'Grèce', text: 'Grèce', flag: 'gr' },
    { id: 'Malte', text: 'Malte', flag: 'mt' },
    { id: 'Colombie', text: 'Colombie', flag: 'co' },
    { id: 'Tunisie', text: 'Tunisie', flag: 'tn' },
    { id: 'Maroc', text: 'Maroc', flag: 'ma' },
    { id: 'Algérie', text: 'Algérie', flag: 'dz' },
    { id: 'Sénégal', text: 'Sénégal', flag: 'sn' },
    { id: 'Congo', text: 'Congo', flag: 'cg' },
    { id: 'Argentine', text: 'Argentine', flag: 'ar' },
    { id: 'Pérou', text: 'Pérou', flag: 'pe' },
    { id: 'Mexique', text: 'Mexique', flag: 'mx' },
    { id: 'Équateur', text: 'Équateur', flag: 'ec' },
    { id: 'Arabie saoudite', text: 'Arabie saoudite', flag: 'sa' },
    { id: 'Yémen', text: 'Yémen', flag: 'ye' },
    { id: 'Turquie', text: 'Turquie', flag: 'tr' },
    { id: 'Afghanistan', text: 'Afghanistan', flag: 'af' },
    { id: 'Russie', text: 'Russie', flag: 'ru' }
        ],
        templateResult: formatState,
        templateSelection: formatState,
        escapeMarkup: function(m) { return m; },
        dropdownParent: $('#origins').parent()
    });

    function formatState(state) {
        if (!state.id) { return state.text; }
        var $state = $(
            '<div class="flag-container">' +
                '<div class="flag-icon flag-icon-' + state.flag + '"></div>' +
                '<div class="flag-text">' + state.text + '</div>' +
            '</div>'
        );
        return $state;
    };
    $('profile-customization-form').submit(function(e) {
        // Récupérer les noms des drapeaux sélectionnés
        var selectedOrigins = $('#origins').val();
        
        // Envoyer les noms des drapeaux au serveur via une requête POST
        $.post('traitement-personnalisation.php', { selectedOrigins: selectedOrigins }, function(data) {
            // Traiter la réponse du serveur si nécessaire
            console.log(data);
        });

        // Empêcher le formulaire de se soumettre normalement
        e.preventDefault();
    });
});




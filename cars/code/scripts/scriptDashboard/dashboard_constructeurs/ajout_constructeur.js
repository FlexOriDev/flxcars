document.addEventListener('DOMContentLoaded', function() {
    var nomConstructeurInput = document.getElementById('nomConstructeur');
    var ajouterConstructeurBtn = document.getElementById('ajouterConstructeur');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomConstructeurInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterConstructeurBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

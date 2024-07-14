document.addEventListener('DOMContentLoaded', function() {
    var nomSegmentInput = document.getElementById('nomSegment');
    var ajouterSegmentBtn = document.getElementById('ajouterSegment');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomSegmentInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterSegmentBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

document.addEventListener('DOMContentLoaded', function() {
    var nomModeleInput = document.getElementById('nomModele');
    var ajouterModeleBtn = document.getElementById('ajouterModele');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomModeleInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterModeleBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

document.addEventListener('DOMContentLoaded', function() {
    var nomGroupeInput = document.getElementById('nomGroupe');
    var ajouterGroupeBtn = document.getElementById('ajouterGroupe');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomGroupeInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterGroupeBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

document.addEventListener('DOMContentLoaded', function() {
    var nomTypeInput = document.getElementById('nomType');
    var ajouterTypeBtn = document.getElementById('ajouterType');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomTypeInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterTypeBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

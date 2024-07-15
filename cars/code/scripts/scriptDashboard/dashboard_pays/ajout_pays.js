document.addEventListener('DOMContentLoaded', function() {
    var nomPaysInput = document.getElementById('nomPays');
    var ajouterPaysBtn = document.getElementById('ajouterPays');

    // Gestionnaire d'événements pour le champ de saisie de texte
    nomPaysInput.addEventListener('keydown', function(event) {
        if (event.keyCode === 13) { // Touche "Entrée"
            event.preventDefault(); // Empêcher le comportement par défaut (par exemple, soumettre un formulaire)
        }
    });

    // Gestionnaire d'événements pour le bouton "Ajouter"
    ajouterPaysBtn.addEventListener('click', function(event) {
        event.preventDefault(); // Empêcher le comportement par défaut du bouton
    });


});

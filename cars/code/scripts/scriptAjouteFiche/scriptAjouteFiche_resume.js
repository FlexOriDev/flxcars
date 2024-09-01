function updateCount(textarea) {
    const maxLength = textarea.maxLength; // Obtient la longueur maximale définie dans l'attribut maxlength
    const currentLength = textarea.value.length; // Calcule la longueur actuelle du texte
    const charsRemaining = maxLength - currentLength; // Calcule le nombre de caractères restants

    const charCountSpan = document.getElementById('charCount'); // Récupère l'élément span qui affiche le compteur
    if (charCountSpan) {
        charCountSpan.textContent = charsRemaining; // Met à jour le texte de l'élément span
    }
}

// Initialise le compteur de caractères restants en fonction du texte pré-rempli
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.querySelector('textarea[name="resume"]'); // Sélectionne la zone de texte
    updateCount(textarea); // Met à jour le compteur de caractères au chargement de la page
});
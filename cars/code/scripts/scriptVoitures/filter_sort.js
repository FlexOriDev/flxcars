// Fonction pour afficher ou masquer le dropdown
function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdown-content-sort");
    dropdownContent.style.display = (dropdownContent.style.display === "block") ? "none" : "block";
}
function redirectToSortedURL(sortParameter) {
    var searchInput = document.getElementById("searchInput").value; // Récupère le texte saisi dans la zone de texte
    var baseURL = window.location.href.split('?')[0]; // Récupère l'URL de base sans les paramètres de requête
    var currentParams = new URLSearchParams(window.location.search); // Récupère les autres paramètres de requête actuels
    currentParams.set('sort', sortParameter); // Ajoute le paramètre de tri aux paramètres de requête actuels

    // Vérifie s'il y a une recherche en cours et l'ajoute aux paramètres de requête actuels si nécessaire
    if (searchInput.trim() !== '') {
        currentParams.set('search', encodeURIComponent(searchInput));
    }

    var newURL = baseURL + '?' + currentParams.toString(); // Convertit les paramètres de requête actuels en chaîne de requête
    window.location.href = newURL; // Redirige vers la nouvelle URL avec le paramètre de tri et les autres paramètres de requête
}

document.addEventListener("DOMContentLoaded", function() {
    // Récupérer tous les paramètres de l'URL
    var urlParams = new URLSearchParams(window.location.search);

    // Vérifier si des filtres sont présents dans l'URL
    if (urlParams.toString().length === 0) {
        // Aucun filtre n'est sélectionné, cacher le bouton de suppression des filtres
        document.getElementById("clearFiltersButton").style.display = "none";
    }
});

// Fonction pour supprimer tous les filtres et recharger la page
function clearFilters() {
    // Supprimer tous les paramètres de l'URL
    window.history.replaceState({}, document.title, window.location.pathname);

    // Cacher le bouton de suppression des filtres
    document.getElementById("clearFiltersButton").style.display = "none";

}
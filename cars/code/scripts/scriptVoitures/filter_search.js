var searchInput = "";
function search() {
    searchInput = document.getElementById("searchInput").value; // Récupère le texte saisi dans la zone de texte
    var params = new URLSearchParams(window.location.search); // Récupère les paramètres de l'URL actuelle

    // Réinitialiser tous les autres filtres si searchInput n'est pas vide
    if (searchInput !== "") {
        params.delete('id_constructeur');
        params.delete('id_type');
        params.delete('id_modele');
        params.delete('id_segment');
        params.delete('id_annee');
    }

    params.set('search', searchInput); // Ajoute le paramètre de recherche
    var newURL = window.location.pathname + '?' + params.toString(); // Construit la nouvelle URL avec tous les paramètres
    window.location.href = newURL; // Redirige vers la nouvelle URL avec le paramètre de recherche
}

function handleSearch(event) {
    if (event.key === "Enter") {
        search(); // Exécuter la recherche si la touche "Entrée" est pressée
    }
}
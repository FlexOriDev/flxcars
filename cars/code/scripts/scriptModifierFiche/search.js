document.getElementById('searchBar').addEventListener('input', function() {
    // Récupérer la valeur de la barre de recherche et la convertir en minuscule
    const searchTerm = this.value.toLowerCase();
    // Récupérer toutes les lignes du tableau
    const rows = document.querySelectorAll('#ficheTable tbody tr');

    // Boucler à travers les lignes du tableau
    rows.forEach(row => {
        const ficheName = row.cells[0].textContent.toLowerCase(); // Nom de la fiche
        const constructeurName = row.cells[1].textContent.toLowerCase(); // Nom du constructeur

        // Vérifier si le terme de recherche est présent dans l'une des colonnes
        if (ficheName.includes(searchTerm) || constructeurName.includes(searchTerm)) {
            row.style.display = ''; // Afficher la ligne
        } else {
            row.style.display = 'none'; // Masquer la ligne
        }
    });
});
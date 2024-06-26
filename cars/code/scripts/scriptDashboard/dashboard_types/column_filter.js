// Fonction pour trier les données par ordre numérique ascendant
function sortByIdAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-types');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = parseInt(rows[i].getElementsByTagName("TD")[0].innerText);
            y = parseInt(rows[i + 1].getElementsByTagName("TD")[0].innerText);
            if (x > y) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

// Fonction pour trier les données par ordre numérique descendant
function sortByIdDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-types');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = parseInt(rows[i].getElementsByTagName("TD")[0].innerText);
            y = parseInt(rows[i + 1].getElementsByTagName("TD")[0].innerText);
            if (x < y) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

// Fonction pour trier les données par ordre alphabétique ascendant
function sortByNameAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-types');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[1].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[1].innerText.toLowerCase();
            if (x > y) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}

// Fonction pour trier les données par ordre alphabétique descendant
function sortByNameDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-types');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[1].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[1].innerText.toLowerCase();
            if (x < y) {
                shouldSwitch = true;
                break;
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
        }
    }
}



// Écouteurs d'événements pour les icônes de tri
document.getElementById('sortByIdIcon').addEventListener('click', function() {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    if (sortByIdIcon.src.includes('ascendant.png')) {
        sortByIdIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByIdDesc(); // Appel de la fonction de tri descendant pour la colonne ID
    } else {
        sortByIdIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByIdAsc(); // Appel de la fonction de tri ascendant pour la colonne ID
    }
});

document.getElementById('sortByNameIcon').addEventListener('click', function() {
    var sortByNameIcon = document.getElementById('sortByNameIcon');
    if (sortByNameIcon.src.includes('ascendant.png')) {
        sortByNameIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByNameDesc(); // Appel de la fonction de tri descendant pour la colonne Nom
    } else {
        sortByNameIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByNameAsc(); // Appel de la fonction de tri ascendant pour la colonne Nom
    }
});

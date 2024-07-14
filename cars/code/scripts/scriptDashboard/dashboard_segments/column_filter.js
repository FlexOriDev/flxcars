// Fonction pour trier les données par ordre numérique ascendant
function sortByIdAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-segments');
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
    table = document.querySelector('.dashboard-table-segments');
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
    table = document.querySelector('.dashboard-table-segments');
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
    table = document.querySelector('.dashboard-table-segments');
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

// Fonction pour trier les données par ordre alphabétique ascendant
function sortByCountAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-segments');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[2].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[2].innerText.toLowerCase();
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
function sortByCountDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-segments');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[2].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[2].innerText.toLowerCase();
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
    if (sortByIdIcon.src.includes('descendant.png')) {
        sortByIdIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByIdDesc(); // Appel de la fonction de tri descendant pour la colonne ID
    } else {
        sortByIdIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByIdAsc(); // Appel de la fonction de tri ascendant pour la colonne ID
    }
});

document.getElementById('sortByNameIcon').addEventListener('click', function() {
    var sortByNameIcon = document.getElementById('sortByNameIcon');
    if (sortByNameIcon.src.includes('descendant.png')) {
        sortByNameIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByNameDesc(); // Appel de la fonction de tri descendant pour la colonne Nom
    } else {
        sortByNameIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByNameAsc(); // Appel de la fonction de tri ascendant pour la colonne Nom
    }
});

document.getElementById('sortByCountIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCountDesc(); // Appel de la fonction de tri descendant pour la colonne Nom
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCountAsc(); // Appel de la fonction de tri ascendant pour la colonne Nom
    }
});
// Fonction pour trier les données par ordre numérique ascendant
function sortByIdAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
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
    table = document.querySelector('.dashboard-table-utilisateurs');
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
function sortByPseudoAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
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
function sortByPseudoDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
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

// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Pays
function sortByPrenomAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
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

// Fonction pour trier les données par ordre alphabétique descendant pour la colonne Pays
function sortByPrenomDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
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
// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Groupe
function sortByNomAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[3].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[3].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique descendant pour la colonne Groupe
function sortByNomDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[3].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[3].innerText.toLowerCase();
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
// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Groupe
function sortByMailAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[4].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[4].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique descendant pour la colonne Groupe
function sortByMailDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[4].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[4].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Groupe
function sortByRoleAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[5].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[5].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique descendant pour la colonne Groupe
function sortByRoleDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[5].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[5].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Groupe
function sortByCountAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[6].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[6].innerText.toLowerCase();
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

// Fonction pour trier les données par ordre alphabétique descendant pour la colonne Groupe
function sortByCountDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-utilisateurs');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[6].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[6].innerText.toLowerCase();
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

document.getElementById('sortByPseudoIcon').addEventListener('click', function() {
    var sortByNameIcon = document.getElementById('sortByPseudoIcon');
    if (sortByNameIcon.src.includes('descendant.png')) {
        sortByNameIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByPseudoDesc(); // Appel de la fonction de tri descendant pour la colonne Nom
    } else {
        sortByNameIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByPseudoAsc(); // Appel de la fonction de tri ascendant pour la colonne Nom
    }
});

document.getElementById('sortByPrenomIcon').addEventListener('click', function() {
    var sortByPaysIcon = document.getElementById('sortByPrenomIcon');
    if (sortByPaysIcon.src.includes('descendant.png')) {
        sortByPaysIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByPrenomDesc(); // Appel de la fonction de tri descendant pour la colonne Pays
    } else {
        sortByPaysIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByPrenomAsc(); // Appel de la fonction de tri ascendant pour la colonne Pays
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByNomIcon').addEventListener('click', function() {
    var sortByGroupIcon = document.getElementById('sortByNomIcon');
    if (sortByGroupIcon.src.includes('descendant.png')) {
        sortByGroupIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByNomDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByGroupIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByNomAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByMailIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByMailIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByMailDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByMailAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByRoleIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByRoleIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByRoleDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByRoleAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByCountIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCountDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCountAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});
// Fonction pour trier les données par ordre numérique ascendant
function sortByIdAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
    table = document.querySelector('.dashboard-table-versions');
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
function sortByFicheAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByFicheDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByAppellationAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByAppellationDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByCarburantAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByCarburantDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByConstructionAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByConstructionDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByMoteurAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByMoteurDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByCylindreeAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
function sortByCylindreeDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
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
// Fonction pour trier les données par ordre alphabétique ascendant pour la colonne Groupe
function sortByPerformanceAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[7].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[7].innerText.toLowerCase();
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
function sortByPerformanceDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[7].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[7].innerText.toLowerCase();
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
function sortByCoupleAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[8].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[8].innerText.toLowerCase();
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
function sortByCoupleDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[8].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[8].innerText.toLowerCase();
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
function sortByZeroToHundredAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[9].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[9].innerText.toLowerCase();
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
function sortByZeroToHundredDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[9].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[9].innerText.toLowerCase();
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
function sortByVmaxAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[10].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[10].innerText.toLowerCase();
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

function sortByVmaxDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[10].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[10].innerText.toLowerCase();
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
function sortByConsoAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[11].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[11].innerText.toLowerCase();
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

function sortByConsoDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[11].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[11].innerText.toLowerCase();
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
function sortByCarrosserieAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[12].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[12].innerText.toLowerCase();
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

function sortByCarrosserieDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[12].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[12].innerText.toLowerCase();
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
function sortByMarcheAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[13].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[13].innerText.toLowerCase();
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

function sortByMarcheDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-versions');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("TD")[13].innerText.toLowerCase();
            y = rows[i + 1].getElementsByTagName("TD")[13].innerText.toLowerCase();
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

document.getElementById('sortByFicheIcon').addEventListener('click', function() {
    var sortByNameIcon = document.getElementById('sortByFicheIcon');
    if (sortByNameIcon.src.includes('descendant.png')) {
        sortByNameIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByFicheDesc(); // Appel de la fonction de tri descendant pour la colonne Nom
    } else {
        sortByNameIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByFicheAsc(); // Appel de la fonction de tri ascendant pour la colonne Nom
    }
});

document.getElementById('sortByAppellationIcon').addEventListener('click', function() {
    var sortByPaysIcon = document.getElementById('sortByAppellationIcon');
    if (sortByPaysIcon.src.includes('descendant.png')) {
        sortByPaysIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByAppellationDesc(); // Appel de la fonction de tri descendant pour la colonne Pays
    } else {
        sortByPaysIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByAppellationAsc(); // Appel de la fonction de tri ascendant pour la colonne Pays
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByCarburantIcon').addEventListener('click', function() {
    var sortByGroupIcon = document.getElementById('sortByCarburantIcon');
    if (sortByGroupIcon.src.includes('descendant.png')) {
        sortByGroupIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCarburantDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByGroupIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCarburantAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByConstructionIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByConstructionIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByConstructionDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByConstructionAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByMoteurIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByMoteurIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByMoteurDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByMoteurAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByCylindreetIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCylindreetIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCylindreeDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCylindreeAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByPerformanceIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByPerformanceIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByPerformanceDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByPerformanceAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByCoupleFinIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCoupleFinIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCoupleDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCoupleAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByZeroToHundredIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByZeroToHundredIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByZeroToHundredDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByZeroToHundredAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByVmaxIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByVmaxIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByVmaxDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByVmaxAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByConsommationIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByConsommationIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByConsoDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByConsoAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByCarrosserieIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCarrosserieIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByCarrosserieDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByCarrosserieAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByMarcheIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByMarcheIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByMarcheDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByMarcheAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});
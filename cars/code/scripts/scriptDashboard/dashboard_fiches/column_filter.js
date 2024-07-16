// Fonction pour trier les données par ordre numérique ascendant
function sortByIdAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
    table = document.querySelector('.dashboard-table-fiches');
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
    table = document.querySelector('.dashboard-table-fiches');
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
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByModeleAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByModeleDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByConstructeurAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByConstructeurDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByGroupeAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByGroupeDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByTypeAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByTypeDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortBySegmentAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortBySegmentDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByAnneeAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByAnneeDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByAnneeFinAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByAnneeFinDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByUtilisateurAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByUtilisateurDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
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
function sortByDateAsc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = new Date(rows[i].getElementsByTagName("TD")[10].innerText);
            y = new Date(rows[i + 1].getElementsByTagName("TD")[10].innerText);
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

function sortByDateDesc() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.querySelector('.dashboard-table-fiches');
    switching = true;
    while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = new Date(rows[i].getElementsByTagName("TD")[10].innerText);
            y = new Date(rows[i + 1].getElementsByTagName("TD")[10].innerText);
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

document.getElementById('sortByModeleIcon').addEventListener('click', function() {
    var sortByPaysIcon = document.getElementById('sortByModeleIcon');
    if (sortByPaysIcon.src.includes('descendant.png')) {
        sortByPaysIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByModeleDesc(); // Appel de la fonction de tri descendant pour la colonne Pays
    } else {
        sortByPaysIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByModeleAsc(); // Appel de la fonction de tri ascendant pour la colonne Pays
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByConstructeurIcon').addEventListener('click', function() {
    var sortByGroupIcon = document.getElementById('sortByConstructeurIcon');
    if (sortByGroupIcon.src.includes('descendant.png')) {
        sortByGroupIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByConstructeurDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByGroupIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByConstructeurAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByGroupeIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByGroupeIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByGroupeDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByGroupeAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByTypeIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByTypeIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByTypeDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByTypeAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortBySegmentIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortBySegmentIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortBySegmentDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortBySegmentAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByAnneeIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByAnneeIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByAnneeDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByAnneeAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByAnneeFinIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByAnneeFinIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByAnneeFinDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByAnneeFinAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByDateIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByDateIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByDateDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByDateAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
    }
});

// Écouteur d'événements pour l'icône de tri de la colonne Groupe
document.getElementById('sortByUserIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByUserIcon');
    if (sortByCountIcon.src.includes('descendant.png')) {
        sortByCountIcon.src = '../../library/iconsDashboard/ascendant.png';
        sortByUtilisateurDesc(); // Appel de la fonction de tri descendant pour la colonne Groupe
    } else {
        sortByCountIcon.src = '../../library/iconsDashboard/descendant.png';
        sortByUtilisateurAsc(); // Appel de la fonction de tri ascendant pour la colonne Groupe
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
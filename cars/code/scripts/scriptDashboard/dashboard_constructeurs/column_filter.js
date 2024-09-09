

function sortTableByColumn(table, columnIndex, isNumeric, isAsc) {
    var rowsArray = Array.from(table.rows);
    var header = rowsArray.shift(); // Extraire l'en-tête pour le réinsérer plus tard

    rowsArray.sort(function (a, b) {
        var aText = a.cells[columnIndex].innerText.toLowerCase(); // Convertir en minuscules
        var bText = b.cells[columnIndex].innerText.toLowerCase(); // Convertir en minuscules

        if (isNumeric) {
            aText = parseFloat(aText) || 0;
            bText = parseFloat(bText) || 0;
        }

        if (isAsc) {
            return aText > bText ? 1 : -1;
        } else {
            return aText < bText ? 1 : -1;
        }
    });

    // Reconstruct the table with sorted rows
    table.tBodies[0].innerHTML = ""; // Clear the table body
    table.tBodies[0].appendChild(header); // Append the header back
    rowsArray.forEach(function (row) {
        table.tBodies[0].appendChild(row);
    });
}

document.getElementById('sortByIdIcon').addEventListener('click', function () {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    var isAsc = sortByIdIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 0, true, isAsc);
    sortByIdIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByNameIcon').addEventListener('click', function () {
    var sortByNameIcon = document.getElementById('sortByNameIcon');
    var isAsc = sortByNameIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 1, false, isAsc);
    sortByNameIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByPaysIcon').addEventListener('click', function () {
    var sortByPaysIcon = document.getElementById('sortByPaysIcon');
    var isAsc = sortByPaysIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 2, false, isAsc);
    sortByPaysIcon.src = isAsc ? '../../library/iconsDashboard/descendant.png' : '../../library/iconsDashboard/ascendant.png';
});

document.getElementById('sortByGroupIcon').addEventListener('click', function () {
    var sortByGroupIcon = document.getElementById('sortByGroupIcon');
    var isAsc = sortByGroupIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 3, false, isAsc);
    sortByGroupIcon.src = isAsc ? '../../library/iconsDashboard/descendant.png' : '../../library/iconsDashboard/ascendant.png';
});

document.getElementById('sortByCountIcon').addEventListener('click', function () {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    var isAsc = sortByCountIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 4, true, isAsc);
    sortByCountIcon.src = isAsc ? '../../library/iconsDashboard/descendant.png' : '../../library/iconsDashboard/ascendant.png';
});

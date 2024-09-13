document.getElementById('sortByIdIcon').addEventListener('click', function() {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    var isAsc = sortByIdIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-modeles'), 0, true, isAsc);
    sortByIdIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByNameIcon').addEventListener('click', function() {
    var sortByNameIcon = document.getElementById('sortByNameIcon');
    var isAsc = sortByNameIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-modeles'), 1, false, isAsc);
    sortByNameIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByConstructorIcon').addEventListener('click', function() {
    var sortByConstructorIcon = document.getElementById('sortByConstructorIcon');
    var isAsc = sortByConstructorIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-modeles'), 2, false, isAsc);
    sortByConstructorIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCountIcon').addEventListener('click', function() {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    var isAsc = sortByCountIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-modeles'), 3, true, isAsc);
    sortByCountIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

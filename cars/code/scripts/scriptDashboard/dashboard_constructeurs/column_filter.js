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
    sortByPaysIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByGroupIcon').addEventListener('click', function () {
    var sortByGroupIcon = document.getElementById('sortByGroupIcon');
    var isAsc = sortByGroupIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 3, false, isAsc);
    sortByGroupIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCountIcon').addEventListener('click', function () {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    var isAsc = sortByCountIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-constructeurs'), 4, true, isAsc);
    sortByCountIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

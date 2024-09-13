document.getElementById('sortByIdIcon').addEventListener('click', function () {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    var isAsc = sortByIdIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 0, true, isAsc);
    sortByIdIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByPseudoIcon').addEventListener('click', function () {
    var sortByPseudoIcon = document.getElementById('sortByPseudoIcon');
    var isAsc = sortByPseudoIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 1, false, isAsc);
    sortByPseudoIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByPrenomIcon').addEventListener('click', function () {
    var sortByPrenomIcon = document.getElementById('sortByPrenomIcon');
    var isAsc = sortByPrenomIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 2, false, isAsc);
    sortByPrenomIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByNomIcon').addEventListener('click', function () {
    var sortByNomIcon = document.getElementById('sortByNomIcon');
    var isAsc = sortByNomIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 3, false, isAsc);
    sortByNomIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByMailIcon').addEventListener('click', function () {
    var sortByMailIcon = document.getElementById('sortByMailIcon');
    var isAsc = sortByMailIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 4, false, isAsc);
    sortByMailIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByRoleIcon').addEventListener('click', function () {
    var sortByRoleIcon = document.getElementById('sortByRoleIcon');
    var isAsc = sortByRoleIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 5, false, isAsc);
    sortByRoleIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCountIcon').addEventListener('click', function () {
    var sortByCountIcon = document.getElementById('sortByCountIcon');
    var isAsc = sortByCountIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-utilisateurs'), 6, false, isAsc);
    sortByCountIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByIdIcon').addEventListener('click', function () {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    var isAsc = sortByIdIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 0, true, isAsc);
    sortByIdIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByNameIcon').addEventListener('click', function () {
    var sortByNameIcon = document.getElementById('sortByNameIcon');
    var isAsc = sortByNameIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 1, false, isAsc);
    sortByNameIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByModeleIcon').addEventListener('click', function () {
    var sortByModeleIcon = document.getElementById('sortByModeleIcon');
    var isAsc = sortByModeleIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 2, false, isAsc);
    sortByModeleIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByConstructeurIcon').addEventListener('click', function () {
    var sortByConstructeurIcon = document.getElementById('sortByConstructeurIcon');
    var isAsc = sortByConstructeurIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 3, false, isAsc);
    sortByConstructeurIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByGroupeIcon').addEventListener('click', function () {
    var sortByGroupeIcon = document.getElementById('sortByGroupeIcon');
    var isAsc = sortByGroupeIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 4, false, isAsc);
    sortByGroupeIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByTypeIcon').addEventListener('click', function () {
    var sortByTypeIcon = document.getElementById('sortByTypeIcon');
    var isAsc = sortByTypeIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 5, false, isAsc);
    sortByTypeIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortBySegmentIcon').addEventListener('click', function () {
    var sortBySegmentIcon = document.getElementById('sortBySegmentIcon');
    var isAsc = sortBySegmentIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 6, false, isAsc);
    sortBySegmentIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByAnneeIcon').addEventListener('click', function () {
    var sortByAnneeIcon = document.getElementById('sortByAnneeIcon');
    var isAsc = sortByAnneeIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 7, false, isAsc);
    sortByAnneeIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByAnneeFinIcon').addEventListener('click', function () {
    var sortByAnneeFinIcon = document.getElementById('sortByAnneeFinIcon');
    var isAsc = sortByAnneeFinIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 8, false, isAsc);
    sortByAnneeFinIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByUserIcon').addEventListener('click', function () {
    var sortByUserIcon = document.getElementById('sortByUserIcon');
    var isAsc = sortByUserIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 9, false, isAsc);
    sortByUserIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByDateIcon').addEventListener('click', function () {
    var sortByDateIcon = document.getElementById('sortByDateIcon');
    var isAsc = sortByDateIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-fiches'), 10, true, isAsc);
    sortByDateIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

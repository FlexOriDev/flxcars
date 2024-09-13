document.getElementById('sortByIdIcon').addEventListener('click', function () {
    var sortByIdIcon = document.getElementById('sortByIdIcon');
    var isAsc = sortByIdIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 0, true, isAsc);
    sortByIdIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByFicheIcon').addEventListener('click', function () {
    var sortByFicheIcon = document.getElementById('sortByFicheIcon');
    var isAsc = sortByFicheIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 1, false, isAsc);
    sortByFicheIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByAppellationIcon').addEventListener('click', function () {
    var sortByAppellationIcon = document.getElementById('sortByAppellationIcon');
    var isAsc = sortByAppellationIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 2, false, isAsc);
    sortByAppellationIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCarburantIcon').addEventListener('click', function () {
    var sortByCarburantIcon = document.getElementById('sortByCarburantIcon');
    var isAsc = sortByCarburantIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 3, false, isAsc);
    sortByCarburantIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByConstructionIcon').addEventListener('click', function () {
    var sortByConstructionIcon = document.getElementById('sortByConstructionIcon');
    var isAsc = sortByConstructionIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 4, false, isAsc);
    sortByConstructionIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByMoteurIcon').addEventListener('click', function () {
    var sortByMoteurIcon = document.getElementById('sortByMoteurIcon');
    var isAsc = sortByMoteurIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 5, false, isAsc);
    sortByMoteurIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCylindreetIcon').addEventListener('click', function () {
    var sortByCylindreetIcon = document.getElementById('sortByCylindreetIcon');
    var isAsc = sortByCylindreetIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 6, false, isAsc);
    sortByCylindreetIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByPerformanceIcon').addEventListener('click', function () {
    var sortByPerformanceIcon = document.getElementById('sortByPerformanceIcon');
    var isAsc = sortByPerformanceIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 7, false, isAsc);
    sortByPerformanceIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCoupleFinIcon').addEventListener('click', function () {
    var sortByCoupleFinIcon = document.getElementById('sortByCoupleFinIcon');
    var isAsc = sortByCoupleFinIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 8, false, isAsc);
    sortByCoupleFinIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByZeroToHundredIcon').addEventListener('click', function () {
    var sortByZeroToHundredIcon = document.getElementById('sortByZeroToHundredIcon');
    var isAsc = sortByZeroToHundredIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 9, false, isAsc);
    sortByZeroToHundredIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByVmaxIcon').addEventListener('click', function () {
    var sortByVmaxIcon = document.getElementById('sortByVmaxIcon');
    var isAsc = sortByVmaxIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 10, true, isAsc);
    sortByVmaxIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByConsommationIcon').addEventListener('click', function () {
    var sortByConsommationIcon = document.getElementById('sortByConsommationIcon');
    var isAsc = sortByConsommationIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 11, true, isAsc);
    sortByConsommationIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByCarrosserieIcon').addEventListener('click', function () {
    var sortByCarrosserieIcon = document.getElementById('sortByCarrosserieIcon');
    var isAsc = sortByCarrosserieIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 12, true, isAsc);
    sortByCarrosserieIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});

document.getElementById('sortByMarcheIcon').addEventListener('click', function () {
    var sortByMarcheIcon = document.getElementById('sortByMarcheIcon');
    var isAsc = sortByMarcheIcon.src.includes('ascendant.png');
    sortTableByColumn(document.querySelector('.dashboard-table-versions'), 13, true, isAsc);
    sortByMarcheIcon.src = isAsc ? iconsDashboardDescendant : iconsDashboardAscendant;
});
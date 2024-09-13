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
$(document).ready(function() {
    var initialRowCount = $('#table_body tr').length; // Nombre initial de lignes

    // Supprimer une ligne du tableau
    $(document).on('click', 'button[name="remove"]', function() {
        $(this).closest('tr').remove();
        initialRowCount--; // Mettre à jour le nombre de lignes
    });

    // Ajouter une nouvelle ligne au tableau
    $('#add').click(function() {
        var html = '<tr>';
        html += '<td><input type="text" name="appellation[]" class="form-control" /></td>';
        html += '<td><select name="carburant[]" class="form-control"><option value="essence">Essence</option><option value="diesel">Diesel</option><option value="electrique">Électrique</option><option value="hydrogene">Hydrogène</option></select></td>';
        html += '<td><input type="text" name="construction[]" class="form-control" /></td>';
        html += '<td><input type="text" name="moteur[]" class="form-control" /></td>';
        html += '<td><input type="text" name="cylindree[]" class="form-control" /></td>';
        html += '<td><input type="text" name="performance[]" class="form-control" /></td>';
        html += '<td><input type="text" name="couple[]" class="form-control" /></td>';
        html += '<td><input type="text" name="zero_to_hundred[]" class="form-control" /></td>';
        html += '<td><input type="text" name="vitesse_max[]" class="form-control" /></td>';
        html += '<td><input type="text" name="consommation[]" class="form-control" /></td>';
        html += '<td><input type="text" name="carrosserie[]" class="form-control" /></td>';
        html += '<td><select name="marche[]" class="form-control"><option value="Europe">Europe</option><option value="Asie">Asie</option><option value="Amérique du Nord">Amérique du Nord</option><option value="Amérique du Sud">Amérique du Sud</option><option value="Afrique">Afrique</option><option value="Océanie">Océanie</option></select></td>';
        // Ajoutez le reste des cellules de la ligne ici
        html += '<td class="center-button"><button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button></td>';
        html += '</tr>';
        $('#table_body').append(html);
        initialRowCount++; // Mettre à jour le nombre de lignes
    });
});

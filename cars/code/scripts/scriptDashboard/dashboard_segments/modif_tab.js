document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.editable').forEach(cell => {
        let initialValue;

        cell.addEventListener('focus', function() {
            // Sauvegarde la valeur initiale pour vérifier les changements
            initialValue = this.innerText;
        });

        cell.addEventListener('blur', function() {
            updateCell(this);
        });

        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Empêche l'insertion d'un saut de ligne
                this.blur(); // Déclenche le blur pour enregistrer les modifications
            }
        });

        function updateCell(cell) {
            const newValue = cell.innerText.trim();
            if (newValue === initialValue) return; // Ne rien faire si pas de changement

            const row = cell.closest('tr');
            const id = row.dataset.id;
            const column = cell.dataset.column;

            console.log('Updating:', {id, column, newValue}); // Debugging line

            fetch('pageDashboardSegments.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id: id,
                    column: column,
                    value: newValue
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Server response:', data); // Debugging line
                    if(data.success) {
                        console.log('Mise à jour réussie');
                    } else {
                        console.error('Erreur de mise à jour:', data.message);
                    }
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
});

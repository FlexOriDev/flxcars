document.addEventListener('click', function(event) {
    var sideMenu = document.getElementById("sideMenu");
    var targetElement = event.target;

    // Vérifier si le clic n'est pas dans le menu ou son bouton d'ouverture
    if (sideMenuState && !sideMenu.contains(targetElement) && targetElement.id !== 'toggleButton') {
        // Cacher le menu s'il est ouvert et que le clic est en dehors du menu et du bouton d'ouverture
        toggleSideMenu();
    }
});

var sideMenuState = false;

function toggleSideMenu(){
    sideMenuState = !sideMenuState;
    if (sideMenuState) {
        showSideMenu()
    }else {
        hideSideMenu()
    }
}

function showSideMenu() {
    var sideMenu = document.getElementById("sideMenu");
    sideMenu.style.display = "block";


    // Utiliser setTimeout pour ajouter la classe 'show' après un court délai
    setTimeout(function() {
        sideMenu.classList.add('show'); // Ajouter la classe 'show' pour déclencher l'animation
    }, 10); // Attendre 10 millisecondes avant d'ajouter la classe
}

function hideSideMenu() {
    var sideMenu = document.getElementById("sideMenu");
    sideMenu.classList.remove('show'); // Supprimer la classe 'show' pour déclencher l'animation de sortie

    // Supprimer le menu après que l'animation soit terminée
    setTimeout(function() {
        sideMenu.style.display = "none";
    }, 300); // Attendre 300 millisecondes (durée de l'animation) avant de cacher le menu

}


// Variables pour suivre l'état des listes déroulantes
var constructeurDropdownOpen = false;
var typeDropdownOpen = false;
var modeleDropdownOpen = false;
var segmentDropdownOpen = false;
var anneeDropdownOpen = false;

function countCheckedCheckboxes(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    var checkboxes = dropdown.querySelectorAll('.input-checkbox-filtres:checked');
    return checkboxes.length;
}


function toggleConstructeurDropdown() {
    var constructeurDropdown = document.getElementById("constructeurDropdown");
    var searchConstructeurInput = document.getElementById("searchConstructeur");
    var constructeurOtherElements = document.querySelectorAll('.move-down-constructeur'); // Éléments à déplacer



    // Mettre à jour l'état de la liste déroulante
    constructeurDropdownOpen = !constructeurDropdownOpen;

    if (constructeurDropdownOpen) {
        // Fermer la liste Type si elle est ouverte
        if (typeDropdownOpen) {
            toggleTypeDropdown();
            typeDropdownOpen = false;
        }
        if (modeleDropdownOpen) {
            toggleModeleDropdown();
            modeleDropdownOpen = false;
        }
        if (segmentDropdownOpen) {
            toggleSegmentDropdown();
            segmentDropdownOpen = false;
        }
        if (anneeDropdownOpen) {
            toggleAnneeDropdown();
            anneeDropdownOpen = false;
        }
        // Ouvrir la liste Constructeur
        constructeurDropdown.style.display = "block";
        searchConstructeurInput.style.display = "block";
        searchConstructeurInput.focus();
        constructeurOtherElements.forEach(function(element) {
            element.classList.add('open');
            element.style.transform = "translateY(" + constructeurDropdown.clientHeight + "px)"; // Déplacer vers le bas
        });


    } else {
        // Fermer la liste Constructeur
        constructeurDropdown.style.display = "none";
        searchConstructeurInput.style.display = "none";
        constructeurOtherElements.forEach(function(element) {
            element.classList.remove('open');
            element.style.transform = "none"; // Réinitialiser la position
        });
    }
}



function toggleTypeDropdown() {
    var typeDropdown = document.getElementById("typeDropdown");
    var searchTypeInput = document.getElementById("searchType");
    var typeOtherElements = document.querySelectorAll('.move-down-type'); // Éléments à déplacer

    // Mettre à jour l'état de la liste déroulante
    typeDropdownOpen = !typeDropdownOpen;

    if (typeDropdownOpen) {
        // Fermer la liste Constructeur si elle est ouverte
        if (constructeurDropdownOpen) {
            toggleConstructeurDropdown();
            constructeurDropdownOpen = false;
        }

        // Réinitialiser la position des autres éléments de modèle si la liste Modèle est ouverte
        if (modeleDropdownOpen) {
            toggleModeleDropdown();
            modeleDropdownOpen = false;
        }
        if (segmentDropdownOpen) {
            toggleSegmentDropdown();
            segmentDropdownOpen = false;
        }
        if (anneeDropdownOpen) {
            toggleAnneeDropdown();
            anneeDropdownOpen = false;
        }
        // Ouvrir la liste Type
        typeDropdown.style.display = "block";
        searchTypeInput.style.display = "block";
        searchTypeInput.focus();
        typeOtherElements.forEach(function(element) {
            element.classList.add('open');
            element.style.transform = "translateY(" + typeDropdown.clientHeight + "px)"; // Déplacer vers le bas
        });


    } else {
        // Fermer la liste Type
        typeDropdown.style.display = "none";
        searchTypeInput.style.display = "none";
        typeOtherElements.forEach(function(element) {
            element.classList.remove('open');
            element.style.transform = "none"; // Réinitialiser la position
        });
    }
}



function toggleModeleDropdown() {
    var modeleDropdown = document.getElementById("modeleDropdown");
    var searchModeleInput = document.getElementById("searchModele");
    var modeleOtherElements = document.querySelectorAll('.move-down-modele'); // Éléments à déplacer

    // Mettre à jour l'état de la liste déroulante
    modeleDropdownOpen = !modeleDropdownOpen;

    if (modeleDropdownOpen) {
        // Fermer la liste Constructeur si elle est ouverte
        if (constructeurDropdownOpen) {
            toggleConstructeurDropdown();
            constructeurDropdownOpen = false;
        }

        // Fermer la liste Type si elle est ouverte
        if (typeDropdownOpen) {
            toggleTypeDropdown();
            typeDropdownOpen = false;
        }
        if (segmentDropdownOpen) {
            toggleSegmentDropdown();
            segmentDropdownOpen = false;
        }
        if (anneeDropdownOpen) {
            toggleAnneeDropdown();
            anneeDropdownOpen = false;
        }
        // Ouvrir la liste Modèle
        modeleDropdown.style.display = "block";
        searchModeleInput.style.display = "block";
        searchModeleInput.focus();
        modeleOtherElements.forEach(function(element) {
            element.classList.add('open');
            element.style.transform = "translateY(" + modeleDropdown.clientHeight + "px)"; // Déplacer vers le bas
        });


    } else {
        // Fermer la liste Modèle
        modeleDropdown.style.display = "none";
        searchModeleInput.style.display = "none";
        modeleOtherElements.forEach(function(element) {
            element.classList.remove('open');
            element.style.transform = "none"; // Réinitialiser la position
        });
    }
}

function toggleSegmentDropdown() {
    var segmentDropdown = document.getElementById("segmentDropdown");
    var searchSegmentInput = document.getElementById("searchSegment");
    var segmentOtherElements = document.querySelectorAll('.move-down-segment'); // Éléments à déplacer

    // Mettre à jour l'état de la liste déroulante
    segmentDropdownOpen = !segmentDropdownOpen;

    if (segmentDropdownOpen) {
        // Fermer la liste Constructeur si elle est ouverte
        if (constructeurDropdownOpen) {
            toggleConstructeurDropdown();
            constructeurDropdownOpen = false;
        }
        // Fermer la liste Type si elle est ouverte
        if (typeDropdownOpen) {
            toggleTypeDropdown();
            typeDropdownOpen = false;
        }
        if (modeleDropdownOpen) {
            toggleModeleDropdown();
            modeleDropdownOpen = false;
        }
        if (anneeDropdownOpen) {
            toggleAnneeDropdown();
            anneeDropdownOpen = false;
        }
        // Ouvrir la liste Modèle
        segmentDropdown.style.display = "block";
        searchSegmentInput.style.display = "block";
        searchSegmentInput.focus();
        segmentOtherElements.forEach(function(element) {
            element.classList.add('open');
            element.style.transform = "translateY(" + segmentDropdown.clientHeight + "px)"; // Déplacer vers le bas
        });


    } else {
        // Fermer la liste Modèle
        segmentDropdown.style.display = "none";
        searchSegmentInput.style.display = "none";
        segmentOtherElements.forEach(function(element) {
            element.classList.remove('open');
            element.style.transform = "none"; // Réinitialiser la position
        });
    }
}

function toggleAnneeDropdown() {
    var anneeDropdown = document.getElementById("anneeDropdown");
    var searchAnneeInput = document.getElementById("searchAnnee");
    var anneeOtherElements = document.querySelectorAll('.move-down-annee'); // Éléments à déplacer

    // Mettre à jour l'état de la liste déroulante
    anneeDropdownOpen = !anneeDropdownOpen;

    if (anneeDropdownOpen) {
        // Fermer la liste Constructeur si elle est ouverte
        if (constructeurDropdownOpen) {
            toggleConstructeurDropdown();
            constructeurDropdownOpen = false;
        }
        // Fermer la liste Type si elle est ouverte
        if (typeDropdownOpen) {
            toggleTypeDropdown();
            typeDropdownOpen = false;
        }
        if (modeleDropdownOpen) {
            toggleModeleDropdown();
            modeleDropdownOpen = false;
        }
        if (segmentDropdownOpen) {
            toggleSegmentDropdown();
            segmentDropdownOpen = false;
        }
        // Ouvrir la liste Modèle
        anneeDropdown.style.display = "block";
        searchAnneeInput.style.display = "block";
        searchAnneeInput.focus();
        anneeOtherElements.forEach(function(element) {
            element.classList.add('open');
            element.style.transform = "translateY(" + anneeDropdown.clientHeight + "px)"; // Déplacer vers le bas
        });


    } else {
        // Fermer la liste Modèle
        anneeDropdown.style.display = "none";
        searchAnneeInput.style.display = "none";
        anneeOtherElements.forEach(function(element) {
            element.classList.remove('open');
            element.style.transform = "none"; // Réinitialiser la position
        });
    }
}

function updateDropdownButtonText(selectedIDs, dropdownName) {
    var dropdownButton = document.querySelector('.dropdown-btn-' + dropdownName.toLowerCase());
    var selectedCount = selectedIDs.length;
    var buttonText = selectedCount > 0 ? dropdownName + " +" + selectedCount : dropdownName;
    dropdownButton.textContent = buttonText;
}



// Fonction pour appliquer les filtres (à implémenter selon vos besoins)
function applyFilters() {
    // Récupérer les IDs sélectionnés
    var selectedConstructeurs = getSelectedIDs('constructeurDropdown');
    var selectedTypes = getSelectedIDs('typeDropdown');
    var selectedModeles = getSelectedIDs('modeleDropdown');
    var selectedSegments = getSelectedIDs('segmentDropdown');
    var selectedAnnees = getSelectedIDs('anneeDropdown');
    // Mettre à jour le texte du bouton pour chaque liste déroulante

    // Construire l'URL avec les IDs sélectionnés
    var url = './voitures2.php?';
    if (selectedConstructeurs.length > 0) {
        url += 'id_constructeur=' + selectedConstructeurs.join(',') + '&';
    }
    if (selectedTypes.length > 0) {
        url += 'id_type=' + selectedTypes.join(',') + '&';
    }
    if (selectedModeles.length > 0) {
        url += 'id_modele=' + selectedModeles.join(',') + '&';
    }
    if (selectedSegments.length > 0) {
        url += 'id_segment=' + selectedSegments.join(',') + '&';
    }
    if (selectedAnnees.length > 0) {
        url += 'id_annee=' + selectedAnnees.join(',') + '&';
    }

    // Rediriger vers l'URL construite
    window.location.href = url;

    // Stocker les IDs sélectionnés dans des variables globales pour une utilisation ultérieure
    selectedConstructeursGlobal = selectedConstructeurs;
    selectedTypesGlobal = selectedTypes;
    selectedModelesGlobal = selectedModeles;
    selectedSegmentsGlobal = selectedSegments;
    selectedAnneesGlobal = selectedAnnees;
}

// Fonction pour extraire les paramètres d'URL
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// Fonction pour re-cocher les cases après le chargement de la page
window.onload = function() {
    var constructeurIDs = getParameterByName('id_constructeur');
    var typeIDs = getParameterByName('id_type');
    var modeleIDs = getParameterByName('id_modele');
    var segmentIDs = getParameterByName('id_segment');
    var anneeIDs = getParameterByName('id_annee');

    if (constructeurIDs) {
        constructeurIDs.split(',').forEach(function(id) {
            document.querySelector('#constructeurDropdown input[value="' + id + '"]').checked = true;
        });
    }
    if (typeIDs) {
        typeIDs.split(',').forEach(function(id) {
            document.querySelector('#typeDropdown input[value="' + id + '"]').checked = true;
        });
    }
    if (modeleIDs) {
        modeleIDs.split(',').forEach(function(id) {
            document.querySelector('#modeleDropdown input[value="' + id + '"]').checked = true;
        });
    }
    if (segmentIDs) {
        segmentIDs.split(',').forEach(function(id) {
            document.querySelector('#segmentDropdown input[value="' + id + '"]').checked = true;
        });
    }
    if (anneeIDs) {
        anneeIDs.split(',').forEach(function(id) {
            document.querySelector('#anneeDropdown input[value="' + id + '"]').checked = true;
        });
    }

    // Répéter le processus pour les autres listes déroulantes...
};


function getSelectedIDs(dropdownId) {
    var dropdown = document.getElementById(dropdownId);
    var selectedIDs = [];
    var checkboxes = dropdown.querySelectorAll('.input-checkbox-filtres:checked');
    checkboxes.forEach(function(checkbox) {
        selectedIDs.push(checkbox.value);
    });
    return selectedIDs;
}

// Fonction pour filtrer les constructeurs en fonction de la recherche
function filterConstructeurs() {
    // Récupérer la valeur saisie dans le champ de recherche
    var input = document.getElementById('searchConstructeur');
    var filter = input.value.toUpperCase();

    // Récupérer tous les labels (options) dans la liste déroulante des constructeurs
    var labels = document.querySelectorAll('#constructeurDropdown .checkbox-label');

    // Parcourir chaque label pour afficher ou masquer en fonction du filtre de recherche
    labels.forEach(function(label) {
        var constructeurName = label.textContent || label.innerText;
        if (constructeurName.toUpperCase().indexOf(filter) > -1) {
            label.style.display = ''; // Afficher l'option si elle correspond au filtre
        } else {
            label.style.display = 'none'; // Masquer l'option sinon
        }
    });
}
function filterTypes() {
    // Récupérer la valeur saisie dans le champ de recherche
    var input = document.getElementById('searchType');
    var filter = input.value.toUpperCase();

    // Récupérer tous les labels (options) dans la liste déroulante des constructeurs
    var labels = document.querySelectorAll('#typeDropdown .checkbox-label');

    // Parcourir chaque label pour afficher ou masquer en fonction du filtre de recherche
    labels.forEach(function(label) {
        var typeName = label.textContent || label.innerText;
        if (typeName.toUpperCase().indexOf(filter) > -1) {
            label.style.display = ''; // Afficher l'option si elle correspond au filtre
        } else {
            label.style.display = 'none'; // Masquer l'option sinon
        }
    });
}
function filterModeles() {
    // Récupérer la valeur saisie dans le champ de recherche
    var input = document.getElementById('searchModele');
    var filter = input.value.toUpperCase();

    // Récupérer tous les labels (options) dans la liste déroulante des constructeurs
    var labels = document.querySelectorAll('#modeleDropdown .checkbox-label');

    // Parcourir chaque label pour afficher ou masquer en fonction du filtre de recherche
    labels.forEach(function(label) {
        var modeleName = label.textContent || label.innerText;
        if (modeleName.toUpperCase().indexOf(filter) > -1) {
            label.style.display = ''; // Afficher l'option si elle correspond au filtre
        } else {
            label.style.display = 'none'; // Masquer l'option sinon
        }
    });
}
function filterSegments() {
    // Récupérer la valeur saisie dans le champ de recherche
    var input = document.getElementById('searchSegment');
    var filter = input.value.toUpperCase();

    // Récupérer tous les labels (options) dans la liste déroulante des constructeurs
    var labels = document.querySelectorAll('#segmentDropdown .checkbox-label');

    // Parcourir chaque label pour afficher ou masquer en fonction du filtre de recherche
    labels.forEach(function(label) {
        var segmentName = label.textContent || label.innerText;
        if (segmentName.toUpperCase().indexOf(filter) > -1) {
            label.style.display = ''; // Afficher l'option si elle correspond au filtre
        } else {
            label.style.display = 'none'; // Masquer l'option sinon
        }
    });
}
function filterAnnees() {
    // Récupérer la valeur saisie dans le champ de recherche
    var input = document.getElementById('searchAnnee');
    var filter = input.value.toUpperCase();

    // Récupérer tous les labels (options) dans la liste déroulante des constructeurs
    var labels = document.querySelectorAll('#anneeDropdown .checkbox-label');

    // Parcourir chaque label pour afficher ou masquer en fonction du filtre de recherche
    labels.forEach(function(label) {
        var anneeName = label.textContent || label.innerText;
        if (anneeName.toUpperCase().indexOf(filter) > -1) {
            label.style.display = ''; // Afficher l'option si elle correspond au filtre
        } else {
            label.style.display = 'none'; // Masquer l'option sinon
        }
    });
}


document.addEventListener('click', function(event) {

    var selectedCountConstructeur = countCheckedCheckboxes('constructeurDropdown');
    var buttonTextConstructeur = selectedCountConstructeur > 0 ? "Constructeurs <span class='counter'>+" + selectedCountConstructeur + "</span>" : "Constructeurs";
    document.querySelector('.dropdown-btn-constructeur').innerHTML = buttonTextConstructeur;

    var selectedCountType = countCheckedCheckboxes('typeDropdown');
    var buttonTextType = selectedCountType > 0 ? "Types <span class='counter'>+" + selectedCountType + "</span>" : "Types";
    document.querySelector('.dropdown-btn-type').innerHTML = buttonTextType;

    var selectedCountModele = countCheckedCheckboxes('modeleDropdown');
    var buttonTextModele = selectedCountModele > 0 ? "Modèles <span class='counter'>+" + selectedCountModele + "</span>" : "Modèles";
    document.querySelector('.dropdown-btn-modele').innerHTML = buttonTextModele;

    var selectedCountSegment = countCheckedCheckboxes('segmentDropdown');
    var buttonTextSegment = selectedCountSegment > 0 ? "Segments <span class='counter'>+" + selectedCountSegment + "</span>" : "Segments";
    document.querySelector('.dropdown-btn-segment').innerHTML = buttonTextSegment;

    var selectedCountAnnee = countCheckedCheckboxes('anneeDropdown');
    var buttonTextAnnee = selectedCountAnnee > 0 ? "Années <span class='counter'>+" + selectedCountAnnee + "</span>" : "Années";
    document.querySelector('.dropdown-btn-annee').innerHTML = buttonTextAnnee;



    // Fermer les listes déroulantes si un clic se produit en dehors des zones des boutons ou des listes
    var constructeurButton = event.target.closest('.dropdown-btn-constructeur');
    var typeButton = event.target.closest('.dropdown-btn-type');
    var modeleButton = event.target.closest('.dropdown-btn-modele');
    var segmentButton = event.target.closest('.dropdown-btn-segment');
    var anneeButton = event.target.closest('.dropdown-btn-annee');

    var constructeurDropdown = document.getElementById("constructeurDropdown");
    var typeDropdown = document.getElementById("typeDropdown");
    var modeleDropdown = document.getElementById("modeleDropdown");
    var segmentDropdown = document.getElementById("segmentDropdown");
    var anneeDropdown = document.getElementById("anneeDropdown");

    var searchConstructeur = document.getElementById("searchConstructeur");
    var searchType = document.getElementById("searchType");
    var searchModele = document.getElementById("searchModele");
    var searchSegment = document.getElementById("searchSegment");
    var searchAnnee = document.getElementById("searchAnnee");

    if (!constructeurButton && !constructeurDropdown.contains(event.target) && constructeurDropdownOpen && !searchConstructeur.contains(event.target)) {
        // Clic en dehors du bouton Constructeur et de la liste Constructeur ouverte
        toggleConstructeurDropdown(); // Fermer la liste Constructeur
        constructeurDropdownOpen = false;
    }

    if (!typeButton && !typeDropdown.contains(event.target) && typeDropdownOpen && !searchType.contains(event.target)) {
        // Clic en dehors du bouton Type et de la liste Type ouverte
        toggleTypeDropdown(); // Fermer la liste Type
        typeDropdownOpen = false;
    }

    if (!modeleButton && !modeleDropdown.contains(event.target) && modeleDropdownOpen && !searchModele.contains(event.target)) {
        // Clic en dehors du bouton Modèle et de la liste Modèle ouverte
        toggleModeleDropdown(); // Fermer la liste Modèle
        modeleDropdownOpen = false;
    }

    if (!segmentButton && !segmentDropdown.contains(event.target) && segmentDropdownOpen && !searchSegment.contains(event.target)) {
        // Clic en dehors du bouton Modèle et de la liste Modèle ouverte
        toggleSegmentDropdown(); // Fermer la liste Modèle
        segmentDropdownOpen = false;
    }

    if (!anneeButton && !anneeDropdown.contains(event.target) && anneeDropdownOpen && !searchAnnee.contains(event.target)) {
        // Clic en dehors du bouton Modèle et de la liste Modèle ouverte
        toggleAnneeDropdown(); // Fermer la liste Modèle
        anneeDropdownOpen = false;
    }



    // Réinitialiser le positionnement des autres éléments si aucune liste n'est ouverte
    if (!constructeurDropdownOpen && !typeDropdownOpen && !modeleDropdownOpen && !segmentDropdownOpen && !anneeDropdownOpen) {
        var allMoveDownElements = document.querySelectorAll('.move-down-annee, .move-down-constructeur, .move-down-type, .move-down-modele, .move-down-segment');
        allMoveDownElements.forEach(function(element) {
            element.style.transform = "none"; // Réinitialiser le positionnement
        });
    }
});

// Ajoute un écouteur d'événements au bouton de suppression des filtres
document.getElementById("clearFiltersButton").addEventListener("click", function(event) {
    // Supprimer tous les paramètres de l'URL
    window.history.replaceState({}, document.title, window.location.pathname);

    // Cacher le bouton de suppression des filtres
    this.style.display = "none";

    // Réinitialiser les compteurs de filtres à zéro
    resetFilterCounters();

    // Décocher toutes les cases des filtres
    uncheckAllCheckboxes();
    window.location.reload();
});

// Fonction pour réinitialiser les compteurs de filtres à zéro
function resetFilterCounters() {
    document.querySelector('.dropdown-btn-constructeur').innerHTML = "Constructeurs";
    document.querySelector('.dropdown-btn-type').innerHTML = "Types";
    document.querySelector('.dropdown-btn-modele').innerHTML = "Modèles";
    document.querySelector('.dropdown-btn-segment').innerHTML = "Segments";
    document.querySelector('.dropdown-btn-annee').innerHTML = "Années";
}

// Fonction pour décocher toutes les cases des filtres
function uncheckAllCheckboxes() {
    var checkboxes = document.querySelectorAll('.input-checkbox-filtres:checked');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
}


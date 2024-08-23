let galleryImages = [];
let imageCounter = 1;  // Compteur pour suivre le nombre d'images ajoutées

// Fonction pour ouvrir le sélecteur de fichiers
function openFileSelector() {
    // Crée un nouvel input de fichier de manière dynamique
    const newFileInput = document.createElement('input');
    newFileInput.type = 'file';
    newFileInput.name = 'image' + imageCounter;  // Nom unique pour chaque image
    newFileInput.style.display = 'none';
    newFileInput.accept = 'image/*';
    newFileInput.dataset.imageId = imageCounter;  // Associe un ID à l'image

    // Ajoute le nouvel input dans le DOM
    document.getElementById('fileInputsContainer').appendChild(newFileInput);

    // Attacher l'événement onchange directement à cet input dynamique
    newFileInput.addEventListener('change', function() {
        handleFileUpload(this);
    });

    // Ouvre le sélecteur de fichiers
    newFileInput.click();

    // Incrémente le compteur pour le prochain input
    imageCounter++;
}

// Fonction appelée lorsqu'un fichier est sélectionné
function handleFileUpload(inputElement) {
    if (inputElement && inputElement.files.length > 0) {
        const file = inputElement.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageUrl = e.target.result;
                // Ajouter l'image à la galerie et définir comme image principale
                addToGallery(imageUrl, inputElement.dataset.imageId, true);
            };
            reader.readAsDataURL(file);
        }
    }
}

// Fonction pour ajouter une image à la galerie
function addToGallery(imageUrl, imageId, setAsMain) {
    const galleryContainer = document.getElementById('galleryContainer');

    // Créer un conteneur pour la miniature
    const thumbnailContainer = document.createElement('div');
    thumbnailContainer.className = 'thumbnail-container';
    thumbnailContainer.dataset.imageId = imageId;  // Associe le conteneur à l'ID de l'image

    // Créer l'image miniature
    const imgElement = document.createElement('img');
    imgElement.src = imageUrl;
    imgElement.alt = 'Gallery Image';
    imgElement.onclick = function() {
        document.getElementById('centralImage').src = imageUrl;
    };

    // Créer le bouton de suppression
    const removeBtn = document.createElement('button');
    removeBtn.className = 'remove-btn';
    removeBtn.innerHTML = '&times;';
    removeBtn.onclick = function() {
        removeImage(thumbnailContainer, imageUrl, imageId);
    };

    // Ajouter l'image et le bouton au conteneur de la miniature
    thumbnailContainer.appendChild(imgElement);
    thumbnailContainer.appendChild(removeBtn);

    // Ajouter le conteneur de la miniature à la galerie
    galleryContainer.appendChild(thumbnailContainer);

    // Ajouter l'URL de l'image au tableau
    galleryImages.push({ url: imageUrl, id: imageId });

    // Définir l'image principale si nécessaire
    if (setAsMain) {
        document.getElementById('centralImage').src = imageUrl;
    }

    // Convertir le tableau en JSON et mettre à jour le champ caché
    updateGalleryImagesInput();
}

// Fonction pour supprimer une image de la galerie
function removeImage(thumbnailContainer, imageUrl, imageId) {
    const galleryContainer = document.getElementById('galleryContainer');
    // Retirer l'image du tableau des images
    galleryImages = galleryImages.filter(image => image.id !== imageId);

    // Ajouter l'image ID supprimée dans un champ caché pour la synchronisation côté serveur
    const deletedImagesInput = document.getElementById('deletedImagesInput');
    const deletedImages = JSON.parse(deletedImagesInput.value || '[]');
    deletedImages.push(imageId);
    deletedImagesInput.value = JSON.stringify(deletedImages);

    // Supprimer l'input correspondant
    const inputToRemove = document.querySelector(`#fileInputsContainer input[data-image-id='${imageId}']`);
    if (inputToRemove) {
        inputToRemove.remove();
    }

    // Retirer le conteneur de la miniature de la galerie
    galleryContainer.removeChild(thumbnailContainer);

    // Si l'image centrale est celle qui a été supprimée, réinitialiser l'image centrale
    const centralImage = document.getElementById('centralImage');
    if (centralImage.src === imageUrl) {
        centralImage.src = '../../library/imgFioritures/upload_icon.png'; // Image par défaut
        // Si possible, définir la première image restante comme centrale
        if (galleryImages.length > 0) {
            document.getElementById('centralImage').src = galleryImages[0].url;
        }
    }

    // Convertir le tableau en JSON et mettre à jour le champ caché
    updateGalleryImagesInput();
}



// Fonction pour mettre à jour le champ caché avec les URLs des images restantes
function updateGalleryImagesInput() {
    const galleryImagesJson = JSON.stringify(galleryImages.map(image => image.url));
    document.getElementById('galleryImagesInput').value = galleryImagesJson;
}


// Fonction pour soumettre le formulaire
function submitForm() {
    // Convertir galleryImages en JSON et mettre à jour le champ caché
    updateGalleryImagesInput();
    // Soumettre le formulaire
    document.querySelector('form').submit();
}

// Ajouter un gestionnaire d'événements pour la soumission du formulaire
document.querySelector('input[name="validate"]').addEventListener('click', function(event) {
    event.preventDefault(); // Empêcher la soumission normale du formulaire
    submitForm(); // Soumettre le formulaire après avoir mis à jour les champs cachés
});

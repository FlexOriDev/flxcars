let galleryImages = [];
// Utiliser DOMContentLoaded comme alternative
if (typeof existingImages !== 'undefined' && existingImages.length > 0) {

    // Ajouter toutes les images à la galerie
    existingImages.forEach((image, index) => {
        // Définir la première image comme principale
        const setAsMain = index === 0;
        addToGallery(image.url, image.id, setAsMain);
    });
} else {
    console.error("existingImages is undefined or empty");
}


let imageCounter = galleryImages.length > 0 ? galleryImages.length + 1 : 1;
console.log("counter = " + imageCounter);

// Fonction pour ouvrir le sélecteur de fichiers
function openFileSelector() {
    const newFileInput = document.createElement('input');
    newFileInput.type = 'file';
    newFileInput.name = 'image' + imageCounter;
    newFileInput.style.display = 'none';
    newFileInput.accept = 'image/*';
    newFileInput.dataset.imageId = imageCounter;

    document.getElementById('fileInputsContainer').appendChild(newFileInput);

    newFileInput.addEventListener('change', function() {
        handleFileUpload(this);
    });

    newFileInput.click();
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
                addToGallery(imageUrl, inputElement.dataset.imageId, true);
            };
            reader.readAsDataURL(file);
        }
    }
}

// Fonction pour ajouter une image à la galerie
function addToGallery(imageUrl, imageId, setAsMain) {

    const galleryContainer = document.getElementById('galleryContainer');

    const thumbnailContainer = document.createElement('div');
    thumbnailContainer.className = 'thumbnail-container';
    thumbnailContainer.dataset.imageId = imageId;

    const imgElement = document.createElement('img');
    imgElement.src = imageUrl;
    imgElement.alt = 'Gallery Image';
    imgElement.onclick = function() {
        document.getElementById('centralImage').src = imageUrl;
    };

    const removeBtn = document.createElement('button');
    removeBtn.className = 'remove-btn';
    removeBtn.innerHTML = '&times;';
    removeBtn.onclick = function() {
        removeImage(thumbnailContainer, imageUrl, imageId);
    };

    thumbnailContainer.appendChild(imgElement);
    thumbnailContainer.appendChild(removeBtn);

    galleryContainer.appendChild(thumbnailContainer);

    galleryImages.push({ url: imageUrl, id: imageId });

    if (setAsMain) {
        document.getElementById('centralImage').src = imageUrl;
    }

    updateGalleryImagesInput();
}

// Fonction pour supprimer une image de la galerie
function removeImage(thumbnailContainer, imageUrl, imageId) {
    const galleryContainer = document.getElementById('galleryContainer');
    galleryImages = galleryImages.filter(image => image.id !== imageId);

    const deletedImagesInput = document.getElementById('deletedImagesInput');
    const deletedImages = JSON.parse(deletedImagesInput.value || '[]');
    deletedImages.push(imageId);
    deletedImagesInput.value = JSON.stringify(deletedImages);

    const inputToRemove = document.querySelector(`#fileInputsContainer input[data-image-id='${imageId}']`);
    if (inputToRemove) {
        inputToRemove.remove();
    }

    galleryContainer.removeChild(thumbnailContainer);



    // Si l'image centrale est celle qui a été supprimée, réinitialiser l'image centrale
    const centralImage = document.getElementById('centralImage');



    var imageGallerie = imageUrl;

    var urlComplete = window.location.href;

    var pattern = "/code/";
    var pattern2 = "../../";

    // Trouve l'index du motif
    var index = urlComplete.indexOf(pattern);
    var index2 = imageGallerie.indexOf(pattern2);

    // Si le motif est trouvé, on garde la partie de l'URL jusqu'à ce motif (non inclus)
    if (index !== -1 && index2 !== -1) {
        var baseUrl = urlComplete.substring(0, index);
        var reste = imageGallerie.substring(5, imageGallerie.length);
        imageUrlReal = baseUrl+reste;
        console.log('RATIO : '+ imageUrlReal);
        console.log('RATIO2 : '+ centralImage.src);
        if (centralImage.src === imageUrlReal) {
            centralImage.src = '../../library/imgFioritures/upload_icon.png'; // Image par défaut
            // Si possible, définir la première image restante comme centrale
            if (galleryImages.length > 0) {
                document.getElementById('centralImage').src = galleryImages[0].url;
            }
        }
    } else {
        console.log("Motif non trouvé dans l'URL.");
    }

    updateGalleryImagesInput();
}

// Fonction pour mettre à jour le champ caché avec les URLs des images restantes
function updateGalleryImagesInput() {
    const galleryImagesJson = JSON.stringify(galleryImages.map(image => image.url));
    document.getElementById('galleryImagesInput').value = galleryImagesJson;
}

// Fonction pour soumettre le formulaire
function submitForm() {
    updateGalleryImagesInput();
    document.querySelector('form').submit();
}

// Ajouter un gestionnaire d'événements pour la soumission du formulaire
document.querySelector('input[name="validate"]').addEventListener('click', function(event) {
    event.preventDefault();
    submitForm();
});



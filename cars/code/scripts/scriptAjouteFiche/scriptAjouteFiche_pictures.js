let slideIndex = 0;
let imagePaths = ['', '', '', '', '', '']; // Stockage des chemins d'accès des images

// Fonction pour vérifier si la miniature est vide
function checkEmptyThumbnail(imageIndex) {
    const thumbnailElement = document.getElementById(`thumbnail${imageIndex}`);
    if (thumbnailElement && !thumbnailElement.querySelector('img')) {
        thumbnailElement.innerHTML = `<img src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />`;
    }
}

// Appeler la fonction pour chaque miniature au chargement de la page
window.onload = function() {
    for (let i = 1; i <= 6; i++) {
        checkEmptyThumbnail(i);
    }
};

// Fonction pour ouvrir le sélecteur de fichier lorsqu'une miniature est cliquée
function openFileSelector(index) {
    const fileInput = document.getElementById(`fileInput${index}`);
    if (fileInput) {
        fileInput.click(); // Ouvrir la boîte de dialogue de sélection de fichier
    }
}

// Fonction appelée lorsqu'un fichier est sélectionné
function handleFileUpload(imageIndex) {
    const fileInput = document.getElementById(`fileInput${imageIndex}`);
    if (fileInput) {
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageUrl = e.target.result;
                const thumbnailElement = document.getElementById(`thumbnail${imageIndex}`);

                // Mettre à jour la miniature avec l'image chargée
                if (thumbnailElement) {
                    thumbnailElement.innerHTML = `<img src="${imageUrl}" alt="Uploaded Image" />`;
                }

                // Stocker le chemin d'accès de l'image
                imagePaths[imageIndex - 1] = imageUrl;

                // Afficher l'image dans le carrousel
                displayImageInCarousel(imageUrl);
            };
            reader.readAsDataURL(file);
        }
    }
}

// Fonction pour afficher l'image dans le carrousel
function displayImageInCarousel(imageUrl) {
    const container = document.getElementById('slidesContainer');
    if (container) {
        const imgElement = document.createElement('div');
        imgElement.className = 'slide';
        imgElement.innerHTML = `<img class="imgAjoutFiche" src="${imageUrl}" alt="Uploaded Image" />`;

        container.appendChild(imgElement);

        // Appeler showSlides pour mettre à jour le carrousel avec la nouvelle image
        showSlides(slideIndex);
    }
}

// Fonction pour afficher la diapositive spécifiée dans le carrousel
function showSlides(n) {
    const slides = document.querySelectorAll('.slide');

    if (n >= slides.length) {
        slideIndex = 0;
    }
    if (n < 0) {
        slideIndex = slides.length - 1;
    }

    slides.forEach(slide => {
        slide.style.display = 'none'; // Masquer toutes les diapositives
    });

    slides[slideIndex].style.display = 'block'; // Afficher la diapositive actuelle
}

// Fonction pour passer à la diapositive précédente dans le carrousel
function prevSlide() {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton
    showSlides(--slideIndex);
}

// Fonction pour passer à la diapositive suivante dans le carrousel
function nextSlide() {
    event.preventDefault(); // Empêcher le comportement par défaut du bouton
    showSlides(++slideIndex);
}

let currentIndex = 0;

function showImage(index) {
    const mainImage = document.getElementById('main-image');
    mainImage.src = images[index];
    currentIndex = index;
}

function nextImage() {
    currentIndex = (currentIndex + 1) % images.length;
    showImage(currentIndex);
}

function previousImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImage(currentIndex);
}

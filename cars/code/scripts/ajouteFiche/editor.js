ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
        },
        toolbar: [ 'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ],
        height: '400px' // Définit la hauteur de l'éditeur
    })
    .catch(error => {
        console.error(error);
    });
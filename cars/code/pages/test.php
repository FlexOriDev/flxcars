<!DOCTYPE html>
<html lang="en" dir="ltr">
  
<head>
    <meta charset="utf-8">
    <title>Text Editor</title>
    <!--Bootstrap Cdn -->
    
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  
    <!--Internal CSS start-->
    <style>
          
          #editor-container .ql-editor {
  background-color: #f8f9fa; /* Remplacez par la couleur de fond souhaitée */
  color: #333; /* Couleur du texte */
  min-height: 200px; /* Hauteur minimale de l'éditeur */
  font-size: 16px; /* Taille de police */
  border: 1px solid #ccc; /* Bordure */
  padding: 10px; /* Espacement intérieur */
}

/* Augmenter la hauteur de la barre d'outils */
#editor-container .ql-toolbar {
  height: 60px; /* Hauteur souhaitée de la barre d'outils */
  background-color: #2766a6; /* Couleur de fond de la barre d'outils */
  border-bottom: 1px solid #ccc; /* Bordure inférieure de la barre d'outils */
  padding: 8px; /* Espacement intérieur */
}

/* Ajuster le style des boutons pour la nouvelle hauteur */
#editor-container .ql-toolbar .ql-button {
  color: #555; /* Couleur du texte des boutons */
  padding: 12px 20px; /* Espacement intérieur des boutons (ajustez selon vos besoins) */
  margin-right: 5px; /* Marge entre les boutons */
  border: none; /* Supprimer la bordure des boutons */
  cursor: pointer; /* Curseur sur les boutons */
  margin-bottom: 10px;
}

/* Style pour les boutons de la barre d'outils au survol */
#editor-container .ql-toolbar .ql-button:hover {
  background-color: #d42323; /* Couleur de fond au survol */
}
    </style>
    <!--Internal CSS End-->
</head>
<!--Body start-->
  
<body>
<div id="editor-container" style="height: 300px;">
        <p>Commencez à écrire ici...</p>
    </div>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Initialiser Quill
        var quill = new Quill('#editor-container', {
            theme: 'snow'
        });
    </script>
</body>
  
</html>
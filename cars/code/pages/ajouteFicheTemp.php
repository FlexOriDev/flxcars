<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Ajouter une fiche</title><!--Titre de la page web-->
    <link href="../css/ajouteFiche.css" rel="stylesheet">
</head>

<?php
include '../includesHeaderFooter/header.php';
require('../actions/database.php');
require('../actions/fiche/ajouteFiche.php');
?>

<main>

    <article id="article-1">
        <h1>Ajouter une fiche</h1>

    </article>

    <!-- debut de la partie contenu -->
    <div class="main">
        <div class="register">

            <form method="POST" ENCTYPE="multipart/form-data">

                <?php if(isset($errorMsg)){ echo '<br><p class="error-ajout-fiche">'.$errorMsg.'</p>'; } ?>
                <br>
                <div class="register-top-grid">

                    <h3 class="text-ajout-fiche">Publier une fiche</h3>
                    <br>
                    <!-- NOM -->
                    <div class="input-container">
                        <span class="span-ajout-fiche">Nom * <label> :</label></span>
                        <input class="nom" type="text" name="nom">
                    </div>


                    <!-- METRIQUES -->
                    <div class="rowMetriques" id="rowMetriques">

                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedType">
                                    <option value="" disabled selected>Type * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM types ORDER BY nom');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedAnneeSortie">
                                    <option value="" disabled selected>Année de sortie * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM annees ORDER BY nom DESC');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedAnneeFin">
                                    <option value="" disabled selected>Année de fin de production * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM annees ORDER BY nom DESC');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedModele">
                                    <option value="" disabled selected>Modèle * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM modeles ORDER BY nom');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedSegment">
                                    <option value="" disabled selected>Segment * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM segments ORDER BY nom');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="columnMetriques">

                            <div class="custom-select">
                                <select id="selectType" onchange="" name="selectedConstructeur">
                                    <option value="" disabled selected>Constructeur * </option>
                                    <?php

                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM constructeurs ORDER BY nom');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);

                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        echo '<option value="' . $type['id'] . '">' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <br>




                    <!-- RESUME -->
                    <div class="input-container">
                        <span class="span-ajout-fiche">Résumé * <label> :</label></span>
                        <textarea class="addFiche" name="resume" maxlength="120" oninput="updateCount(this)"></textarea>
                        <div>
                            <small>Nombre de caractères restants : <span id="charCount">120</span></small>
                        </div>
                    </div>

                    <script>
                        function updateCount(textarea) {
                            const maxLength = textarea.maxLength;
                            const currentLength = textarea.value.length;
                            const charsRemaining = maxLength - currentLength;

                            const charCountSpan = document.getElementById('charCount');
                            if (charCountSpan) {
                                charCountSpan.textContent = charsRemaining;
                            }
                        }
                    </script>
                    <br>
                    <!-- HISTOIRE -->
                    <span class="span-ajout-fiche">Histoire * <label> :</label></span>
                    <!-- Zone d'édition TinyMCE -->
                    <textarea id="editor" name="editor" class="history"></textarea>

                    <script>
                        ClassicEditor
                            .create(document.querySelector('#editor'), {
                                ckfinder: {
                                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                                },
                                toolbar: [ 'heading', '|', 'bold', 'italic', 'underline', 'strikethrough', '|', 'bulletedList', 'numberedList', '|', 'undo', 'redo' ],
                                height: '4000px' // Définit la hauteur de l'éditeur
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>

                    <br>


                    <!-- Tableau des versions -->
                    <span class="span-ajout-fiche">Versions * <label> :</label></span>
                    <div class="table-container">
                        <div class="table-responsive">
                            <table id="user_data" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Appellation</th>
                                    <th class="col-carburant">Carburant</th>
                                    <th>Construction</th>
                                    <th>Moteur</th>
                                    <th>Cylindrée</th>
                                    <th>Performance</th>
                                    <th>Couple</th>
                                    <th>0-100</th>
                                    <th>Vitesse maximale</th>
                                    <th>Consommation</th>
                                    <th>Carrosserie</th>
                                    <th class="col-marche">Marché</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="table_body">
                                <!-- Lignes du tableau à remplir dynamiquement -->
                                <tr>
                                    <td><input type="text" name="appellation[]" class="form-control" /></td>
                                    <td>
                                        <select name="carburant[]" class="form-control">
                                            <option value="essence">Essence</option>
                                            <option value="diesel">Diesel</option>
                                            <option value="electrique">Électrique</option>
                                            <option value="hydrogene">Hydrogène</option>
                                        </select>
                                    </td>
                                    <td><input type="text" name="construction[]" class="form-control" /></td>
                                    <td><input type="text" name="moteur[]" class="form-control" /></td>
                                    <td><input type="text" name="cylindree[]" class="form-control" /></td>
                                    <td><input type="text" name="performance[]" class="form-control" /></td>
                                    <td><input type="text" name="couple[]" class="form-control" /></td>
                                    <td><input type="text" name="zero_to_hundred[]" class="form-control" /></td>
                                    <td><input type="text" name="vitesse_max[]" class="form-control" /></td>
                                    <td><input type="text" name="consommation[]" class="form-control" /></td>
                                    <td><input type="text" name="carrosserie[]" class="form-control" /></td>
                                    <td>
                                        <select name="marche[]" class="form-control">
                                            <option value="Europe">Europe</option>
                                            <option value="Asie">Asie</option>
                                            <option value="Amérique du Nord">Amérique du Nord</option>
                                            <option value="Amérique du Sud">Amérique du Sud</option>
                                            <option value="Afrique">Afrique</option>
                                            <option value="Océanie">Océanie</option>
                                        </select>
                                    </td>
                                    <td class="center-button">
                                        <button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" name="add" id="add" class="btn btn-info">Ajouter</button>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            // Supprimer une ligne du tableau
                            $(document).on('click', 'button[name="remove"]', function() {
                                $(this).closest('tr').remove();
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
                                html += '<td class="center-button"><button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button></td>';
                                html += '</tr>';
                                $('#table_body').append(html);
                            });
                        });
                    </script>
                    <br><br><br><br><br>
                    <!-- PICTURES -->
                    <span class="span-ajout-fiche">Images * <label> :</label></span>

                    <div class="image-thumbnails">
                        <!-- Les inputs file sont ajoutés pour chaque miniature -->

                        <!-- Miniatures d'image avec des attributs onclick pour déclencher le téléchargement de fichier -->
                        <input type="file" id="fileInput1" name="image1" style="display:none;" accept="image/*" onchange="handleFileUpload(1)" />
                        <div class="image-thumbnail" id="thumbnail1" onclick="openFileSelector(1)">
                            <img id="previewImage1" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                        <input type="file" id="fileInput2" name="image2" style="display:none;" accept="image/*" onchange="handleFileUpload(2)" />
                        <div class="image-thumbnail" id="thumbnail2" onclick="openFileSelector(2)">
                            <img id="previewImage2" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                        <input type="file" id="fileInput3" name="image3" style="display:none;" accept="image/*" onchange="handleFileUpload(3)" />
                        <div class="image-thumbnail" id="thumbnail3" onclick="openFileSelector(3)">
                            <img id="previewImage3" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                        <input type="file" id="fileInput4" name="image4" style="display:none;" accept="image/*" onchange="handleFileUpload(4)" />
                        <div class="image-thumbnail" id="thumbnail4" onclick="openFileSelector(4)">
                            <img id="previewImage4" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                        <input type="file" id="fileInput5" name="image5" style="display:none;" accept="image/*" onchange="handleFileUpload(5)" />
                        <div class="image-thumbnail" id="thumbnail5" onclick="openFileSelector(5)">
                            <img id="previewImage5" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                        <input type="file" id="fileInput6" name="image6" style="display:none;" accept="image/*" onchange="handleFileUpload(6)" />
                        <div class="image-thumbnail" id="thumbnail6" onclick="openFileSelector(6)">
                            <img id="previewImage6" class="image-upload" src="../../library/imgFioritures/upload_icon.png" alt="Upload Icon" />
                        </div>
                    </div>

                    <div class="container-ajoutFiche">
                        <div class="selected-images-container">
                            <!-- Conteneur pour les miniatures des images sélectionnées -->
                        </div>
                        <div class="slides-container-ajoutFiche" id="slidesContainer">
                            <!-- Slides -->
                        </div>
                        <button class="prevAjoutfiche"  type="button" onclick="prevSlide()">&#10094;</button>
                        <button class="nextAjoutfiche"  type="button" onclick="nextSlide()">&#10095;</button>
                    </div>


                    <script>
                        let slideIndex = 0;

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
                                showSlides(++slideIndex); // Afficher la nouvelle diapositive dans le carrousel
                            }
                        }

                        // Fonction pour afficher la diapositive spécifiée dans le carrousel
                        function showSlides(n) {
                            const slides = document.querySelectorAll('.slide');

                            if (n > slides.length) {
                                slideIndex = 1;
                            }
                            if (n < 1) {
                                slideIndex = slides.length;
                            }

                            slides.forEach(slide => {
                                slide.style.display = 'none'; // Masquer toutes les diapositives
                            });

                            slides[slideIndex - 1].style.display = 'block'; // Afficher la diapositive actuelle
                        }

                        // Fonction pour passer à la diapositive précédente dans le carrousel
                        function prevSlide() {
                            event.preventDefault(); // Empêcher le comportement par défaut du bouton
                            showSlides(slideIndex -= 1);
                        }

                        // Fonction pour passer à la diapositive suivante dans le carrousel
                        function nextSlide() {
                            event.preventDefault(); // Empêcher le comportement par défaut du bouton
                            showSlides(slideIndex += 1);
                        }

                    </script>

                    <br>
                    <br><br><br>
                    <br>
                    <div class="clear"> </div>
                    <div class="register-but">

                        <input type="submit" value="Publier" name="validate" class="custom-button">
                        <div class="clear"> </div>
                        <br><br><br><br><br><br><br><br><br>
                    </div>
            </form>
        </div>
        <br>
        <div class="clear"></div>

    </div><!-- fin de la partie contenu -->

    <?php

    ?>

</main>

<?php require '../includesHeaderFooter/footer.php' ; ?>
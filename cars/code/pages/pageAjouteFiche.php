<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/database.php');
require('../actions/actionsAjoutFiche/actionAjouteFiche.php');
?>
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Ajouter une fiche</title><!--Titre de la page web-->
    <link href="../css/styleAjouteFiche.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

</head>
<!--------------------------------------------CONTENT------------------------------------------------------>
<main>

    <article id="article-1">
        <h1>Ajouter une fiche</h1>

    </article>

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
                        <input class="nom" type="text" name="nom" value="<?php echo $nom; ?>">
                    </div>
                    <!-- METRIQUES -->
                    <script>
                        $(document).ready(function() {
                            $('.custom-select select').select2();

                            // Focaliser sur la zone de saisie de texte quand on clique sur chaque dropdown

                        });
                    </script>
                    <div class="rowMetriques" id="rowMetriques">
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectType" name="selectedType">
                                    <option value="" disabled selected>Type * </option>
                                    <?php
                                    // Requête SQL pour récupérer les types depuis la base de données
                                    $getAllTypes = $bdd->query('SELECT * FROM types ORDER BY nom');
                                    $types = $getAllTypes->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($types as $type) {
                                        // Vérifier si l'ID du type correspond à la valeur sélectionnée
                                        $isSelected = ($type['id'] == $selectedType) ? 'selected' : '';
                                        echo '<option value="' . $type['id'] . '" ' . $isSelected . '>' . $type['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectAnneeSortie" name="selectedAnneeSortie">
                                    <option value="" disabled selected>Année de sortie * </option>
                                    <?php
                                    // Requête SQL pour récupérer les années depuis la base de données
                                    $getAllAnnees = $bdd->query('SELECT * FROM annees ORDER BY nom DESC');
                                    $annees = $getAllAnnees->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($annees as $annee) {
                                        $isSelected = ($annee['id'] == $selectedAnneeSortie) ? 'selected' : '';
                                        echo '<option value="' . $annee['id'] . '" ' . $isSelected . '>' . $annee['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectAnneeFin" name="selectedAnneeFin">
                                    <option value="" disabled selected>Année de fin de production * </option>
                                    <?php
                                    // Requête SQL pour récupérer les années depuis la base de données
                                    $getAllAnnees = $bdd->query('SELECT * FROM annees ORDER BY nom DESC');
                                    $annees = $getAllAnnees->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($annees as $annee) {
                                        $isSelected = ($annee['id'] == $selectedAnneeFin) ? 'selected' : '';
                                        echo '<option value="' . $annee['id'] . '" ' . $isSelected . '>' . $annee['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectModele" name="selectedModele">
                                    <option value="" disabled selected>Modèle * </option>
                                    <?php
                                    // Requête SQL pour récupérer les modèles depuis la base de données
                                    $getAllModeles = $bdd->query('SELECT * FROM modeles ORDER BY nom');
                                    $modeles = $getAllModeles->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($modeles as $modele) {
                                        $isSelected = ($modele['id'] == $selectedModele) ? 'selected' : '';
                                        echo '<option value="' . $modele['id'] . '" ' . $isSelected . '>' . $modele['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectSegment" name="selectedSegment">
                                    <option value="" disabled selected>Segment * </option>
                                    <?php
                                    // Requête SQL pour récupérer les segments depuis la base de données
                                    $getAllSegments = $bdd->query('SELECT * FROM segments ORDER BY nom');
                                    $segments = $getAllSegments->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($segments as $segment) {
                                        $isSelected = ($segment['id'] == $selectedSegment) ? 'selected' : '';
                                        echo '<option value="' . $segment['id'] . '" ' . $isSelected . '>' . $segment['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectConstructeur" name="selectedConstructeur">
                                    <option value="" disabled selected>Constructeur * </option>
                                    <?php
                                    // Requête SQL pour récupérer les constructeurs depuis la base de données
                                    $getAllConstructeurs = $bdd->query('SELECT * FROM constructeurs ORDER BY nom');
                                    $constructeurs = $getAllConstructeurs->fetchAll(PDO::FETCH_ASSOC);
                                    // Affichage des options pour la liste déroulante
                                    foreach ($constructeurs as $constructeur) {
                                        $isSelected = ($constructeur['id'] == $selectedConstructeur) ? 'selected' : '';
                                        echo '<option value="' . $constructeur['id'] . '" ' . $isSelected . '>' . $constructeur['nom'] . '</option>';
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
                        <textarea class="addFiche" name="resume" maxlength="120" oninput="updateCount(this)"><?php echo $resume ?></textarea>
                        <div>
                            <small>Nombre de caractères restants : <span id="charCount">120</span></small>
                        </div>
                    </div>
                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_resume.js"></script>
                    <br>
                    <!-- HISTOIRE -->
                    <span class="span-ajout-fiche">Histoire * <label> :</label></span>
                    <!-- Zone d'édition TinyMCE -->
                    <textarea id="editor" name="editor" class="history"><?php echo $editor ?></textarea>

                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_editor.js"></script>

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
                                <?php
                                $initialRowCount = isset($_POST['appellation']) ? count($_POST['appellation']) : 0;

                                // Afficher le formulaire avec le nombre correct de lignes
                                for ($i = 0; $i < $initialRowCount; $i++) {
                                    echo '<tr>';
                                    echo '<td><input type="text" name="appellation[]" class="form-control" value="' . (isset($_POST['appellation'][$i]) ? htmlspecialchars($_POST['appellation'][$i]) : '') . '" /></td>';
                                    // Affichez le reste des cellules de la ligne ici avec les valeurs postées si disponibles
                                    echo '<td><select name="carburant[]" class="form-control">';
                                    echo '<option value="essence" ' . (isset($_POST['carburant'][$i]) && $_POST['carburant'][$i] == 'essence' ? 'selected' : '') . '>Essence</option>';
                                    echo '<option value="diesel" ' . (isset($_POST['carburant'][$i]) && $_POST['carburant'][$i] == 'diesel' ? 'selected' : '') . '>Diesel</option>';
                                    echo '<option value="electrique" ' . (isset($_POST['carburant'][$i]) && $_POST['carburant'][$i] == 'electrique' ? 'selected' : '') . '>Électrique</option>';
                                    echo '<option value="hydrogene" ' . (isset($_POST['carburant'][$i]) && $_POST['carburant'][$i] == 'hydrogene' ? 'selected' : '') . '>Hydrogène</option>';
                                    echo '</select></td>';
                                    echo '<td><input type="text" name="construction[]" class="form-control" value="' . (isset($_POST['construction'][$i]) ? htmlspecialchars($_POST['construction'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="moteur[]" class="form-control" value="' . (isset($_POST['moteur'][$i]) ? htmlspecialchars($_POST['moteur'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="cylindree[]" class="form-control" value="' . (isset($_POST['cylindree'][$i]) ? htmlspecialchars($_POST['cylindree'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="performance[]" class="form-control" value="' . (isset($_POST['performance'][$i]) ? htmlspecialchars($_POST['performance'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="couple[]" class="form-control" value="' . (isset($_POST['couple'][$i]) ? htmlspecialchars($_POST['couple'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="zero_to_hundred[]" class="form-control" value="' . (isset($_POST['zero_to_hundred'][$i]) ? htmlspecialchars($_POST['zero_to_hundred'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="vitesse_max[]" class="form-control" value="' . (isset($_POST['vitesse_max'][$i]) ? htmlspecialchars($_POST['vitesse_max'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="consommation[]" class="form-control" value="' . (isset($_POST['consommation'][$i]) ? htmlspecialchars($_POST['consommation'][$i]) : '') . '"/></td>';
                                    echo '<td><input type="text" name="carrosserie[]" class="form-control" value="' . (isset($_POST['carrosserie'][$i]) ? htmlspecialchars($_POST['carrosserie'][$i]) : '') . '"/></td>';
                                    echo '<td><select name="marche[]" class="form-control">';
                                    echo '<option value="Europe" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Europe' ? 'selected' : '') . '>Europe</option>';
                                    echo '<option value="Asie" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Asie' ? 'selected' : '') . '>Asie</option>';
                                    echo '<option value="Amérique du Nord" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Amérique du Nord' ? 'selected' : '') . '>Amérique du Nord</option>';
                                    echo '<option value="Amérique du Sud" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Amérique du Sud' ? 'selected' : '') . '>Amérique du Sud</option>';
                                    echo '<option value="Afrique" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Afrique' ? 'selected' : '') . '>Afrique</option>';
                                    echo '<option value="Océanie" ' . (isset($_POST['marche'][$i]) && $_POST['marche'][$i] == 'Océanie' ? 'selected' : '') . '>Océanie</option>';
                                    echo '</select></td>';
                                    echo '<td class="center-button">';
                                    echo '<button type="button" name="remove" class="btn btn-danger btn-sm">Supprimer</button>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <button type="button" name="add" id="add" class="btn btn-info">Ajouter</button>
                    </div>
                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_table.js"></script>

                    <br><br>
                    <!-- PICTURES -->
                    <span class="span-ajout-fiche">Images * <label> :</label></span>

                    <div class="image-thumbnails">
                        <!-- Les inputs file sont ajoutés pour chaque miniature -->
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

                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_pictures.js"></script>

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
<!--------------------------------------------FOOTER------------------------------------------------------>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>
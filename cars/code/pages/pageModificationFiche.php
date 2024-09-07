<!--------------------------------------------INCLUDES------------------------------------------------------>
<?php
include '../includesHeaderFooter/includeHeader.php';
require('../actions/actionsUser/actionIsAdmin.php');
redirectIfNotAdmin();
require('../actions/database.php');
require('../actions/actionsModificationFiche/actionRemplissageDataFiche.php');
require('../actions/actionsModificationFiche/actionModificationFiche.php');
?>
<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png">
    <meta charset="utf-8">

    <title>Modification d'une fiche</title>
    <link href="../css/styleModificationFiche.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1v2md+J0Qpk+OE9xTsP2XrY12Wt+GxlQ3OOZZn3q8r6+Kd/1egTk8trjy8EyhC5Y" crossorigin="anonymous">


    <script src="../scripts/scriptModificationFiche/scriptModificationFiche_pictures.js" defer></script>
</head>
<!--------------------------------------------CONTENT------------------------------------------------------>

<main>

    <article id="article-1">
        <h1>Modification d'une fiche</h1>
    </article>

    <?php
    if($idHasFiche){
    ?>

    <script type="text/javascript">
        // Variables JavaScript pour les images existantes
        const existingImages = <?php echo json_encode(array_map(function($image) use ($modeleNomResult) {
            return [
                'url' => '../../library/voitures/' . $modeleNomResult['NOM_MODELE'] . '/' . $image['ID_FICHE'] . '/' . htmlspecialchars($image['IMAGE_URL']),
                'id' => $image['ID']
            ];
        }, $images)); ?>;
    </script>

    <div class="main">
        <div class="register">

            <form method="POST" ENCTYPE="multipart/form-data">

                <?php if(isset($errorMsg)){ echo '<br><p class="error-ajout-fiche">'.$errorMsg.'</p>'; } ?>
                <br>
                <div class="register-top-grid">
                    <br>
                    <!-- NOM -->
                    <div class="input-container">
                        <span class="span-ajout-fiche">Nom * <label> :</label></span>
                        <input class="nom" type="text" name="nom" value="<?php echo htmlspecialchars($fiche['NOM_FICHE'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
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
                                <select id="selectType" name="selectedTypes[]" multiple="multiple">
                                    <?php
                                    foreach ($types as $type) {
                                        // Vérifier si l'ID du type est dans la liste des types associés
                                        $isSelected = in_array($type['ID'], $associatedTypeIds) ? 'selected' : '';
                                        echo '<option value="' . $type['ID'] . '" ' . $isSelected . '>' . htmlspecialchars($type['NOM_TYPE']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#selectType').select2({
                                    placeholder: "Sélectionnez un ou plusieurs types",
                                    closeOnSelect: false, // Permet de laisser le menu ouvert après une sélection
                                    allowClear: true
                                });
                            });
                        </script>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectAnneeSortie" name="selectedAnneeSortie">
                                    <option value="" disabled selected>Année de sortie * </option>
                                    <?php
                                    foreach ($annees as $annee) {
                                        // Vérifier si l'ID de l'année est la valeur sélectionnée
                                        $isSelected = ($annee['ID'] == $selectedAnnee) ? 'selected' : '';
                                        echo '<option value="' . $annee['ID'] . '" ' . $isSelected . '>' . htmlspecialchars($annee['NOM_ANNEE']) . '</option>';
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
                                    foreach ($annees as $annee) {
                                        $isSelected = ($annee['ID'] == $selectedAnneeFin) ? 'selected' : '';
                                        echo '<option value="' . $annee['ID'] . '" ' . $isSelected . '>' . $annee['NOM_ANNEE'] . '</option>';
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
                                    foreach ($modeles as $modele) {
                                        // Vérifier si l'ID du modèle est la valeur sélectionnée
                                        $isSelected = ($modele['ID'] == $selectedModele) ? 'selected' : '';
                                        echo '<option value="' . $modele['ID'] . '" ' . $isSelected . '>' . htmlspecialchars($modele['NOM_MODELE']) . '</option>';
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
                                    foreach ($segments as $segment) {
                                        // Vérifier si l'ID du modèle est la valeur sélectionnée
                                        $isSelected = ($segment['ID'] == $selectedSegment) ? 'selected' : '';
                                        echo '<option value="' . $segment['ID'] . '" ' . $isSelected . '>' . htmlspecialchars($segment['NOM_SEGMENT']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectConstructeur" name="selectedConstructeurs[]" multiple="multiple">
                                    <?php
                                    foreach ($constructeurs as $constructeur) {
                                        // Vérifier si l'ID du type est dans la liste des types associés
                                        $isSelected = in_array($constructeur['ID'], $associatedConstructeurIds) ? 'selected' : '';
                                        echo '<option value="' . $constructeur['ID'] . '" ' . $isSelected . '>' . htmlspecialchars($constructeur['NOM_CONSTRUCTEUR']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#selectConstructeur').select2({
                                    placeholder: "Sélectionnez un ou plusieurs constructeurs",
                                    closeOnSelect: false, // Permet de laisser le menu ouvert après une sélection
                                    allowClear: true
                                });
                            });
                        </script>
                        <div class="columnMetriques">
                            <div class="custom-select">
                                <select id="selectGeneration" name="selectedGeneration">
                                    <option value="" disabled selected>Génération/Phase * </option>
                                    <?php
                                    foreach ($generations as $generation) {
                                        $isSelected = ($generation['ID'] == $selectedGeneration) ? 'selected' : '';
                                        echo '<option value="' . $generation['ID'] . '" ' . $isSelected . '>' . $generation['NOM_GENERATION'] . '</option>';
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
                        <textarea class="addFiche" name="resume" maxlength="120" oninput="updateCount(this)"><?php echo htmlspecialchars($fiche['RESUME_FICHE']); ?></textarea>
                        <div>
                            <small>Nombre de caractères restants : <span id="charCount">120</span></small>
                        </div>
                    </div>
                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_resume.js"></script>
                    <br>
                    <!-- HISTOIRE -->
                    <span class="span-ajout-fiche">Histoire * <label> :</label></span>
                    <!-- Zone d'édition TinyMCE -->
                    <textarea id="editor" name="editor" class="history"><?php echo htmlspecialchars($fiche['HISTOIRE_FICHE']); ?></textarea>

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
                                <?php
                                if (isset($versions) && count($versions) > 0) {
                                    foreach ($versions as $version) {
                                        echo '<tr>';
                                        echo '<input type="hidden" name="id[]" value="' . htmlspecialchars($version['ID']) . '" />';  // ID caché

                                        echo '<td><input type="text" name="appellation[]" class="form-control" value="' . htmlspecialchars($version['APPELLATION']) . '" /></td>';

                                        // Pour le selecteur carburant
                                        echo '<td><select name="carburant[]" class="form-control">';
                                        echo '<option value="essence" ' . ($version['CARBURANT'] == 'essence' ? 'selected' : '') . '>Essence</option>';
                                        echo '<option value="diesel" ' . ($version['CARBURANT'] == 'diesel' ? 'selected' : '') . '>Diesel</option>';
                                        echo '<option value="electrique" ' . ($version['CARBURANT'] == 'electrique' ? 'selected' : '') . '>Électrique</option>';
                                        echo '<option value="hydrogene" ' . ($version['CARBURANT'] == 'hydrogene' ? 'selected' : '') . '>Hydrogène</option>';
                                        echo '</select></td>';

                                        echo '<td><input type="text" name="construction[]" class="form-control" value="' . htmlspecialchars($version['CONSTRUCTION_ANNEE']) . '"/></td>';
                                        echo '<td><input type="text" name="moteur[]" class="form-control" value="' . htmlspecialchars($version['NOM_MOTEUR']) . '"/></td>';
                                        echo '<td><input type="text" name="cylindree[]" class="form-control" value="' . htmlspecialchars($version['CYLINDREE']) . '"/></td>';
                                        echo '<td><input type="text" name="performance[]" class="form-control" value="' . htmlspecialchars($version['PERFORMANCE']) . '"/></td>';
                                        echo '<td><input type="text" name="couple[]" class="form-control" value="' . htmlspecialchars($version['COUPLE']) . '"/></td>';
                                        echo '<td><input type="text" name="zero_to_hundred[]" class="form-control" value="' . htmlspecialchars($version['ZERO_A_100']) . '"/></td>';
                                        echo '<td><input type="text" name="vitesse_max[]" class="form-control" value="' . htmlspecialchars($version['VMAX']) . '"/></td>';
                                        echo '<td><input type="text" name="consommation[]" class="form-control" value="' . htmlspecialchars($version['CONSOMMATION']) . '"/></td>';
                                        echo '<td><input type="text" name="carrosserie[]" class="form-control" value="' . htmlspecialchars($version['CARROSSERIE']) . '"/></td>';

                                        // Pour le selecteur marché
                                        echo '<td><select name="marche[]" class="form-control">';
                                        echo '<option value="Europe" ' . ($version['MARCHE_CONTINENT'] == 'Europe' ? 'selected' : '') . '>Europe</option>';
                                        echo '<option value="Asie" ' . ($version['MARCHE_CONTINENT'] == 'Asie' ? 'selected' : '') . '>Asie</option>';
                                        echo '<option value="Amérique du Nord" ' . ($version['MARCHE_CONTINENT'] == 'Amérique du Nord' ? 'selected' : '') . '>Amérique du Nord</option>';
                                        echo '<option value="Amérique du Sud" ' . ($version['MARCHE_CONTINENT'] == 'Amérique du Sud' ? 'selected' : '') . '>Amérique du Sud</option>';
                                        echo '<option value="Afrique" ' . ($version['MARCHE_CONTINENT'] == 'Afrique' ? 'selected' : '') . '>Afrique</option>';
                                        echo '<option value="Océanie" ' . ($version['MARCHE_CONTINENT'] == 'Océanie' ? 'selected' : '') . '>Océanie</option>';
                                        echo '</select></td>';

                                        echo '<td class="center-button">';
                                        echo "<button type=\"button\" name=\"remove\" class=\"btn btn-danger btn-sm\" onclick=\"removeVersion(this, {$version['ID']})\">Supprimer</button>";
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>

                                </tbody>
                            </table>
                        </div>
                        <button type="button" name="add" id="add" class="btn btn-info">Ajouter</button>
                        <input type="hidden" id="ids_to_delete" name="ids_to_delete" value="" />
                    </div>
                    <script src="../scripts/scriptAjouteFiche/scriptAjouteFiche_table.js"></script>

                    <br><br>
                    <!-- PICTURES -->
                    <span class="span-ajout-fiche">Images * <label> :</label></span>

                    <div class="image-upload-container">
                        <div class="central-image">
                            <img id="centralImage" src="../../library/imgFioritures/upload_icon.png" alt="Central Image" />
                        </div>
                        <div class="image-gallery">

                            <div id="galleryContainer" class="gallery-container">
                                <!-- Encart pour ajouter une nouvelle image -->
                                <div class="thumbnail-container add-new-image" onclick="openFileSelector()">
                                    <p>Ajouter une image</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <input type="file" id="fileInput" style="display:none;" accept="image/*" onchange="handleFileUpload()" />

                    <!-- Champ caché pour les URLs des images -->
                    <input type="hidden" name="galleryImagesInput" id="galleryImagesInput" value='[]'>
                    <input type="hidden" name="deletedImagesInput" id="deletedImagesInput" value='[]'>
                    <div id="fileInputsContainer" style="display:none;"></div>





                    <br><br><br><br><br>
                    <div class="clear"> </div>

                    <div class="register-but">
                        <input type="hidden" name="validate" value="1">
                        <button type="submit" class="custom-button" onclick="submitForm()">Modifier</button>
                        <div class="clear"> </div>
                        <br><br><br><br><br><br><br><br><br>
                    </div>
            </form>
        </div>

        <br>
        <div class="clear"></div>

    </div><!-- fin de la partie contenu -->
    <?php
    } else{
    ?>
    <br>
        <div class="centered-fiche-non-trouvee">
            <p class="fiche-non-trouvee">Aucune fiche trouvée pour cet identifiant.</p>
        </div>
    <?php
    }
    ?>

</main>

<!--------------------------------------------SCRIPTS------------------------------------------------------>
<script src="../scripts/"></script>

<!--------------------------------------------FOOTER------------------------------------------------------>
<?php require '../includesHeaderFooter/includeFooter.php'; ?>

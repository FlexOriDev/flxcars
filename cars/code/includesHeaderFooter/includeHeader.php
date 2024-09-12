<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8"><!--Encodage universel-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="../css/styleMain.css" rel="stylesheet"><!--lien vers feuille de style avec le nom de celle-ci-->
    <link rel="shortcut icon" href="../../library/imgFioritures/logo_test.png"><!--favicon du site-->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-datepicker.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.0/classic/ckeditor.js"></script>

    <?php
    session_start(); // Assurez-vous que les sessions sont démarrées
    include("../actions/actionsUser/actionLogin.php");
    require('../actions/actionsUser/actionIsAdmin.php');

    // Éviter les injections SQL en utilisant des requêtes préparées
    $stmt = $bdd->prepare('SELECT * FROM TYPE ORDER BY NOM_TYPE');
    $stmt->execute();
    ?>

</head>

<body>
<!---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER--->

<!-- Navbar-->
<header class="header">
    <div class="header-top-top" id="haut-haut"></div>
    <button class="menu-toggle" onclick="toggleMenu()">☰ Menu</button>

    <div class="header-mid"></div>
    <div class="header-content">
        <nav class="nav_header">
            <ul>
                <li class="deroulant"><a href="../pages/pageIndex.php">Accueil</a>
                    <ul class="sous">
                        <li><a href="pageIndex.php">Pourquoi Smoky Ghost ?</a></li>
                    </ul>
                </li>

                <li class="deroulant"><a href="pageVoitures.php">Voitures</a>
                    <ul class="sous">
                        <?php
                        foreach($stmt as $type){
                            $id_type = htmlspecialchars($type['ID'], ENT_QUOTES, 'UTF-8');
                            $nom_type = htmlspecialchars($type['NOM_TYPE'], ENT_QUOTES, 'UTF-8');
                            ?>
                            <li><a href="pageVoitures.php?id_type=<?= $id_type; ?>"><?= $nom_type; ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>

                <?php
                if(isset($_SESSION['auth'])){
                    $user_id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
                    ?>
                    <li class="deroulant"><a href="pageAccount.php?id=<?= $user_id; ?>">Mon profil &ensp;</a>
                        <ul class="sous">
                            <?php
                            if(isAdmin()){
                                ?>
                                <li><a href="../pages/pageDashboardConstructeurs.php">Dashboard</a></li>
                                <li><a href="../pages/pageAjouteFiche.php">Ajouter une fiche</a></li>
                                <li><a href="../pages/pageModifierFiche.php">Modifier une fiche</a></li>
                                <?php
                            }
                            ?>
                            <form id="logout-form" action="../actions/actionsUser/actionLogout.php" method="POST" style="display: none;">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                            </form>
                            <li>
                                <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="nav-link">Déconnexion</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if(!isset($_SESSION['auth'])){
                    ?>
                    <li class="deroulant"><a href="pageLogin.php">Connexion</a></li>
                    <?php
                }
                ?>
            </ul>
        </nav>

        <div class="header-bot">
        </div>
    </div>
</header>
<!---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER---HEADER--->
</body>
</html>

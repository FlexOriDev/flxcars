<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Inscription</title><!--Titre de la page web-->
    <link href="../css/styleRegister.css" rel="stylesheet">
</head>


<!------------------------------------------INCLUDES---------------------------------------------------->
<?php
include '../includesHeaderFooter/includeHeader.php';
include("../actions/actionsUser/actionRegister.php");
?>

<br><br>
<!-- début de la partie contenu -->
<div class="main-register">
    <div class="register-container">
        <form class="register-form" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


            <?php if(isset($errorMsg)){ echo '<p class="error-register">'.$errorMsg.'</p>'; } ?>
            <br>
            <div class="register-top-grid">
                <h3 class="h3-register">Vos informations</h3>
                <div class="register-form-item">
                    <span>Prénom<label> * (entre 3 et 20 caractères)</label></span>
                    <input class="register-input" type="text" name="prenom">
                </div>
                <div class="register-form-item">
                    <span>Nom<label> * (entre 3 et 20 caractères)</label></span>
                    <input class="register-input" type="text" name="nom">
                </div>
                <div class="register-form-item">
                    <span>Pseudo<label> * (entre 3 et 20 caractères alphanumériques ou des underscores)</label></span>
                    <input class="register-input" type="text" name="pseudo">
                </div>
                <div class="register-form-item">
                    <span>Email<label>* (adresse valide)</label></span>
                    <input class="register-input" type="text" name="mail">
                </div>
                <div class="clear"> </div>
            </div>
            <div class="register-bottom-grid">
                <h3 class="h3-register">Pour vous authentifier</h3>
                <div class="register-form-item">
                    <span>Mot de passe<label>* (au moins 8 caractères, incluant une majuscule et un chiffre)</label></span>
                    <input class="register-input" type="password" name="password">
                </div>
                <div class="register-form-item">
                    <span>Retapez votre mot de passe<label>*</label></span>
                    <input class="register-input" type="password" name="passwordtwo">
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
            <div class="register-but">
                <input type="submit" value="M'inscrire" name="validate-register">
                <div class="clear"> </div>
            </div>
        </form>
    </div>
    <div class="clear"></div>
</div>
<br><br><br><br>
<br><br><br><br>
<!-- fin de la partie contenu -->

<?php
require '../includesHeaderFooter/includeFooter.php';
?>

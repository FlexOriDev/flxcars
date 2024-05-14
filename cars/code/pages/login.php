<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Connexion</title><!--Titre de la page web-->
    <link href="../css/login.css" rel="stylesheet">
</head>


<!------------------------------------------INCLUDES---------------------------------------------------->
<?php
include '../includesHeaderFooter/header.php';
require('../actions/user/login.php');
?>

<!---------------------------------------------MAIN----------------------------------------------------->
<br><br>
<!-- début de la partie contenu -->
<div class="main-login">

    <div class="register-container">
        <div class="col-left">
            <div class="login-header">
                <h3 class="h3-register">Nouveau membre</h3>
                <p>En créant un compte, vous pourrez créer des annonces</p>
                <a class="acount-btn" href="sinscrire.php">Créer un compte</a>
            </div>
        </div>
        <div class="col-right">
            <div class="login-header">
                <h3 class="h3-register">Déjà membre ?</h3>
                <p>Si vous avez déjà un compte, merci de vous connecter</p>
                <br>
                <?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>
            </div>

            <form class="login-form" method="POST">
                <div class="login-form-item">
                    <span>Pseudo<label>*</label></span>
                    <input class="login-input" type="text" name="pseudo">
                </div>
                <div class="login-form-item">
                    <span>Mot de passe<label>*</label></span>
                    <input class="login-input" type="password" name="password">
                </div>
                <a class="login-forgot" href="#">Mot de passe oublié</a>
                <br>
                <input class="login-submit" type="submit" value="Se connecter" name="validate">
            </form>

        </div>
        <div class="login-clearfix"> </div>

    </div>
    <div class="login-clear"></div>
</div><!-- fin de la partie contenu -->

<?php
require '../includesHeaderFooter/footer.php';
?>

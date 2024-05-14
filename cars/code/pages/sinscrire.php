<!--------------------------------------------HEAD------------------------------------------------------>
<head>
    <link rel="shortcut icon" href="img/fav.png"><!--favicon du site-->
    <meta charset ="utf_8"><!--Encodage universel-->

    <title>Inscription</title><!--Titre de la page web-->
    <link href="../css/register.css" rel="stylesheet">
</head>


<!------------------------------------------INCLUDES---------------------------------------------------->
<?php
include '../includesHeaderFooter/header.php';
include("../actions/user/register.php");
?>

<br><br>
<!-- début de la partie contenu -->
<div class="main-register">
    <div class="register-container">
        <form class="register-form" method="POST">

            <?php if(isset($errorMsg)){ echo '<p class="error-register">'.$errorMsg.'</p>'; } ?>
            <br>
            <div class="register-top-grid">
                <h3 class="h3-register">Vos informations</h3>
                <div class="register-form-item">
                    <span>Prénom<label>*</label></span>
                    <input class="register-input" type="text" name="prenom">
                </div>
                <div class="register-form-item">
                    <span>Nom<label>*</label></span>
                    <input class="register-input" type="text" name="nom">
                </div>
                <div class="register-form-item">
                    <span>Pseudo<label>*</label></span>
                    <input class="register-input" type="text" name="pseudo">
                </div>
                <div class="register-form-item">
                    <span>Email<label>*</label></span>
                    <input class="register-input" type="text" name="mail">
                </div>
                <div class="clear"> </div>
            </div>
            <div class="register-bottom-grid">
                <h3 class="h3-register">Pour vous authentifier</h3>
                <div class="register-form-item">
                    <span>Password<label>*</label></span>
                    <input class="register-input" type="password" name="password">
                </div>
                <div class="register-form-item">
                    <span>Retapez votre Password<label>*</label></span>
                    <input class="register-input" type="password" name="passwordtwo">
                </div>
                <div class="clear"> </div>
            </div>
            <div class="clear"> </div>
            <div class="register-but">
                <input type="submit" value="M'inscrire" name="validate">
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
require '../includesHeaderFooter/footer.php';
?>

<?php
include '../includesHeaderFooter/header.php'; 
require('../actions/user/login.php'); 
?>

<!-- debut de la partie contenu -->
<div class="main">

<div class="register">
<div class="col_1_of_list span_1_of_list login-left">
<h3>Nouveau membre</h3>
<p>En créant un compte, vous pourrez créer des annonces</p>
<a class="acount-btn" href="sinscrire.php">Créer un compte</a>
</div>
<div class="col_1_of_list span_1_of_list login-right">
<h3>Déja membre ?</h3>
<p>Si vous avez déja un compte, merci de vous connecter</p>
<br>
<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

<form method="POST">
<div>
<span>Pseudo<label>*</label></span>
<input type="text" name="pseudo"> 
</div>
<div>
<span>Mot de passe<label>*</label></span>
<input type="password" name="password"> 
</div>
<a class="forgot" href="#">Mot de passe oublié</a>
<input type="submit" value="Se connecter" name="validate">
</form>

</div>	
<div class="clearfix"> </div>

</div>
<div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php

?>
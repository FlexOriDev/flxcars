<?php

include("../actions/user/securite.php");
include("../includesHeaderFooter/header.php");
?>

<!-- debut de la partie contenu -->

<div class="main">
<div class="register">

<div class="register-top-grid">
<h3>Vos informations</h3>

<br>
<?php if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>'; } ?>

</div>

<?php 


if(isset($idOfUser)){
	?>
	<div>
	<span>Prénom<label> : <?= $user_prenom; ?></label></span>
	</div>
	<br>
	<div>
	<span>Nom<label> : <?= $user_nom; ?></label></span>
	</div>
	<br>
	<div>
	<span>Email<label> : <?= $user_mail; ?></label></span>
	</div>
	<br>
	<div class="clear"> </div>
	
	<?php
}
?>  

<a href="moncomptemodif.php?id=<?= $_SESSION['id']; ?>">Modifier mes informations</a>
<div class="clear"> </div>

<br>
<div class="deconnexion">

<a href="actions/actionsUser/logoutAction.php">Deconnexion</a>
<div class="clear"> </div>

</div>

</div>
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
//include("inc/bottom.php");
?>
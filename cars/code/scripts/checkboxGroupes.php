<script>
$(function()
	{
		var urlGroupe = "";
		var mySelectCheckboxGroupe = new checkbox_select(
		{
			selector : "#make_checkbox_select_groupes",
			selected_translationOne : "Groupe sélectionné",
            selected_translation : "Groupes sélectionnés",
            all_translation : "Tous les groupes",
            not_found : "Aucun groupe trouvé",
			
			// Event during initialization
			onApply : function(e)
			{	
				var str = window.location.href;

				var indexConstructeur = str.indexOf("id_constructeur");
				var indexPays = str.indexOf("id_pays");
				var indexGroupe = str.indexOf("id_groupe");

				var firstCase = false;
				var secondCase = false;
				var indexSecondCase = -1;

				if(e.selected.length !== 0){

					//Il existe deja une requete dans les composants
					if(indexPays !== -1 | indexGroupe !== -1 | indexConstructeur !== -1){
						if(indexGroupe !== -1){
							for(var i = indexGroupe; i < str.length; i++){
								if(i == str.length-1){
									firstCase = true;
									break;
								}else if(str.charAt(i+1) == '&'){
									secondCase = true;
									indexSecondCase = i;
									break;
								}
							} 
							if(firstCase){
								var firstPart = str.substring(0, indexGroupe+10);
								urlGroupe=firstPart+e.selected;
								window.location.assign(urlGroupe);
							}else{
								var firstPart2 = str.substring(0, indexGroupe+10);
								var secondPart2 = str.substring(indexSecondCase+1, str.length);
								urlGroupe = firstPart2+e.selected+secondPart2;
								window.location.assign(urlGroupe);
							}
							
						}else{
							urlGroupe = window.location.href+"&id_groupe="+e.selected;
							window.location.assign(urlGroupe);
						}
					}
					//il n'y a pas d'autres composants
					else{
						urlGroupe = window.location.href+"?id_groupe="+e.selected;
						window.location.assign(urlGroupe);
					}
				}else{
					var firstCase3 = false;
					var secondCase3 = false;
					var indexSecondCase3 = -1;
					var cptTags = 0;
					if(indexConstructeur !== -1){
						cptTags++;
					}
					if(indexPays !== -1){
						cptTags++;
					}
					if(indexGroupe !== -1 ){
						cptTags++;
					}
					if(indexGroupe !== -1){
						for(var i = indexGroupe; i < str.length; i++){
								if(i == str.length-1){
									firstCase3 = true;
									break;
								}else if(str.charAt(i+1) == '&'){
									secondCase3 = true;
									indexSecondCase3 = i;
									break;
								}
						} 
						if(firstCase3){
							var firstPart = str.substring(0, indexGroupe-1);
							window.location.assign(firstPart);
						}else{
							if(str.charAt(indexGroupe-1) == '?'){
								var firstPart2 = str.substring(0, indexGroupe);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlGroupe = firstPart2+secondPart2;
								window.location.assign(urlGroupe);
							}
							else if(cptTags == 2){
								var firstPart2 = str.substring(0, indexGroupe-1);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlGroupe = firstPart2+'?'+secondPart2;
								window.location.assign(urlGroupe);
							}
							else if(cptTags > 2){
								var firstPart2 = str.substring(0, indexGroupe-1);
								var secondPart2 = str.substring(indexSecondCase3+1, str.length);
								urlGroupe = firstPart2+secondPart2;
								window.location.assign(urlGroupe);
							}	
						}
					}
				}
				
			},

			
		});

		<?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_groupe'] ) AND !empty($_GET['id_groupe'])){
				$ids_groupe = explode(",", $_GET['id_groupe']);
				$cpt=0;

				foreach($ids_groupe as $id) {

					$getAllNamesOfGroupes = $bdd->prepare('SELECT nom FROM groupes WHERE id=? ORDER BY nom');
					$getAllNamesOfGroupes->execute(array($id));
					if($getAllNamesOfGroupes->rowCount() > 0){
						$cpt++;
					}
					
					while($groupe = $getAllNamesOfGroupes->fetch()){
						$nameOfGroupe = $groupe['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfGroupe); ?>;
							mySelectCheckboxGroupe.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
		
	});
</script>
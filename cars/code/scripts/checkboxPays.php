<script>
$(function()
	{
		var urlPays = "";
		var mySelectCheckboxPays = new checkbox_select(
		{
			selector : "#make_checkbox_select_pays",
			selected_translationOne : "Pays sélectionné",
            selected_translation : "Pays sélectionnés",
            all_translation : "Tous les pays",
            not_found : "Aucun pays trouvé",
			
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
						if(indexPays !== -1){
							for(var i = indexPays; i < str.length; i++){
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
								var firstPart = str.substring(0, indexPays+8);
								urlPays=firstPart+e.selected;
								window.location.assign(urlPays);
							}else{
								var firstPart2 = str.substring(0, indexPays+8);
								var secondPart2 = str.substring(indexSecondCase+1, str.length);
								urlPays = firstPart2+e.selected+secondPart2;
								window.location.assign(urlPays);
							}
							
						}else{
							urlPays = window.location.href+"&id_pays="+e.selected;
							window.location.assign(urlPays);
						}
					}
					//il n'y a pas d'autres composants
					else{
						urlPays = window.location.href+"?id_pays="+e.selected;
						window.location.assign(urlPays);
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
					if(indexPays !== -1){
						for(var i = indexPays; i < str.length; i++){
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
							var firstPart = str.substring(0, indexPays-1);
							window.location.assign(firstPart);
						}else{
							if(str.charAt(indexPays-1) == '?'){
								var firstPart2 = str.substring(0, indexPays);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlPays = firstPart2+secondPart2;
								window.location.assign(urlPays);
							}
							else if(cptTags == 2){
								var firstPart2 = str.substring(0, indexPays-1);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlPays = firstPart2+'?'+secondPart2;
								window.location.assign(urlPays);
							}
							else if(cptTags > 2){
								var firstPart2 = str.substring(0, indexPays-1);
								var secondPart2 = str.substring(indexSecondCase3+1, str.length);
								urlPays = firstPart2+secondPart2;
								window.location.assign(urlPays);
							}	
						}
					}
				}
				
			},

			
		});

		<?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_pays'] ) AND !empty($_GET['id_pays'])){
				$ids_pays = explode(",", $_GET['id_pays']);
				$cpt=0;

				foreach($ids_pays as $id) {

					$getAllNamesOfPays = $bdd->prepare('SELECT nom FROM pays WHERE id=? ORDER BY nom');
					$getAllNamesOfPays->execute(array($id));
					if($getAllNamesOfPays->rowCount() > 0){
						$cpt++;
					}
					
					while($pays = $getAllNamesOfPays->fetch()){
						$nameOfPays = $pays['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfPays); ?>;
							mySelectCheckboxPays.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
		
	});
</script>
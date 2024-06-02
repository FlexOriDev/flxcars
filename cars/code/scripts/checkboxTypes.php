<script>
$(function()
	{	
		var urlType = "";
		var mySelectCheckboxType = new checkbox_select(
		{
			selector : "#make_checkbox_select_types",
			selected_translationOne : "Type sélectionné",
            selected_translation : "Types sélectionnés",
            all_translation : "Tous les types",
            not_found : "Aucun type trouvé",

			// Event during initialization
			onApply : function(e)
			{
				var str = window.location.href;

				var indexConstructeur = str.indexOf("id_constructeur");
				var indexType = str.indexOf("id_type");
				var indexModele = str.indexOf("id_modele");
				var indexAnnee = str.indexOf("id_annee");
                var indexSegment = str.indexOf("id_segment");

				var firstCase = false;
				var secondCase = false;
				var indexSecondCase = -1;

				if(e.selected.length !== 0){
					//Il existe deja une requete dans les composants
					if(indexConstructeur !== -1 | indexType !== -1 | indexModele !== -1 | indexAnnee !== -1  | indexSegment !== -1){
						if(indexType !== -1){
							for(var i = indexType; i < str.length; i++){
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
								var firstPart = str.substring(0, indexType+8);
								urlType=firstPart+e.selected;
								window.location.assign(urlType);
							}else{
								var firstPart2 = str.substring(0, indexType+8);
								var secondPart2 = str.substring(indexSecondCase+1, str.length);
								urlType = firstPart2+e.selected+secondPart2;
								window.location.assign(urlType);
							}
							
						}else{
							urlType = window.location.href+"&id_type="+e.selected;
							window.location.assign(urlType);
						}
					}
					//il n'y a pas d'autres composants
					else{
						urlType = window.location.href+"?id_type="+e.selected;
						window.location.assign(urlType);
					}
				}else{
					var firstCase3 = false;
					var secondCase3 = false;
					var indexSecondCase3 = -1;
					var cptTags = 0;
					if(indexType !== -1){
						cptTags++;
					}
					if(indexConstructeur !== -1 ){
						cptTags++;
					}
					if(indexModele !== -1 ){
						cptTags++;
					}
					if(indexAnnee !== -1){
						cptTags++;
					}
                    if(indexSegment !== -1){
						cptTags++;
					}
					if(indexType !== -1){
						for(var i = indexType; i < str.length; i++){
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
							var firstPart = str.substring(0, indexType-1);
							window.location.assign(firstPart);
						}else{
							if(str.charAt(indexType-1) == '?'){
								var firstPart2 = str.substring(0, indexType);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlType = firstPart2+secondPart2;
								window.location.assign(urlType);
							}
							else if(cptTags == 2){
								var firstPart2 = str.substring(0, indexType-1);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlType = firstPart2+'?'+secondPart2;
								window.location.assign(urlType);
							}
							else if(cptTags > 2){
								var firstPart2 = str.substring(0, indexType-1);
								var secondPart2 = str.substring(indexSecondCase3+1, str.length);
								urlType = firstPart2+secondPart2;
								window.location.assign(urlType);
							}	
						}
					}
				}
                
			}
		});

		<?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_type'] ) AND !empty($_GET['id_type'])){
				$ids_type = explode(",", $_GET['id_type']);
				$cpt=0;

				foreach($ids_type as $id) {

					$getAllNamesOfTypes = $bdd->prepare('SELECT nom FROM types WHERE id=? ORDER BY nom');
					$getAllNamesOfTypes->execute(array($id));
					if($getAllNamesOfTypes->rowCount() > 0){
						$cpt++;
					}
					
					while($type = $getAllNamesOfTypes->fetch()){
						$nameOfType = $type['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfType); ?>;
							mySelectCheckboxType.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
  
	});
</script>

	
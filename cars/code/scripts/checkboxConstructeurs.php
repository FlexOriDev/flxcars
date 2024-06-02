<script>
$(function()
	{
		var urlConstructor = "";
		var mySelectCheckboxConstructor = new checkbox_select(
		{
			selector : "#make_checkbox_select_constructeurs",
			selected_translationOne : "Constructeur sélectionné",
            selected_translation : "Constructeurs sélectionnés",
            all_translation : "Tous les constructeurs",
            not_found : "Aucun constructeur trouvé",
			
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
					if(indexConstructeur !== -1 | indexType !== -1 | indexModele !== -1 | indexAnnee !== -1 | indexSegment !== -1){
						if(indexConstructeur !== -1){
							for(var i = indexConstructeur; i < str.length; i++){
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
								var firstPart = str.substring(0, indexConstructeur+16);
								urlConstructor=firstPart+e.selected;
								window.location.assign(urlConstructor);
							}else{
								var firstPart2 = str.substring(0, indexConstructeur+16);
								var secondPart2 = str.substring(indexSecondCase+1, str.length);
								urlConstructor = firstPart2+e.selected+secondPart2;
								window.location.assign(urlConstructor);
							}
							
						}else{
							urlConstructor = window.location.href+"&id_constructeur="+e.selected;
							window.location.assign(urlConstructor);
						}
					}
					//il n'y a pas d'autres composants
					else{
						urlConstructor = window.location.href+"?id_constructeur="+e.selected;
						window.location.assign(urlConstructor);
					}
				}else{
					var firstCase3 = false;
					var secondCase3 = false;
					var indexSecondCase3 = -1;
					var cptTags = 0;
					if(indexConstructeur !== -1){
						cptTags++;
					}
					if(indexType !== -1 ){
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
					if(indexConstructeur !== -1){
						for(var i = indexConstructeur; i < str.length; i++){
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
							var firstPart = str.substring(0, indexConstructeur-1);
							window.location.assign(firstPart);
						}else{
							if(str.charAt(indexConstructeur-1) == '?'){
								var firstPart2 = str.substring(0, indexConstructeur);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlConstructor = firstPart2+secondPart2;
								window.location.assign(urlConstructor);
							}
							else if(cptTags == 2){
								var firstPart2 = str.substring(0, indexConstructeur-1);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlConstructor = firstPart2+'?'+secondPart2;
								window.location.assign(urlConstructor);
							}
							else if(cptTags > 2){
								var firstPart2 = str.substring(0, indexConstructeur-1);
								var secondPart2 = str.substring(indexSecondCase3+1, str.length);
								urlConstructor = firstPart2+secondPart2;
								window.location.assign(urlConstructor);
							}	
						}
					}
				}
				
			},

			
		});

		<?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_constructeur'] ) AND !empty($_GET['id_constructeur'])){
				$ids_constructeur = explode(",", $_GET['id_constructeur']);
				$cpt=0;

				foreach($ids_constructeur as $id) {

					$getAllNamesOfConstructors = $bdd->prepare('SELECT nom FROM constructeurs WHERE id=? ORDER BY nom');
					$getAllNamesOfConstructors->execute(array($id));
					if($getAllNamesOfConstructors->rowCount() > 0){
						$cpt++;
					}
					
					while($constructor = $getAllNamesOfConstructors->fetch()){
						$nameOfConstructor = $constructor['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfConstructor); ?>;
							mySelectCheckboxConstructor.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
		
	});
</script>
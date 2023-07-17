<script>
$(function()
	{	
		var urlSegment = "";
		var mySelectCheckboxSegments = new checkbox_select(
		{
			selector : "#make_checkbox_select_segments",
			selected_translationOne : "Segment sélectionné",
            selected_translation : "Segments sélectionnés",
            all_translation : "Tous les segments",
            not_found : "Aucun segment trouvé",

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
						if(indexSegment !== -1){
							for(var i = indexSegment; i < str.length; i++){
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
								var firstPart = str.substring(0, indexSegment+11);
								urlSegment=firstPart+e.selected;
								window.location.assign(urlSegment);
							}else{
								var firstPart2 = str.substring(0, indexSegment+11);
								var secondPart2 = str.substring(indexSecondCase+1, str.length);
								urlSegment = firstPart2+e.selected+secondPart2;
								window.location.assign(urlSegment);
							}
							
						}else{
							urlSegment = window.location.href+"&id_segment="+e.selected;
							window.location.assign(urlSegment);
						}
					}
					//il n'y a pas d'autres composants
					else{
						urlSegment = window.location.href+"?id_segment="+e.selected;
						window.location.assign(urlSegment);
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
					if(indexSegment !== -1){
						for(var i = indexSegment; i < str.length; i++){
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
							var firstPart = str.substring(0, indexSegment-1);
							window.location.assign(firstPart);
						}else{
							if(str.charAt(indexSegment-1) == '?'){
								var firstPart2 = str.substring(0, indexSegment);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlSegment = firstPart2+secondPart2;
								window.location.assign(urlSegment);
							}
							else if(cptTags == 2){
								var firstPart2 = str.substring(0, indexSegment-1);
								var secondPart2 = str.substring(indexSecondCase3+2, str.length);
								urlSegment = firstPart2+'?'+secondPart2;
								window.location.assign(urlSegment);
							}
							else if(cptTags > 2){
								var firstPart2 = str.substring(0, indexSegment-1);
								var secondPart2 = str.substring(indexSecondCase3+1, str.length);
								urlSegment = firstPart2+secondPart2;
								window.location.assign(urlSegment);
							}	
						}
					}
				}
                
			}
		});

		<?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_segment'] ) AND !empty($_GET['id_segment'])){
				$ids_segment = explode(",", $_GET['id_segment']);
				$cpt=0;

				foreach($ids_segment as $id) {

					$getAllNamesOfSegments = $bdd->prepare('SELECT nom FROM segments WHERE id=? ORDER BY nom');
					$getAllNamesOfSegments->execute(array($id));
					if($getAllNamesOfSegments->rowCount() > 0){
						$cpt++;
					}
					
					while($segment = $getAllNamesOfSegments->fetch()){
						$nameOfSegment = $segment['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfSegment); ?>;
							mySelectCheckboxSegments.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
  
	});
</script>

	
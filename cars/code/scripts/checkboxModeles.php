<script>
$(function()
{
    var urlModele = "";
    var mySelectCheckboxModele = new checkbox_select(
    {
        selector : "#make_checkbox_select_modeles",
        selected_translationOne : "Modèle sélectionné",
        selected_translation : "Modèles sélectionnés",
        all_translation : "Tous les modèles",
        not_found : "Aucun modèle trouvé",
        
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
                    if(indexModele !== -1){
                        for(var i = indexModele; i < str.length; i++){
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
                            var firstPart = str.substring(0, indexModele+10);
                            urlModele=firstPart+e.selected;
                            window.location.assign(urlModele);
                        }else{
                            var firstPart2 = str.substring(0, indexModele+10);
                            var secondPart2 = str.substring(indexSecondCase+1, str.length);
                            urlModele = firstPart2+e.selected+secondPart2;
                            window.location.assign(urlModele);
                        }
                        
                    }else{
                        urlModele = window.location.href+"&id_modele="+e.selected;
                        window.location.assign(urlModele);
                    }
                }
                //il n'y a pas d'autres composants
                else{
                    urlModele = window.location.href+"?id_modele="+e.selected;
                    window.location.assign(urlModele);
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
                if(indexModele !== -1){
                    for(var i = indexModele; i < str.length; i++){
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
                        var firstPart = str.substring(0, indexModele-1);
                        window.location.assign(firstPart);
                    }else{
                        if(str.charAt(indexModele-1) == '?'){
                            var firstPart2 = str.substring(0, indexModele);
                            var secondPart2 = str.substring(indexSecondCase3+2, str.length);
                            urlModele = firstPart2+secondPart2;
                            window.location.assign(urlModele);
                        }
                        else if(cptTags == 2){
                            var firstPart2 = str.substring(0, indexModele-1);
                            var secondPart2 = str.substring(indexSecondCase3+2, str.length);
                            urlModele = firstPart2+'?'+secondPart2;
                            window.location.assign(urlModele);
                        }
                        else if(cptTags > 2){
                            var firstPart2 = str.substring(0, indexModele-1);
                            var secondPart2 = str.substring(indexSecondCase3+1, str.length);
                            urlModele = firstPart2+secondPart2;
                            window.location.assign(urlModele);
                        }	
                    }
                }
            }
            
        },

        
    });

    <?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_modele'] ) AND !empty($_GET['id_modele'])){
				$ids_modele = explode(",", $_GET['id_modele']);
				$cpt=0;

				foreach($ids_modele as $id) {

					$getAllNamesOfModeles = $bdd->prepare('SELECT nom FROM modeles WHERE id=? ORDER BY nom');
					$getAllNamesOfModeles->execute(array($id));
					if($getAllNamesOfModeles->rowCount() > 0){
						$cpt++;
					}
					
					while($modele = $getAllNamesOfModeles->fetch()){
						$nameOfModele = $modele['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfModele); ?>;
							mySelectCheckboxModele.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
    
});
</script>
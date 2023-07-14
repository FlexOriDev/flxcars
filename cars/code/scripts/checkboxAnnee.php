<script>
$(function()
{
    var urlAnnee = "";
    var mySelectCheckboxAnnee = new checkbox_select(
    {
        selector : "#make_checkbox_select_year",
        selected_translationOne : "Année sélectionnée",
        selected_translation : "Années sélectionnées",
        all_translation : "Toutes les années",
        not_found : "Aucune Année trouvée",
        
        // Event during initialization
        onApply : function(e)
        {

            var str = window.location.href;

            var indexConstructeur = str.indexOf("id_constructeur");
            var indexType = str.indexOf("id_type");
            var indexModele = str.indexOf("id_modele");
            var indexAnnee = str.indexOf("id_annee");

            var firstCase = false;
            var secondCase = false;
            var indexSecondCase = -1;

            if(e.selected.length !== 0){

                //Il existe deja une requete dans les composants
                if(indexConstructeur !== -1 | indexType !== -1 | indexModele !== -1 | indexAnnee !== -1){
                    if(indexAnnee !== -1){
                        for(var i = indexAnnee; i < str.length; i++){
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
                            var firstPart = str.substring(0, indexAnnee+9);
                            urlAnnee=firstPart+e.selected;
                            window.location.assign(urlAnnee);
                        }else{
                            var firstPart2 = str.substring(0, indexAnnee+9);
                            var secondPart2 = str.substring(indexSecondCase+1, str.length);
                            urlAnnee = firstPart2+e.selected+secondPart2;
                            window.location.assign(urlAnnee);
                        }
                        
                    }else{
                        urlAnnee = window.location.href+"&id_annee="+e.selected;
                        window.location.assign(urlAnnee);
                    }
                }
                //il n'y a pas d'autres composants
                else{
                    urlAnnee = window.location.href+"?id_annee="+e.selected;
                    window.location.assign(urlAnnee);
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
                if(indexAnnee !== -1){
                    for(var i = indexAnnee; i < str.length; i++){
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
                        var firstPart = str.substring(0, indexAnnee-1);
                        window.location.assign(firstPart);
                    }else{
                        if(str.charAt(indexAnnee-1) == '?'){
                            var firstPart2 = str.substring(0, indexAnnee);
                            var secondPart2 = str.substring(indexSecondCase3+2, str.length);
                            urlAnnee = firstPart2+secondPart2;
                            window.location.assign(urlAnnee);
                        }
                        else if(cptTags == 2){
                            var firstPart2 = str.substring(0, indexAnnee-1);
                            var secondPart2 = str.substring(indexSecondCase3+2, str.length);
                            urlAnnee = firstPart2+'?'+secondPart2;
                            window.location.assign(urlAnnee);
                        }
                        else if(cptTags > 2){
                            var firstPart2 = str.substring(0, indexAnnee-1);
                            var secondPart2 = str.substring(indexSecondCase3+1, str.length);
                            urlAnnee = firstPart2+secondPart2;
                            window.location.assign(urlAnnee);
                        }	
                    }
                }
            }
        },

        
    });

    <?php 
			// recherche par constructeur automobile
			if(isset($_GET['id_annee'] ) AND !empty($_GET['id_annee'])){
				$ids_annee = explode(",", $_GET['id_annee']);
				$cpt=0;

				foreach($ids_annee as $id) {

					$getAllNamesOfAnnees = $bdd->prepare('SELECT nom FROM annees WHERE id=? ORDER BY nom');
					$getAllNamesOfAnnees->execute(array($id));
					if($getAllNamesOfAnnees->rowCount() > 0){
						$cpt++;
					}
					
					while($annee = $getAllNamesOfAnnees->fetch()){
						$nameOfAnnee = $annee['nom'];
						?>
							var variableRecuperee = <?php echo json_encode($nameOfAnnee); ?>;
							mySelectCheckboxAnnee.check(variableRecuperee, 'checked');
						<?php
					
					}
				}
			
			}
		?>
    
});
</script>
<script>
   $(function()
	{
		
		var mySelectCheckbox = new checkbox_select(
		{
			selector : "#make_checkbox_select_marques",
            selected_translation : "Sélectionnés",
            all_translation : "Toutes les marques",
            not_found : "Aucune marque trouvée",
			
			// Event during initialization
			onApply : function(e)
			{

				alert("Custom Event: " + e.selected);
				
				
			},

			
		});
		
		//document.write (mySelectCheckbox);
	});
</script>


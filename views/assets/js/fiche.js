$(document).ready(function(){

	feedbackIcons = {
		valid : 'glyphicon glyphicon-ok',
		invalid : 'glyphicon glyphicon-remove',
		validating : 'glyphicon glyphicon-refresh'
	};

	validators = {
		notEmpty : {
			message : 'Champ obligatoire'
		}
	};

	$('#form_addFiche').bootstrapValidator({
		feedbackIcons : feedbackIcons,
		onError: function(e) {},
		onSuccess: function(e) {
		},
		fields : {
			'libelle_fiche':{
				validators : validators
			},
			'description_fiche':{
				validators : validators
			},
			'categorie_fiche':{
				validators : validators
			}
		}
	});

	$('#form_editFiche').bootstrapValidator({
		feedbackIcons : feedbackIcons,
		onError: function(e) {},
		onSuccess: function(e) {
		},
		fields : {
			'libelle_fiche_edit':{
				validators : validators
			},
			'description_fiche_edit':{
				validators : validators
			},
			'categorie_fiche_edit':{
				validators : validators
			}
		}
	});

	$("html").on("click","#btnAdd",function(e){
		e.preventDefault();
		$('#addFiche').modal('show');
	});

	/*fonction ajout fiche*/
	$("html").on('click',"#ajout",function(e){
		e.preventDefault();
		$('#form_addFiche').data('bootstrapValidator').validate();
		$('#form_addFiche').bootstrapValidator("revalidateField","libelle_fiche");
		$('#form_addFiche').bootstrapValidator("revalidateField","description_fiche");
		$('#form_addFiche').bootstrapValidator("revalidateField","categorie_fiche");
		var form_valid = $('#form_addFiche').data('bootstrapValidator').isValid();
		if(form_valid){
			libelle= $("#libelle_fiche").val();
			description= $("#description_fiche").val();
			categorie= $("#categorie_fiche").val();
			$.ajax({   
				url: 'index.php?action=createFiche',     
				type: 'POST',       
				data:{
					'libelle':libelle,
					'description': description,
					'categorie': categorie
				},
				dataType: 'html',
				success: function() {   
					location.reload();
				}
			});
		}
	});

	/*fonction suppression fiche*/
	$("html").on("click","#btnDelete",function(e){
		e.preventDefault();
		id_fiche= $(this).attr('name');
		if (confirm('Voulez-vous vraiment supprimer cette fiche? ')) {
			$.ajax({
				url: 'index.php?action=deleteFiche',
				type: 'POST',
				data:{
					'id_fiche': id_fiche
				},
				dataType: 'html',
				success : function(){
					location.reload();
				}
			})
		}
	});

	$("html").on("click","#btnUpdate",function(e){
		e.preventDefault();
		numLigne = $(this).attr('name');
		idFiche= $(".table").find('tr').eq(numLigne).find('td').eq(0).text();
		libelle= $(".table").find('tr').eq(numLigne).find('td').eq(1).text();
		description= $(".table").find('tr').eq(numLigne).find('td').eq(2).text();
		categories = [];
		$(".categorie"+idFiche).each(function(){
			categories.push($(this).attr("name"));
		});
		console.log(categories);
		$("#id_fiche_edit").val(idFiche);
		$("#libelle_fiche_edit").val(libelle);
		$("#description_fiche_edit").val(description);
		$("#categorie_fiche_edit").selectpicker('val', categories);
		$('#editFiche').modal('show');
	});

	/*fonction modification fiche*/
	$("html").on('click',"#updateFiche",function(e){
		$('#form_editFiche').data('bootstrapValidator').validate();
		$('#form_editFiche').bootstrapValidator("revalidateField","libelle_fiche_edit");
		$('#form_editFiche').bootstrapValidator("revalidateField","description_fiche_edit");
		$('#form_editFiche').bootstrapValidator("revalidateField","categorie_fiche_edit");
		var form_valid = $('#form_editFiche').data('bootstrapValidator').isValid();
		if(form_valid){
			e.preventDefault();
			idFiche= $("#id_fiche_edit").val();
			libelle= $("#libelle_fiche_edit").val();
			description= $("#description_fiche_edit").val();
			categorie = $("#categorie_fiche_edit").val();
			$.ajax({   
				url: 'index.php?action=updateFiche',     
				type: 'POST',       
				data:{
					'idFiche':idFiche,
					'libelle':libelle,
					'description': description,
					'categorie': categorie
				},
				dataType: 'html',
				success: function() {   
					location.reload();
				}
			});
		}
	});



});
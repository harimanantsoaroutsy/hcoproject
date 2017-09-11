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

	lastSelectednode=null;
	lastSelectednodeName=null;
	lastSelectednodeParent=null;

	$('#form_addCategorie').bootstrapValidator({
		feedbackIcons : feedbackIcons,
		onError: function(e) {},
		onSuccess: function(e) {
		},
		fields : {
			'nom_categorie':{
				validators : validators
			}
		}
	});

	$('#form_editCategorie').bootstrapValidator({
		feedbackIcons : feedbackIcons,
		onError: function(e) {},
		onSuccess: function(e) {
		},
		fields : {
			'libelle_categorie_edit':{
				validators : validators
			}
		}
	});

	/*charger l'arborescence categorie*/
	$.ajax({
		url: "index.php?action=getTree",
		type: "GET",
		dataType: "json",  
		success: function(response){
			$('#treeview').treeview({data: response});
		}
	});

	/*A la selection d'un noeud*/
	$("html").on('nodeSelected',"#treeview", function(event, data){
		lastSelectednode = data.id;
		lastSelectednodeName=data.text;
		lastSelectednodeParent=data.parent_id;
		if(lastSelectednodeParent===null){
			$('#btnUpdateNode').attr("disabled",true);
			$('#deleteNode').attr("disabled",true);
		}
	});
	
	/*a la deselection d'un noeud*/
	$("html").on('nodeUnselected',"#treeview", function(event, data){
		lastSelectednode = null;
		lastSelectednodeName=null;
		lastSelectednodeParent=null;
		if(lastSelectednodeParent===null){
			$('#btnUpdateNode').attr("disabled",false);
			$('#deleteNode').attr("disabled",false);
		}
	});

	/*fonction suppression categorie*/
	$("html").on("click","#deleteNode",function(e){
		e.preventDefault();
		if(lastSelectednode!==null){
			if (confirm('Voulez-vous vraiment supprimer cette categorie? ')) {
				$.ajax({
					url: 'index.php?action=deleteNode',
					type: 'POST',
					data:{
						'id_categorie': lastSelectednode
					},
					dataType: 'html',
					success : function(){
						location.reload();
					}
				})
			}
		}
	});

	$("html").on("click","#btnAddNode",function(e){
		e.preventDefault();
		if(lastSelectednodeName!==null){
			$("#parent_categorie").val(lastSelectednodeName);
			$('#addCategorie').modal('show');
		}
	});

	/*fonction ajout categorie*/
	$("html").on("click","#addNode",function(e){
		e.preventDefault();
		$('#form_addCategorie').data('bootstrapValidator').validate();
		$('#form_addCategorie').bootstrapValidator("revalidateField","nom_categorie");
		var form_valid = $('#form_addCategorie').data('bootstrapValidator').isValid();
		if(form_valid){
			id_parent = lastSelectednode;
			libelle_categorie = $("#nom_categorie").val();
			$.ajax({
				url: 'index.php?action=addNode',
				type: 'POST',
				data:{
					'id_parent': id_parent,
					'libelle_categorie': libelle_categorie
				},
				dataType: 'html',
				success : function(){
					location.reload();
				}
			})
		}

	});

	$("html").on("click","#btnUpdateNode",function(e){
		e.preventDefault();
		if(lastSelectednode!==null){
			$("#id_categorie_edit").val(lastSelectednode);
			$("#libelle_categorie_edit").val(lastSelectednodeName);
			$("#id_parent").val(lastSelectednodeParent);
			$('#editCategorie').modal('show');
		}
	});

	/*fonction modification categorie*/
	$("html").on("click","#updateNode",function(e){
		e.preventDefault();
		$('#form_editCategorie').data('bootstrapValidator').validate();
		$('#form_editCategorie').bootstrapValidator("revalidateField","libelle_categorie_edit");
		var form_valid = $('#form_editCategorie').data('bootstrapValidator').isValid();
		if(form_valid){
			id_categorie=$("#id_categorie_edit").val();
			libelle_categorie=$("#libelle_categorie_edit").val();
			id_parent = $("#id_parent").val();
			$.ajax({
				url: 'index.php?action=updateNode',
				type: 'POST',
				data:{
					'id_categorie': id_categorie,
					'libelle_categorie': libelle_categorie,
					'id_parent': id_parent
				},
				dataType: 'html',
				success : function(){
					location.reload();
				}
			})
		}
	});

});
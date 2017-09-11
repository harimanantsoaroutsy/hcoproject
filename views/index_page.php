<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini-annuaire</title>
	<link rel="stylesheet" type="text/css" href="views/assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="views/assets/css/style.css">
	<link rel="stylesheet" href="views/assets/bootstrap/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="views/assets/bootstrap/css/bootstrap-treeview.css" media="all">
</head>
<body>
	<div class="container">
		<div class="row" id="titre">
			<img src="views/assets/images/titre.png"/>
		</div>
		<div class="row" id="corps">
			<div class="col-lg-4">
				<div class="row-fluid">
					<div class="title">
						<h4>CATEGORIES</h4>
						<p>Veuillez selectionner une catégorie avant d'effectuer une action!</p>
					</div>
					<button class="btn btn-success btn-sm" id="btnAddNode">Ajouter</button>
					<button class="btn btn-primary btn-sm" id="btnUpdateNode">Modifier</button>
					<button  class="btn btn-danger btn-sm" id="deleteNode">Supprimer</button>
				</div>
				<div class="row-fluid" id="treeview"></div>
			</div>
			<div class="col-lg-8" id="contentFiche">
				<div class="title">
					<h4>FICHES</h4>
				</div>
				<button class="btn btn-success btn-sm pull-right" id="btnAdd"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th class="table-head">Identifiant</th>
							<th class="table-head">Libellé</th>
							<th class="table-head">Description</th>
							<th class="table-head">Catégories</th>
							<th class="table-head">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$index=1;
						foreach ($fiche as $key => $item) {
							?>
							<tr>
								<td><?= $item['id_fiche'] ?></td>
								<td><?= $item['libelle_fiche'] ?></td>
								<td><?= $item['description_fiche'] ?></td>
								<td>
									<ul>
										<?php
										foreach ($item['categories'] as $key_categories => $lien_cat_fiche) {
											?>
											<li class="categorie<?= $item['id_fiche'] ?>" name="<?= $lien_cat_fiche['id_categorie'] ?>"><?= $lien_cat_fiche['libelle_categorie'] ?></li>
											<?php
										}
										?>
									</ul>
								</td>
								<td>
									<button class="btn btn-info btn-xs" name="<?= $index ?>" id="btnUpdate"><span class="glyphicon glyphicon-pencil"></span></button>
									<button class="btn btn-danger btn-xs" name="<?= $item['id_fiche'] ?>" id="btnDelete"><span class="glyphicon glyphicon-trash"></span></button>
								</td>
							</tr>
							<?php
							$index++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="views/assets/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="views/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="views/assets/bootstrap/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="views/assets/bootstrap/js/bootstrap-treeview.js"></script>
	<script type="text/javascript" src="views/assets/js/categorie.js"></script>
	<script type="text/javascript" src="views/assets/js/fiche.js"></script>
	<script type="text/javascript" src="views/assets/bootstrap/js/bootstrapValidator.min.js"></script>

	<?php include('views/editCategorie_popup.php'); ?>
	<?php include('views/addCategorie_popup.php'); ?>
	<?php include('views/addFiche_popup.php'); ?>
	<?php include('views/editFiche_popup.php'); ?>
	
</body>
</html>
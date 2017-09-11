<?php
require_once __DIR__.'/../models/fiche_model.php';

class Fiche{

	private $fiches;

	public function __construct(){
		$this->fiches = new Fiche_model();
	}

	/*fonction de creation fiche*/
	public function create(){
		if(isset($_POST['description']) && isset($_POST['libelle']) && isset($_POST['categorie'])){
			$description = htmlspecialchars($_POST['description']) ;
			$libelle = htmlspecialchars($_POST['libelle']);
			$categories = $_POST['categorie'];
			if($description!='' && $libelle!='' && $categories!=''){
				$result = $this->fiches->add($libelle, $description, $categories);
			}
		}
	}

	/*fonction de suppression fiche*/
	public function delete(){
		if(isset($_POST['id_fiche'])){
			$idFiche = $_POST['id_fiche'];
			if($idFiche != ''){
				$this->fiches->delete($idFiche);
			}
		}
	}

	/*fonction de modification fiche*/
	public function update(){
		if(isset($_POST['description']) && isset($_POST['libelle']) && isset($_POST['idFiche']) && isset($_POST['categorie'])){
			$description = htmlspecialchars($_POST['description']) ;
			$libelle = htmlspecialchars($_POST['libelle']);
			$idFiche = htmlspecialchars($_POST['idFiche']);
			$categories = $_POST['categorie'];
			if($description!='' && $libelle!='' && $categories!='' && $idFiche!=''){
				$result = $this->fiches->update($idFiche, $libelle, $description,$categories);
			}
		}
	}

}
?>
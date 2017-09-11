<?php
require_once __DIR__.'/../models/categorie_model.php';
require_once __DIR__.'/../models/fiche_model.php';

class Categorie{

	private $fiches;
	private $categories;

	public function __construct(){
		$this->fiches = new Fiche_model();
		$this->categories = new Categorie_model();
	}

	/*charger la page principale*/
	public function show_indexPage(){
		$categorie = $this->categories->selectAll();
		$fiche = $this->fiches->selectAll();
		include('views/index_page.php');
	}

	/*recuperer les donnees formant l'arbre*/
	public function getAll(){
		$data = $this->categories->getTree();
		$itemsByReference = array();
		// Build array of item references:
		foreach($data as $key => &$item) {
			$itemsByReference[$item['id']] = &$item;
	    // Children array:
			$itemsByReference[$item['id']]['nodes'] = array();
		}
		// Set items as children of the relevant parent item.
		foreach($data as $key => &$item)  {
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']])) {
				$itemsByReference [$item['parent_id']]['nodes'][] = &$item;
			}
		}
		// Remove items that were added to parents elsewhere:
		foreach($data as $key => &$item) {
			if(empty($item['nodes'])) {
				unset($item['nodes']);
			}
			if($item['parent_id'] && isset($itemsByReference[$item['parent_id']])) {
				unset($data[$key]);
			}
		}
		// Encode:
		echo json_encode($data);
	}

	/*supprimer un noeud*/
	public function delete(){
		if(isset($_POST['id_categorie'])){
			$idCategorie = htmlspecialchars($_POST['id_categorie']) ;
			if($idCategorie != ''){
				$this->categories->delete($idCategorie);
			}
		}
	}

	/*ajouter un noeud*/
	public function create(){
		if(isset($_POST['id_parent']) && isset($_POST['libelle_categorie'])){
			$libelle = htmlspecialchars($_POST['libelle_categorie']);
			$parent_id = htmlspecialchars($_POST['id_parent']);
			if($libelle!='' && $parent_id!=''){
				$result = $this->categories->add($libelle, $parent_id);
			}
		}
	}

	/*modifier un noeud*/
	public function update(){
		if(isset($_POST['id_categorie']) && isset($_POST['libelle_categorie']) && isset($_POST['id_parent'])){
			$libelle = htmlspecialchars($_POST['libelle_categorie']);
			$parent_id = htmlspecialchars($_POST['id_parent']);
			$idCategorie = htmlspecialchars($_POST['id_categorie']) ;
			if($libelle!='' && $parent_id!=''){
				$result = $this->categories->update($idCategorie , $libelle, $parent_id);
			}
		}
	}
}
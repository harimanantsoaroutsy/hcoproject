<?php
require_once __DIR__.'/../models/model.php';
class Fiche_model extends Model{

	public function selectAll(){

		$statement = 'SELECT * FROM fiche';
		$fiche = $this->query($statement);
		$data =array();
		while($row=$fiche->fetch()){
			foreach ($row as $key => $fichem) {
				$row['categories'] = $this->getCategories($row['id_fiche']);
			}	
			array_push($data, $row);	
		}
		return $data;
	}

	public function add($libelle, $description, $categories){
		$statement = "INSERT INTO fiche (libelle_fiche, description_fiche) VALUES ('".$libelle."', '".$description."')";
		$this->query($statement);
		$last_id = $this->getLastInsert();
		foreach ($categories as $key => $categorie) {
			$statement1 = "INSERT INTO lien_categ_fiche (id_fiche, id_categorie) VALUES (".$last_id.", ".$categorie.")";
			$this->query($statement1);
		}
	}

	public function delete($idFiche){
		$statement = "DELETE FROM fiche WHERE id_fiche = '".$idFiche."'";
		$this->query($statement);
	}

	public function update($idFiche, $libelle, $description,$categories){
		$statement = "UPDATE fiche SET libelle_fiche = '".$libelle."', description_fiche = '".$description."' WHERE id_fiche = '".$idFiche."' ";
		$this->query($statement);
		$statement1 = "DELETE FROM lien_categ_fiche WHERE id_fiche = '".$idFiche."'";
		$this->query($statement1);

		foreach ($categories as $key => $categorie) {
			$statement2 = "INSERT INTO lien_categ_fiche (id_fiche, id_categorie) VALUES (".$idFiche.", ".$categorie.")";
		$this->query($statement2);
		}
	}

	private function getCategories($idFiche){
		$statement = "SELECT lien_categ_fiche.id_categorie, categorie.libelle_categorie FROM lien_categ_fiche INNER JOIN categorie ON lien_categ_fiche.id_categorie = categorie.id_categorie INNER JOIN fiche ON lien_categ_fiche.id_fiche = fiche.id_fiche WHERE lien_categ_fiche.id_fiche = " . $idFiche;
		$categories_fiche = $this->query($statement);
		$data =array();
		while($row=$categories_fiche->fetch()){
		 	array_push($data, $row);
		}
		return $data;
	}
}
?>
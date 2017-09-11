<?php
require_once __DIR__.'/../models/model.php';
class Categorie_model extends Model{

	public function selectAll(){
		$statement = 'SELECT * FROM categorie';
		$cat = $this->query($statement);
		$data =array();
		 while($row=$cat->fetch()){
		 	array_push($data, $row);
		 }
		 return $data;
	}

	public function getTree(){

		$statement = 'SELECT * FROM categorie';
		$categorie = $this->query($statement);
		$data =array();
		while ($row=$categorie->fetch()){
			$tmp = array();
			$tmp['id'] = $row['id_categorie'];
			$tmp['text'] = $row['libelle_categorie'];
			$tmp['parent_id'] = $row['id_parent'];
			array_push($data, $tmp); 	
		}		
		return $data;
	}

	public function delete($idCategorie){
		$statement = "DELETE FROM categorie WHERE id_categorie = '".$idCategorie."'";
		$this->query($statement);
	}

	public function add($libelle, $parent_id){

		$statement = "INSERT INTO categorie (libelle_categorie, id_parent) VALUES ('".$libelle."', '".$parent_id."')";
		if($parent_id=='null'){
			$sql = "INSERT INTO categorie (libelle) VALUES ('".$libelle."')";
		}
		$this->query($statement);
	}

	public function update($idCategorie, $libelle, $parent_id){
		$statement = "UPDATE categorie SET libelle_categorie = '".$libelle."', id_parent = '".$parent_id."' WHERE id_categorie = '".$idCategorie."' ";
		if($parent_id=='null'){
			$sql = "UPDATE categorie (libelle_categorie) VALUES ('".$libelle."')";
		}
		$this->query($statement);
	}
}
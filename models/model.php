<?php
require_once __DIR__.'/../models/connexion.php';

abstract class Model{

	protected $connexion;

	public function __construct(){
		$this->connexion = Connexion::getInstance()->getPDO();
	}

	/*fonction d execution query*/
	protected function query($statement)
	{
		return $this->connexion->query($statement);
	}

	/*fonction de récuperation id derniere insertion dans la bdd*/
	protected function getLastInsert(){
		return $this->connexion->lastInsertId();
	}
}
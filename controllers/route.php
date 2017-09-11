<?php
require_once 'fiche.php';
require_once 'categorie.php';

class Route{

	private $fiche;
	private $categorie;

	public function __construct(){
		$this->fiche = new Fiche();
		$this->categorie = new Categorie();

	}

	public function run(){
		try{
			if(!isset($_GET['action'])){
				$this->categorie->show_indexPage();
			}
			else{
				switch ($_GET['action']) {
					case 'getTree':
						$this->categorie->getAll();
						break;
					case 'addNode':
						$this->categorie->create();
						break;

					case 'updateNode':
						$this->categorie->update();
						break;

					case 'deleteNode':
						$this->categorie->delete();
						break;
					
					case 'createFiche':
						$this->fiche->create();
						break;

					case 'deleteFiche':
						$this->fiche->delete();
						break;

					case 'updateFiche':
						$this->fiche->update();
						break;

					default:
						# code...
						break;
				}

			}
		}
		catch(Exception $e){
			print $e->getMessage();
		}
	}
	
}
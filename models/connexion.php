<?php
class Connexion
{
    private static $instance = null;
    private $_pdo = null;
    private $_host = "localhost";
    private $_login = "root";
    private $_passwd = "root";
    private $_database = "annuairedb";
     
    private function __construct()
    {
        $this->_pdo = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database, $this->_login, $this->_passwd);
        $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
     
     /*instanciation de l'objet connexion à l interieur d elle meme*/
    public static function getInstance()
    {
        if(is_null(self::$instance)) self::$instance = new Connexion();
        return self::$instance;
    }
    
    public function getPDO(){
        return $this->_pdo;
    }
}
?>
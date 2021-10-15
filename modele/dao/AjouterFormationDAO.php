<?php
class AjouterFormationDAO extends PDO{

  private static $instance;

  public static function getInstance(){
      if ( !self::$instance ){
          self::$instance = new DBConnex();
      }
      return self::$instance;
  }

  public function __construct(){
      try {
          parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
      }
      catch (Exception $e) {
          echo $e->getMessage();
          die("Impossible de se connecter.") ;
      }
  }
  public function ajouterformation(){
    $requeteAjouterFormation = DBConnex::getInstance()->prepare("
    INSERT INTO formation VALUES('','','','','','','')
    ");
    $requeteAjouterFormation->query();
    $donneeAjouterFormation=$requeteAjouterFormation->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAjouterFormation;
  }

  public function getlastid(){
    $requeteGetLastId = DBConnex::getInstance()->prepare("
    SELECT idForma
    FROM formation
    ORDER BY idForma DESC
    LIMITE 1
    ")
  }
}

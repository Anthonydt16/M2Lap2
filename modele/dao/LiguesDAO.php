<?php
class LigueDAO extends PDO{

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

  public function getligues(){

      $requete = DBConnex::getInstance()->prepare("SELECT * FROM `ligue`");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function ajoutLigue($idLigue,$nomLigue,$site, $descriptif){
      $requete = DBConnex::getInstance()->prepare("INSERT INTO ligue (idLigue, nomLigue, site, descriptif)
      VALUES (:idLigue,:nomLigue,:site,:descriptif)");
      $requete->bindParam(":idLigue",$idLigue);
      $requete->bindParam(":nomLigue",$nomLigue);
      $requete->bindParam(":site",$site);
      $requete->bindParam(":descriptif",$descriptif);
      $requete->execute();

  }

  public function updateLigue($idLigue,$nomLigue,$site, $descriptif){
  $requete = DBConnex::getInstance()->prepare("UPDATE ligue SET nomLigue=:nomLigue , site=:site , descriptif=:descriptif WHERE idLigue = :idLigue");
  $requete->bindParam(":idLigue",$idLigue);
  $requete->bindParam(":nomLigue",$nomLigue);
  $requete->bindParam(":site",$site);
  $requete->bindParam(":descriptif",$descriptif);
  $requete->execute();

  }

  public function suppLigue($nomLigue){

      $requete = DBConnex::getInstance()->prepare("DELETE FROM ligue WHERE idLigue = :idLigue");
      $requete->bindParam(":idLigue",$idLigue);
      $requete->execute();
  }

}

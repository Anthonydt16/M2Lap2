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

  public function ajoutLigue($idLigue,$nomLigue,$site, $description){
      $requete = DBConnex::getInstance()->prepare("INSERT INTO `ligue` (`idLigue`, `nomLigue`, `site`, `description`) VALUES
      (:idLigue,:nomLigue,:site,:description)");
      $requete->bindParam(":idLigue",$idLigue);
      $requete->bindParam(":nomLigue",$nomLigue);
      $requete->bindParam(":site",$site);
      $requete->bindParam(":description",$description);
      $requete->execute();

  }

  public function updateLigue($idLigue,$nomLigue,$site, $description){
  $requete = DBConnex::getInstance()->prepare("UPDATE `ligue` SET idLigue=:idLigue , nomLigue=:nomLigue , site=:site , description=:description");
  $requete->bindParam(":idLigue",$idLigue);
  $requete->bindParam(":nomLigue",$nomLigue);
  $requete->bindParam(":site",$site);
  $requete->bindParam(":description",$description);
  $requete->execute();

  }

  public function suppLigue($nomLigue){

      $requete = DBConnex::getInstance()->prepare("DELETE FROM `ligue` WHERE `nomLigue` = :nomLigue");
      $requete->bindParam(":nomLigue",$nomLigue);
      $requete->execute();
  }
}

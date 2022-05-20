<?php
class ClubDAO extends PDO{

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

  public function getclubs(){

      $requete = DBConnex::getInstance()->prepare("SELECT * FROM `club`");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function ajoutClub($idClub,$nomClub,$adresseClub, $idLigue, $idCommune){
      $requete = DBConnex::getInstance()->prepare("INSERT INTO club (idClub, nomClub, adresseClub, idLigue, idCommune)
      VALUES (:idClub,:nomClub,:adresseClub,:idLigue,:idCommune)");
      $requete->bindParam(":idClub",$idClub);
      $requete->bindParam(":nomClub",$nomClub);
      $requete->bindParam(":adresseClub",$adresseClub);
      $requete->bindParam(":idLigue",$idLigue);
      $requete->bindParam(":idCommune",$idCommune);
      $requete->execute();

  }


  public function updateClub($idClub,$nomClub,$adresseClub, $idLigue, $idCommune){
  $requete = DBConnex::getInstance()->prepare("UPDATE club SET nomClub=:nomClub , adresseClub=:adresseClub , idLigue=:idLigue , idCommune=:idCommune WHERE idClub = :idClub");
  $requete->bindParam(":idClub",$idClub);
  $requete->bindParam(":nomClub",$nomClub);
  $requete->bindParam(":adresseClub",$adresseClub);
  $requete->bindParam(":idLigue",$idLigue);
  $requete->bindParam(":idCommune",$idCommune);
  $requete->execute();

  }

  public function suppClub($nomClub){

      $requete = DBConnex::getInstance()->prepare("DELETE FROM club WHERE idClub = :idClub");
      $requete->bindParam(":idClub",$idClub);
      $requete->execute();
  }



}

?>

<?php
class BulletinDAO extends PDO{

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

  public function bulletinFull(){
      $requete = DBConnex::getInstance()->prepare("SELECT * FROM bulletin");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function bulletinSupp($idBulletin){

      $requete = DBConnex::getInstance()->prepare("DELETE FROM `bulletin` WHERE `idbulletin` = :id");
      $requete->bindParam(":id",$idBulletin);
      $requete->execute();
  }
  public function bulletin($idContrat){

      $requete = DBConnex::getInstance()->prepare("SELECT * FROM bulletin where idContrat = :idContrat");
      $requete->bindParam(":idContrat",$idContrat);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
  public function ajoutBulletin($idbulletin,$mois,$annee, $bulletinPDF, $idContrat){
// chanmps de la requete `idbulletin``mois``annee``bulletinPDF``idContrat`
      $requete = DBConnex::getInstance()->prepare("INSERT INTO bulletin VALUES (:idbulletin,:mois,:annee,:bulletinPDF,:idContrat)");
      $requete->bindParam(":idbulletin",$idbulletin);
      $requete->bindParam(":mois",$mois);
      $requete->bindParam(":annee",$annee);
      $requete->bindParam(":bulletinPDF",$bulletinPDF);
      $requete->bindParam(":idContrat",$idContrat);
      $requete->execute();

  }
  public function groupeBulletinRapportContrat($idContrat){
// chanmps de la requete `idbulletin` `mois` `annee` `bulletinPDF` `idContrat`
      $requete = DBConnex::getInstance()->prepare("SELECT b.idbulletin FROM `bulletin` as b, contrat as c where b.idContrat = c.idContrat and b.idContrat = :idContrat");
      $requete->bindParam(":idContrat",$idContrat);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;

  }

  public function updateBulletin($idbulletin,$mois,$annee, $bulletinPDF, $idContrat){
// chanmps de la requete `idbulletin``mois``annee``bulletinPDF``idContrat`
      $requete = DBConnex::getInstance()->prepare("UPDATE bulletin SET idbulletin=:idbulletin , mois=:mois , annee=:annee , bulletinPDF=:bulletinPDF , idContrat=:idContrat");
      $requete->bindParam(":idbulletin",$idbulletin);
      $requete->bindParam(":mois",$mois);
      $requete->bindParam(":annee",$annee);
      $requete->bindParam(":bulletinPDF",$bulletinPDF);
      $requete->bindParam(":idContrat",$idContrat);
      $requete->execute();

  }



}

?>

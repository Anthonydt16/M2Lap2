<?php
class AnnulerInscriptionDAO extends PDO{

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
  public function annulerinscription($idUser, $idForma){//fonction qui supprime l'inscription si on click sur annuler
    $requeteAccepter = DBConnex::getInstance()->prepare("
    DELETE FROM inscrire
    WHERE idForma = :idForma
    AND idUser = :idUser
    AND EtatInscrit = '0'
    ");
    $requeteAccepter->bindParam(':idForma', $idForma);
    $requeteAccepter->bindParam(':idUser', $idUser);
    $requeteAccepter->execute();
    $donneeAccepter=$requeteAccepter->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAccepter;
  }
}

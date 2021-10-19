<?php
class AccepterRefuserInscriptionDAO extends PDO{

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
  public function accepterinscription($idUser, $idForma){
    $requeteAccepter = DBConnex::getInstance()->prepare("
    UPDATE inscrire
    SET EtatInscrit = '1'
    WHERE idUser = :idUser
    AND idForma = :idForma
    ");
    $requeteAccepter->bindParam(':idForma', $idForma);
    $requeteAccepter->bindParam(':idUser', $idUser);
    $requeteAccepter->execute();
    $donneeAccepter=$requeteAccepter->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAccepter;
  }

  public function refuserinscription($idUser, $idForma){
    $requeteRefuser = DBConnex::getInstance()->prepare("
    DELETE FROM inscrire
    WHERE idUser = :idUser
    AND idForma = :idForma
    ");
    $requeteRefuser->bindParam(':idForma', $idForma);
    $requeteRefuser->bindParam(':idUser', $idUser);
    $requeteRefuser->execute();
    $donneeRefuser=$requeteRefuser->fetchall(PDO::FETCH_ASSOC);
    return $donneeRefuser;
  }
}
?>

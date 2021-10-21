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
  public function accepterinscription($idUser, $idForma){//fonction qui accepte l'inscription si on click sur accepter
    $requeteAccepter = DBConnex::getInstance()->prepare("
    UPDATE inscrire
    SET EtatInscrit = '1'
    WHERE idUser = :idUser
    AND idForma = :idForma
    ");//1 étant l'état accepté, et 0 l'état en attente
    $requeteAccepter->bindParam(':idForma', $idForma);
    $requeteAccepter->bindParam(':idUser', $idUser);
    $requeteAccepter->execute();
    $donneeAccepter=$requeteAccepter->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAccepter;
  }

  public function refuserinscription($idUser, $idForma){//fonction qui supprime la demande d'inscription
    $requeteRefuser = DBConnex::getInstance()->prepare("
    UPDATE inscrire
    SET EtatInscrit = '2'
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

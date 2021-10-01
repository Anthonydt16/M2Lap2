<?php

class ContratDAO extends PDO{
    use hydrate;
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
        } catch (Exception $e) {
            echo $e->getMessage();
            die("Impossible de se connecter.") ;
        }
    }

  public function contrat(){

      $requete = DBConnex::getInstance()->prepare("SELECT * FROM contrat");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
  public function contratUser($id){
      $requete = DBConnex::getInstance()->prepare("SELECT * FROM contrat where idUser = :id");

      $requete->bindParam(":id",$id);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function contratSupp($idContrat){

    $requete = DBConnex::getInstance()->prepare("DELETE FROM `contrat` WHERE `idContrat` = :id");
    $requete->bindParam(":id",$idContrat);
    $requete->execute();

  }


  public function nomContrat($idContrat){

      $requete = DBConnex::getInstance()->prepare("SELECT U.nom,U.prenom FROM utilisateur AS U, contrat AS C where C.idUser = U.idUser AND C.idContrat = :numIDContrat");
      $requete->bindParam(":numIDContrat",$idContrat);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
  public function ajoutContrat($idContrat,$dateDebut,$dateFin, $typeContrat, $nbheure, $iduser){
      $requete = DBConnex::getInstance()->prepare("INSERT INTO `contrat` (`idContrat`, `dateDebut`, `dateFin`, `typeContrat`, `nbHeures`, `idUser`) VALUES
      (:idContrat,:dateDebut,:dateFin,:typeContrat,:nbHeure,:idUser)");
      $requete->bindParam(":idContrat",$idContrat);
      $requete->bindParam(":dateDebut",$dateDebut);
      $requete->bindParam(":dateFin",$dateFin);
      $requete->bindParam(":typeContrat",$typeContrat);
      $requete->bindParam(":nbHeure",$nbheure);
      $requete->bindParam(":idUser",$iduser);
      $requete->execute();

  }

  public function RecupIDContrat($nom){
      $requete = DBConnex::getInstance()->prepare("SELECT c.idContrat FROM `Contrat` as b, contrat as c, utilisateur as u where c.idContrat = b.idContrat and c.idUser = u.idUser and u.nom =:nom");
      $requete->bindParam(":nom",$nom);
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee;
  }

  public function UpdateContrat($idContrat,$dateDebut,$dateFin, $typeContrat, $nbheure, $iduser){
      $requete = DBConnex::getInstance()->prepare("UPDATE `contrat` SET
      `idContrat` = :idContrat, `dateDebut` = :dateDebut, `dateFin`=:dateFin, `typeContrat`=:typeContrat, `nbHeures`:=nbHeure, `idUser`=:idUser");
      $requete->bindParam(":idContrat",$idContrat);
      $requete->bindParam(":dateDebut",$dateDebut);
      $requete->bindParam(":dateFin",$dateFin);
      $requete->bindParam(":typeContrat",$typeContrat);
      $requete->bindParam(":nbHeure",$nbheure);
      $requete->bindParam(":idUser",$iduser);
      $requete->execute();

  }


}

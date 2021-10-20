<?php
class FormationDAO extends PDO{

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
/*
Récupere les formations à venir en vérifiant que la personne ne soit pas déjà inscrite
*/
public function getformation($idUser){
      $requete = DBConnex::getInstance()->prepare("
      SELECT idForma, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
      FROM formation
      WHERE dateClotureInscriptions > NOW()
      AND idForma NOT IN (
        SELECT formation.idForma
        FROM inscrire, formation, utilisateur
        WHERE utilisateur.idUser = :idUser
        AND formation.idForma = inscrire.idForma
        AND utilisateur.idUser = inscrire.idUser
      )
      ORDER BY DateDebutFormation Limit 3");

      $requete->bindParam(":idUser", $idUser);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }

/*
*Récupère les formations dont la date de début de formation n'est pas déjà passée, et calcule le nombre de place restantes.
*/
public function getformationresponsable(){
    $requete2 = DBConnex::getInstance()->prepare("
    SELECT formation.idForma, ((EffectifMax)-(count(inscrire.idForma))) as PlacesRestantes, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation
    FROM formation LEFT JOIN inscrire ON inscrire.idForma = formation.idForma
    WHERE DateDebutFormation > NOW()
    GROUP BY formation.idForma
    ORDER BY DateDebutFormation
    ");
    $requete2->execute();
    $donnee2 = $requete2->fetchAll(PDO::FETCH_ASSOC);
    return $donnee2;
  }


  /*
  *S'inscrit à la formation sélectionnée.
  */
  public function demandeInscription($idForma, $idUser){
    $requeteMesFormations = DBConnex::getInstance()->prepare("
    INSERT INTO inscrire VALUES (:idForma, :idUser, '0', NOW())
    ");
    $requeteMesFormations->bindParam(":idForma", $idForma);
    $requeteMesFormations->bindParam(":idUser", $idUser);
    $requeteMesFormations->execute();
    $donneeMesFormations=$requeteMesFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeMesFormations;
  }
}

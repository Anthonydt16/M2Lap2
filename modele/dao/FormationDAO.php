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
public function getformation($login){
      $requete = DBConnex::getInstance()->prepare("
      SELECT formation.idForma, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
      FROM formation
      WHERE dateClotureInscriptions > NOW() AND formation.idForma NOT IN (
        SELECT formation.idForma
        FROM inscrire, formation, utilisateur
        WHERE login = :login
        AND EtatInscrit <> 1
        AND formation.idForma = inscrire.idForma
        AND utilisateur.idUser = inscrire.idUser
      )
      ORDER BY DateDebutFormation Limit 3");

      $requete->bindParam(":login", $login);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
/*
Récupère les formations donc la date de début de formation n'est pas déjà passée, et calcule le nombre de place restantes.
*/
public function getformationresponsable(){
    $requete2 = DBConnex::getInstance()->prepare("
    SELECT ((EffectifMax)-(count(inscrire.idForma))) as PlacesRestantes, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation
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
Récupère les formations auxquelles l'utilisateur connecté est inscrit pour lui afficher ses futures formations.
*/
public function getmesformations(){
  $requeteMesFormations = DBConnex::getInstance()->prepare("
  SELECT intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
  FROM formation, inscrire
  WHERE login = :login
    AND EtatInscrit = 1
    AND DateDebutFormation > NOW()
    AND inscrire.idForma = formation.idForma
  ORDER BY DateDebutFormation
  Limit 3
  ");
  $requeteMesFormations->execute();
  $donneeMesFormations=$requeteMesFormations->fetchAll(PDO::FETCH_ASSOC);
  return $donneeMesFormations;
}
}

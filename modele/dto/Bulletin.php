<?php
class Bulletin{
    use hydrate;

  private $idbulletin;
  private $mois;
  private $annee;
  private $bulletinPDF;
  private $idContrat;
  public function __construct(){

  }

public function getIdbulletin(){
  return $this->idbulletin;
}

public function setIdbulletin($idbulletin){
  $this->idbulletin = $idbulletin;
}

public function getMois(){
  return $this->mois;
}

public function setMois($mois){
  $this->mois = $mois;
}

public function getAnnee(){
  return $this->annee;
}

public function setAnnee($annee){
  $this->annee = $annee;
}

public function getBulletinPDF(){
  return $this->bulletinPDF;
}

public function setBulletinPDF($bulletinPDF){
  $this->bulletinPDF = $bulletinPDF;
}

public function getIdContrat(){
  return $this->idContrat;
}

public function setIdContrat($idContrat){
  $this->idContrat = $idContrat;
}
}

<?php
class Contrat{
  use Hydrate;
  private $idContrat;
  private $dateDebut;
  private $dateFin;
  private $typeContrat;
  private $nbHeures;
  private $idUser;

  public function __construct(){

  }

  public function getIdContrat(){
  		return $this->idContrat;
  	}

  	public function setIdContrat($idContrat){
  		$this->idContrat = $idContrat;
  	}

  	public function getDateDebut(){
  		return $this->dateDebut;
  	}

  	public function setDateDebut($dateDebut){
  		$this->dateDebut = $dateDebut;
  	}

  	public function getDateFin(){
  		return $this->dateFin;
  	}

  	public function setDateFin($dateFin){
  		$this->dateFin = $dateFin;
  	}

  	public function getTypeContrat(){
  		return $this->typeContrat;
  	}

  	public function setTypeContrat($typeContrat){
  		$this->typeContrat = $typeContrat;
  	}

  	public function getNbHeures(){
  		return $this->nbHeures;
  	}

  	public function setNbHeures($nbHeures){
  		$this->nbHeures = $nbHeures;
  	}

  	public function getIdUser(){
  		return $this->idUser;
  	}

  	public function setIdUser($idUser){
  		$this->idUser = $idUser;
  	}

}


 ?>

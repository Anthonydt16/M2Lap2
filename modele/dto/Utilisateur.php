<?php
class Utilisateur{
//attribut
    private $idUser;
    private $nom;
    private $prenom;
    private $login;
    private $statut;
    private $typeUser;
    private $idFonct;
    private $idLigue;
    private $idClub;

    //constructeur 
    public function __construct($pId, $pnom, $pprenom, $plogin, $pstatut, $ptypeUser, $pidFonct, $pidLigue, $pidClub){
        //on initialise l'objet 
        $idUse = $pId;
        $nom = $pnom;
        $prenom = $pprenom;
        $login = $plogin;
        $statut = $pstatut; 
        $typeUser = $ptypeUser;
        $idFonct = $pidFonct;
        $idLigue = $pidLigue;
        $idClub = $idLigue;

    }

    //methode d'utilisateur
	public function getIdUser() {
		return $this->$idUser;
	}

	public function setIdUser($idUser) {
		$this->$idUser = $idUser;
	}

    public function getNom() {
		return $this->$nom;
	}

	public function setNom( $nom) {
		$this->$nom = $nom;
	}

	public function getPrenom() {
		return $this->$prenom;
	}

    public function setPrenom( $prenom) {
		$this->$prenom = $prenom;
	}

	public function getLogin() {
		return $this->$login;
	}

	public function setLogin( $login) {
		$this->$login = $login;
	}

	public function getStatut() {
		return $this->$statut;
	}

	public function setStatut( $statut) {
		$this->$statut = $statut;
	}

	public function getTypeUser() {
		return $this->$typeUser;
	}

	public function setTypeUser( $typeUser) {
		$this->$typeUser = $typeUser;
	}

	public function getIdFonct() {
		return $this->$idFonct;
	}

	public function setIdFonct( $idFonct) {
		$this->$idFonct = $idFonct;
	}

	public function getIdLigue() {
		return $this->$idLigue;
	}

	public function setIdLigue( $idLigue) {
		$this->$idLigue = $idLigue;
	}

	public function getIdClub() {
		return $this->$idClub;
	}

	public function setIdClub( $idClub) {
		$this->$idClub = $idClub;
	}





}
?>
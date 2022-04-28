<?php

class Utilisateurs
{
    private $id;
    private $etablissement;
    private $matricule;
    private $nom;
    private $prenom;
    private $centreDeCout;
    private $centreAffection;
    private $dateCreation;
    private $dateModification;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getEtablissement(){
		return $this->etablissement;
	}

	public function setEtablissement($etablissement){
		$this->etablissement = $etablissement;
	}

	public function getMatricule(){
		return $this->matricule;
	}

	public function setMatricule($matricule){
		$this->matricule = $matricule;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getCentreDeCout(){
		return $this->centreDeCout;
	}

	public function setCentreDeCout($centreDeCout){
		$this->centreDeCout = $centreDeCout;
	}

	public function getCentreAffection(){
		return $this->centreAffection;
	}

	public function setCentreAffection($centreAffection){
		$this->centreAffection = $centreAffection;
	}

    public function getDateCreation(){
		return $this->dateCreation;
	}

	public function setDateCreation($dateCreation){
		$this->dateCreation = $dateCreation;
	}

	public function getDateModification(){
		return $this->dateModification;
	}

	public function setDateModification($dateModification){
		$this->dateModification = $dateModification;
	}

    public function Insert(string $etablissement, string $matricule, string $nom, string $prenom, string $centreDeCout, string $centreAffection ) {
        $REQUEST = "INSERT INTO `utilisateurs` (etablissement, matricule, nom, prenom, centreDeCout, centreAffection, dateCreation, dateModification) VALUES (:etablissement, :matricule, :nom, :prenom, :centreDeCout, :centreAffection, (SELECT NOW()), (SELECT NOW()));";
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            ':etablissement' => $etablissement,
            ':matricule' => $matricule,
            ':nom' => $nom,
            ':prenom' => $prenom,           
            ':centreDeCout' => $centreDeCout,
            ':centreAffection' => $centreAffection,
        ]);
        $QUERY->closeCursor();
    }

    public function Update(string $etablissement, string $matricule, string $nom, string $prenom, string $centreDeCout, string $centreAffection ) {
		$REQUEST = 'UPDATE `utilisateurs` SET etablissement = :etablissement, nom = :nom,prenom = :prenom, centreDeCout = :centreDeCout, centreAffection = :centreAffection, dateModification = (SELECT NOW()) WHERE `matricule` = :matricule';
        $QUERY = Connection()->prepare($REQUEST);
        $QUERY->execute([
            'etablissement' => $etablissement,
            'nom' => $nom,
            'prenom' => $prenom,
            'centreDeCout' => $centreDeCout,
            'centreAffection' => $centreAffection,
			'matricule' => $matricule
        ]);
        $QUERY->closeCursor();
    }

    

}
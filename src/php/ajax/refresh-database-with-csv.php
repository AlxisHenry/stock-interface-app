<?php
include '../functions.php';

set_time_limit(120);
$Users = new Utilisateurs();
$row = 1;

if (($handle = fopen("users.csv", "r")) !== FALSE) {

    while (($rowData = fgetcsv($handle, 1000, ",")) !== FALSE) {

		if($row === 1){ $row++; continue; }  
		
		$line = $rowData;

		$etablissement = $line[1];
		$matricule = $line[0];
		$nom = $line[2];
		$prenom = $line[3];
		$centreDeCout = $line[4];
		$centreAffection = $line[5];		

		if(Utilisateurs_OBJECT_($matricule, 'matricule') === false) {
			$Users->Insert($etablissement, $matricule, $nom, $prenom, $centreDeCout, $centreAffection);
		} else {

            $Update = false;

			$Info = Utilisateurs_OBJECT_($matricule, 'matricule');

			if ($Info->getEtablissement() !== $etablissement) {
				$Info->setEtablissement($etablissement);
				$Update = true;
			}
            if ($Info->getNom() !== $nom) {
				$Info->setNom($nom);
				$Update = true;
			}
            if ($Info->getPrenom() !== $prenom) {
				$Info ->setPrenom($prenom);
				$Update = true;
			}
            if ($Info->getCentreDeCout() !== $centreDeCout) {
				$Info->setCentreDeCout($centreDeCout);
				$Update = true;
			}
            if ($Info->getCentreAffection() !== $centreAffection) {
				$Info->setCentreAffection($centreAffection);
				$Update = true;
			}

			if ($Update) {
				$Users->Update($Info->getEtablissement(), 
							   $Info->getMatricule(),
							   $Info->getNom(),
							   $Info->getPrenom(),
							   $Info->getCentreDeCout(),
							   $Info->getCentreAffection());
			}

		}

		$row++;

	}

	fclose($handle);
    die();

}
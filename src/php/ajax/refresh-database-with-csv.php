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
		} elseif(Utilisateurs_OBJECT_($matricule, 'matricule')->getMatricule() === $matricule) {

			$Info = Utilisateurs_OBJECT_($matricule, 'matricule');			

			if ($Info->getEtablissement() !== $etablissement) {
				$Info->setEtablissement($etablissement);
				$Update = true;
			} elseif ($Info->getNom() !== $nom) {
				$Info->setNom($nom);
				$Update = true;
			} elseif ($Info->getPrenom() !== $prenom) {
				$Info ->setPrenom($prenom);
				$Update = true;
			} elseif ($Info->getCentreDeCout() !== $centreDeCout) {
				$Info->setCentreDeCout($centreDeCout);
				$Update = true;
			} elseif ($Info->getCentreAffection() !== $centreAffection) {
				$Info->setCentreAffection($centreAffection);
				$Update = true;
			} else {
				$Update = false;
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

}
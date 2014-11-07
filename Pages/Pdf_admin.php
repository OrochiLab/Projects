<?php
	require_once('../Metier/Pdf.class.php');
	require_once('../Metier/EtudiantManager.class.php');
	require_once('../Metier/Etudiant.class.php');
	// Recuperation des variables passer par le GET
	// recuperation de l'objet Etudiant correspondant au id 
		$etd = EtudiantManager::getById($_GET['ID_Etudiant']);

	// Instanciation de la classe dérivée
		$pdf = new PDF();
		$pdf->print_certificat($_GET['nomAdmin'],$_GET['prenomAdmin'],$etd);
		
?>
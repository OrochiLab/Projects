<?php
	//require_once('../Metier/Pdf.class.php');
	require_once('../Metier/EtudiantManager.class.php');
	require_once('../Metier/Etudiant.class.php');
	// Recuperation des variables passer par le GET
		$_GET['nomAdmin'];
		
	// recuperation de l'objet Etudiant correspondant au id 
		$etd = EtudiantManager::getById($_GET['ID_Etudiant']);

		$etd->getCne();
/*
	// Instanciation de la classe dérivée
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		$pdf->Ln(35);

		$pdf->MultiCell(0,10,utf8_decode("Je soussigné, ".$a.", Président de l'Ecole Nationale de Sciences Appliquées de Khouribga,certifie que l'élève ".$b.", né(e) le ".$c." ,est régulièrement inscrit(e) à l'école pour l'année universitaire 2014-2015 en classe de :"));
		$pdf->SetFont('Times','B',12);
		$pdf->MultiCell(0,10,utf8_decode($d));
		$pdf->SetFont('Times','',12);
		$pdf->Output();
*/
?>
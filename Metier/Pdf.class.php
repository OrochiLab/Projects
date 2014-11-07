<?php
		require_once('../pdf/fpdf.php');
		
		class PDF extends FPDF
		{
		// En-tête
			function Header()
			{
			    // Logo
			    $this->Image('../img/logo_ensak.jpg',10,6,30);
			    // Police Arial gras 15
			    $this->SetFont('Arial','B',13);
			    // Décalage à droite
			    $this->Cell(100);
			    // Titre
			    $this->Cell(30,10,utf8_decode('Ecole Nationale des Sciences Appliquées Khouribga'),10,0,'C');
			    // Saut de ligne
			    $this->Ln(20);
			    $this->Ln(20);
			    // Décalage à droite
			    $this->Cell(60);
			    $this->SetFont('Arial','B',18);
			    $this->Cell(30,8,utf8_decode('CERTIFICAT DE SCOLARITE'));
			    $this->Ln(7);
			    $this->SetFont('Arial','B',13);
			    $this->Cell(70);
			    $this->Cell(30,8,utf8_decode('Année universitaire 2014-2015'));
			    
			}

			// Pied de page
			function Footer()
			{
			    // Positionnement à 1,5 cm du bas
			    $this->SetY(-15);
			    // Police Arial italique 8
			    $this->SetFont('Arial','I',8);
			    // Numéro de page
			    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
			}
		}

		// Instanciation de la classe dérivée
		$pdf = new PDF();
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		$pdf->Ln(35);
		$a="Amine";
		$b="OUASMINE Mohammed Amine";
		$c="03/12/1992";
		$d="Deuxième année du cycle ingénierie - Ingé 2 - Génie Informatique à ENSA, Khouribga";
		$pdf->MultiCell(0,10,utf8_decode("Je soussigné, ".$a.", Président de l'Ecole Nationale de Sciences Appliquées de Khouribga,certifie que l'élève ".$b.", né(e) le ".$c." ,est régulièrement inscrit(e) à l'école pour l'année universitaire 2014-2015 en classe de :"));
		$pdf->SetFont('Times','B',12);
		$pdf->MultiCell(0,10,utf8_decode($d));
		$pdf->SetFont('Times','',12);
		$pdf->Output();
?>
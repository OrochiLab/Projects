<?php
		require_once('../pdf/fpdf.php');
		require_once('../Metier/Etudiant.class.php');
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
		
			//print pdf demande

			function print_certificat($nomAdmin,$prenomAdmin,Etudiant $etudiant)
			{
				// Instanciation de la classe dérivée
				$this->AliasNbPages();
				$this->AddPage();
				$this->SetFont('Times','',12);
				$this->Ln(35);
				$a= $_SESSION['nom'];
				$aa= $_SESSION['prenom'];
				$b=$Etudiant->getNom();
				$bb=$Etudiant->getPrenom();
				$c=$Etudiant->getDate_naissance();
				$d="Cycle ingénierie - - ".$Etudiant->Filiere()." à ENSA, Khouribga";
				$this->MultiCell(0,10,utf8_decode("Je soussigné, ".$a." ".$aa.", Président de l'Ecole Nationale de Sciences Appliquées de Khouribga,certifie que l'élève ".$b.", né(e) le ".$c." ,est régulièrement inscrit(e) à l'école pour l'année universitaire 2014-2015 en classe de :"));
				$this->SetFont('Times','B',12);
				$this->MultiCell(0,10,utf8_decode($d));
				$this->SetFont('Times','',12);
				$this->Output();
			}
		}

		
		
?>
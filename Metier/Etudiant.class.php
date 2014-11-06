<?php
	require_once('Personne.class.php');
	require_once('Filiere.class.php');
	require_once('Database.class.php');

	/**
	* 
	*/
	class Etudiant extends Personne
	{
		private $cne;
		private $cin;
		private $date_naissance;
		private $filiere;
		function __construct($nom,$prenom,$cne,$cin,$date_naissance,$filiere)
		{
			# code...
			parent::__construct($nom,$prenom);
			$this->cne = $cne;
			$this->cin = $cin;
			$this->date_naissance = $date_naissance;
			$this->filiere=$filiere;
		}


		public function setCne($newCne)
		{	
			$this->cne = $newCne;
		}

		public function getCne()
		{
			return $this->cne;
		}
		
		public function setCin($newCin)
		{	
			$this->cin = $newCin;
		}

		public function getCin()
		{
			return $this->cin;
		}
		
		public function setDate_naissance($newDate_naissance)
		{	
			$this->date_naissance = $newDate_naissance;
		}

		public function getDate_naissance()
		{
			return $this->date_naissance;
		}

		public function setFiliere(Filiere $filiere)
		{
			$this->filiere= $filiere;
		}
		
		public function getFiliere()
		{
			return $this->filiere;
		}
		
	}
	
?>
<?php
	require_once('Administrateur.class.php');
	require_once('Demande.class.php');

	/**
	* 
	*/
	class Validation 
	{
		private $date_validation;
		private $administrateur;
		private $reponse;
		
		
		 function __construct($date_validation,$reponse)
		{
			//$this->administrateur = $administrateur;
			$this->date_validation = $date_validation;
			$this->reponse=$reponse;
		}

		public function setAdministrateur($newAdministrateur)
		{	
			$this->administrateur = $newAdministrateur;
		}

		public function getAdministrateur()
		{
			return $this->administrateur;
		}


		public function setDate_validation($newDate_validation)
		{	
			$this->date_validation = $newDate_validation;
		}

		public function getDate_validation()
		{
			return $this->date_validation;
		}
		
		public function setReponse($reponse)
		{
			$this->reponse=$reponse;
		}
		
		public function getReponse()
		{
			return $this->reponse;
		}
		
	}

?>
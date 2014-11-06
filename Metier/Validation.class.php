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
		private $demande;
		
		function __construct(Administrateur $administrateur,Demande $demande,$date_validation)
		{
			$this->administrateur = $administrateur;
			$this->demande = $demande;
			$this->date_validation = $date_validation;
		}

		function setAdministrateur($newAdministrateur)
		{	
			$this->administrateur = $newAdministrateur;
		}

		function getAdministrateur()
		{
			return $this->administrateur;
		}

		function setDemande($newDemande)
		{	
			$this->demande = $newDemande;
		}

		function getDemande()
		{
			return $this->demande;
		}

		function setDate_validation($newDate_validation)
		{	
			$this->date_validation = $newDate_validation;
		}

		function getDate_validation()
		{
			return $this->date_validation;
		}
		
		
	}

	$admin = new Administrateur('OUASMINE','Med Amine','MedAmineOsm','******');
	$demande = new Demande($amine,'05/11/2014');
	$valid = new Validation($admin,$demande,'10/10/1010');
	echo $valid->getDate_validation();
	echo $valid->getAdministrateur()->getNom();
?>
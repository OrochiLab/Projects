<?php
	require_once('Etudiant.Class.php');

	/**
	* 
	*/
	class Demande 
	{	
		private $id;
		private $etudiant;
		private $date_demande;
		
		
		function __construct($id,$date_demande,Etudiant $etudiant)
		{
			# code...
			$this->id=$id;
			$this->etudiant = $etudiant;
			$this->date_demande = $date_demande;
		}
		public function setId($id)
		{
			$this->id=$id;
		}
		public function getId()
		{
			return $this->id;
		}
		function getEtudiant()
		{
			return $this->etudiant;
		}

		function setEtudiant($newEtudiant)
		{
			$this->etudiant = $newEtudiant;
		}
		
		function setDate_Demande($newDate_demande)
		{
			$this->date_demande = $newDate_demande;
		}
		
		function getDate_Demande()
		{
			return $this->date_demande;
		}

		
	}



?>
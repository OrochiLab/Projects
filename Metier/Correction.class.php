<?php
require_once('Etudiant.class.php');

class Correction
{
	
	private $id;
	private $date_correction;
	private $cin;
	private $nom;
	private $prenom;
	private $date_naissance;
	private $email;
	private $etat;
	private $etudiant;
		
		public function __construct($id,$date_correction,$cin,$nom,$prenom,$date_naissance,$email,$etat,Etudiant $etudiant)
		{
			$this->id =$id;
			$this->date_correction= $date_correction;
			$this->cin =$cin;
			$this->nom = $nom;
			$this->prenom =$prenom;;
			$this->date_naissance = $date_naissance;
			$this->email = $email;
			$this->etat = $etat;
			$this->etudiant = $etudiant;
		}
		
		public function setId($id)
		{
			$this->id=$id;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function setDate_Correction($date_correction)
		{
			$this->date_correction = $date_correction;
		}
		
		public function getDate_Correction()
		{
			return $this->date_correction;
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
			
		public function setNom($nom)
		{
			$this->nom=$nom;
		}
		public function getNom()
		{
			return $this->nom;
		}
		public function setPrenom($prenom)
		{
			$this->prenom=$prenom;
		}
		public function getPrenom()
		{
			return $this->prenom;
		}
	
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setEtat($etat)
		{
			$this->etat = $etat;
		}
		
		public function getEtat()
		{
			return $this->etat;
		}
		
		public function setEtudiant($etudiant)
		{
			$this->etudiant=$etudiant;
		}
		
		public function getEtudiant()
		{
			return $this->etudiant;
		}
}
?>
<?php

require_once('Filiere.class.php');
require_once('Semestre.class.php');

class Module
{
	private $id;
	private $libelle;
	private $semestre;
	private $filiere;
	
	public function __construct($id,$libelle,$semestre,$filiere)
	{
		$this->id=$id;
		$this->libelle=$libelle;
		$this->semestre=$semestre;
		$this->filiere=$filiere;
	}
	
	public function setId($id)
	{
		$this->id=$id;
	}
	public function getId()
	{
		return $this->id;
	}
	
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;
	}
	
	public function getLibelle()
	{
		return $this->libelle;
	}

	public function setSemestre(Semestre $semestre)
	{
		$this->semestre=$semestre;
	}
	
	public function getSemestre()
	{
		return $this->semestre;
	}
	
	public function setFiliere(Filiere $filiere)
	{
		$this->filiere=$filiere;
	}
	
	public function getFiliere()
	{
		return $this->filiere;
	}
	
}

?>
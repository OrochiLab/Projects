<?php

abstract class Personne
{
	private $nom;
	private $prenom;
	
	public function __construct($nom,$prenom)
	{
	$this->nom=$nom;
	$this->prenom=$prenom;
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

}

?>
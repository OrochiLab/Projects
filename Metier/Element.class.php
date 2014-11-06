<?php

require_once('Module.class.php');

class Element
{
	private $id;
	private $libelle;
	private $module;
	
	public function __construct($id,$libelle,$module)
	{
		$this->id=$id;
		$this->libelle=$libelle;
		$this->module=$module;
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

	public function setModule($module)
	{
		$this->module=$module;
	}
	
	public function getModule()
	{
		return $this->module;
	}
}


?>
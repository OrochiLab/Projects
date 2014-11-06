<?php
	require_once('Personne.class.php');

	/**
	* 
	*/
	class Administrateur extends Personne
	{
		private $login;
		private $password;

		function __construct($nom,$prenom,$login,$password)
		{
			parent::__construct($nom,$prenom);
			$this->login = $login;
			$this->password = $password;
		}

		
		function setLogin($newLogin)
		{
			$this->login = $login;
		}

		function getLogin()
		{
			return $this->login;
		}

		function setPassword($newPassword)
		{
			$this->password = $Password;
		}

		function getPassword()
		{
			return $this->password;
		}

		/*function __toString()
		{
			parent::__toString();
			echo "<br>";
			echo "Login  : ".$this->login;
			echo "<br>";
			echo "Password : ".$this->password;
			echo "<br>";
		}*/
	}

	
?>
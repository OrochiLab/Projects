<?php

require_once('Etudiant.class.php');

class SessionManager
{

	public static function Connecter(Personne $visiteur)
	{
		
		$_SESSION['nom']=$visiteur->getNom();
		$_SESSION['prenom']=$visiteur->getPrenom();
		if($visiteur instanceof Etudiant)
		{
		$_SESSION['cne']=$visiteur->getCne();
		$_SESSION['type']='Etudiant';
		}
		else
		{
		$_SESSION['login']=$visiteur->getLogin();
		$_SESSION['type']='Administrateur';
		}
	}

	
}


?>
<?php

require_once('Etudiant.class.php');

class SessionManager
{

	public static function Connecter(Personne $etudiant)
	{
		$_SESSION['cne']=$etudiant->getCne();
		$_SESSION['nom']=$etudiant->getNom();
		$_SESSION['prenom']=$etudiant->getPrenom();
	}

	
}


?>
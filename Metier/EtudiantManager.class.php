<?php
require_once('Etudiant.class.php');
require_once('Database.class.php');
require_once('FiliereManager.class.php');
require_once('SessionManager.class.php');

class EtudiantManager
{

	public static function getById($cne)
		{
			
			$rep =Database::getConnection()->query('select * from etudiant where cne='.$cne);
			
			if($donnes=$rep->fetch())
			{
				$filiere = FiliereManager::getById($donnes['id_fil']);
				$etudiant = new Etudiant($donnes['nom'],$donnes['prenom'],$donnes['CNE'],$donnes['CIN'],$donnes['date_naissance'],$filiere);
				SessionManager::Connecter($etudiant);
				return $etudiant;
			}
			else
			{
				return null;
			}
		}
}

?>
<?php
require_once('Demande.class.php');
require_once('Database.class.php');
class DemandeManager
{
	
	public static function getByEtudiant(Etudiant $etud)
		{
			$rep =Database::getConnection()->query('select * from demande where CNE=\''.$etud->getCne().'\'');
			$demandes=array();
			while($donnes=$rep->fetch())
			{
				$demandes[]=new Demande($donnes['id'],$donnes['date_demande'],$etud);
				
			}
			return $demandes;
			
			
		}
}

?>
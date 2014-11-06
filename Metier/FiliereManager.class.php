<?php
require_once('Filiere.class.php');
require_once('Database.class.php');
class FiliereManager
{
	
	public static function getById($filiere)
		{
			$rep =Database::getConnection()->query('select * from filiere where id=\''.$filiere.'\'');
			
			if($donnes=$rep->fetch())
			{
				$filiere = new Filiere($donnes['id'],$donnes['libelle']);
				return $filiere;
			}
			else
			{
				return null;
			}
			
			
		}
}

?>
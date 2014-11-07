<?php
require_once('Validation.class.php');
require_once('DemandeManager.class.php');

class ValidationManager
{

	public static function getByDemande($id_dem)
	{	

			try{
			$rep =Database::getConnection()->query('select * from validation where id_dem='.$id_dem);
			
			while($donnes=$rep->fetch())
			{
				$validation = new Validation($donnes['date_validation'],$donnes['reponse']);
				return $validation;
			}
			
			}catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
	}
	
	public static function traiterDemande($id_dem,$reponse)
	{
		try{
			$rep = Database::getConnection()->prepare('Insert into validation values(null,NOW(),:demande,1,:reponse)');
			$rep->execute(array(
			'demande'=>$id_dem,
			'reponse'=>$reponse
			));
			return true;
			
		}catch(Exception $e)
		{
			return false;
			die('Erreur : '.$e->getMessage());
			
		}
	
	}
	
	public static function reaccepterDemande($id_dem)
	{
		try{
			$rep = Database::getConnection()->prepare('update validation set reponse=\'Valide\' where id_dem=:demande');
			$rep->execute(array(
			'demande'=>$id_dem
			));
			return true;
		}catch(Exception $e)
		{
			return false;
			die('Erreur : '.$e->getMessage());
			
		}
	
	}
}
?>
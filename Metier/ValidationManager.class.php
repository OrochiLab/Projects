<?php
require_once('Validation.class.php');
require_once('DemandeManager.class.php');

class ValidationManager
{

	public static function getByDemande($id_dem)
		{	
			return null;
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
}
?>
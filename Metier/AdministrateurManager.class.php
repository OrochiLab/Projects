<?php
require_once('Administrateur.class.php');
require_once('Database.class.php');
require_once('SessionManager.class.php');

class AdministrateurManager
{

	public static function getByLogin($login,$password)
		{
			try{
			$rep =Database::getConnection()->prepare('select * from administrateur where login=:login and password=:password');
			$rep->execute(
			array(
			'login'=>$login,
			'password'=>$password
			));
			
			if($donnes=$rep->fetch())
			{
				$administrateur = new Administrateur($donnes['nom'],$donnes['prenom'],$donnes['login'],null);

				return $administrateur;
			}
			else
			{
				return null;
			}
			}catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		}
}

?>
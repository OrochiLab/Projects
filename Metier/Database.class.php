<?php

class Database
{
	private static $bdd;
	
	public static function getConnection(/*$host,$dbname,$user,$mdp*/)
	{
		if(isset($bdd))
		{
			return self::$bdd;
		}
		else
		{
			try{
			self::$bdd = new PDO('mysql:host=localhost;dbname=demande_scolarite','root','');
			return self::$bdd;
			}
			catch(Exception $e)
			{
				die('Erreur base de donnee : '.$e->getMessage());
				return null;
			}
		}
		
	}
}


?>
<?php
require_once('Database.class.php');

class CorrectionManager
{
	public static function demanderCorrection($cin,$nom,$prenom,$daten,$email,$cne)
	{
		$rep = Database::getConnection()->query('select * from correction where cne=\''.$cne.'\' and (adddate(date_demandec,INTERVAL 30 DAY)>NOW() or etat<>\'En Attente\') order by date_demandec desc limit 0,1');
		if($donnes=$rep->fetch())
		{
				return 'Orange#Votre demande est refusée, vous avez deja effectué une demande le <strong>'.$donnes['date_demandec'].'</strong>, son état : <strong>'.$donnes['etat'].'</strong></br>Note : Si une demande reste en attente apres 1 mois, vous avez le droit d\'en refaire une.';
		}
		else
		{
			$rep3 = Database::getConnection()->prepare('insert into correction values(null,NOW(),:cin,:nom,:prenom,:daten,:email,:cne,\'En Attente\')');
			if($rep3->execute(array (
			'cin'=>$cin,
			'nom'=>$nom,
			'prenom'=>$prenom,
			'daten'=>$daten,
			'email'=>$email,
			'cne'=>$cne
			)))
			{
			return 'Vert#Votre demande est envoyée, veuillez attendre une réponse de l\'administrateur';
			}
		}
	
	}


}

?>
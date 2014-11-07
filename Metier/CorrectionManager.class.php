<?php
require_once('Database.class.php');
require_once('Correction.class.php');
require_once('EtudiantManager.class.php');

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
			$rep3 = Database::getConnection()->prepare('insert into correction values(null,NOW(),:cin,:nom,:prenom,:daten,:email,:cne,\'Attente\')');
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
	
	public static function readAll()
	{
			$rep =Database::getConnection()->query('select * from correction order by date_demandec desc');
			$corrections=array();
			while($donnes=$rep->fetch())
			{
				$corrections[]=new Correction($donnes['id'],$donnes['date_demandec'],$donnes['cin'],$donnes['nom'],$donnes['prenom'],$donnes['date_naissance'],$donnes['email'],$donnes['etat'],EtudiantManager::getById($donnes['cne']));
				
			}
			return $corrections;
			
			
	}
	
	public static function getById($id_corec)
	{
				$rep =Database::getConnection()->query('select * from correction where id='.$id_corec.' order by date_demandec desc');
				while($donnes=$rep->fetch())
				{
					$correction=new Correction($donnes['id'],$donnes['date_demandec'],$donnes['cin'],$donnes['nom'],$donnes['prenom'],$donnes['date_naissance'],$donnes['email'],$donnes['etat'],EtudiantManager::getById($donnes['cne']));
					
				}
				return $correction;
				
				
	}
		
	public static function traiterCorrection($id_corec,$reponse)
	{
		try{
			$rep = Database::getConnection()->prepare('update correction set etat=:reponse where id=:idcorec');
			$rep->execute(array(
			'idcorec'=>$id_corec,
			'reponse'=>$reponse
			));
			if($reponse=='Valide')
			{
				$correction = CorrectionManager::getById($id_corec);
				
				$rep = Database::getConnection()->prepare('update etudiant set CIN=:cin, nom=:nom, prenom=:prenom, date_naissance=:date_naissance where CNE=:cne');
				$rep->execute(array(
				'cin'=>$correction->getCin(),
				'nom'=>$correction->getNom(),
				'prenom'=>$correction->getPrenom(),
				'date_naissance'=>$correction->getDate_Naissance(),
				'cne'=>$correction->getEtudiant()->getCne()	
				));
			}
			return true;
			
		}catch(Exception $e)
		{
			return false;
			die('Erreur : '.$e->getMessage());
			
		}
	
	}
}
?>
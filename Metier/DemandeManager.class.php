<?php
require_once('Demande.class.php');
require_once('Database.class.php');
require_once('ValidationManager.class.php');
require_once('EtudiantManager.class.php');

class DemandeManager
{
	
	public static function getByEtudiant(Etudiant $etud)
	{
			$rep =Database::getConnection()->query('select *,d.id as dem from demande d LEFT OUTER JOIN validation v ON d.id=v.id_dem where CNE=\''.$etud->getCne().'\'');
			$demandes=array();
			while($donnes=$rep->fetch())
			{
				$demandes[]=new Demande($donnes['dem'],$donnes['date_demande'],$etud,new Validation($donnes['date_validation'],$donnes['reponse']));
				
			}
			return $demandes;
			
			
	}
		
	public static function readAll()
	{
			$rep =Database::getConnection()->query('select *,d.id as dem from demande d LEFT OUTER JOIN validation v ON d.id=v.id_dem order by date_demande desc');
			$demandes=array();
			while($donnes=$rep->fetch())
			{
				$demandes[]=new Demande($donnes['dem'],$donnes['date_demande'],EtudiantManager::getById($donnes['CNE']),new Validation($donnes['date_validation'],$donnes['reponse']));
				
			}
			return $demandes;
			
			
	}
	
public static function passerDemande($cne)
		{
			try{
			$rep = Database::getConnection()->query('select id,date_demande from demande where cne=\''.$cne.'\' and adddate(date_demande,INTERVAL 7 DAY)>NOW() order by date_demande desc limit 0,1');
			if($donnes=$rep->fetch())
			{
				return 'Rouge#Demande echouée, Votre derniére demande date du '.$donnes['date_demande'].', Un délai de 7 jours est appliquée avant de pouvoir faire une autre demande<br/>Rappel : Vous pouvez avoir qu\'une attestation par mois';	
			}
			else
			{
					$rep2 = Database::getConnection()->query('select date_validation from validation where id_dem=(select id from demande where cne=\''.$cne.'\' order by date_demande desc limit 0,1) and (adddate(date_validation,INTERVAL 30 DAY)>NOW() and reponse=\'Valide\')');
					if($donnes2=$rep2->fetch())
					{
						
						return 'Orange#Votre demande est echouée, une demande précedente a été validé y a moins d\'un mois ( le '.$donnes2['date_validation'].') par l\'administrateur';
				
					//update and insert
					}
					else
					{
						$rep3 = Database::getConnection()->prepare('insert into demande values(null,NOW(),:cne)');
						if($rep3->execute(array ('cne'=>$cne)))
						{
						return 'Vert#Votre demande est envoyée, veuillez attendre une réponse de l\'administrateur';
						}
					}
			}
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
		}
		
		public static function statistiques()
		{
			$rep =Database::getConnection()->query('select e.id_fil,f.libelle,count(d.id) as total,(count(d.id)-sum(IF(IFNULL(v.id,0)=0,0,1))) as nontraite,sum(IF(IFNULL(v.id,0)=0,0,1)) as traite,sum(IF(reponse=\'Valide\',1,0)) as accepte,sum(IF(reponse=\'Refus\',1,0)) as refus from etudiant e LEFT OUTER JOIN demande d ON d.cne=e.cne LEFT OUTER JOIN validation v ON v.id_dem=d.id INNER JOIN filiere f ON e.id_fil=f.id group by e.id_fil,f.libelle');
			$statistiques=array();
			while($donnes=$rep->fetch())
			{
				$statistiques[$donnes['id_fil']]=array('nom_fil'=>$donnes['libelle'],'total'=>$donnes['total'],'nontraite'=>$donnes['nontraite'],'traite'=>$donnes['traite'],'accepte'=>$donnes['accepte'],'refus'=>$donnes['refus']);
			}
			return $statistiques;
			
		}
}
?>
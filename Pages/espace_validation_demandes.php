<style type="text/css">
#stat td,#stat th
{
text-align:center;
}
</style>
<?php
if(isset($_SESSION['login']))
{
	
	
?>


	<div class="row"><br></div>
	<div data-alert class="alert-box">
	  <!-- Your content goes here -->
	  Bienvenue <strong><?php echo htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></strong> a votre espace d'administration!
	  </div>
	  <?php
		$retour=false;
		if(isset($_POST['accepter']))
			$retour = ValidationManager::traiterDemande($_POST['demande'],'Valide');
		if(isset($_POST['refuser']))
			$retour = ValidationManager::traiterDemande($_POST['demande'],'Refus');
		if(isset($_POST['reaccepter']))
			$retour = ValidationManager::reaccepterDemande($_POST['demande']);
		
		if(isset($_POST['accepter']) or isset($_POST['refuser']) or isset($_POST['reaccepter']))
		{
	  ?>
			<div data-alert class="alert-box secondary radius">
			<?php
			if($retour and (isset($_POST['accepter']) or isset($_POST['reaccepter'])))
				echo 'Demande N° <strong>'.$_POST['demande'].'</strong> acceptée.';
			else if($retour and isset($_POST['refuser']))
				echo 'Demande N° <strong>'.$_POST['demande'].'</strong> refusée.';
			?>
			<a href="#" class="close">&times;</a>
			</div>
		<?php
		}
		?>
	<dl class="sub-nav" style="float:left">
		<dt>Filières:</dt>
		<dd class="active"><a href="#" id="fil-TOUT" class="criteria">Tout</a></dd>
		<dd><a href="#" id="fil-GI" class="criteria">GI</a></dd>
		<dd><a href="#" id="fil-GE" class="criteria">GE</a></dd>
		<dd><a href="#" id="fil-GP" class="criteria">GP</a></dd>
		<dd><a href="#" id="fil-GRT" class="criteria">GRT</a></dd>
	</dl>
	<dl class="sub-nav" style="float:right">
		<dt>Demandes:</dt>
		<dd class="active"><a href="#" id="etat-ATT" class="criteria2">En attente</a></dd>
		<dd><a href="#" id="etat-VAL" class="criteria2">Acceptés</a></dd>
		<dd><a href="#" id="etat-REF" class="criteria2">Refusés</a></dd>	
	</dl>
	
	<div>
		<div class="large-12 colums">
		
			<table id="stat" class="large-12">
			  <thead>
			    <tr>
			      <th>N° Demande</th>
				  <th>Nom & Prenom</th>
				  <th>Filière</th>
				  <th>Date demande</th>
				  <th>Etat</th>
				  <th>Date validation</th>
				  <th>Opération</th>
				</tr>
				
			  </thead>
			  <tbody>
				<?php
				$demandes = DemandeManager::readAll();
				for($i=0;$i<count($demandes);$i++)
				{
				?>
				<tr class="row-<?php echo $demandes[$i]->getEtudiant()->getFiliere()->getId();?> row-<?php echo ($demandes[$i]->getValidation()->getReponse()=='Refus')?'REF':(($demandes[$i]->getValidation()->getReponse()=='Valide')?'VAL':'ATT');?>">
					<th><?php echo $demandes[$i]->getId(); ?></th>
					<th><a href="?page=details_etudiant&cne=<?php echo $demandes[$i]->getEtudiant()->getCne(); ?>"><?php echo $demandes[$i]->getEtudiant()->getNom().' '.$demandes[$i]->getEtudiant()->getPrenom(); ?></a></th>
					<th><?php echo $demandes[$i]->getEtudiant()->getFiliere()->getLibelle(); ?></th>
					<th><?php echo $demandes[$i]->getDate_Demande(); ?></th>
					<th><?php echo ($demandes[$i]->getValidation()->getReponse()=='Refus')?'Refusée':(($demandes[$i]->getValidation()->getReponse()=='Valide')?'Acceptée':'En Attente...');?></th>
					<th><?php echo $demandes[$i]->getValidation()->getDate_Validation(); ?></th>
					<th>
					<form action="#" method="post">
					<input type="hidden" name="demande" value="<?php echo $demandes[$i]->getId(); ?>" />
					<?php
					if($demandes[$i]->getValidation()->getReponse()!='Refus' and $demandes[$i]->getValidation()->getReponse()!='Valide')
					{
					
					?>
					 <button class="button tiny" type="submit" name="accepter" style="background-color:rgb(0,100,0);">Accepter</button>
					 <button class="button tiny alert" type="submit" name="refuser" >Refuser</button>
					<?php
					}
					else if($demandes[$i]->getValidation()->getReponse()=='Refus')
					{
					?>
					<button class="button tiny" type="submit" name="reaccepter">Reaccepter</button>
					<?php
					}
					else
					{
					?>
					<a href="../Projects/Pages/Pdf_admin.php?nomAdmin=<?php echo $_SESSION['nom'];?>&prenomAdmin=<?php echo $_SESSION['prenom'];?>&ID_Etudiant=<?php echo $demandes[$i]->getEtudiant()->getCne();?>" class="button tiny" />Télécharger
					<?php
					}
					?>
					</form>	
					</th>
				</tr>
				<?php
				}
				?>
			  </tbody>
			</table>

		</div>
	</div>
<?php
}
else
{?>
						<div data-alert class="alert-box alert radius" style="opacity:0.8">
						Erreur 404 : Access Denied<br/>
						<a href="?page=accueil">Retour</a>
						</div>
<?php
}
?>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.criteria').click(function(){
		if(!$(this).parent().hasClass('active'))
		{
			$('.criteria').each(function(){
				$(this).parent().removeClass('active');
			});
			$(this).parent().addClass('active');
			afficher_criteres();
		}
		
	});
	
	$('.criteria2').click(function(){
		if(!$(this).parent().hasClass('active'))
		{
			$('.criteria2').each(function(){
				$(this).parent().removeClass('active');
			});
			$(this).parent().addClass('active');
			afficher_criteres();
		}
		
	});
	function afficher_criteres()
	{
		var criteres ='';
		$('.criteria').each(function(){
					if($(this).parent().hasClass('active'))
					{
						criteres+=$(this).attr('id').split('-')[1]+'-';
					}
		});
		
		$('.criteria2').each(function(){
					if($(this).parent().hasClass('active'))
					{
							criteres+=$(this).attr('id').split('-')[1];
					
					}
		});
		if(criteres.split('-')[0]=='TOUT')
		{
		$('#stat tbody tr').hide();
		$('#stat tbody tr.row-'+criteres.split('-')[1]).show(500);
		
		}
		else
		{
		$('#stat tbody tr').hide();
		$('#stat tbody tr.row-'+criteres.split('-')[0]+'.row-'+criteres.split('-')[1]).show(500);
		}
	}
	
	
	afficher_criteres();
	
	
});
</script>

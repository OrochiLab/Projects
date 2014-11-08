<style type="text/css">
#stat td,#stat th
{
text-align:center;
}
.green
{
color:green;
}
.red
{
color:red;
}
</style>
<?php
require_once('Metier/CorrectionManager.class.php');

if(isset($_SESSION['login']))
{
	
	
?>


	<div class="row"><br></div>
	<div data-alert class="alert-box">
	  <!-- Your content goes here -->
	  <i class="icon-white icon-bell"></i> Bienvenue <strong><?php echo htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></strong> a votre espace d'administration!
	  </div>
	<?php
		$retour=false;
		if(isset($_POST['accepter']) or isset($_POST['reaccepter']))
			$retour = CorrectionManager::traiterCorrection($_POST['demande'],'Valide');
		if(isset($_POST['refuser']))
			$retour = CorrectionManager::traiterCorrection($_POST['demande'],'Refus');

		if(isset($_POST['accepter']) or isset($_POST['refuser']) or isset($_POST['reaccepter']))
		{
	  ?>
			<div data-alert class="alert-box secondary radius">
			<?php
			if($retour and (isset($_POST['accepter']) or isset($_POST['reaccepter'])))
				echo 'Demande N° <strong>'.$_POST['demande'].'</strong> acceptée, les données de l\'étudiant sont mit a jour.';
			else if($retour and isset($_POST['refuser']))
				echo 'Demande N° <strong>'.$_POST['demande'].'</strong> refusée.';
			?>
			<a href="#" class="close">&times;</a>
			</div>
		<?php
		}
		?>
	<div>
		<div class="large-12 colums">
		
			<table id="stat" class="large-12">
			  <thead>
			    <tr>
			      <th rowspan="2">CNE</th>
				  <th rowspan="2">Date demande</th>
				  <th colspan="2">CIN</th>
				  <th colspan="2">Nom</th>
				  <th colspan="2">Prenom</th>
				  <th colspan="2">Date naissance</th>
				  <th rowspan="2">Etat</th>
				  <th rowspan="2">Opération</th>
				</tr>
				<tr>
					<th>Courant</th>
					<th>Nouveau</th>
					<th>Courant</th>
					<th>Nouveau</th>
					<th>Courant</th>
					<th>Nouveau</th>
					<th>Courant</th>
					<th>Nouveau</th>
				</tr>
				
				
			  </thead>
			  <tbody>
				<?php
				$corrections = CorrectionManager::readAll();
				for($i=0;$i<count($corrections);$i++)
				{
				?>
				<tr>
					<td><a href="?page=details_etudiant&cne=<?php echo $corrections[$i]->getEtudiant()->getCne(); ?>"><i class="icon-search"></i> <strong><?php echo $corrections[$i]->getEtudiant()->getCne(); ?></strong></a></td>
					<td><?php echo $corrections[$i]->getDate_Correction(); ?></td>
					
					<td class="red"><?php echo $corrections[$i]->getEtudiant()->getCin(); ?></td>
					<td class="green"><?php echo $corrections[$i]->getCin(); ?></td>
					
					<td class="red"><?php echo $corrections[$i]->getEtudiant()->getNom(); ?></td>
					<td class="green"><?php echo $corrections[$i]->getNom(); ?></td>
					
					<td class="red"><?php echo $corrections[$i]->getEtudiant()->getPrenom(); ?></td>
					<td class="green"><?php echo $corrections[$i]->getPrenom(); ?></td>
					
					<td class="red"><?php echo $corrections[$i]->getEtudiant()->getDate_Naissance(); ?></td>
					<td class="green"><?php echo $corrections[$i]->getDate_Naissance(); ?></td>
					
					<td><strong><?php echo $corrections[$i]->getEtat(); ?></strong></td>
					<td>
					<form action="#" method="post">
					<input type="hidden" name="demande" value="<?php echo $corrections[$i]->getId(); ?>" />
					<?php
					if($corrections[$i]->getEtat()!='Refus' and $corrections[$i]->getEtat()!='Valide')
					{
					
					?>
					 <button class="button tiny success" type="submit" name="accepter" ><i class="icon-white icon-ok"></i></button>
					 <button class="button tiny alert" type="submit" name="refuser" ><i class="icon-white icon-remove"></i></button>
					<?php
					}
					else if($corrections[$i]->getEtat()=='Refus')
					{
					?>
					<button class="button tiny" type="submit" name="reaccepter">Reaccepter</button>
					<?php
					}
					?>
					</form>	
					</td>
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
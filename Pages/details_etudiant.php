<style type="text/css">
#stat td,#stat th
{
text-align:center;
}
</style>

<?php
if(isset($_SESSION['login']))
{
	if(isset($_GET['cne']))
	{
		$etudiant = EtudiantManager::getById($_GET['cne']);
	}
?>	<script type="text/javascript" ></script>
	<div class="row"><br></div>
	<div data-alert class="alert-box">
	  <!-- Your content goes here -->
	  Bienvenue <strong><?php echo htmlspecialchars($_SESSION['nom'].' '.$_SESSION['prenom']);?></strong> a votre espace d'administration!
	 </div>
	<div>
		<div class="large-12 colums">
			<?php
			if(isset($etudiant))
			{
			$demandes = DemandeManager::getByEtudiant($etudiant);
		
			?>
			<ul class="pricing-table">
				<li class="title">Informations de l'étudiant :</li>
				<li class="bullet-item">CNE : <?php echo $etudiant->getCne(); ?></li>
				<li class="bullet-item">CIN : <?php echo $etudiant->getCin(); ?></li>
				<li class="bullet-item">Nom & Prenom : <?php echo $etudiant->getNom().' '.$etudiant->getPrenom(); ?></li>
				<li class="bullet-item">Date de naissance : <?php echo $etudiant->getDate_Naissance(); ?></li>
				<li class="bullet-item">Filière : <?php echo $etudiant->getFiliere()->getLibelle(); ?></li>	
				<li class="title">Historique des demandes de l'étudiant :</li>
				<table class="large-12" >
				<thead>
					<tr>
						<th width="150">Num Demande</th>
						<th width="150">Date demande</th>
						<th width="150">Etat de la demande</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					for($i=0;$i<count($demandes);$i++)
					{
					?>
						<tr>
							<td>#<?php echo $demandes[$i]->getId(); ?></td>
							<td><?php echo $demandes[$i]->getDate_Demande(); ?></td>
							<td><?php  $val = $demandes[$i]->getValidation()->getReponse(); echo (isset($val)?($demandes[$i]->getValidation()->getReponse().' le '.$demandes[$i]->getValidation()->getDate_Validation()):"En Attente"); ?></td>
						</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</ul>
			
			<?php
			}
			?>

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
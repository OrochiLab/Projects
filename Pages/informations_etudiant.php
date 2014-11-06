<?php
require_once('../Metier/Database.class.php');
require_once('../Metier/EtudiantManager.class.php');
require_once('../Metier/DemandeManager.class.php');
if(isset($_POST['cne']))
{
	$etudiant = EtudiantManager::getById($_POST['cne']);
		
	if(isset($etudiant))
	{
		?>
			<fieldset>
			<legend>Informations de l'etudiant</legend>
			<form action="" method="post">
			<pre>
				CNE               : <input type="text" id="cne" value="<?php echo $etudiant->getCne(); ?>" disabled="disabled"/><br/>
				CIN               : <input type="text" id="cin" value="<?php echo $etudiant->getCin(); ?>" disabled="disabled"/><br/>
				Nom               : <input type="text" id="nom" value="<?php echo $etudiant->getNom(); ?>" disabled="disabled"/><br/>
				Prenom            : <input type="text" id="prenom" value="<?php echo $etudiant->getPrenom(); ?>" disabled="disabled"/><br/>
				Date de naissance : <input type="date" id="daten" value="<?php echo $etudiant->getDate_Naissance(); ?>" disabled="disabled"/><br/>
				Filiere           : <?php echo $etudiant->getFiliere()->getLibelle(); ?><br/>
				<input type="button" id="actmod" Value="Demande de modification"/> <input type="submit" id="btnenvoi" value="Envoyer donnes" hidden="hidden"/>
				
			
			</pre>
			
			
			</form>
			</fieldset>
			<fieldset>
				<legend>Demandes d'attestation</legend>
				<?php $demandes = DemandeManager::getByEtudiant($etudiant);?>
				<table border="1">
					<tr>
						<th>Date de la demande</th>
					</tr>
				<?php
				for($i=0;$i<count($demandes);$i++)
				{
					?>
					<tr>
						<td><?php echo $demandes[$i]->getDate_Demande(); ?></td>
					</tr>
					<?php
				}
				?>
				</table>
				
			</fieldset>
			
		<?php
	}
	else
	{
		echo 'CNE Incorrect, Cet etudiant n\'existe pas dans la base de donnee<br/>';
	}
}
else
{
	echo 'Acces a la plage incorrect';	

}

?>
<script type="text/javascript" src="../jquery.js" ></script>
<script type="text/javascript">

	$('#actmod').click(function(){
			$('#cin').html('enabled','enabled');
            $('#btnenvoi').css('display','inline-block');
        });

</script>